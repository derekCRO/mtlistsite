<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("include/global.php");
global $_SERVER_URL;

//--- 用户管理 Controller ---//
class admin extends CI_Controller {
	public function __construct(){
        parent::__construct();
	        

        $this->load->model("User_model"); 
		$this->pageSize = 10;
    }
	
    public function index() {
    	$this->load->view('admin/login');
	}	
	
	public function admin_list() {
		global $_SERVER_URL;
		if(!$_SESSION['admin_id']){	    	   
    		header("Location: $_SERVER_URL"."admin/admin");
    	}
    	$data['curPage'] = $this->CorrectRequest("curPage", 0);
		$type     = $this->CorrectRequest('type', '1');
		$search_key = $this->CorrectRequest("search_key", "");
		$data['sort_type']     = $this->CorrectRequest('sort_type', '0');
		$data['curPage'] = intval($data['curPage'] / $this->pageSize);
		
		$condition = "is_delete = 0 AND user_type = $type 
					AND (login_id like '%$search_key%' OR name like '%$search_key%' OR email like '%$search_key%')";
					//anonymous like '%$search_key%' OR 
		
		if($data['sort_type'] == 1)
			$sort = "login_id asc";
		elseif ($data['sort_type'] == 2)
			$sort = "login_id desc";
		elseif ($data['sort_type'] == 3)
			$sort = "level_type desc";
		elseif ($data['sort_type'] == 4)
			$sort = "level_type asc";
		elseif ($data['sort_type'] == 5)
			$sort = "notice_qty desc";
		elseif ($data['sort_type'] == 6)
			$sort = "notice_qty asc";
		elseif ($data['sort_type'] == 7)
			$sort = "reply_qty desc";
		elseif ($data['sort_type'] == 8)
			$sort = "reply_qty asc";
			
		$data['list'] = $this->User_model->getList($condition, $sort,$data['curPage'],$this->pageSize); 
		$data['search_key'] = $search_key;
		
		global $_SERVER_URL;
		$data['pageSize'] = $this->pageSize;
		$data['count'] = $this->User_model->count;
		$this->load->library('pagination');
		$config['num_links'] = 3;		//페지수자 앞뒤에 현시할 페지번호개수
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'curPage';
		$config['last_link'] = '끝 &gt;';
		$config['first_link'] = '&lt; 처음';
		$config['prev_link'] = '이전';
		$config['next_link'] = '다음';
		$config['base_url'] = $_SERVER_URL . "admin/admin/admin_list?type=$type&search_key=$search_key";
		$config['total_rows'] = $data['count'];
		$config['per_page'] = $this->pageSize;
		$this->pagination->initialize($config);
		$data['pagination']  = $this->pagination->create_links();
		
		$this->load->view('common' );
        $this->load->view('admin/header' ); 
		if($type == 1){
    		$this->load->view('admin/user/list', $data);
		}else{
			$this->load->view('admin/user/user_list', $data);
		}
	}	
	
