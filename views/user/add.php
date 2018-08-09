<?php global $_SERVER_URL; ?>

<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td height="80" align="left">
			<?php if($idx) { ?>
				<img src="<?php echo $_SERVER_URL; ?>images/title-member.png" height="56">
			<?php } else { ?>
			<img src="<?php echo $_SERVER_URL; ?>images/title_07.png" height="56">
			<?php }?>
			</td>
	  </tr>
	  <tr>
		<td>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
		  <tr>
			<td bgcolor="#e0e0e0" style="border:solid 1px #ddd;">
			<table width="100%" border="0" cellspacing="1" cellpadding="0">
			  <tr>
				<td width="18%" height="70" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd; font-weight:bold;">
					<img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle" /> 아이디</td>
				<td width="82%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px;border-bottom:solid 1px #ddd;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td>
						<INPUT id="dupIDFlag" type="hidden" 
							<?php if($idx) {print("value='1'");} else {print("value='0'");} ?> />
					  <input type="text" id="txtLoginID" name="txtLoginID"  class="input" <?php if($idx){ print('readonly');}?> value="<?php echo $login_id; ?>" />
					  <?php if(!$idx) { ?>
					  <img src="<?php echo $_SERVER_URL; ?>images/join_icon.jpg" 
							width="53" height="21" align="absmiddle" style="cursor:pointer;" id="dupID" />
					<?php } ?></td>
				  </tr>
				  <tr <?php if($idx) print("style='display:none;'"); ?> >
					<td height="23" class="content3">※ 영문자,숫자, _ 만 입력 가능.최소 3자이상 입력하세요.</td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 비밀번호</strong></td>
				<td width="82%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px;border-bottom:solid 1px #ddd;"><input type="password" id="txtPassword" name="txtPassword"  class="input"  /></td>
			  </tr>
			  <tr>
				<td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px;border-bottom:solid 1px #ddd;border-right:solid 1px #ddd;"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 비밀번호 확인</strong></td>
				<td width="82%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px;border-bottom:solid 1px #ddd;">
				  <input type="password" id="txtConfirm" name="txtConfirm"  class="input"  /></td>
			  </tr>
			  <!--<tr >
				<td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="font-weight:bold;padding-left:20px;border-bottom:solid 1px #ddd;border-right:solid 1px #ddd;"><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 이름</td>
				<td width="82%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px;border-bottom:solid 1px #ddd;">
				  <input type="text" id="txtName" name="txtName"  class="input" />
				   ( 공백없이 한글만 입력 가능 )</td>
			  </tr>-->
			  <tr>
				<td width="18%" height="90" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px;border-bottom:solid 1px #ddd;border-right:solid 1px #ddd;"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 닉네임</strong></td>
				<td width="82%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px;border-bottom:solid 1px #ddd;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td height="25">
					<INPUT id="dupNickFlag" type="hidden" value="0" />
					<input type="text" id="txtNick" name="txtNick"  class="input" value="<?php echo $name; ?>" />
					  <span class="content7"><img src="<?php echo $_SERVER_URL; ?>images/join_icon.jpg" width="53" height="21" align="absmiddle" id="dupNick"> 한글 2글자, 영문 4글자 이상 입력 가능합니다.</span></td>
				  </tr>
				  <tr>
					<td height="22">공백없이 한글,영문,숫자만 입력 가능 (한글2자,영문4자 이상)</td>
				  </tr>
				  <tr>
					<td height="22">닉네임을 바꾸시면 앞으로 60일 이내에는 수정할수 없습니다.</td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" 
					style="padding-left:20px; border-right:solid 1px #ddd;"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> E-mail</strong></td>
				<td width="82%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td height="25"><input type="text" id="txtEmail" name="txtEmail"  
						class="input" style="width:200px" value="<?php echo $email; ?>" />
					  <span class="content7">E-mail주소는 비밀번호와 아이디 찾기에 사용됩니다.</span></td>
				  </tr>
				</table></td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			<td height="60" align="center"><table width="200" border="0" cellspacing="5" cellpadding="0">
			  <tr>
				<td><table width="100" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="center"><DIV><A class="join_btn" href="#"><?php if($idx) print('정보수정'); else print('회원가입'); ?></A></DIV></td>
				  </tr>
				</table></td>
				<td><table width="100" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="center"><DIV><A class="cancel_btn" onClick="window.history.back(-1);">돌아가기</A></DIV></td>
				  </tr>
				</table></td>
			  </tr>
			</table></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>
	</table>
	

