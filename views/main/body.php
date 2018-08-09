<?php global $_SERVER_URL; ?>
<style>
.activetab_td, .activetab_td1
{
	cursor:default;
	width:90px;
	height:30px;
	text-align:center;
	border-right:1px solid #414141;
	background-image:url(<?php echo $_SERVER_URL; ?>images/notice_on_bg.jpg);
}
.inactivetab_td, .inactivetab_td1
{
	text-align:center;
	cursor:pointer;
	border-right:1px solid #414141;
}

.listbody, .list_notice
{
	width:95%;
	line-height:26px;
	margin-left:0px;
	padding-left:15px;
}
</style>


<div style="width:100%; height:150px;border-bottom:1px solid #dcdcdc;">
	<table width="0" border="0" cellspacing="12" cellpadding="0">
	  <tr>
		<td><img src="<?php echo $_SERVER_URL; ?>images/bene_01.jpg" style="width:311px;height:122px; cursor:pointer;" border="0" 
			 onclick="location = '<?php echo $_SERVER_URL; ?>contents/mtlist';" /></td>
		<td><img src="<?php echo $_SERVER_URL; ?>images/bene_02.jpg" border="0"
				style="width:311px;height:122px; cursor:pointer;" 
				onclick="location = '<?php echo $_SERVER_URL; ?>contents/mtrequest?type=11';" ></td>
		<td align="right">
			<img src="<?php echo $_SERVER_URL; ?>images/bene_03.jpg" border="0"
				style="width:311px;height:122px; cursor:pointer;" 
				onclick="location = '<?php echo $_SERVER_URL; ?>contents/mtrequest?type=12';" >
			</td>
	  </tr>
	</table>
</div>
<div style="width:100%; height:174px;margin-top:10px;">	<!--인증공원-->
	<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td height="30"  bgcolor="#333333">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td align="left" style="padding-left:10px;">
				<div style="margin-top:2px;float:left;">
					<img src="<?php echo $_SERVER_URL; ?>images/important2.png" style="width:24px; height:24px;" /></div>
				<div style="margin-top:8px; margin-left:10px; float:left;"><strong class="content4" style="font-size:16px;">인증공원</strong></div></td>
			<td align="right"><table width="0" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			</table></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td height="174" id="div_parks_list">
			<?php 
				include('ajax_parks_list.php'); ?>
		</td>
	  </tr>
	</table>
</div>
<div style="width:100%; height:210px;border-top:1px solid #ffffff; padding-top:20px;">
	<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="50%" valign="top">  <!--공지사항-->
		<table width="99%" border="0" align="left" cellpadding="0" cellspacing="0" style="border:1px solid #7b7b7b">
			<tr>
			  <td height="30"  bgcolor="#333333" >
			  <table width="360" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td class="content4 inactivetab_td1 activetab_td1 tab_td1" tabid='1' ><strong>공지사항</strong></td>
				<td width="90" class="content4 inactivetab_td1 tab_td1" tabid='2' ><strong>먹튀검증</strong></td>
				<td width="90" class="content4 inactivetab_td1 tab_td1" tabid='3' ><strong>먹튀신고</strong></td>
				<td width="90" class="content4 inactivetab_td1 tab_td1" tabid='4' ><strong>교환</strong></td>
			  </tr>
			</table></td>
			</tr>
			<tr>
			  <td valign="top" bgcolor="#FFFFFF" style="padding-top:0px; padding-bottom:0px; height:184px;" >
					<?php include_once("tab_notice.php"); ?>
			  </td>
			</tr>
		</table></td>
		<td width="10px"></td>
		<td width="50%" align="right" valign="top">	<!--최신,인기,댓글순 게시글-->
		<table width="99%" border="0" align="right" cellpadding="0" cellspacing="0" style="border:1px solid #7b7b7b">
		  <tr>
			<td height="30"  bgcolor="#333333" >
			<table width="270" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td class="content4 inactivetab_td activetab_td tab_td" tabid='1' ><strong>최신글</strong></td>
				<td width="90" class="content4 inactivetab_td tab_td" tabid='2' ><strong>인기글</strong></td>
				<td width="90" class="content4 inactivetab_td tab_td" tabid='3' ><strong>댓글 많은순</strong></td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			
			<td valign="top" bgcolor="#FFFFFF" style="padding-top:0px; padding-bottom:10px" >
				  <?php include_once('tab_recent.php'); ?>
			  </td>
		  </tr>
		</table></td>
	  </tr>
	</table>
