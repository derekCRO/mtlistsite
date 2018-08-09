<?php global $_SERVER_URL; ?>
<div align="center" style="width:320px; 
			height:128px; margin-left:-15px; 
			cursor:default;" id="login_welcome">
	<div align="center" style="border-bottom: 1px solid; width:250px; margin-left:34px; height:20px;margin-top:0px">		
		<img alt="" src="<?php echo $_SERVER_URL;?>images/welcome.png" style="height:20px;">
	</div>
			<!-- <span style="font-size:13px;" > 
				<span style="font-weight:bold; color:#FF0000;">베팅온</span >
				에 오신 것을 <span style="font-weight:bold; color:#FF9900;">환영</span>
				합니다. <br></span>  -->
	<table align="center" cellspacing="1" style="margin-top:1px; " border="0">
	<tr>
		<td colspan="3">
			<div style="border: 1px solid; margin-left:10px;">
			<table width="280px" style="margin-top:0px">
				<tr>
					<td class="mem_label" style="width:110px; text-align: right">회원아이디 : </td>
					<td style="width:2px;">&nbsp;</td>
					<td class="mem_value" style="width:40px;">
						<div style="margin-top:0px; float:left; font-size:13px;"><?php echo $_SESSION['user_login_id'];?></div>
						</td>
					<td style="width:10px;"><div style="margin-top:0px; float:left;">
						<img width="20" height="20" 
						src="<?php echo $_SERVER_URL;?>/images/level_<?php echo $_SESSION['user_level_type'];?>.gif" />
						</div></td>
					<td class="mem_label" style="width:70px;">쪽지함 : </td>
					<td>&nbsp;</td>
					<td class="mem_value" style="width:60px;"><!--onclick="$('#frame_body').attr('src', '-->
						<a href = "<?php echo $_SERVER_URL; ?>contents/piecepaper" 
							style="cursor:pointer; color:red; font-weight:bold; font-size:13px;" id="letter_id"><?php echo $_SESSION['user_piecepaper_count'];?></a> 개</td>				
				</tr>
				<tr>
					<td class="mem_label" style="text-align: right">포인트 : </td>
					<td>&nbsp;</td>
					<td class="mem_value"><?php echo $_SESSION['user_points'];?>p</td>
					
					<td style="width:10px;">&nbsp;</td>
					<td class="mem_label" style="padding-top:5px;">출석수 : </td>
					<td>&nbsp;</td>
					<td class="mem_value" style="padding-top:5px;"><?php echo $attend_qty;?> 회</td>
					
					</tr>
				<tr >
					<td class="mem_label" style="text-align: right">게시글수 : </td>
					<td>&nbsp;</td>
					<td class="mem_value"><?php echo $_SESSION['user_notice_qty'];?></td>					
					<td style="width:10px;">&nbsp;</td>
					<td class="mem_label" style="padding-top:5px;">댓글수 : </td>
					<td>&nbsp;</td>
					<td class="mem_value" style="padding-top:5px;"><?php echo $_SESSION['user_reply_qty'];?></td>
					</tr>
			</table>
			</div>
		</td>
		 
	</tr>

	<tr ><td class="mem_label" style="padding-top:4px;text-align:right;" align="right" 
			onclick="window.location='<?php echo $_SERVER_URL ?>contents/user/edit'">
		<a style="color:#222; font-weight:bold; border-radius:4px; background:#666666; 
					height:25px; padding:3px 5px 3px 5px; color:#fefefe; cursor:pointer; " >회원정보수정</a></td>
		<td style="width:10px;">&nbsp;</td>
		<td class="mem_label" style="padding-top:4px; text-align:left;" align="left" 
			onclick="logout();" >
				<a style="color:#222; font-weight:bold;border-radius:4px; background:#666666; cursor:pointer; 
					width:80px; height:25px; padding:3px 5px 3px 5px; color:#fefefe; " >로그아웃</a> </td>
		
		</tr>
	</table>	
	</div>	