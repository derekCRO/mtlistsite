<?php
	
class Notice_model extends CI_Model {
	function __construct() {
    	parent::__construct();
        $this->tbl_name      = "tbl_notice";    
        $this->count = 0;     
    }
   
    function getInfo($notice_idx) {
		$str = "SELECT * FROM " . $this->tbl_name . " WHERE idx='$notice_idx'";
		$res = $this->db->query($str)->result(); 
		//$this->count = count($res);
		if(count($res)>0)	return $res[0];
		else				return array();
	}
    function getList($condition="", $sort="", $currentPage,$pageSize) {
    	if($condition != "")
    		$condition = " WHERE ".$condition." ";

    	if($sort == "")
    		$sort = " ORDER BY idx DESC ";//reg_date DESC,
    	else
    		$sort = " ORDER BY ".$sort." ";

    	if($pageSize > 0){
	   		if($currentPage=='' || $currentPage<0) $currentPage=0;
	        
	        $limit_start    = $currentPage * $pageSize; 
	        $limit_end      = $pageSize;
	        $limit = ' limit '.$limit_start.','.$limit_end;
    	}
    	
    	$str = "select n.idx, n.notice_type, n.is_notice, n.reg_date, n.write_id, n.title, 
    				 n.content, n.file_path, n.file_name, n.visit_qty, n.recommend_qty,  n.reply_qty, 
    				  n.alpha_type,  n.site_name, n.site_url, n.days, n.title_style, n.is_secret,
    				  n.isgoal,DATE(n.reg_date) as writedate, u.name AS write_name, u.level_type
    			 from ".$this->tbl_name." AS n
    			inner join tbl_user u ON n.write_id = u.idx "; 
    	$str .= $condition;
		
    	if($pageSize > 0){
    		$res = $this->db->query($str)->result(); 
    		$this->count = count($res);
    	}
   		$str .= $sort.$limit;
		//print($str); exit;
    	$res = $this->db->query($str)->result(); 
 
    	return $res;
    }
    
    function add($data) {   
    if($data['idx'] > 0){ 
    		$sql = "update ".$this->tbl_name." set 
    								notice_type =	'" . $data['notice_type'] . "',
    								is_notice =		'" . $data['is_notice'] . "',
    								reg_date =		NOW(),
    								write_id =		'" . $data['write_id'] . "',
    								title =			'" . $data['title'] . "',
    								content =		'" . $data['content'] . "',
    								file_path =		'" . $data['file_path'] . "',
    								file_name =		'" . $data['file_name'] . "',
    								alpha_type =	'" . $data['alpha_type'] . "',
    								site_name =		'" . $data['site_name'] . "',
    								site_url =		'" . $data['site_url'] . "',
    								title_style =   '" . $data['title_style']."',
    								isgoal =        '" . $data['isgoal']."',
    								days =          '" . $data['valid_term']."',
    								is_secret =     '" . $data['is_secret']."'
    								where idx = '". $data['idx']."'";
    	}else{
    		$sql = "insert into ".$this->tbl_name." set 
    								notice_type =	'" . $data['notice_type'] . "',
    								is_notice =		'" . $data['is_notice'] . "',
    								reg_date =		NOW(),
    								write_id =		'" . $data['write_id'] . "',
    								title =			'" . $data['title'] . "',
    								content =		'" . $data['content'] . "',
    								file_path =		'" . $data['file_path'] . "',
    								file_name =		'" . $data['file_name'] . "',
    								alpha_type =	'" . $data['alpha_type'] . "',
    								site_name =		'" . $data['site_name'] . "',
    								site_url =		'" . $data['site_url'] . "',
    								title_style =   '" . $data['title_style']."',
    								is_secret =   	'" . $data['is_secret']."',
    								isgoal =        '" . $data['isgoal']."',
    								days =          '" . $data['valid_term']."'"; 
    	}
    	 
		 
    	$this->db->query($sql);
    	//print($sql); exit;
    	if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_login_id'])){
    		return;
    	}
    	$_SESSION['user_is_attend'] = 1; 
    	$str = "select * from tbl_setting where setting_type = 1";
    	$res = $this->db->query($str)->result(); 
    	$point = $res[0]->value1;    	
    	
    	$str = "update tbl_user set points = points + $point,
    								notice_qty = notice_qty + 1
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

     function del($notice_id) {  
     	$sql = "delete from tbl_reply where notice_id = $notice_id";
     	$this->db->query($sql);
     	
     	$sql = "delete from ".$this->tbl_name.
     			" where idx = $notice_id";
     	$this->db->query($sql);
     }
     
     function updateFields($data, $condition)
	 {
	 	$sql = "update " .$this->tbl_name. " set ";
		$i=0;
		foreach( $data as $key=>$val )
		{
			if($i>0)	$sql .= ",";
			$i ++ ;
			$sql .= "$key='$val'";
		}
		$sql .= " WHERE $condition";
		//print($sql); exit;
		$this->db->query($sql);
	 }
     function update_visit_qty($notice_id, $user_id) { 
     	$sql = "select * from tbl_visit_history where notice_id = '$notice_id' AND user_id = '$user_id'"; 
     	
     	$rs = $this->db->query($sql)->result(); 
     	if($rs) return;
     	$sql = "insert into tbl_visit_history set 
     						notice_id = '$notice_id', 
     						user_id = '$user_id' ";
     	
     	$this->db->query($sql); 
     	
     	$sql = "update $this->tbl_name set visit_qty = ifnull(visit_qty,0) + 1 
     			where idx = $notice_id";
     	 
     	$this->db->query($sql);     	
     }
     
	function update_recommend_qty($notice_id) {  
     	$sql = "update $this->tbl_name set recommend_qty = ifnull(recommend_qty,0) + 1 
     			where idx = $notice_id";
     	$this->db->query($sql);     	
     }
     
	function update_reply_qty($notice_id, $is_increase=1) {  
		$qty = ($is_increase == 0 ? -1 : 1);
     	$sql = "update $this->tbl_name set reply_qty = ifnull(reply_qty,0) + $qty 
     			where idx = $notice_id";
     	
     	$this->db->query($sql);     	
     }
     
}

?>