    public function admin_login() {		
		$login_id     = $this->CorrectRequest('login_id', '');
		$passwd	     = $this->CorrectRequest('passwd', '');
 		$passwd = md5($passwd);
		 
		$condition = " login_id = '$login_id' AND passwd = '$passwd' ";
		$info = $this->User_model->getList($condition); 

		if($info){
			$info = $info[0];	
			unset($_SESSION['admin_login_id']);	
			unset($_SESSION['admin_id']);	
			unset($_SESSION['setting']);
			
			
			$_SESSION['admin_login_id'] = $info->login_id;
			$_SESSION['admin_id'] =  $info->idx;
			
			$this->load->model("Setting_model"); 
			$rs = $this->Setting_model->getList(); 

			include_once("include/read_setting.php");
			//foreach ($rs as $item) {
//		
//				if($item->setting_type == 1)			//게시글 작성시 적립 포인트
//					$_SESSION['setting']['blog_points'] = $item->value1;
//				elseif($item->setting_type == 2)			//댓글 작성시 적립 포인트
//					$_SESSION['setting']['reply_points'] = $item->value1;
//				elseif($item->setting_type == 3)			//매일 첫 접속등록 회원수, 선물포인트점수
//				{
//					$_SESSION['setting']['first_count'] = $item->value1;
//					$_SESSION['setting']['first_points'] = $item->value2;
//				}	
//				elseif($item->setting_type == 4)			//먹튀검증 요청 포인트소비
//					$_SESSION['setting']['spend_points'] = $item->value1;
//		
//				elseif($item->setting_type == 11)			//2레벨 달성 포인트 타겟
//					$_SESSION['setting']['target_points_2'] = $item->value1;
//				elseif($item->setting_type == 12)			//3레벨 달성 포인트 타겟
//					$_SESSION['setting']['target_points_3'] = $item->value1;
//				elseif($item->setting_type == 13)			//4레벨 달성 포인트 타겟
//					$_SESSION['setting']['target_points_4'] = $item->value1;
//				elseif($item->setting_type == 14)			//5레벨 달성 포인트 타겟
//					$_SESSION['setting']['target_points_5'] = $item->value1;
//		
//		
//				elseif($item->setting_type == 100)		//관리자 자동 이메일 주소
//					$_SESSION['setting']['master_email'] = $item->value1;	
//					
//					
//					
//				elseif($item->setting_type == 21)			//인증공원 현시 페이지번호들
//					$_SESSION['setting']['poster_notice_types'] = $item->value1;
//		
//		
//		
//				elseif($item->setting_type == 22)		//로그인후에만 상세페이지 현시허용
//					$_SESSION['setting']['is_login_after'] =  $item->value1;
//				elseif($item->setting_type == 23)		//새 게시글 현시 날자수
//					$_SESSION['setting']['new_days'] = $item->value1;
//				elseif($item->setting_type == 24)		//채팅공지 현시 날자수
//					$_SESSION['setting']['chatting_days'] = $item->value1;			
//					
//				elseif($item->setting_type == 25)		//1레벨 회원 채팅 스타일
//					$_SESSION['setting']['chatting_style_1'] = $item->value1;	
//				elseif($item->setting_type == 26)		//2레벨 회원 채팅 스타일
//					$_SESSION['setting']['chatting_style_2'] = $item->value1;	
//				elseif($item->setting_type == 27)		//3레벨 회원 채팅 스타일
//					$_SESSION['setting']['chatting_style_3'] = $item->value1;	
//				elseif($item->setting_type == 28)		//4레벨 회원 채팅 스타일
//					$_SESSION['setting']['chatting_style_4'] = $item->value1;	
//				elseif($item->setting_type == 29)		//5레벨 회원 채팅 스타일
//					$_SESSION['setting']['chatting_style_5'] = $item->value1;	
//				elseif($item->setting_type == 30)		//VIP 회원 채팅 스타일
//					$_SESSION['setting']['chatting_style_6'] = $item->value1;	
//				elseif($item->setting_type == 31)		//관리자 회원 채팅 스타일
//					$_SESSION['setting']['chatting_style_7'] = $item->value1;	
//				elseif($item->setting_type == 32)		//인증공원/먹튀 현시행수
//					$_SESSION['setting']['mtlist_view_rows'] = $item->value1;	
//				elseif($item->setting_type == 33)		//사진첩 현시행수
//					$_SESSION['setting']['mtverify_view_rows'] = $item->value1;
//				elseif($item->setting_type == 34)		//사진첩 현시행수
//					$_SESSION['setting']['photo_view_rows'] = $item->value1;	
//				elseif($item->setting_type == 35)		//채팅창 공지 문자열 스타일
//					$_SESSION['setting']['chatting_notice'] = $item->value1;	
//					
//			}	
			
			echo "ok";
		}else{
			echo "failed";
		} 
		 
	}	

	public function edit(){
		$data['type']  = $this->CorrectRequest('type', '1');
		$user_id  = $this->CorrectRequest('user_id', '0');
		$condition = " idx = '$user_id' ";
		$rs = $this->User_model->getList($condition); 
		$data['info'] = $rs[0];
		
		$this->load->view('common' );
        $this->load->view('admin/header' ); 
    	$this->load->view('admin/user/edit', $data);
		
	}
 
