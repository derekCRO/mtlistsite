<?php
	
class User_model extends CI_Model {
	function __construct() {
    	parent::__construct();
        $this->tbl_name      = "tbl_user";       
        $this->count = 0;     
    }
   
    function getList($condition="", $sort="", $currentPage,$pageSize) 
	{
    	if($condition != "")
    		$condition = " WHERE ".$condition." ";

    	if($sort == "")
    		$sort = " ORDER BY idx desc ";
    	else
    			$sort = " ORDER BY ".$sort." ";

	    if($pageSize > 0){
	   		if($currentPage=='' || $currentPage<0) $currentPage=0;
	        
	        $limit_start    = $currentPage * $pageSize; 
	        $limit_end      = $pageSize;
	        $limit = ' limit '.$limit_start.','.$limit_end;
    	}
    	
    	$str = "select * from ".$this->tbl_name;
    	$str .= $condition;
	    if($pageSize > 0){
    		$res = $this->db->query($str)->result(); 
    		$this->count = count($res);
    	}
    	$str .= $sort.$limit;
    	$res = $this->db->query($str)->result(); 
 
    	return $res;
    }
    
   function setUserInfo($data) {
    	if($data['idx'] > 0) {
			$sql = "update ".$this->tbl_name."  set      											 
    											user_type = '" . $data['user_type'] . "',									
    											login_id = '" . $data['login_id'] . "', ";
			if(isset($data['passwd'])) $sql .= "passwd = '" . $data['passwd'] . "', ";

    		$sql .= "							name = '" . $data['name'] . "', 
    											email = '" . $data['email'] . "',
    											level_type = '" . $data['level_type'] . "',
    											reg_date = NOW()
    								where idx = " . $data['idx'];
    		$this->db->query( $sql );
    	} else {
    		if($data['user_type'] == 1){
    			$level_type = 7;
    		}else{
    			$level_type = 1;
    		}
    		$this->db->query("insert into ".$this->tbl_name."  set  
    											user_type = '" . $data['user_type'] . "',									
    											login_id = '" . $data['login_id'] . "',     											 
    											passwd = '" . $data['passwd'] . "', 
    											name = '" . $data['name'] . "', 
    											email = '" . $data['email'] . "', 
    											level_type = '$level_type',
    											reg_date = NOW() ");
    	 
    	}
    	$res = $this->db->insert_id();
    	return $res;
    }
 
	function del($user_id)
	 {
	 	$sql = "update ".$this->tbl_name."  set      											 
    							is_delete = '1'    											 
    					where idx = '$user_id'";
    	$this->db->query($sql);

    }
    
	function updateFields($data, $condition)
	{
	 	$sql = "update tbl_user set ";
		$i=0;
		foreach( $data as $key=>$val )
		{
			if($i>0)	$sql .= ",";
			$i ++ ;
			$sql .= "$key='$val'";
		}
		$sql .= " WHERE $condition";
		$this->db->query($sql);
	}
	
	function updatePWD($data)
	 {
	 	$sql = "update ".$this->tbl_name."  set      											 
    							passwd = '" . $data['passwd'] . "'    											 
    					where idx = '" . $data['user_id']."'";
    	$this->db->query($sql);

    	//return;
    }

	function updateLevel($data)
	 {
	 	$sql = "update ".$this->tbl_name."  set      											 
    							level_type = '" . $data['level_type'] . "'    											 
    					where idx = '" . $data['user_id']."'";
    	$this->db->query($sql);

    	//return;
    }
    
    function add_loginip($data)
    {
    	$sql = "update ".$this->tbl_name."  set      											 
    							last_loginip = '" . $data['last_loginip']. "'    											 
    					where idx = '" . $data['login_id']."'";
    	//print($sql); exit;
    	$this->db->query($sql);
    }
    
    
}

?>