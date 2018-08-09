<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("include/global.php");
include_once("fckeditor/fckeditor.php") ;
global $_SERVER_URL;

//--- 用户管理 Controller ---//
class mtlist extends CI_Controller {
	public function __construct(){
        parent::__construct();
	        
		global $_SERVER_URL;
		if(!$_SESSION['admin_id']){	    	   
    		header("Location: $_SERVER_URL"."admin/admin");}
        $this->load->model("Notice_model"); 
        $this->load->model("Reply_model"); 
        $this->pageSize = 3;
    }
	
    public function index() {
    	$data['curPage'] = $this->CorrectRequest("curPage", 0);
    	$data['notice_type'] = $this->CorrectRequest("notice_type", 0);
    	$search_type = $this->CorrectRequest("search_type", 0);
    	$search_key = $this->CorrectRequest("search_key", "");
    	$alpha_type = $this->CorrectRequest("alpha_type", "0");
    	
        if($data['notice_type'] == 6 || $data['notice_type'] == 2){
    		$this->pageSize = $_SESSION['setting']['mtlist_view_rows'];
        }else{
    		$this->pageSize = $_SESSION['setting']['mtverify_view_rows'];
        }
        
    	$data['curPage'] = intval($data['curPage'] / $this->pageSize);
    	
    	
    	$condition = "n.notice_type = ".$data['notice_type'];
    	if ($search_type == 1){
    		$condition .= " AND n.title LIKE '%$search_key%'";
    	}elseif ($search_type == 2){
    		$condition .= " AND ifnull(n.content,'') LIKE '%$search_key%'";
    	}elseif ($search_type == 3){
    		$condition .= " AND u.name LIKE '%$search_key%'";
    	}
    	
    	if($alpha_type > 0){
    		$condition .= " AND alpha_type = $alpha_type";
    	}
    	$data['search_type'] = $search_type;
    	$data['search_key'] = $search_key;
    	$data['alpha_type'] = $alpha_type;
    	
		$data['list'] = $this->Notice_model->getList($condition,"",$data['curPage'],$this->pageSize);
		
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
		$config['base_url'] = $_SERVER_URL . "admin/mtlist?search_type=$search_type&search_key=$search_key&alpha_type=$alpha_type&notice_type=" . $data['notice_type'];
		$config['total_rows'] = $data['count'];
		$config['per_page'] = $this->pageSize;
		$this->pagination->initialize($config);
		$data['pagination']  = $this->pagination->create_links();
		
		$this->load->view('common' );
        $this->load->view('admin/header' ); 	
        if($data['notice_type'] == 6 || $data['notice_type'] == 2){
    		$this->load->view('admin/mtlist/list', $data);
        }else{
    		$this->load->view('admin/mtlist/verify_page',$data);
        }
    	//$this->load->view('ok');
	}
	
 
	public function detail() {
		$notice_id = $this->CorrectRequest("notice_id", 0);
    	$notice_type = $this->CorrectRequest("notice_type", 0);
    	$flag = $this->CorrectRequest("flag", 0);
    	$condition = "n.idx = '$notice_id'";
		$rs = $this->Notice_model->getList($condition);
		$data['info'] = $rs[0];

		$condition2 = " AND n.notice_type = '$notice_type'";

		$condition = "n.idx > '$notice_id' ";
		$condition .=$condition2;
		$sort = "idx";
		$rs = $this->Notice_model->getList($condition,$sort,0,1);
		$data['prev_id'] = $rs[0]->idx;
		$data['prev_title'] = $rs[0]->title;
		
		$condition = "n.idx < '$notice_id'";
		$condition .=$condition2;
		$rs = $this->Notice_model->getList($condition,"",0,1);
		$data['next_id'] = $rs[0]->idx;
		$data['next_title'] = $rs[0]->title;
		

		
		$condition = "r.notice_id = '$notice_id'";
		$data['replys'] = $this->Reply_model->getList($condition);
		$data['flag'] = $flag;
		
		//print_r($data); exit;
        $this->load->view('admin/mtlist/detail', $data);
	}
	
	public function edit() {
		$notice_id = $this->CorrectRequest("notice_id", 0);
		$data['notice_type'] = $this->CorrectRequest("notice_type", 6);
    	$condition = "n.idx = '$notice_id'";
		$rs = $this->Notice_model->getList($condition,"");
		$data['info'] = $rs[0];
		
		$this->load->view('common' );
        $this->load->view('admin/header' ); 		
        $this->load->view('admin/mtlist/edit', $data);
	}
	
	public function save(){
		global $_SERVER_URL;
		global $_ALPHA_TYPE;
		 
		if(!isset($_SESSION['admin_id']))	
		{
			print('login'); exit;
		}
		$data['idx'] 			= $this->CorrectRequest("idx", "0");	
    	$data['notice_type'] 	= $this->CorrectRequest("notice_type", "6");							
		$data['title'] 			= $this->CorrectRequest("title", "");
		$data['content'] 		= $this->CorrectRequest("fckContent", "");		//content
		$data['site_name'] 		= $this->CorrectRequest("site_name", "");		
		$data['site_url'] 		= $this->CorrectRequest("site_url", "");		 		
		$data['write_id'] 		= $_SESSION['admin_id'];
		$data['is_notice'] = 0;	
		$data['alpha_type'] 	= $_ALPHA_TYPE[getUtfInitial($data['site_name'])];
		$data['file_path'] 		= $this->CorrectRequest("file_path", "");

		
		if($_FILES['fileOpen']['name'] != ""){					 
			$config['source_image'] = $_FILES['fileOpen']['tmp_name'];
			$config['maintain_ratio'] = false;
			$config['allowed_types']        = 'gif|jpg|png';
			$config['width']         = 400;
			$config['height']       = 300;
			
			$this->load->library('image_lib', $config);		
			$this->image_lib->resize();
			
			$info = explode(".", $_FILES['fileOpen']['name']);
			 
			$file_name = "notice".$_SESSION['admin_id'].strtotime(date("Y-m-d H:i:s")).".".$info[count($info)-1];
			
			$config['upload_path']          = 'uploads/notice/';			
			$config['file_name']        = $file_name;
			//$config['max_size']     = '100000';
			
			$this->load->library('upload');//, $config
			$this->upload->initialize($config);	
			$this->upload->do_upload('fileOpen');
	
			$data['file_path'] 		= $config['upload_path'].$file_name;
		}
		$this->Notice_model->add($data);
		header("Location: " . $_SERVER_URL . "admin/mtlist?notice_type=".$data['notice_type']);
	}
	
 
	
	public function ajax_del(){
	 
    	$notice_id 	= $this->CorrectRequest("notice_id", "0");							
    	 
		$this->Notice_model->del($notice_id);
		
		echo "ok";
	}
	
	public function ajax_reply_del(){
	 
    	$reply_id 	= $this->CorrectRequest("reply_id", "0");							
    	 
		$this->Notice_model->del($reply_id);
		
		echo "ok";
	}
	
}
?>