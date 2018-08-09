<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("include/global.php");
global $_SERVER_URL;

//--- 用户管理 Controller ---//
class Chatting extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model("Chatting_model");
        $this->load->model("Notice_model");
    }
	
    public function index() {
		//print('dddd---'); exit;
		$data = array();
		$condition= "";
		$chatid = $this->CorrectRequest("chatid", "0");
		$chatting_notice_count = $this->CorrectRequest("chatting_notice_count", "0");
		if($chatid>0)
		{
			$condition = "n.id>'$chatid'";
		}
		$sort = "n.regtime DESC, n.id DESC";
		$currentPage = 0;
		$pageSize = 20;
		$res = $this->Chatting_model->getList($condition, $sort, $currentPage, $pageSize);
		
		//print($chatid); exit;
		if( $chatid <= 0 )
		{
			if( count($res) >0 )
				$data['chatmsg'] = array_reverse($res);	//array($res[0]);
			else
				$data['chatmsg'] = array();
		}
		else
		{
			$data['chatmsg'] = array_reverse($res);
		}
		
		if($chatting_notice_count%30==0)
		{
			$diffdays = 15;
			if(isset($_SESSION['setting']))	$diffdays = $_SESSION['setting']['chatting_days'];
			$condition = "n.notice_type=5 AND DATEDIFF(now(),n.reg_date)<'$diffdays'";
			$sort = "n.reg_date DESC, idx DESC";
			//print($condition); exit;
			$chatting_notice = $this->Notice_model->getList($condition, $sort, 0, 3);
			//print_r($chatting_notice); exit;
			$chatting_notice = array_reverse($chatting_notice);
			$data['notices'] = $chatting_notice;
		}
		
		
		//print($chatid); exit;
        $this->load->view('chatting/chatlist', $data);
		$this->load->view('ok');
	}
	
	public function add()
	{
		$data = array();
		$msg = $this->CorrectRequest("msg", "");
		/*
		if(isset($_SESSION['chat_id']))
		{
			$data['write_id'] = 0;
		}
		else 
		//*/
		if( !isset($_SESSION['user_id'])) 
		{
			print('login'); exit;	//회원만 채팅가능 합니다.
			
			//-------------------->	로그인하지 않은 사용자의 채팅기능
			$data['write_id'] = 0;
			if(!isset($_SESSION['chat_id']))
			{
				$_SESSION['chat_id'] = $this->Chatting_model->getTodayChatId();
			}
			//<---------------------
		}
		else
		{
			$data['write_id'] = $_SESSION['user_id'];
			$_SESSION['chat_id'] = 0;
		}
		
		$data['msg'] = $msg;
		$data['chat_id'] = $_SESSION['chat_id'];
		$res = $this->Chatting_model->add($data);
		$this->index();
	}
}
?>