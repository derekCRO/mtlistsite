<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("include/global.php");
global $_SERVER_URL;

//--- 用户管理 Controller ---//
class Piecepaper extends CI_Controller {
	public function __construct(){
        parent::__construct();
      
	    global $_SERVER_URL;
		if(!$_SESSION['admin_id']){	    	   
    		header("Location: $_SERVER_URL"."admin/admin");}
        $this->load->model("Piecepaper_model"); 
        $this->pageSize = 10;
    }
	
    public function index() {
    	$data['curPage'] = $this->CorrectRequest("curPage", 0);
    	$search_type = 2;
    	$search_key = $this->CorrectRequest("search_key", "");
    	$data['curPage'] = intval($data['curPage'] / $this->pageSize);
    	
    	if ($search_type == 1){
    		$condition .= " pp.title LIKE '%$search_key%'";
    	}elseif ($search_type == 2){
    		$condition .= " pp.content LIKE '%$search_key%'";
    	}
    	$data[search_type] = $search_type;
    	$data[search_key] = $search_key;
		$data['list'] = $this->Piecepaper_model->getList($condition,"",$data['curPage'],$this->pageSize, "");
		
		global $_SERVER_URL;
		$data['pageSize'] = $this->pageSize;
		$data['count'] = $this->Piecepaper_model->count;
		$this->load->library('pagination');
		$config['num_links'] = 3;		//페지수자 앞뒤에 현시할 페지번호개수
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'curPage';
		$config['last_link'] = '끝 &gt;';
		$config['first_link'] = '&lt; 처음';
		$config['prev_link'] = '이전';
		$config['next_link'] = '다음';
		$config['base_url'] = $_SERVER_URL . "admin/Piecepaper?search_type=$search_type&search_key=$search_key";
		$config['total_rows'] = $data['count'];
		$config['per_page'] = $this->pageSize;
		$this->pagination->initialize($config);
		$data['pagination']  = $this->pagination->create_links();
		
		$this->load->view('common' );
        $this->load->view('admin/header' ); 
        $this->load->view('admin/piecepaper/list', $data);
	}
	 

	public function edit() {
		$data['login_id'] = $login_id = $this->CorrectRequest("login_id", '');
		
		$notice_id = $this->CorrectRequest("notice_id", 0);
    	$condition = "pp.idx = '$notice_id'";
		$rs = $this->Piecepaper_model->getList($condition,"");
		$data['info'] = $rs[0];
		
		$this->load->view('common' );
        $this->load->view('admin/header' ); 		
        $this->load->view('admin/piecepaper/edit', $data);
	}
	
	public function save(){
		 global $_SERVER_URL;
		 
		if(!isset($_SESSION['admin_id']))	
		{
			print('login'); exit;
		}
		$data['idx'] 			= $this->CorrectRequest("idx", "0");
		$data['title'] 			= $this->CorrectRequest("title", "");
		$data['content'] 		= $this->CorrectRequest("htmlContent", "");	//content
		$data['receive_ids'] 	= $this->CorrectRequest("receive_ids", "");	
		$data['receive_names'] 	= $this->CorrectRequest("receive_names", "");
		$data['write_id'] 		= $_SESSION['admin_id'];
		 
 
		$this->Piecepaper_model->add($data);
		header("Location: " . $_SERVER_URL . "admin/piecepaper");
	}
	
	public function ajax_exist(){
	 	
    	$receive_names 	= $this->CorrectRequest("receive_names", "");							
    	
    	$receive_names = explode(",", $receive_names);
    	$this->load->model("User_model"); 
    	foreach ($receive_names as $name) {
    		$condition = "login_id = '$name'";
    		$rs = $this->User_model->getList($condition);
    		if($rs){
    			$ids .= ",".$rs[0]->idx;
    		}else{
    			echo "-1";
    			exit;
    		}
    	}
		
		$ids .= ",";
		echo $ids;
	}
	
	public function ajax_del(){
	 
    	$idx 	= $this->CorrectRequest("idx", "0");							
    	 
		$this->Piecepaper_model->del($idx);
		
		echo "ok";
	}
	
 
	public function detail() {
		$notice_id = $this->CorrectRequest("notice_id", 0);
    	$notice_type = $this->CorrectRequest("notice_type", 0);
    	
    	$condition = "n.idx = '$notice_id'";
		$rs = $this->Piecepaper_model->getList($condition);
		$data['info'] = $rs[0];

		$condition = "n.notice_type = '$notice_type' AND n.idx > '$notice_id'";
		$sort = "idx";
		$rs = $this->Piecepaper_model->getList($condition,$sort,0,1);
		$data['prev_id'] = $rs[0]->idx;
		$data['prev_title'] = $rs[0]->title;
		
		$condition = "n.notice_type = '$notice_type' AND n.idx < '$notice_id'";
		$rs = $this->Piecepaper_model->getList($condition,"",0,1);
		$data['next_id'] = $rs[0]->idx;
		$data['next_title'] = $rs[0]->title;
		 

		
		$condition = "r.notice_id = '$notice_id'";
		$data['replys'] = $this->Reply_model->getList($condition);
		
		//print_r($data); exit;
        $this->load->view('admin/notice/detail', $data);
	}
	
}
?>