	public function add_page()
	{
		
		$this->load->view('common' );
        	$this->load->view('admin/header' ); 
	    	$this->load->view('admin/user/add_page');
	}
	
	public function exist_check(){
			
			//$user_type   = 1;
			$user_type = $this->CorrectRequest('user_type', '0');
			$idx   = $this->CorrectRequest('idx', '0');
	        $login_id   = $this->CorrectRequest('login_id', '');
	        $name = $this->CorrectRequest('name', '');

	        if($idx == '') $idx = 0;
			$condition = " is_delete = 0 AND idx <> '$idx' AND login_id = '$login_id' AND user_type = '$user_type' ";
			$rs = $this->User_model->getList($condition); 	
			
			if($rs){
				echo "-1";
				return ;
			}else{
				if($user_type == 2){
					$condition = " is_delete = 0 AND idx <> '$idx' AND name = '$name' AND user_type = '$user_type' ";
					$rs = $this->User_model->getList($condition); 
					if($rs){
						echo "-2";
						return ;
					}	
				}
				echo "ok";
			}
	}
	
	public function save(){
		$user_type = $this->CorrectRequest('user_type', '0');
		$data['user_type']   = $user_type;
		$data['idx']   = $this->CorrectRequest('idx', '0');
        $data['login_id']   = $this->CorrectRequest('login_id', '');
        $passwd		 = $this->CorrectRequest('pwd_new', '');
        $data['name']     	= $this->CorrectRequest('login_name', '');
        $data['email']      = $this->CorrectRequest('email', ''); 
        $data['level_type']      = $this->CorrectRequest('level_type', '0');  
        $data['notice_qty']  = $this->CorrectRequest('notice_qty', '0');
        $data['reply_qty']   = $this->CorrectRequest('reply_qty', '0');
        $data['points']  = $this->CorrectRequest('points', '0');
        $data['last_loginip'] = $this->CorrectRequest('last_loginip', '0');
		//print($passwd.'5555'); exit;
		if($passwd!='')        $data['passwd'] = md5($passwd);
        //$data['icon_file_path']	= "";
        
     /*   if($_FILES['fileOpen']['name'] != ""){
	        $config['source_image'] = $_FILES['fileOpen']['tmp_name'];
	        $config['allowed_types']        = 'gif|jpg|png|bmp';
			$config['maintain_ratio'] = false;
			$config['width']         = 150;
			$config['height']       = 150;
			
			$this->load->library('image_lib', $config);		
			$this->image_lib->resize();
			
			$info = explode(".", $_FILES['fileOpen']['name']);			 
			$file_name = "user".$_SESSION['admin_id'].strtotime(date("Y-m-d H:i:s")).".".$info[count($info)-1];
			
			$config['upload_path']          = 'uploads/users/';
			
			$config['file_name']        = $file_name;
			
			$this->load->library('upload'); 
			$this->upload->initialize($config);	
			$this->upload->do_upload('fileOpen');
	
			$data['icon_file_path'] 		= $config['upload_path'].$file_name;
        }*/
		
        $info  = $this->User_model->setUserInfo($data);
        
        if($user_type == 1 ){
         header("Location: " . $_SERVER_URL . "admin_list?type=1");
        }else{
         header("Location: " . $_SERVER_URL . "admin_list?type=2");	
        }
	}
	 
	public function ajax_del(){
		$user_id  = $this->CorrectRequest('user_id', '0');
		$this->User_model->del($user_id); 
		echo "ok";
	}
	
	public function ajax_passwd_change(){
		//$data['user_id']  = $_SESSION['admin_id'];
		$data['idx']   = $this->CorrectRequest('idx', '0');
		$passwd  = $this->CorrectRequest('passwd', '');
		$data['passwd'] = md5($passwd);
		
		$this->User_model->updatePWD($data); 
		echo "ok";
	}
	
	public function ajax_level_change(){
		$is_vip   = $this->CorrectRequest('is_vip', '0');
		$data['user_id']   = $this->CorrectRequest('user_id', '0');
		
		if($is_vip == 1){
			$data['level_type'] = 6;
		}else{
			$data['level_type'] = 1;
		} 
		$this->User_model->updateLevel($data);
		echo "ok";
	}

}
?>