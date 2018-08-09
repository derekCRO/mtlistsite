<?php
	
class Chatting_model extends CI_Model {
	function __construct() {
    	parent::__construct();
        $this->tbl_name      = "tbl_chatting";         
    }
   
    function getTodayChatId()
	{
		$strSQL = "SELECT (IFNULL(MAX(chat_id),0)+1) as max_chat_num FROM " . $this->tbl_name . " WHERE DATEDIFF(date(regtime),DATE(now()))=0 AND write_id=0";
		//print($strSQL); exit;
		$res = $this->db->query($strSQL)->result(); 
		return $res[0]->max_chat_num;
	}
	
    function getList($condition="", $sort="", $currentPage,$pageSize) {
		global $_SERVER_URL;
    	if($condition != "")
    		$condition = " WHERE ".$condition." ";

    	if($sort == "")
    		$sort = " ORDER BY idx DESC ";
    	else
    		$sort = " ORDER BY ".$sort." ";

		$limit = "";
    	if($pageSize > 0){
	   		if($currentPage=='' || $currentPage<0) $currentPage=0;
	        
	        $limit_start    = $currentPage * $pageSize; 
	        $limit_end      = $pageSize;
	        $limit = ' limit '.$limit_start.','.$limit_end;
    	}
    	
    	$str = "select n.*, IFNULL(u.name, CONCAT('손님-', n.chat_id) ) AS anonymous, IF(n.write_id<>0, CONCAT('$_SERVER_URL', 'images/level_', u.level_type, '.gif'), CONCAT('$_SERVER_URL', 'images/icon_03.jpg')) as uimg, u.level_type as level
    			 from ".$this->tbl_name." AS n
    			left join tbl_user u ON n.write_id = u.idx "; //icon_file_path
    	$str .= $condition.$sort.$limit;
   		//print($str); exit;
    	$res = $this->db->query($str)->result(); 
 
    	return $res;
    }
    
    function add($data) {   
    	$sql = "insert into ".$this->tbl_name." set 
    								regtime =		NOW(),
    								write_id =		'" . $data['write_id'] . "',
    								chat_id =		'" . $data['chat_id'] . "',
    								msg =			'" . $data['msg'] . "'"; 
    	
		//print($sql); exit; 
    	$this->db->query($sql);
    }   
       
       
}

?>