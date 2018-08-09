<?php
	
class Reply_model extends CI_Model {
	function __construct() {
    	parent::__construct();
        $this->tbl_name      = "tbl_reply";         
    }
   
    function getList($condition="", $sort="", $currentPage,$pageSize) {
		//print_r($condition); exit;
    	if($condition != "")
    		$condition = " WHERE ".$condition." ";

    	if($sort == "")
    		$sort = " ORDER BY r.idx DESC ";
    	else
    		$sort = " ORDER BY ".$sort." ";
		
    	if($pageSize > 0){
	   		if($currentPage=='' || $currentPage<0) $currentPage=0;
	        
	        $limit_start    = $currentPage * $pageSize; 
	        $limit_end      = $pageSize;
	        $limit = ' limit '.$limit_start.','.$limit_end;
    	}
    	
    	$str = "select r.idx, r.notice_id, r.write_id, r.reply, date(r.reg_date) AS reg_date, u.name AS write_name, u.level_type
    			 from ".$this->tbl_name." r 
    			 inner join tbl_user u ON r.write_id = u.idx ";
    	$str .= ($condition.$sort.$limit);
  		
		//print_r($str); exit;
    	$res = $this->db->query($str)->result(); 
 		//print_r($res); exit;
    	return $res;
    }
       
    function add($data) {   
    	$sql = "insert into ".$this->tbl_name." set 
    								notice_id =		'" . $data['notice_id'] . "',
    								reg_date =	NOW(),
    								write_id =		'" . $data['write_id'] . "',
    								reply =			'" . $data['reply'] . "'"; 
    	 
    	$this->db->query($sql);
    	
        if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_login_id'])){
    		return;
    	}
    	
        $str = "select * from tbl_setting where setting_type = 2";
    	$res = $this->db->query($str)->result(); 
    	$point = $res[0]->value1;    	
    	
    	$str = "update tbl_user set points = points + $point,
    								reply_qty = reply_qty + 1
    			where idx = '".$data['write_id']."'";   	
    	$this->db->query($str);
    	$_SESSION['user_points'] += $point;
    	
    	if($_SESSION['user_level_type'] < 6){
	    	if($_SESSION['user_level_type'] == 1)
	    		$setting_type = 11;
	    	elseif($_SESSION['user_level_type'] == 2)
	    		$setting_type = 12;
	    	elseif($_SESSION['user_level_type'] == 3)
	    		$setting_type = 13;
	    	elseif($_SESSION['user_level_type'] == 4)
	    		$setting_type = 14;
	    	elseif($_SESSION['user_level_type'] == 5)
	    		$setting_type = 15;
    	 
    		
	    	$str = "select * from tbl_setting where setting_type = '$setting_type'";
	    	$res = $this->db->query($str)->result(); 
	    	$nextlevel_point = $res[0]->value1;
	    	//echo "nextlevel_point:".$nextlevel_point."    user_points:".$_SESSION['user_points'];
	    	//exit;
	    	if($nextlevel_point <= $_SESSION['user_points']){
	    		$str = "update tbl_user set level_type = level_type + 1
		    			where idx = '".$data['write_id']."'";   	
		    	$this->db->query($str);
		    	$_SESSION['user_level_type'] += 1;
	    	}
    	}
    }   
    
     function del($reply_id) {  
     	$sql = "delete from tbl_reply where idx = $reply_id";
     	$this->db->query($sql);
     	
     }
}

?>