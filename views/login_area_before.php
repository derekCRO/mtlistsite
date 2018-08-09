<?php global $_SERVER_URL; ?>
<div style="width:294px; height:20px; margin-top:10px; padding:3px;">
		<table width="300" border="0" cellspacing="0" cellpadding="0" >
			<tr>
			  <td width="108">
			  
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="9" align="center" valign="top">
					<div style="margin-top:-4px;">
					<img src="<?php echo $_SERVER_URL ?>images/icon2.gif" width="2" height="2" /></div></td>
					<td width="62" class="content3 user_regist" style="font-weight:bold;" onclick="main_ajax('<?php echo $_SERVER_URL; ?>contents/user/add')"><a href='#' style="color:black;">무료회원가입</a></td>
				  </tr>
			  </table>
			  
			  </td>
			  <td width="147" class="content3"  ><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="9" align="center" valign="top">
					<div style="margin-top:-4px;">
					<img src="<?php echo $_SERVER_URL ?>images/icon2.gif" width="2" height="2" /></div></td>
					<td width="62" class="content3 user_regist" style="font-weight:bold;" onclick="main_ajax('<?php echo $_SERVER_URL; ?>contents/user/resetpwd')"><a href='#' style="color:black;">아이디/비밀번호 찾기</a></td>
				  </tr>
			  </table>
				</td>
			</tr>
		</table>				
	</div>
<div style="width:294px; padding-top:2px; display:<?php echo $loginarea; ?> " id="loginArea">
		<table border="0">
		  <tr>
		<td style="width:221px;">
			<input id="LoginID" name="LoginID" type="text" 
				style="border:1px solid  #bcbcbc;color:black;width:100%; 
						font-size:11px; height:21px; background-color: #f3f3f3;
						width:213px;" value="" placeholder="아이디" /></td>
		<td style="width:70px" rowspan="2">
			<table style="width:70px" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td align="center"><DIV id="login_btn" style="cursor:pointer;"><A class="login_btn" >로그인</A></DIV></td>
				</tr>
			</table>
		</td>
	  </tr>
		  <tr>
			<td valign="bottom">
				<input id="LoginPwd" name="LoginPwd" type="password" 
					style="border:1px solid  #bcbcbc;  color:black;width:100%; 
							font-size:11px; height:21px; background-color:#f3f3f3;
							width:213px;" value="" placeholder="비밀번호" ></td>
		  </tr>
		  <tr>
			<td height="30" colspan="2" valign="middle"><table width="100" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td width="10"><input id="holdingLogin" name="holdingLogin" 
										type="checkbox" style="cursor:pointer;" value="1" /></td>
				  <td width="90" class="content3"><label for="holdingLogin" style="cursor:pointer;">로그인유지</label></td>
				</tr>
			</table></td>
		  </tr>
		</table>
	</div>