<script>

	var mem_idx = '<?php echo $idx; ?>';
	$("#dupID").click( function() {
		if($("#txtLoginID").val()=='')	
		{
			alert('아이디를 입력해주십시오.');
			return;
		}
		
		$.post( '<?php echo $_SERVER_URL; ?>contents/user/dupID', 
		{	login_id: $("#txtLoginID").val(),
			idx : mem_idx }, 
		function(data) {
			if(data.substring(data.length-2)=='ok')
			{
				alert('중복되지 않는 아이디입니다.');
				$("#dupIDFlag").val('1');
			}
			else
			{
				//alert(data);
				alert('이미 사용중이므로 이용할 수 없는 아이디입니다.');
			}
		});
	});
	
	$("#dupNick").click( function() {

		if($("#txtNick").val()=='')	
		{
			alert('닉네임을 입력해주십시오.');
			return;
		}
		$.post( '<?php echo $_SERVER_URL; ?>contents/user/dupNick', 
		{	name: $("#txtNick").val(),
			idx : mem_idx }, 
		function(data) {
			if(data.substring(data.length-2)=='ok')
			{
				alert('중복되지 않는 닉네임입니다.');
				$("#dupNickFlag").val('1');
			}
			else
			{
				//alert(data);
				alert('이미 이용중이므로 사용할 수 없는 닉네임입니다.');
			}
		});
	});
	
	$(".input").keyup( function( event) {
		if( event.keyCode==13 )
		{
			if( $(this).attr('id')=='txtLoginID' )
			{
				$("#txtPassword").focus();
			}
			else if( $(this).attr('id')=='txtPassword' )
			{
				$("#txtConfirm").focus();
			}
			else if( $(this).attr('id')=='txtConfirm' )
			{
				$("#txtNick").focus();
			}
//			else if( $(this).attr('id')=='txtName' )
//			{
//				$("#txtNick").focus();
//			}
			else if( $(this).attr('id')=='txtNick' )
			{
				$("#txtEmail").focus();
			}
		}
	});
	
	$(document).ready( function() {
		$("#txtLoginID").focus();
	});
	
	$("#txtLoginID").change( function() {
		$("#dubIDFlag").val(0);
	});
	$("#txtNick").change( function() {
		$("#dubNickFlag").val(0);
	});
	
	$(".join_btn").click( function() {
		if($("#txtLoginID").val().length<3)
		{
			alert('아이디는 최소 3자이상 입력하세요.'); return;
		}
		if($("#txtPassword").val().length<1)
		{
			alert('암호를 입력하세요.'); return;
		}
		if( $("#txtPassword").val() != $("#txtConfirm").val() )
		{
			alert('확인암호가 맞지 않습니다.'); return;
		}
		if($("#txtNick").val().length<2)
		{
			alert('닉네임은 최소 2자이상 입력하세요.'); return;
		}

		if($("#txtEmail").val().indexOf('@') <=0 || $("#txtEmail").val().indexOf('@')>= $("#txtEmail").val().length )
		{
			alert('정확한 이메일을 입력하세요'); return;
		}
		
		if($("#dupIDFlag").val()==0)
		{
			alert('아이디 중복 체크해주세요'); return;
		}
		if($("#dupNickFlag").val()==0)
		{
			alert('닉네임 중복 체크해주세요'); return;
		}
		
		var _url = '<?php echo $_SERVER_URL; ?>contents/user/ajax_addok';
		//alert(_url);
		$.post( _url,
				{	login_id : $("#txtLoginID").val(),
				 	passwd : $("#txtPassword").val(),
					name : $("#txtNick").val(),
					idx : mem_idx,
					email : $("#txtEmail").val()},
			function(data) 
			{
				if(data.substring(data.length-2)=='ok')
				{
					if(mem_idx)
						alert('회원정보를 수정하였습니다.');
					else
						alert('회원가입을 축하합니다.');
						
					window.location = "<?php echo $_SERVER_URL ?>main";	//parent.
				}
				else
				{
					//alert(data);
					if(mem_idx)
						alert('회원정보 수정실패입니다.');
					else
						alert('회원가입 실패입니다.');
				}				
		});
	});
	
	$("input").focus( function() { $(this).select(); });
</script>