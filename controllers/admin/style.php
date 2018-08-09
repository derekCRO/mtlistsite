<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("include/global.php");
global $_SERVER_URL;

//--- 用户管理 Controller ---//
class style extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->pageSize = 10;
    }
	
    public function index() {
		
		$ctrl = $this->CorrectRequest("ctrl", '');
		$ctrlStyle = $this->CorrectRequest("ctrlStyle", '');
		if($ctrlStyle=='')	$ctrlStyle = $ctrl;

		if($ctrl=='')
		{
			$data['title_input']	= 'title';
			$data['title_style']	= 'title_style';
		}
		else
		{
			$data['title_input']	= $ctrl;
			$data['title_style']	= $ctrlStyle;
		}
		
    	$this->load->view('stylecolor', $data);
	}	
}	
?>