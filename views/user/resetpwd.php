<?php global $_SERVER_URL; ?>

<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td height="80" align="left"><img src="<?php echo $_SERVER_URL; ?>images/title_07.png" width="309" height="56"></td>
	  </tr>
	  <tr>
		<td>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			  <tr>
			<td bgcolor="#e0e0e0" style="border:solid 1px #ddd;">
			<table width="100%" border="0" cellspacing="1" cellpadding="0">
			  <tr>
				<td width="18%" height="70" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd; font-weight:bold;"><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle" /> 아이디</td>
				<td width="82%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px;border-bottom:solid 1px #ddd;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td>
					  <input type="text" id="txtLoginID" name="txtLoginID" 
							 class="input" style="width:200px;" />
					  <span class="content3">※ 영문자,숫자, _ 만 입력 가능.최소 3자이상 입력하세요.</span></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" 
					style="padding-left:20px; border-right:solid 1px #ddd;"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> E-mail</strong></td>
				<td width="82%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td height="25"><input type="text" id="txtEmail" name="txtEmail"  class="input" style="width:200px"/>
					  <span class="content7">E-mail주소는 비밀번호와 아이디 찾기에 사용됩니다.</span></td>
				  </tr>
				</table></td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			<td height="60" align="left" style="padding-left:170px;"
			><table width="400" border="0" cellspacing="5" cellpadding="0">
			  <tr>
				<td><table width="100" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="center"><DIV><A class="find_id" href="#">아이디찾기</A></DIV></td>
				  </tr>
				</table></td>
				<td><table width="100" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="center"><DIV><A class="find_pwd" href="#">비번찾기</A></DIV></td>
				  </tr>
				</table></td>
				<td><table width="100" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="center"><DIV><A class="cancel_btn" onClick="window.history.back(-1);">돌아가기</A></DIV></td>
				  </tr>
				</table></td>
			  </tr>
			</table>
			</td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>
	</table>
	
<script>
	
	
	$(".input").keyup( function( event) {
		if( event.keyCode==13 )
		{
			if( $(this).attr('id')=='txtLoginID' )
			{
				$("#txtEmail").focus();
			}
		}
	});
	
//	$(document).ready( function() {
//		$("#txtLoginID").focus();
//	});
//	
	$(".find_id").click( function() {
		if(	$("#txtEmail").val().indexOf('@') <=0 || 
			$("#txtEmail").val().indexOf('@')>= $("#txtEmail").val().length )
		{
			alert('정확한 이메일을 입력하세요'); return;
		}
		
		var _url = '<?php echo $_SERVER_URL; ?>contents/user/ajax_findid';

		$.post( _url,
				{	email : $("#txtEmail").val() },
			function(data) 
			{
				if(data.substring(data.length-2)=='ok')
				{
					alert('당신의 아이디는 ' + data.substring(0, data.length-2) + ' 입니다.');
				}
				else if(data.substring(data.length-2)=='no')
				{
					alert('아이디 찾기 실패입니다.');
				}				
				else
				{
					alert('아이디 찾기 오류발생입니다.' + data);
				}
		});
		
	});
	
	$(".find_pwd").click( function() {
		if(	$("#txtEmail").val().indexOf('@') <=0 || 
			$("#txtEmail").val().indexOf('@')>= $("#txtEmail").val().length )
		{
			alert('정확한 이메일을 입력하세요'); return;
		}
		if(	$("#txtLoginID").val().length<3 ) 
		{
			alert('아이디를 정확히 입력하세요'); return;
		}
		var _url = '<?php echo $_SERVER_URL; ?>contents/user/ajax_findpwd';
		//alert(_url);
		//login_id : $("#txtLoginID").val(),
		$.post( _url,
				{	login_id : $("#txtLoginID").val(),
					email : $("#txtEmail").val() },
			function(data) 
			{
				if(data.substring(data.length-2)=='ok')
				{
					alert('당신의 이메일주소로 새로운 비밀번호를 발송하였습니다. \n' + 
						  ' 메일을 수신하였다면 로그인을 진행하여주십시오.');
					window.location.reload();	//parent
				}
				else if(data.substring(data.length-2)=='no')
				{
					alert('입력한 아이디가 존재하지 않습니다.');
				}				
				else if(data.substring(data.length-6)=='failed')
				{
					alert('비밀번호 찾기 실패입니다.');
				}				
				else
				{
					alert('비번찾기 오류발생입니다.' + data);
				}

		});
	});
</script>