</div>
<div style="width:100%; height:290px;margin-top:20px;">	<!--픽스터존-->
	<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td height="30"  bgcolor="#333333"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			  <td align="left"><strong class="content4">픽스터ZONE</strong></td>
			  <td align="right">&nbsp;</td>
			</tr>
		</table></td>
	  </tr>
	  <tr>
		<td height="200">
			<table width="100%" border="0" cellspacing="10" cellpadding="0">
		  <tr>
			<td><a href="#"><img src="<?php echo $_SERVER_URL; ?>images/zone_bene_01.png" width="467" 
					height="120" border="0" onClick="location = '<?php echo $_SERVER_URL; ?>contents/zone?type=16';"></a></td>
			<td><a href="#"><img src="<?php echo $_SERVER_URL; ?>images/zone_bene_02.png" width="467" 
					height="120" border="0"  onclick="location = '<?php echo $_SERVER_URL; ?>contents/zone?type=17';"></a></td>
		  </tr>
		  <tr>
			<td><a href="#"><img src="<?php echo $_SERVER_URL; ?>images/zone_bene_03.png" width="467" 
					height="120" border="0" onClick="location = '<?php echo $_SERVER_URL; ?>contents/zone?type=18';"></a></td>
			<td><a href="#"><img src="<?php echo $_SERVER_URL; ?>images/zone_bene_04.png" width="467" 
					height="120" border="0"  onclick="location = '<?php echo $_SERVER_URL; ?>contents/zone?type=19';"></a></td>
		  </tr>
		</table></td>
	  </tr>
	</table>
</div>
<div style="width:100%; height:159px;margin-top:20px;">	<!--안구정화-->
	<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td height="30"  bgcolor="#333333"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td align="left"><strong class="content4">안구정화</strong></td>
			<td align="right"><table width="0" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_01.jpg" style="cursor:pointer;" 
						width="15" height="15" onClick="album(-1);"></td>
				<td><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" style="cursor:pointer;" 
						width="14" height="15" onClick="album(+1);"></td>
			  </tr>
			</table></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td height="114" id="div_album_list">
			<?php 
				include('ajax_album_list.php'); ?>
		</td>
	  </tr>
	</table>
</div>

<script>
	$(".inactivetab_td").click(function() {
		$(".tab_td").removeClass('activetab_td');
		$(this).addClass('activetab_td');
		
		$(".listbody").css('display', 'none');
		if($(this).attr('tabid')==1)
		{
			$(".recentlist").css('display', 'block');
		}
		else if($(this).attr('tabid')==2)
		{
			$(".hotlist").css('display', 'block');
		}
		else if($(this).attr('tabid')==3)
		{
			$(".replyhot").css('display', 'block');
		}
	});
	
	$(".inactivetab_td1").click(function() {
		$(".tab_td1").removeClass('activetab_td1');
		$(this).addClass('activetab_td1');
		
		$(".list_notice").css('display', 'none');
		if($(this).attr('tabid')==1)
		{
			$(".noticelist").css('display', 'block');
		}
		else if($(this).attr('tabid')==2)
		{
			$(".mtrequest").css('display', 'block');
		}
		else if($(this).attr('tabid')==3)
		{
			$(".mtreport").css('display', 'block');
		}
		else if($(this).attr('tabid')==4)
		{
			$(".mtexchange").css('display', 'block');
		}
	});
	
	
	_server_url = '<?php echo $_SERVER_URL; ?>';	

	function gotoPark(ParkIdx)
	{
//		alert(bMustLogin);
//		alert(bIsLogin);
		if( (bMustLogin-0)==1 && (bIsLogin-0)==0 )
		{
			alert("내용을 보시려면 먼저 로그인 해주세요.");
			return;
		}
		window.location="<?php echo $_SERVER_URL; ?>contents/notice/main_detail?type=2&notice_id=" + ParkIdx;
	}	
	function gotoAlbum(notice_id)
	{
//		alert(bMustLogin);
//		alert(bIsLogin);
		if( (bMustLogin-0)==1 && (bIsLogin-0)==0 )
		{
			alert("내용을 보시려면 먼저 로그인 해주세요.");
			return;
		}
							//curPage=12&
		window.location="<?php echo $_SERVER_URL; ?>contents/community?type=24&viewdetail=1&detailid=" + notice_id;
			
	}
</script>