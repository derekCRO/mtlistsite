<?php
	
class Visit_history_model extends CI_Model {
	function __construct() {
    	parent::__construct();
        $this->tbl_name      = "tbl_visit_history";         
    }
   
    function getList($condition="") {
    	if($condition != "")
    		$condition = " WHERE ".$condition." ";

    	
    	$str = "select *
    			 from ".$this->tbl_name;
    	$str .= ($condition);
  		
    	$res = $this->db->query($str)->result(); 
    	return $res;
    }

	function add_recommend($notice_id, $user_id) { 
     	$sql = "insert into $this->tbl_name set 
     						notice_id = '$notice_id', 
     						user_id = '$user_id',
     						is_recommend = 1 ";
     	
     	$this->db->query($sql);
     }
     
     function update_recommend($notice_id, $user_id) { 
     	
     	$sql = "update $this->tbl_name set is_recommend = 1
     			where notice_id = '$notice_id' AND user_id = '$user_id'";
     	 
     	$this->db->query($sql);     	
     } 
}

?>