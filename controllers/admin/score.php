<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("include/global.php");
global $_SERVER_URL;

//--- 用户管理 Controller ---//
class score extends CI_Controller {
	public function __construct(){
        parent::__construct();
        
	        
		global $_SERVER_URL;
		if(!$_SESSION['admin_id']){	    	   
    		header("Location: $_SERVER_URL"."admin/admin");}
        $this->load->model("Score_model"); 
    }
	
    public function index() {
       $data['list'] = $this->Score_model->getList($condition);
		
	   $this->load->view('common' );
       $this->load->view('admin/header' ); 
        $this->load->view('admin/score/edit', $data);
	}
	
	public function ajax_save(){	 
    	$score_id 	= $this->CorrectRequest("score_id", "0");							
		$site_url   = $this->CorrectRequest("site_url", "");
 
		$this->Score_model->update($score_id, $site_url);
		
		echo "ok";
	}

}
?>