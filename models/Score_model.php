<?php
	
class Score_model extends CI_Model {
	function __construct() {
    	parent::__construct();
        $this->tbl_name      = "tbl_score";         
    }
   
    function getList($condition="") {
    	if($condition != "")
    		$condition = " WHERE ".$condition." ";

    	if($sort == "")
    		$sort = " ORDER BY idx ";
    	else
    		$sort = " ORDER BY ".$sort." ";

  
    	
    	$str = "select *
    			 from ".$this->tbl_name;
    	$str .= $condition.$sort.$limit;
  
    	$res = $this->db->query($str)->result(); 
 
    	return $res;
    }
       
     function update($score_id, $site_url) {  
     		
     	$sql = "update $this->tbl_name set site_url = '$site_url' 
     			where idx = $score_id";
     	$this->db->query($sql);
     	
     }
}

?>