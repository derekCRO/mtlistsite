<?php global $_SERVER_URL; ?>

<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
	<td  style="width: 100px; vertical-align:middle;"  align="left">
		<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
			style="margin-left: 20px; margin-top:10px; float: left">
		<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 190px; "> 쪽지 </div>
	</td>
	
  </tr>
	<td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	 <tr>
		<td id ="detail">
		</td></tr>
		
	  <tr>
		<td>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td height="35" align="center" class="content"  style="border:1px solid #cdcdcd"  background="<?php echo $_SERVER_URL; ?>images/board_bg.jpg">
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="7%" align="center" class="content3"><strong>번호</strong></td>
					<td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
					<td width="70%" align="left" class="content3" style="padding-left:70px;"><strong>내용</strong></td>
					<td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
					<td width="20%" align="center" class="content3"><strong>날짜</strong></td>
				 
				  </tr>
			  </table></td>
	  </tr>
		
		<?php include('ajax_list.php'); ?>
	  <tr <?php // if( ! isset($_SESSION['user_id']) ) print("style='display:none;'"); ?>  >
		<td height="50" align="right">
			
	  </tr>
			 
	  <tr>
		<td height="50" align="center"><table width="0" border="0" align="center" cellpadding="0" cellspacing="3">
		  <tr>
			<td ><select id="searchType" name="searchType" class="input" >
					<option <?php if($search_type==1) echo 'selected'; ?> value="1">제목</option>
					<option <?php if($search_type==2) echo 'selected'; ?> value="2">내용</option>
				</select></td>
			<td ><input type="text" id="searchKey" name="searchKey"  
					class="input" style="width:200px;" value="<?php echo $search_key; ?>"/></td>
			<td ><img src="<?php echo $_SERVER_URL; ?>images/btn_search.png" 
						align="absmiddle" onClick="searchContents(
							'<?php echo $_SERVER_URL;?>contents/piecepaper',
							'<?php echo $type; ?>');" 
						style="cursor:pointer;"></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<?php ?>
		<td style="text-align:center; color:#666;">
			
			<div align="center" id="pagebar" class="paginate"> 
				<?php echo $pagination; ?>
			</div></td>
	  </tr>
	</table></td>
  </tr>
  <tr>
	<td>&nbsp;</td>
  </tr>
</table>
</td>
</tr>
</table>

<script>  
	_server_url = '<?php echo $_SERVER_URL; ?>';	
	_detail_url = '<?php echo $_SERVER_URL; ?>contents/piecepaper/detail';

	$(document).ready(function(){
//		var piecepaper_count = '<?php //echo $_SESSION['user_piecepaper_count']; ?>';
//
//		if(piecepaper_count > 0){		 
//			parent.$("#login_piecepaper_count").css('display','block');
//			parent.document.getElementById("login_piecepaper_count").innerHTML = "쪽지:"+piecepaper_count;
//		}			
		
		$("#letter_id").html("0");		//parent.
	});


	  //상세내용 보기
	  function info_detail(notice_id){
		 var base_url = _detail_url;
		if(!notice_id)	return;
		$.post( base_url,
				{notice_id:notice_id}				
			, function(data) {
			
				if(data.substring(data.length-2)=='ok')
				{
					var piecepaper_count = '<?php echo $_SESSION['user_piecepaper_count']; ?>';
					piecepaper_count = piecepaper_count -1;
					
					if(piecepaper_count > 0){
						//parent.
						document.getElementById("login_piecepaper_count").innerHTML = "쪽지:"+piecepaper_count;	
					}else{	//parent.
						document.getElementById("login_piecepaper_count").innerHTML = "";
					}
					
					$("#detail").html(data.substring(0, data.length-2));
				}
				else
				{
					alert(data);
				}
		 });	
	  }
</script>