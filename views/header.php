<?php global $_SERVER_URL; ?>
<body topmargin="0" leftmargin="0" style="padding:0px; margin:0px;">
	<table cellpadding="0" cellspacing="0" border="0" align="center" 
			style="margin-top:20px;"><tr><td bgcolor="white">
	<center>
	<div align="center" style="width:1314px;height:200px; margin-top:-31px;">
		<div id='top_heading' style="width:100%; height:25px;">
			<div style="float:left;width:2%; margin-top:5px;">
				<img src="<?php echo $_SERVER_URL; ?>images/notice_icon.gif" style="width:7px; height:10px;" /></div>
			<div id="attend_check" style="float:left;98%; text-align:left;
					 font-weight:bold; color:#fefefe;margin-top:4px;">
				<?php if($_SESSION['user_is_attend'] == 1){ echo "출첵입니다 ".date('Y-m-d'); } ?></div>
			<div style="width:100%; height:1px;"></div>
			<div style="float:right; width:15%; font-weight:bold;">
							
				<div id="lblSignin" style="float:right;cursor:pointer;
				<?php if( !isset($_SESSION['user_login_id'])){ print('display:block;'); }else{print('display:none;');} ?>"><a>회원가입</a>&nbsp;</div>
				<div id="lblLogout" style="float:right;cursor:pointer; 
						<?php if( !isset($_SESSION['user_login_id'])) print('display:none;'); ?>"><a>로그아웃</a>&nbsp;</div> 
				
				<div id="piecepaper" style="float:right;;cursor:pointer;<?php if( !isset($_SESSION['user_login_id'])) print('display:none;'); ?>"><a>쪽지함</a>&nbsp;|&nbsp;</div>
				</div>
		</div>
		<div id='main_heading' style="float:left;width:100%;background:url(<?php echo $_SERVER_URL ?>images/head_bg.png); height:150px;">
			<div style="float:left;width:20%;">
				<a href='<?php echo $_SERVER_URL ?>main'><img src="<?php echo $_SERVER_URL ?>images/logo.png" style="margin-top:30px;" /></a></div>
			<div style="float:left;width:60%; text-align:center; padding-top:60px;">
				<table width="350" border="0" align="center" cellpadding="1" cellspacing="0">
                    <tr>
                      <td width="20"><img src="<?php echo $_SERVER_URL ?>images/search_icon.png" width="20" height="20"></td>
                      <td width="255">
                        <input name="txtSearchKey" type="text" class="input" id="txtSearchKey" 
							style=" width:92%; height:33px; padding:0 5px; 0 5px;"></td>
                      <td width="60"><table width="50" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="center"><DIV  onClick="MtlistSearch(document.getElementById('txtSearchKey').value);"><A class="buttonon" href="#">검색</A></DIV></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td align="center" style="font-size:14px; color:gray; font-weight:bold; padding-top:5px;">먹튀검색/상호, 주소입력</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
			</div>
			<div style="float:left;width:20%;">&nbsp;</div>
		</div>
		<div style="width:1394px; height:1px;"></div>
		<div style="float:left; width:100%; height:40px;background:url(<?php echo $_SERVER_URL ?>images/header1.jpg);"
				class="menubar" >
		  <table style="width:1050px; margin-top:10px;" border="0" align="center" cellpadding="0" cellspacing="0" >
			<tr>	
			  <td width="150" id="menu_notice" class="menuboard" style="font-weight:bold;">공지사항</td>
			  <td width="150" id="menu_score"  class="menuboard" style="font-weight:bold;">스코어</td>
			  <td width="150" id="menu_mtlist" class="menuitem" style="font-weight:bold;">먹튀리스트</td>
			  <td width="150" id="menu_mtrequest" class="menuboard" style="font-weight:bold;">먹튀검증/신고</td>
			  <td width="150" id="menu_zone"   class="menuboard" style="font-weight:bold;">픽스터ZONE</td>
			  <td width="150" id="menu_community" class="menuboard" style="font-weight:bold;">커뮤니티</td>
			  <td width="150" id="menu_customer" class="menuitem" style="font-weight:bold;">고객센터</td>
			</tr>
		  </table>
		</div>
	</div>

	<div id="menu_notice_board" style="left:210px; height:45px;" class="sub_board">
		<div class="sub_menu_board">
		<div id="menu_notice_1" class="menuitem" style="width:95px; height:25px;">공지사항</div>
		<div id="menu_notice_2" class="menuitem" style="width:95px; height:25px;" >인증공원</div>
		</div>
	</div>

	<div id="menu_score_board" style="left:320px;" class="sub_board">
		<div class="sub_menu_board">
		<div id="menu_score_1" class="menuitem" style="width:95px; height:25px;">네임드스코어</div>
		<div id="menu_score_2" class="menuitem" style="width:95px; height:25px;">사다리</div>
		<div id="menu_score_3" class="menuitem" style="width:95px; height:25px;">달팽이</div>
		<div id="menu_score_4" class="menuitem" style="width:95px; height:25px;" >로하이</div>
		</div>
	</div>

	<div id="menu_mtrequest_board" style="left:610px;  height:45px;"  class="sub_board">
		<div class="sub_menu_board">
		<div id="menu_mtcheck" class="menuitem" style="width:95px; height:25px;">먹튀검증요청</div>
		<div id="menu_mtrequest" class="menuitem" style="width:95px; height:25px;">먹튀신고</div>
		<div id="menu_mtexchange" class="menuitem" style="width:95px; height:25px;">교환</div>
		</div>
	</div>

	<div id="menu_zone_board" style="left:760px; height:70px;"  class="sub_board">
		<div class="sub_menu_board">
		<div id="menu_zone_1" class="menuitem" style="width:95px; height:25px;">레전드PICK</div>
		<div id="menu_zone_2" class="menuitem" style="width:95px; height:25px;">신출귀몰PICK</div>
		<div id="menu_zone_3" class="menuitem" style="width:95px; height:25px;">1인자 PICK </div>
		<div id="menu_zone_4" class="menuitem" style="width:95px; height:25px;">빙고 PICK </div>
		</div>
	</div>
	
	<div id="menu_community_board" style="left:920px; height:75px;"  class="sub_board">
		<div class="sub_menu_board">
		<div id="menu_freeboard" class="menuitem" style="width:95px; height:25px;">자유게시판</div>
		<div id="menu_album_1" class="menuitem" style="width:95px; height:25px;">웃긴사진첩</div>
		<div id="menu_album_2" class="menuitem" style="width:95px; height:25px;">안구정화</div>
		</div>
	</div>
	
