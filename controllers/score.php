<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("include/global.php");
global $_SERVER_URL;

//--- 用户管理 Controller ---//
class score extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
    }
	
    public function index() 
	{
		include_once("include/mainframe.php");
		$this->load->view('common' );
		$this->load->view('header' ); 		//헤더와 메뉴에 대한 현시
		$this->load->view('main', $data);	//채팅구역과 기본영역배치에 대한 현시
				
		$data['score_type']= $this->CorrectRequest('type', '1');
		
		$condition = "site_type=" . $data['score_type'];
		$this->load->model("Score_model");
		$rs = $this->Score_model->getList($condition);
		if(count($rs)>0)
		{
			$data['score_url'] = $rs[0]->site_url;
		}
		else
		{
			$data['score_url'] = "www.myscore.com";
		}
		$this->load->view('score' , $data);		//푸터와 메인창 자바스크립트의 로딩
        $this->load->view('footer' );		//푸터와 메인창 자바스크립트의 로딩
	}
	
}
?>