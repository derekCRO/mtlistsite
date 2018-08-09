<?php global  $_SERVER_URL; ?>
<style>
	.sub_board
	{
		top:205px;
	}
</style>

<body topmargin="0" leftmargin="0">
<!--
<table width="1314" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td> -->
	<center>
	<div align="center" style="width:1314px;height:30px;">
<!--		<div id='top_heading' style="width:100%">
			<div style="float:left;width:2%;"><img src="notice_icon.gif" style="width:7px; height:10px;" /></div>
			<div style="float:left;98%; text-align:left; font-weight:bold;">출첵입니다 2016-03-28</div>
			<div style="width:100%; height:1px;"></div>
			<div style="float:right; width:14%; font-weight:bold;">로그인 | <a href='join.html'>회원가입</a></div>
		</div> -->
		<div id='main_heading' style="float:left;width:100%;background:url(<?php echo  $_SERVER_URL; ?>images/head_bg.png); height:150px;">
			<div style="float:left;width:20%;">
				<img src="<?php echo  $_SERVER_URL; ?>images/logo.png" style="margin-top:30px;" /></div>
			<div style="float:right; width:14%; font-weight:bold;margin-top:28px;">
				<a href="<?php echo  $_SERVER_URL; ?>admin/admin" style="color: #000000;">로그아웃</a>
			</div>
			<div style="float:left;width:20%;">&nbsp;</div>
		</div>
		<div style="width:1394px; height:1px;"></div>
		<div style="float:left; width:100%; height:40px;background:url(<?php echo  $_SERVER_URL; ?>images/header1.jpg);"
				class="menubar" >
		  <table align="center" style="width:90%; margin-top:10px;" border="0"  cellpadding="0" cellspacing="0" >
			<tr>	
			  <!--<td width="80" id="menu_admin" class="menuitem" style="font-weight:bold;"><a href="<?php echo  $_SERVER_URL; ?>admin/admin/admin_list?type=1">관리자등록</a></td>-->
			  <td width="80" id="menu_user" class="menuboard" style="font-weight:bold;">회원관리</td>
			  <td width="80" id="menu_notice" class="menuboard"  style="font-weight:bold;">공지사항</td>
			  <!--<td width="90" id="menu_mtlist" class="menuitem" style="font-weight:bold;"><a href="<?php echo  $_SERVER_URL; ?>admin/mtlist?notice_type=2">인증공원</a></td>-->
			  <td width="80" id="menu_community" class="menuboard"  style="font-weight:bold;">게시판관리</td>
			  <td width="80" id="menu_zone" class="menuboard"  style="font-weight:bold;">픽스터존</td>
			  <td width="100" id="menu_mtrequest" class="menuboard"  style="font-weight:bold;">먹튀검증/신고</td>
			  <td width="80" id="menu_mtlist" class="menuitem" style="font-weight:bold;"><a href="<?php echo  $_SERVER_URL; ?>admin/mtlist?notice_type=6">먹튀리스트</a></td>
			  <td width="80" id="menu_mtlist" class="menuitem" style="font-weight:bold;"><a href="<?php echo  $_SERVER_URL; ?>admin/user_notice?notice_type=26">고객센터</a></td>
			  <td width="60" id="menu_mtlist" class="menuitem" style="font-weight:bold;"><a href="<?php echo  $_SERVER_URL; ?>admin/piecepaper">쪽지</a></td>
			  <td width="80" id="menu_score"  class="menuitem"style="font-weight:bold;"><a href="<?php echo $_SERVER_URL; ?>admin/score">스코어</a></td>
			  <td width="60" id="menu_user_mtlist" class="menuitem" style="font-weight:bold;"><a href="<?php echo $_SERVER_URL;?>admin/setting">설정</a></td>	  
			</tr>
		  </table>
		</div>
	</div>
	
<div id="menu_user_board" style="left:210px; height:45px;" class="sub_board">
	<div class="sub_menu_board">
	<div id="menu_users_list" class="menuitem" style="width:95px; height:25px;">
		<a href="<?php echo  $_SERVER_URL; ?>admin/admin/admin_list?type=1">관리자관리</a></div>
	<div id="menu_admins_list" class="menuitem" style="width:95px; height:25px;" >
		<a href="<?php echo  $_SERVER_URL; ?>admin/admin/admin_list?type=2">회원관리</a></div>
	</div>
