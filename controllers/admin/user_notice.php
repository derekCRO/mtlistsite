<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("include/global.php");
include_once("fckeditor/fckeditor.php") ;
global $_SERVER_URL;

//--- 用户管理 Controller ---//
class User_notice extends CI_Controller {
	public function __construct(){
        parent::__construct();
	    global $_SERVER_URL;
		if(!$_SESSION['admin_id']){	    	   
    		header("Location: $_SERVER_URL"."admin/admin");}
        $this->load->model("Notice_model"); 
        $this->load->model("Reply_model"); 
        $this->pageSize = 10;
    }
	
    public function index() {
    	$data['curPage'] = $this->CorrectRequest("curPage", 0);
    	$data['notice_type'] = $this->CorrectRequest("notice_type", 16);
    	$search_type = $this->CorrectRequest("search_type", 0);
    	$search_key = $this->CorrectRequest("search_key", "");
    	
    	if($data['notice_type'] == 22 || $data['notice_type'] == 24) $this->pageSize = 8;
    	
    	if($data['notice_type'] == 22 || $data['notice_type'] == 24){
        	$this->pageSize = $_SESSION['setting']['photo_view_rows'] * 4;
		}
		
    	$data['curPage'] = intval($data['curPage'] / $this->pageSize);
    	
    	$condition = "n.is_notice = 0 AND n.notice_type = '".$data['notice_type']."'";
    	if ($search_type == 1){
    		$condition .= " AND n.title LIKE '%$search_key%'";
    	}elseif ($search_type == 2){
    		$condition .= " AND n.content LIKE '%$search_key%'";
    	}elseif ($search_type == 3){
    		$condition .= " AND u.name LIKE '%$search_key%'";
    	}
		$data['list'] = $this->Notice_model->getList($condition,"",$data['curPage'],$this->pageSize);
		 
		$data['search_type'] = $search_type;
		$data['search_key'] = $search_key;
		
		global $_SERVER_URL;
		$data['pageSize'] = $this->pageSize;
		$data['count'] = $this->Notice_model->count;
		$this->load->library('pagination');
		$config['num_links'] = 3;		//페지수자 앞뒤에 현시할 페지번호개수
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'curPage';
		$config['last_link'] = '끝 &gt;';
		$config['first_link'] = '&lt; 처음';
		$config['prev_link'] = '이전';
		$config['next_link'] = '다음';
		$config['base_url'] = $_SERVER_URL . "admin/user_notice?notice_type=".$data['notice_type']."&search_type=$search_type&search_key=$search_key";
		$config['total_rows'] = $data['count'];
		$config['per_page'] = $this->pageSize;
		$this->pagination->initialize($config);
		$data['pagination']  = $this->pagination->create_links();
		
		
		$this->load->view('common' );
        $this->load->view('admin/header' ); 
        
		if($data['notice_type'] == 22 || $data['notice_type'] == 24){
        	$this->load->view('admin/user_notice/photo', $data);
		}else{
			$this->load->view('admin/user_notice/list', $data);
		}
	}
 
	
	public function ajax_del(){
	 
    	$notice_id 	= $this->CorrectRequest("notice_id", "0");							
    	 
		$this->Notice_model->del($notice_id);
		
		echo "ok";
	}
	
	public function ajax_reply_del(){
    	$reply_id 	= $this->CorrectRequest("reply_id", "0");							
    	 
		$this->Reply_model->del($reply_id);
		
		$this->ajax_reply_qty(0);
	}
	
	public function detail() {
		$notice_id = $this->CorrectRequest("notice_id", 0);
    	$notice_type = $this->CorrectRequest("notice_type", 0);
    	
    	$condition = "n.idx = '$notice_id'";
		$rs = $this->Notice_model->getList($condition);
		$data['info'] = $rs[0];

		$condition = "n.is_notice = 0 AND n.notice_type = '$notice_type' AND n.idx > '$notice_id'";
		$sort = "idx";
		$rs = $this->Notice_model->getList($condition,$sort,0,1);
		$data['prev_id'] = $rs[0]->idx;
		$data['prev_title'] = $rs[0]->title;
		
		$condition = "n.is_notice = 0 AND n.notice_type = '$notice_type' AND n.idx < '$notice_id'";		 
		$rs = $this->Notice_model->getList($condition,"",0,1);
		$data['next_id'] = $rs[0]->idx;
		$data['next_title'] = $rs[0]->title;
		

		
		$condition = "r.notice_id = '$notice_id'";
		$data['replys'] = $this->Reply_model->getList($condition);
		
		//print_r($data); exit;
        $this->load->view('admin/user_notice/detail', $data);
	}
	
