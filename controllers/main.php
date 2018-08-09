<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("include/global.php");
global $_SERVER_URL;

//--- 用户管理 Controller ---//
class Main extends CI_Controller {
	public function __construct(){
        parent::__construct();
//		$this->load->model("User_model");
//		$this->load->helper('cookie');
//		$this->load->model("Notice_model"); 
//		$this->load->model("Piecepaper_model");
//		$this->load->model("Setting_model"); 
//		$this->load->model("Login_history_model");
    }

	
    public function index() {    	

		include_once("include/mainframe.php");
		
		//print_r($_SESSION['setting']);exit;
		$this->load->view('common' );
		$this->load->view('header' ); 		//헤더와 메뉴에 대한 현시
		$this->load->view('main', $data);	//채팅구역과 기본영역배치에 대한 현시

		$this->body();						//중심의 데이터구역에 대한 현시
        $this->load->view('footer' );		//푸터와 메인창 자바스크립트의 로딩
         
	}
	
	public function ajax_photo_list(){
		$data['curPage'] = $_SESSION['album_pagenum'];
		$dir = $this->CorrectRequest("dir", 0) - 0;
		$data['curPage'] += $dir;
		if($data['curPage']<0)	$data['curPage'] = 0;
		
		$condition = "notice_type IN (24) "; 
		$data['photo_list'] = $this->Notice_model->getList($condition,"",$data['curPage'],6);
		if(count($data['photo_list'])<=0)	$_SESSION['album_pagenum'] - 1;
		$this->load->view('main/ajax_album_list.php', $data);
		$this->load->view('ok');
		//print_r($data['photo_list']);
		
		
	}
	
   public function body() {
		$data = array();
		
		//최근 등록한 공지내용
		$condition = "is_notice = 1  AND notice_type = 1";
		$data['notice_list'] = $this->Notice_model->getList($condition,"", 0, 5);

//		//최근 먹튀리스트
//		$condition = "notice_type = 6";
//		$data['mt_list'] = $this->Notice_model->getList($condition,"", 0, 7);
//
		//최근 먹튀검증요청
		$condition = "notice_type = 11";
		$data['mt_request'] = $this->Notice_model->getList($condition,"", 0, 7);

		//최근 먹튀신고
		$condition = "notice_type = 12";
		$data['mt_report'] = $this->Notice_model->getList($condition,"", 0, 7);

		//최근 교환
		$condition = "notice_type = 13";
		$data['mt_exchange'] = $this->Notice_model->getList($condition,"", 0, 7);


		//최근 게시글 내용
		$condition = "notice_type <> 5 ";
		$data['last_list'] = $this->Notice_model->getList($condition,"n.reg_date DESC, n.idx DESC",0,7);

		//인기글 내용
		$sort = "n.visit_qty desc, n.idx desc";
		$data['interest_list'] = $this->Notice_model->getList($condition,$sort,0,7);

		//댓글순 내용
		$sort = "n.reply_qty desc, n.idx desc";
		$data['reply_qty_list'] = $this->Notice_model->getList($condition,$sort,0,7);
		
		//안구정화
		$_SESSION['album_pagenum'] = 0;
		$condition = "notice_type IN (24) "; //,23
		$data['photo_list'] = $this->Notice_model->getList($condition,"",0,6);
		
		//인증공원
		$condition = "notice_type IN (2) "; //,23
		$data['parks_list'] = $this->Notice_model->getList($condition,"",0,4);
		
		//print_r($data['parks_list'] ); exit;
        //$this->load->view('common' );
        //$this->load->view('header' ); 
        $this->load->view('main/body', $data);
        //$this->load->view('footer' );
	}
	
}
?>