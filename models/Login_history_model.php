<?php
	
class Login_history_model extends CI_Model {
	function __construct() {
    	parent::__construct();
        $this->tbl_name      = "tbl_login_history";         
    }
   
    function getList($condition="", $sort="", $currentPage,$pageSize) {
    	if($condition != "")
    		$condition = " WHERE ".$condition." ";

    	if($sort == "")
    		$sort = " ORDER BY reg_date DESC ";
    	else
    		$sort = " ORDER BY ".$sort." ";
		
    	if($pageSize > 0){
	   		if($currentPage=='' || $currentPage<0) $currentPage=0;
	        
	        $limit_start    = $currentPage * $pageSize; 
	        $limit_end      = $pageSize;
	        $limit = ' limit '.$limit_start.','.$limit_end;
    	}
    	
    	$str = "select *
    			 from ".$this->tbl_name;
    	$str .= ($condition.$sort.$limit);
  		
		//print_r($str); exit;
    	$res = $this->db->query($str)->result(); 
 		//print_r($res); exit;
    	return $res;
    }
       
	function getCount($date) {
    	 
    	$str = "select ifnull(count(user_id),0) AS user_count
    			 from ".$this->tbl_name.
    			 " where date(reg_date) = '$date'";
    	$res = $this->db->query($str)->result(); 
 		//print_r($res); exit;
    	return $res[0]->user_count;
    }
    
	function getAttendQty($user_id) {
    	 
    	$str = "select ifnull(count(reg_date),0) AS qty from
	    			(select date(reg_date) AS reg_date
	    			 from ".$this->tbl_name.
	    			 " where user_id = '$user_id'
	    			 group by date(reg_date)) AS lh";
    	$res = $this->db->query($str)->result(); 
 		//print_r($res); exit;
    	return $res[0]->qty;
    }
    
    function add($user_id) {   
    	$str = "insert into ".$this->tbl_name." set 
    								user_id =		'" . $user_id . "',
    								reg_date =	NOW()"; 
    	 
    	$this->db->query($str);

    	$str = "select * from tbl_user where idx = '$user_id'";
    	$res = $this->db->query($str)->result();
    	$_SESSION['user_level_type'] = $res[0]->level_type;
    	$_SESSION['user_points'] = $res[0]->points;
    	
//    	if($res[0]->piecepaper_ids ==''){
//			$_SESSION['user_piecepaper_count'] = 0;
//		}else{
//			$piecepaper_ids = explode(",", $res[0]->piecepaper_ids);				 
//			$_SESSION['user_piecepaper_count'] = count($piecepaper_ids)-2;
//		}
				
    			
		$str = "select * from tbl_setting where setting_type = 3 ";
    	$rs = $this->db->query($str)->result();
		
		$point = $rs[0]->value1; 
    	$user_qty = $rs[0]->value2; 
		
	   	$rs = $this->getList("date(reg_date) = date(now()) AND user_id = '$user_id'");
    	if(count($rs) > 1) return;
    	
    	$login_count = $this->getCount(date("Y-m-d"));
    	if($user_qty >= $login_count){
    	//	$str = "select * from tbl_user where idx = '$user_id'";
    	//	$res = $this->db->query($str)->result();
    	//	$_SESSION['user_level_type'] = $res[0]->level_type;
    		
    		$str = "update tbl_user set points = points + $point
	    			where idx = '$user_id'";   	
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
		    	if($nextlevel_point <= $_SESSION['user_points']){
		    		$str = "update tbl_user set level_type = level_type + 1
			    			where idx = '$user_id'";   	
			    	$this->db->query($str);
			    	$_SESSION['user_level_type'] += 1;
		    	}
	    	}
    	}
    	
    }   
     
}

?>