	public function ajax_reply_add(){
		$data['notice_id'] 	= $this->CorrectRequest("notice_id", 0);
		$data['reply'] 		= $this->CorrectRequest("reply", "");		
		$data['write_id'] 	= $_SESSION['admin_id'];
    								
		$this->Reply_model->add($data);
		echo "ok";
		
	}
	

	public function ajax_reply_qty($is_increase = 1){
		$notice_id 	= $this->CorrectRequest("notice_id", 0);
		$this->Notice_model->update_reply_qty($notice_id, $is_increase);		
		echo "ok";
	}
	
	public function edit() {
		$notice_id = $this->CorrectRequest("notice_id", 0);
		$data['notice_type'] = $this->CorrectRequest("notice_type", 16);
		
    	$condition = "n.idx = '$notice_id'";
		$rs = $this->Notice_model->getList($condition,"");
		$data['info'] = $rs[0];
		
		$this->load->view('common' );
        $this->load->view('admin/header' ); 		
        $this->load->view('admin/user_notice/edit', $data);
	}
	
	public function ajax_update_goal()
	{
		$idx	            = $this->CorrectRequest("idx", "0");
    	$data['isgoal'] 	= $this->CorrectRequest("status", "0");
		$condition			= "idx='$idx'";
		$this->Notice_model->updateFields($data, $condition);
		print('ok');
	}
	
	public function save(){
		 global $_SERVER_URL;
		 
		if(!isset($_SESSION['admin_id']))	
		{
			print('login'); exit;
		}
		
		$data['idx']            = $this->CorrectRequest("idx", "0");
    	$data['notice_type'] 	= $this->CorrectRequest("notice_type", "0");						
		$data['title'] 			= $this->CorrectRequest("title", "");
		$data['content'] 		= $this->CorrectRequest("fckContent", "");	//content
		$data['title_style'] 	= $this->CorrectRequest("title_style", "");	
		$data['is_secret'] 		= $this->CorrectRequest("is_secret", "0");		 		
		$data['write_id'] 		= $this->CorrectRequest("write_id", "");
		if($data['write_id'] == ""){
			$data['write_id'] 		= $_SESSION['admin_id'];
		}
		$data['is_notice'] 		= 0;	
		//($notice_type==16 || $notice_type==17 || $notice_type==18 || $notice_type==10)
		$goal            = $this->CorrectRequest("goal", "0");
		$goalout         = $this->CorrectRequest("goalout", "0");
		
		if(!$goal && !$goalout)	$data['isgoal'] = 0;
		elseif($goal )			$data['isgoal'] = 1;
		else					$data['isgoal'] = 2;
		
		if($_FILES['fileOpen']['name'] != ""){
			$data['file_name'] = $_FILES['fileOpen']['name'];
			$info = explode(".", $_FILES['fileOpen']['name']);
			 
			$file_name = "notice".$_SESSION['admin_id'].strtotime(date("Y-m-d H:i:s")).".".$info[count($info)-1];
			
			$config['upload_path']          = 'uploads/notice/';
			$config['allowed_types']        = '*';
			$config['file_name']        = $file_name;
			
			$this->load->library('upload');//, $config
			$this->upload->initialize($config);	
			$this->upload->do_upload('fileOpen');
	
			$data['file_path'] 		= $config['upload_path'].$file_name;
		}
		$this->Notice_model->add($data);
		header("Location: " . $_SERVER_URL . "admin/user_notice?notice_type=".$data['notice_type']);
	}
	
}
?>