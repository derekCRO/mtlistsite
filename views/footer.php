<?php global $_SERVER_URL; ?>
<!--메인창구역의 닫기를 위하여-->
	</div> </div> </center>
	</td></tr></table>
<!--메인창구역의 닫기를 위하여-->


<!--푸터구역의 시작-->
<!--<div align="center" style="width:1314px; height:55px; padding-top:10px;">-->
	<table border="0" align="center" cellpadding="0" cellspacing="0" style="width:1314px; height:55px;">
      <tr>
        <td width="83%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="20" style="text-align:left;font-size:13px;" >
			<a href="<?php echo $_SERVER_URL; ?>contents/notice?type=1">공지사항</a>
					&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a href="<?php echo $_SERVER_URL; ?>contents/score?type=1">스코어</a>
					&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a href="<?php echo $_SERVER_URL; ?>contents/mtlist">먹튀리스트</a>
					&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a href="<?php echo $_SERVER_URL; ?>contents/community?type=11">먹튀검증/신고</a>
					&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a href="<?php echo $_SERVER_URL; ?>contents/zone?type=16">픽스터ZONE</a>
					&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a href="<?php echo $_SERVER_URL; ?>contents/community?type=21">커뮤니티</a>
					&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
					<!--#frame_body" onclick="main_ajax('-->
			<a href="<?php echo $_SERVER_URL; ?>contents/customer">고객센터</a></td>
          </tr>
          <tr>
            <td height="20"  style="text-align:left; color:#fefefe; font-size:13px;">Copyright ? 2016 <span class="content6"><strong>Betting On</strong></span> .co All rights reserved</td>
          </tr>
        </table></td>
        <td width="17%" align="right"><img src="<?php echo $_SERVER_URL ?>images/bottom_logo.png" width="103" height="46"></td>
      </tr>
    </table>
<!--</div>-->
</body>


