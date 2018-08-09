<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("include/global.php");
global $_SERVER_URL;

//--- 用户管理 Controller ---//
class setting extends CI_Controller {
	public function __construct(){
        parent::__construct();
        
	        
		global $_SERVER_URL;
		if(!$_SESSION['admin_id']){	    	   
    		header("Location: $_SERVER_URL"."admin/admin");}
        $this->load->model("Setting_model"); 
    }
	
    public function index() {
       $data['list'] = $this->Setting_model->getList($condition);
		
	   $this->load->view('common' );
       $this->load->view('admin/header' ); 
        $this->load->view('admin/setting/edit', $data);
	}
	
	public function ajax_item_save(){	
		$setting_type   = $this->CorrectRequest("setting_type", "0");
		$value1   = $this->CorrectRequest("value1", "");
		$value2   = $this->CorrectRequest("value2", "");
		
		if($setting_type == 21){
			if($value2 == 1){
				$this->Setting_model->add_poster_type($value1);
			}else{
				$this->Setting_model->del_poster_type($value1);
			}
		}else{
			$this->Setting_model->update($setting_type, $value1, $value2);
		}
	}
	
	public function ajax_save(){	 
		$value1   = $this->CorrectRequest("points1", "0");
		$this->Setting_model->update(1, $value1, 0);
		
		$value1   = $this->CorrectRequest("points2", "0");
		$this->Setting_model->update(2, $value1, 0);
		
		$value1   = $this->CorrectRequest("points3", "0");
		$value2   = $this->CorrectRequest("user_qty", "0");
		$this->Setting_model->update(3, $value1, $value2);
		
		$value1   = $this->CorrectRequest("points11", "0");
		$this->Setting_model->update(11, $value1, 0);
		
		$value1   = $this->CorrectRequest("points12", "0");
		$this->Setting_model->update(12, $value1, 0);
		
		$value1   = $this->CorrectRequest("points13", "0");
		$this->Setting_model->update(13, $value1, 0);
		
		$value1   = $this->CorrectRequest("points14", "0");
		$this->Setting_model->update(14, $value1, 0);
		
		$value1   = $this->CorrectRequest("points15", "0");
		$this->Setting_model->update(15, $value1, 0);

		echo "ok";
	}
	
	public function ajax_other_save(){	 
		$value1   = $this->CorrectRequest("poster_notice_types", "");
		$this->Setting_model->update(21, $value1, 0);
		
		$value1   = $this->CorrectRequest("is_login_after", "0");
		$this->Setting_model->update(22, $value1, 0);
		
		$value1   = $this->CorrectRequest("new_days", "0");
		$this->Setting_model->update(23, $value1, 0);
		
		$value1   = $this->CorrectRequest("chatting_days", "0");
		$this->Setting_model->update(24, $value1, 0);
		
		$value1   = $this->CorrectRequest("chatting_style", "");
		$this->Setting_model->update(25, $value1, 0);

		echo "ok";
	}

}
?>