</div>

<div id="menu_notice_board" style="left:210px; height:45px;" class="sub_board">
		<div class="sub_menu_board">
		<div id="menu_notice_1" class="menuitem" style="width:95px; height:25px;" >
			<a href="<?php echo  $_SERVER_URL; ?>admin/mtlist?notice_type=2">인증공원</a></div>
		<div id="menu_notice_2" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo  $_SERVER_URL; ?>admin/notice?notice_type=1">일반공지</a></div>
		<div id="menu_notice_3" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo  $_SERVER_URL; ?>admin/notice?notice_type=5">채팅공지</a></div>
		</div>
	</div>

<div id="menu_mtrequest_board" style="left:610px;  height:45px;"  class="sub_board">
		<div class="sub_menu_board">
		<div id="menu_mtcheck" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo $_SERVER_URL;?>admin/mtlist?notice_type=11">먹튀검증요청</a></div>
		<div id="menu_mtrequest" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo $_SERVER_URL;?>admin/mtlist?notice_type=12">먹튀신고</a></div>
		<div id="menu_mtexchange" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo $_SERVER_URL;?>admin/mtlist?notice_type=13">교환</a></div>
		</div>
	</div>		
	
	<div id="menu_zone_board" style="left:760px; height:70px;"  class="sub_board">
		<div class="sub_menu_board">
		<div id="menu_zone_1" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo  $_SERVER_URL; ?>admin/user_notice?notice_type=16">레전드PICK</a></div>
		<div id="menu_zone_2" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo  $_SERVER_URL; ?>admin/user_notice?notice_type=17">신출귀몰PICK</a></div>
		<div id="menu_zone_3" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo  $_SERVER_URL; ?>admin/user_notice?notice_type=18">1인자 PICK </a></div>
		<div id="menu_zone_4" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo  $_SERVER_URL; ?>admin/user_notice?notice_type=19">빙고 PICK </a></div>
		</div>
	</div>
	
	<div id="menu_community_board" style="left:920px; height:75px;"  class="sub_board">
		<div class="sub_menu_board">
		<div id="menu_freeboard" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo  $_SERVER_URL; ?>admin/user_notice?notice_type=21">자유게시판</a></div>
		<div id="menu_album_1" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo  $_SERVER_URL; ?>admin/user_notice?notice_type=22">웃긴사진첩</a></div>
		<div id="menu_album_2" class="menuitem" style="width:95px; height:25px;">
			<a href="<?php echo  $_SERVER_URL; ?>admin/user_notice?notice_type=24">안구정화</a></div>
		</div>
	</div>
	
	<script>
		var param = '';
		var _url = "";
		var last_sub_menu = null;
		
		function main_ajax(_url)
		{
			//$("#frame_body").attr('src', _url);
			window.location = _url;

		}  
		
		function menu_mtlist_click()
		{
			main_ajax("<?php echo $_SERVER_URL; ?>contents/mtlist");
		}
		
		function menu_mtverify_click()
		{
			main_ajax("<?php echo $_SERVER_URL; ?>contents/mtrequest");
		}
		
		function menu_mtreport_click()
		{
			main_ajax("<?php echo $_SERVER_URL; ?>contents/mtrequest/report");
		}
		
		  
	$(".menuboard").hover( function() {
			$(".sub_board").css('display', 'none');
			var leftPos =  GetOffsetLeft(document.getElementById($(this).attr('id') ) ) + 30;
			$("#"+$(this).attr('id')+"_board").css('left', leftPos + 'px');
			$("#"+$(this).attr('id')+"_board").css('display', 'block');
		}/*,
		function() {
			$(".sub_board").css('display', 'none');
		}*/);
		
		$(".sub_board").hover( function() {
			$(this).css('display', 'block');
			},
			function() {
				$(this).css('display', 'none');
			});
				
		$(".menubar").hover( function() {
				;
			},
			function() {
				$(".sub_board").css('display', 'none');
		});		
	</script>