<script>

    var page_chatting_count = 0;
    var chatting_notice_count = 0;
	var timer = null;
	var timer_count = 0;
	function GetChatList(chatid)
	{
		//alert(chatid);
		var _url = "<?php echo $_SERVER_URL; ?>chatting";
		var _chat_count = 0;
		var _lastMax_id = 0;
		//alert(_url);
		$.post(	
			_url,
			{chatid:chatid, chatting_notice_count:chatting_notice_count},
			function(data) {
			//alert(data.substring(data.length-3));
			if(data.substring(data.length-2)=='ok')
			{
				//alert(data+"555");
				var bodymsg = data.substring(0,data.length-2);
				var lstmsg = bodymsg.split('_&_');
				bodymsg = lstmsg[0];
				if(lstmsg.length>=3)
				{
					_chat_count = lstmsg[1]-0;
					_lastMax_id = lstmsg[2]-0;
					if(_lastMax_id>0)
					{
						$("#max_id").val(_lastMax_id);	//다음 채팅자료를 접수 하기 위한 마지막 채팅리력 아이디를 저장하기
					}
				}
//				else
//				{
//					$("#max_id").val(-1);
//				}

				//alert(_chat_count);
				//if(_chat_count>0)	page_chatting_count += _chat_count;
				
				if(chatid==-1) 						//채팅자료 처음으로 받기 할 때
				{
					//$("#chat_main_body").html( bodymsg );		//페이지 시작 시에 채팅리력 보이도록 하기
					if(timer!=null) clearInterval(timer);
					timer = setInterval( RefreshChat, 2000 );
					page_chatting_count = _chat_count;
					chatting_notice_count++;					
					//채팅데이터받기할때 마다 채팅 공지카운트를 증가시키다가 일정한 간격으로 다시 공지를 받아온다.
					if(_chat_count>0)
					{
						//$("#chat_main_body").append( bodymsg );
						//$("#div_chat_notice").before( bodymsg );	//공지구역이 제일 아래에 있고 그 우에 채팅내용 현시
						$("#div_chat_bottom").before( bodymsg );
					}
				}
				else if(_chat_count>0)					//채팅자료 주기적으로 받기 할 때
				{
					
					page_chatting_count += _chat_count;
					//$("#chat_main_body").append( bodymsg );
					//$("#div_chat_notice").before( bodymsg );	//공지구역이 제일 아래에 있고 그 우에 채팅내용 현시
					$("#div_chat_bottom").before( bodymsg );
				}

				chatting_notice_count++;
				
				if(page_chatting_count>=50)		//채팅내용이 50개 이상이면 낡은 채팅내용을 제거한다.
				{	//한개 채팅내용 지우기 
					page_chatting_count--;
					//alert(page_chatting_count);
					$("#chat_main_body > span:first").remove();
				}

				if(lstmsg.length>=4)
				{
					$("#div_chat_notice").html( lstmsg[3] );
					timer_count = 0;
				}
				
				document.getElementById('chat_main_body').scrollTop = 
					document.getElementById('chat_main_body').scrollHeight;

			}
			else
			{
				alert("채팅 오류 발생 : " + data);
			}
		});	
	}
	
	function init_chatting_body()
	{
		GetChatList(-1);
	}
	
	
	function RefreshChat()
	{
		timer_count ++;
		var max_id = $("#max_id").val()-0;
		GetChatList(max_id);
		
//		if(timer_count%15==0)			//채팅공지사항을 일정한 간격으로 하나씩 제거한다.
//		{
//			//alert($("#div_chat_notice > span:first").html());
//			$("#div_chat_notice > span:first").remove();
//		}
		
	}
	
	
	var ajax_waiting = false;
	$("#chatting_input").keyup(function(event) {
		if(event.keyCode==13)
		{
			if(timer!=null) clearInterval(timer);
			timer = setInterval( RefreshChat, 2000 );
			
			var chatid = $("#max_id").val();
			var msg = $(this).val();
			var _url = "<?php echo $_SERVER_URL; ?>chatting/add";
			
			if(msg.length==0)
			{
				//alert('메시지를 입력하고 엔터키를 눌러주세요.');
				return;
			}
			
			if(ajax_waiting)	return;
			ajax_waiting = true;
			$.post(	
				_url,
				{msg:msg, chatid:chatid},
			function(data) 
			{
				var _chat_count = 0;
				ajax_waiting = false;
				//alert(data);
				if(data.substring(data.length-2)=='ok')
				{
					var bodymsg = data.substring(0,data.length-2);
					var lstmsg = bodymsg.split('_&_');
					bodymsg = lstmsg[0];
					if(lstmsg.length>=3)
					{
						if(lstmsg[1]-0>0) _chat_count = lstmsg[1]-0;
						if(lstmsg[2]-0>0)
						{
							//alert(lstmsg[1]);
							$("#max_id").val(lstmsg[2]-0);
						}
					}
					
					if(_chat_count>0)	page_chatting_count += _chat_count;
					//$("#chat_main_body").append( bodymsg );
					//$("#div_chat_notice").before( bodymsg );	//공지구역이 제일 아래에 있고 그 우에 채팅내용 현시
					$("#div_chat_bottom").before( bodymsg );
					$("#chatting_input").val("");
					
					
					if(lstmsg.length>=4)
					{	//채팅내용을 입력한 직후 공지내용을 치환한다.
						$("#div_chat_notice").html( lstmsg[3] );
						timer_count = 0;
					}
					
					//alert($("#chatitem"+lstmsg[1]).css('top'));
					$("#chatitem"+lstmsg[1]).focus();
					
					document.getElementById('chat_main_body').scrollTop = 
							document.getElementById('chat_main_body').scrollHeight;
				}
				else if(data.substring(data.length-3)=='msg')
				{
					alert(data.substring(0, data.length-3));
				}
				else if(data.substring(data.length-5)=='login')
				{
					var bodymsg = "<div style='background:#0066FF; color:white; text-align:center; width:100%; height:18px;font-weight:bold;'>회원만 가능합니다.</div>";
					//$("#div_chat_notice").html( bodymsg );
					$("#div_alert").html( bodymsg );
					setTimeout(function() {
							$("#div_alert").html('');
						}, 2000);
					//alert("회원만 채팅가능합니다.");
				}
				else
				{
					alert("채팅 메시지 등록 오류 : " + data);
				}
			});
		}
	});

	
	$("#login_btn").click( function() {
	
	  var holdLogin = ( $("#holdingLogin").attr('checked')=='checked' ) ? 1 : 0;
	  $.post("<?php echo $_SERVER_URL; ?>contents/user/user_login",
		{login_id:$("#LoginID").val(),passwd:$("#LoginPwd").val(), holdLogin:holdLogin }
		   , function(data) {
			 if(data.substring(data.length-2)=='ok')
			 {
				 $("#lblLogout").css('display', 'block');
				 $("#piecepaper").css('display', 'block');
				 
				 $("#lblSignin").css('display', 'none');
				 $("#login_change_area").html( data.substring(0, data.length-2) );
				 //document.getElementById("frame_body").src = " " + document.getElementById("frame_body").src;
				 bIsLogin = 1;
				 //alert(bIsLogin);
			 }
			 else if(data.substring(data.length-6)=='failed')
			 {
				$("#login_change_area").css('height', '130px');
				alert('아이디 또는 암호가 맞지 않습니다.');
				bIsLogin = 0;
			 }
			 else
			 {
				$("#login_change_area").css('height', '130px');
				alert(data);
				bIsLogin = 0;
			 }
		});
	});	

	$("#LoginID").keyup( function(event){
		if(event.keyCode==13)
		{
			$("#LoginPwd").focus();
		}
	});
	$("#LoginPwd").keyup( function(event){
		if(event.keyCode==13)
		{
			$("#login_btn").click();
		}
	});

	function go_piece(){
		main_ajax("<?php echo $_SERVER_URL;?>contents/piecepaper");
	 
	}
	
	var _server_url = '<?php echo $_SERVER_URL; ?>';
	$(".mem_label > a").hover( 
			function() {$(this).css('color', '#fefe00');},
			function() {$(this).css('color', '#fefefe');}
		)
	$(".user_regist > a").hover( 
		function() {$(this).css('color', '#fefefe');},
		function() {$(this).css('color', '#222');}
	)
	

	$(document).ready( function() {
		init_chatting_body();
		if($("#loginArea").css('display')!='none')
		{
			$("#LoginID").focus();
		}
		
	});
	
	var bMustLogin = '<?php  echo isset($_SESSION['setting']) ? $_SESSION['setting']['is_login_after'] : 0 ; ?>';
	var bIsLogin = '<?php echo isset($_SESSION['user_id']) ? 1 : 0; ?>';
	//alert(bMustLogin);
</script>

</html>
