<?php
	
class Setting_model extends CI_Model {
	function __construct() {
    	parent::__construct();
        $this->tbl_name      = "tbl_setting";         
    }
   
    function getList($condition="") {
    	if($condition != "")
    		$condition = " WHERE ".$condition." ";

    	if($sort == "")
    		$sort = " ORDER BY setting_type, idx ";
    	else
    		$sort = " ORDER BY ".$sort." ";

  
    	
    	$str = "select *
    			 from ".$this->tbl_name;
    	$str .= $condition.$sort.$limit;
  
    	$res = $this->db->query($str)->result(); 
 		//print($str);
    	return $res;
    }
       
     function update($setting_type, $value1, $value2) {  
     		
     	$sql = "update $this->tbl_name set value1 = '$value1', value2 = '$value2'  
     			where setting_type = '$setting_type'";
		//print($sql); exit;
     	$this->db->query($sql);
     	
     }
     
	function add_poster_type($notice_type) {  
     		
     	$sql = "update $this->tbl_name set value1 = concat(if(value1='',',',''),value1,$notice_type,','), 
     						value2 = 0  
     			where setting_type = '21'";

     	$this->db->query($sql);
     	
     }
     
	function del_poster_type($notice_type) {  
     		
     	$sql = "update $this->tbl_name set 
     					value1 = if(INSERT(value1, INSTR(value1, concat(',','$notice_type',',')), LENGTH('$notice_type')+1, '')=',','',
										INSERT(value1, INSTR(value1, concat(',','$notice_type',',')), LENGTH('$notice_type')+1, '')), 
     					value2 = 0  
     			where setting_type = '21'";
     	$this->db->query($sql);
     	
     }
}

?>