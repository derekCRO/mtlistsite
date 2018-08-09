<?php global $_SERVER_URL; ?>
<!-- 보디 구역의 시작-->
<center>
 <div style="width:1314px; height:1120px; margin:0px;background:#fff; ">
	<div style="float:left;width:320px; height:924px;background:#ddd; ">
		
		
		 
		<div style="float:left; border-bottom:1px solid #ddd; border-left:1px solid #f0f0f0; width:320px;
				height:128px; 
				padding:5px;" id="login_change_area">
			<?php 
			 if( !isset($_SESSION['user_id'])) 
			 { 
				include_once("login_area_before.php");
			 } 
			 else 
			 { 
				include_once("login_area_after.php");
			 } 
		 	?>
		</div>
		<input id="max_id" type="hidden" value="0" />		<!--프레임크기변경될때 왼쪽 패널의 높이 같이 변경-->
		<div id="chatting-board" style="float:left; width:319px; height:943px; background:#fff; border-right: solid 1px #ddd;">
			<?php include('chatting/chatting.php'); ?>
			</div>
		
	</div>
	
	<!--기본 자료구역의 시작-->
	<div id="main-board" style="float:left; width:994px; background:#fff;">
		
		<!--<iframe id="frame_body"
			style="width:994px; height:1090px; background:#fff;" frameborder="0" 
			src="<?php //echo $_SERVER_URL; ?>main/body" ></iframe>-->
		