<script>

	$(".menuboard").hover( function() {
		$(".sub_board").css('display', 'none');
		var leftPos =  GetOffsetLeft(document.getElementById($(this).attr('id') ) ) + 30;
		//alert(   leftPos );
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
	
	

	$(".menuitem").click( function() {
		$(".sub_board").css('display', 'none');
		if( $(this).attr('id')=='menu_notice' )
			_url = "<?php echo $_SERVER_URL; ?>contents/notice";	//공지사항
		else if( $(this).attr('id')=='menu_mtlist' )
			_url = "<?php echo $_SERVER_URL; ?>contents/mtlist";	//먹튀리스트
		else if( $(this).attr('id')=='menu_customer' )
			_url = "<?php echo $_SERVER_URL; ?>contents/customer";	//고객쎈터
											//			else if( $(this).attr('id')=='menu_score' )
											//				_url = "<?php echo $_SERVER_URL; ?>contents/score";
											//			else if( $(this).attr('id')=='menu_mtrequest' )
											//				_url = "<?php echo $_SERVER_URL; ?>contents/mtrequest";
											//			else if( $(this).attr('id')=='menu_zone' )
											//				_url = "<?php echo $_SERVER_URL; ?>contents/zone";
											//			else if( $(this).attr('id')=='menu_community' )
											//				_url = "<?php echo $_SERVER_URL; ?>contents/community";
		else if( $(this).attr('id')=='menu_notice_1' )
		{
			_url = "<?php echo $_SERVER_URL; ?>contents/notice?type=1";
		}
		else if( $(this).attr('id')=='menu_notice_2' )
		{
			_url = "<?php echo $_SERVER_URL; ?>contents/mtlist?type=2";
		}
		else if( $(this).attr('id')=='menu_score_1' )
		{
			_url = "<?php echo $_SERVER_URL; ?>score?type=1";
		}
		else if( $(this).attr('id')=='menu_score_2' )
		{
			_url = "<?php echo $_SERVER_URL; ?>score?type=2";
		}
		else if( $(this).attr('id')=='menu_score_3' )
		{
			_url = "<?php echo $_SERVER_URL; ?>score?type=3";
		}
		else if( $(this).attr('id')=='menu_score_4' )
		{
			_url = "<?php echo $_SERVER_URL; ?>score?type=4";
		}
		
		else if( $(this).attr('id')=='menu_mtcheck' )
			_url = "<?php echo $_SERVER_URL; ?>contents/community?type=11";			//먹튀검증요청목록
		else if( $(this).attr('id')=='menu_mtrequest' )
			_url = "<?php echo $_SERVER_URL; ?>contents/community?type=12";			//먹튀검증신고
		else if( $(this).attr('id')=='menu_zone_1' )
			_url = "<?php echo $_SERVER_URL; ?>contents/zone?type=16";				//레전드의 축구PICK
		else if( $(this).attr('id')=='menu_zone_2' )
			_url = "<?php echo $_SERVER_URL; ?>contents/zone?type=17";				//신출귀목의 야구
		else if( $(this).attr('id')=='menu_zone_3' )
			_url = "<?php echo $_SERVER_URL; ?>contents/zone?type=18";				//1인자의 실시간
		else if( $(this).attr('id')=='menu_zone_4' )
			_url = "<?php echo $_SERVER_URL; ?>contents/zone?type=19";				//빙고의 종합
			
			
		else if( $(this).attr('id')=='menu_mtexchange' )
			//_url = "<?php echo $_SERVER_URL; ?>contents/mtrequest/exchange";	
			_url = "<?php echo $_SERVER_URL; ?>contents/community?type=13";			//먹튀정보교환


		else if( $(this).attr('id')=='menu_freeboard' )
			_url = "<?php echo $_SERVER_URL; ?>contents/community?type=21";			//커뮤니티-자유게시판
		else if( $(this).attr('id')=='menu_album_1' )	
			_url = "<?php echo $_SERVER_URL; ?>contents/community?type=22";			//웃긴사진첩
		else if( $(this).attr('id')=='menu_album_2' )
			_url = "<?php echo $_SERVER_URL; ?>contents/community?type=24";			//안구정화
	
		else
			return;
	
		main_ajax(_url);
	});


	function logout()
	{
		$.post( "<?php echo $_SERVER_URL; ?>contents/user/user_logout", {},
		function(data) {
			//alert(data);
			//$("#lblLogout").css('display', 'none');
			//$("#loginArea").css('display', 'block');
			if(data.substring(data.length-2)=='ok')
				window.location.reload();
			else
				alert('로그아웃 실패 : ' + data);

		});
	}
	$("#lblLogout").click( function() {
		logout();
	});
	$("#lblSignin").click( function() {
		//$("#frame_body").attr("src", "<?php echo $_SERVER_URL; ?>contents/user/add");
		window.location = "<?php echo $_SERVER_URL; ?>contents/user/add";
	});
	
	$("#txtSearchKey").keyup(function (event){
		if(event.keyCode==13)
		{
			  MtlistSearch($(this).val());
		}
	});
	$("#txtSearchKey").focus(function (){
		  $(this).select();
	});
	$("#piecepaper").click( function() {
		//$("#frame_body").attr("src", "<?php echo $_SERVER_URL; ?>contents/piecepaper");
		window.location = "<?php echo $_SERVER_URL; ?>contents/piecepaper";
	});

</script>