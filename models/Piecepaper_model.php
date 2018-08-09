<?php
	
class Piecepaper_model extends CI_Model {
	function __construct() {
    	parent::__construct();
        $this->tbl_name      = "tbl_piecepaper";    
        $this->count = 0;     
    }
   
    function getList($condition="", $sort="", $currentPage,$pageSize, $cond2) {
    	if($condition != "")
    		$condition = " WHERE ".$condition." ";
		if($cond2=="")	$cond2 = "FALSE";
    	if($sort == "")
    		$sort = " ORDER BY idx DESC ";
    	else
    		$sort = " ORDER BY ".$sort." ";

    	if($pageSize > 0){
	   		if($currentPage=='' || $currentPage<0) $currentPage=0;
	        
	        $limit_start    = $currentPage * $pageSize; 
	        $limit_end      = $pageSize;
	        $limit = ' limit '.$limit_start.','.$limit_end;
    	}
    	
    	$str = "select pp.*, u.name AS write_name, IF($cond2,1 , 0) as unread
    			 from ".$this->tbl_name." AS pp
    			inner join tbl_user u ON pp.write_id = u.idx"; 
    	$str .= $condition;
    	if($pageSize > 0){
    		$res = $this->db->query($str)->result(); 
    		$this->count = count($res);
    	}
   		$str .= $sort.$limit;
		//print($str);   exit;
	
    	$res = $this->db->query($str)->result(); 
 
    	return $res;
    }

    function getOwnList($condition, $sort="", $currentPage,$pageSize) {
    	if($condition != "")
    		$condition = " WHERE ".$condition." ";
    		
    	if($sort == "")
    		$sort = " ORDER BY pp.idx DESC ";
    	else
    		$sort = " ORDER BY ".$sort." ";

    	if($pageSize > 0){
	   		if($currentPage=='' || $currentPage<0) $currentPage=0;
	        
	        $limit_start    = $currentPage * $pageSize; 
	        $limit_end      = $pageSize;
	        $limit = ' limit '.$limit_start.','.$limit_end;
    	}
    	
    	$str = "select pp.*, pph.is_read
    			 from ".$this->tbl_name." AS pp
    				left join tbl_piecepaper_history pph ON pp.idx = pph.piecepaper_id "; 
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
	    	$sql = "delete from tbl_piecepaper_history        											 
	    			where piecepaper_id = '".$data['idx']."'";									
	    	$this->db->query($sql);	    	
    		
    		$sql = "update ".$this->tbl_name." set 
    								reg_date =		NOW(),
    								write_id =		'" . $data['write_id'] . "',
    								title =			'" . $data['title'] . "',
    								content =		'" . $data['content'] . "',    								
    								receive_ids =	'" . $data['receive_ids'] . "',
    								receive_names =		'" . $data['receive_names'] . "'
    				where idx = '". $data['idx']."'";
    		$this->db->query($sql);
    	}else{
    		$sql = "insert into ".$this->tbl_name." set 
    								reg_date =		NOW(),
    								write_id =		'" . $data['write_id'] . "',
    								title =			'" . $data['title'] . "',
    								content =		'" . $data['content'] . "',    								
    								receive_ids =	'" . $data['receive_ids'] . "',
    								receive_names =		'" . $data['receive_names'] . "'"; 
    		$this->db->query($sql);
    	 	$data['idx'] = $this->db->insert_id();
    	}
    	

    	
    	
    	
    	if($data['receive_ids'] == '0'){
    		$sql = "select * from tbl_user where user_type = 2 AND is_delete = 0";
    		$res = $this->db->query($sql)->result(); 
    		foreach ($res as $item) {
    			$sql = "insert into tbl_piecepaper_history set 
    								piecepaper_id =		'" . $data['idx'] . "',
    								receive_user_id =	'" . $item->idx . "',
    								is_read =			'0'";								
	    		$this->db->query($sql);
    		}
    	}else{
    		$receive_ids = explode(",", $data['receive_ids']);
    		$condition = "where ";
    		for ($i = 1; $i < count($receive_ids)-1; $i++) {
    			$sql = "insert into tbl_piecepaper_history set 
    								piecepaper_id =		'" . $data['idx'] . "',
    								receive_user_id =	'" . $receive_ids[$i] . "',
    								is_read =			'0'";								
	    		$this->db->query($sql);
    		}
    	}
    	
    }   

     function del($idx) { 
  /*   	$sql = "SELECT * FROM $this->tbl_name WHERE idx = '$idx'";
     	$res = $this->db->query($sql)->result(); 
     	
     	if($res[0]->receive_ids == '0'){
    		$condition = "";
    	}else{
    		$receive_ids = explode(",", $res[0]->receive_ids);
    		$condition = "where ";
    		for ($i = 1; $i < count($receive_ids)-1; $i++) {
    			$condition .= " idx = ".$receive_ids[$i]." OR ";
    	}
    		$condition = substr($condition, 0, strlen($condition)-3);
    	}
    	$sql = "update tbl_user  set      											 
    				piecepaper_ids = if(INSERT(piecepaper_ids, INSTR(piecepaper_ids, concat(',','$idx',',')), LENGTH('$idx')+1, '')=',','',
										INSERT(piecepaper_ids, INSTR(piecepaper_ids, concat(',','$idx',',')), LENGTH('$idx')+1, ''))";									
    	$sql .=	$condition; */
     	$sql = "delete from tbl_piecepaper_history        											 
	    			where piecepaper_id = '$idx'";									
	    $this->db->query($sql);	 
	    	
     	$sql = "delete from ".$this->tbl_name.
     			" where idx = $idx";
     	$this->db->query($sql);
     }
       
    function delRead($user_id, $idx) {       	  
    	
    	$condition = " where idx = '$user_id'";
    	$sql = "update tbl_user  set      											 
    				piecepaper_ids = if(INSERT(piecepaper_ids, INSTR(piecepaper_ids, concat(',','$idx',',')), LENGTH('$idx')+1, '')=',','',
										INSERT(piecepaper_ids, INSTR(piecepaper_ids, concat(',','$idx',',')), LENGTH('$idx')+1, ''))";									
    	$sql .=	$condition;
    	$this->db->query($sql);
     }
 
 	function markReadLetters($user_id, $idx)
	{
		$sql = "update tbl_piecepaper_history set  is_read=1";
		$sql .= " WHERE receive_user_id='$user_id'";
		if($idx)	$sql .= " AND piecepaper_id='$idx'";
		$this->db->query($sql);
	}
}

?>