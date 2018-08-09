<?php global $_SERVER_URL; //print_r($info); exit;?>
<!--<body style="background:#fff;">-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          
	  <tr>
		<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td height="40" bgcolor="#eaeaea" style="border-bottom:1px solid #e2e2e2">
				<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="62%" class="content7"><strong><?php echo $info->title;?></strong></td>
					<td width="30%" align="right" class="content3"><?php echo $info->writedate;?></td>
					<td width="8%" align="center" class="content3">
						<DIV onClick="onnotice_recommend('<?php echo $info->idx?>')">
						<a class="photo2_btn" id="recommand_btn" 
							style="width:50px; font-size:12px; font-family:돋음,dotum;" href="#">
							추천 
						</a>
						</DIV>
					</td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td height="40" bgcolor="#FFFFFF" style="border-bottom:1px solid #e2e2e2">
				<table width="97%" border="0" 
					align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="62%" class="content7">
						<img src="<?php echo $_SERVER_URL.'images/level_'.$info->level_type.'.gif';?>" align="absmiddle">
							<b style="FONT-SIZE: 12px; FONT-FAMILY:돋움 dotum; color:#666;">
							<span class="content3"><?php echo $info->write_name;?></span></b></td>
					<td width="38%" align="right" class="content3">
						조회수 <strong><?php echo $info->visit_qty;?> </strong>
						추천수 <strong id="recommend_qty"><?php echo $info->recommend_qty;?> </strong>
						댓글 <strong><?php echo $info->reply_qty;?></strong></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td align="center" class="content3"  style="padding-top:20px"><table width="96%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td bgcolor="#eaeaea">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" 
						style="border-top:solid 1px #ddd;border-left:solid 1px #ddd;" >
						<tr>
						  <td width="14%" height="30" align="center" bgcolor="#f8f8f8"
						  		style="border-bottom:solid 1px #ddd;border-right:solid 1px #ddd;" class="content3">사이트이름</td>
						  <td width="86%" align="left" bgcolor="#fff" class="content3" 
						  		style="padding-left:10px;border-bottom:solid 1px #ddd;border-right:solid 1px #ddd;">
						  	<?php echo $info->site_name;?></td>
						</tr>
						<tr>
						  <td height="30" align="center" bgcolor="#f8f8f8"
						  		style="border-bottom:solid 1px #ddd;border-right:solid 1px #ddd;" class="content3">사이트주소</td>
						  <td align="left" class="content3" bgcolor="#fff"
						  	style="padding-left:10px;border-bottom:solid 1px #ddd;border-right:solid 1px #ddd;">
						  	<?php echo $info->site_url;?></td>
						</tr>
					</table></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td align="center" class="content3"  style="padding-top:20px; padding-bottom:20px">
					<table width="100%"><tr>
					<td style="width:300px; padding-left:20px;">
						<img style="width:260px;height:150px; border:solid 1px #ddd;" src="<?php echo $_SERVER_URL . ($info->file_path=='' ? 'images/logo.png' : $info->file_path); ?>" /></td>
					</td>
					<td valign="top">
						<p><?php echo $info->content;//nl2br(); ?></p>
					</td>
					</tr></table>
				  
			  </tr>
			  
			  <tr>
				<td height="40" style="border-bottom:1px solid #e2e2e2">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="50%"  id="left_td_<?php echo $info->idx; ?>"
						<?php if($prev_id) { ?>
						onclick="detail(this.id, '<?php echo $prev_id; ?>', '<?php echo $notice_type; ?>');" 
						<?php } ?>
						style="cursor:pointer;">
						<?php if($prev_id) { ?>
						<span class="content3">&lt;이전글&nbsp;&nbsp;&nbsp;</span>
						<!--<strong class="content7">
						<?php //echo $prev_title; ?></strong>-->
						<?php } ?>
						</td>
					<td width="50%"  id="right_td_<?php echo $info->idx; ?>"
						<?php if($next_id) { ?> 
							onclick="detail(this.id, '<?php echo $next_id; ?>', '<?php echo $notice_type; ?>');"
						<?php } ?>
						 style="cursor:pointer;" align="right">
						 <?php if($next_id) { ?>
						 	<span class="content3"><!--<strong class="content7">
							<?php //echo $next_title; ?></strong>-->&nbsp;&nbsp;&nbsp;다음글&gt;</span>
							<strong class="content7"></strong>
						<?php } ?>
							</td>
				  </tr>
				</table>
				</td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
		  </tr>

			<!----------------------댓글 등록 블록----------------------->
		  <tr>
			<td><table style="background-image:url(<?php echo $_SERVER_URL; ?>images/bbsre.png); background-repeat:no-repeat; background-position:center;" height="120" width="100%" cellpadding="0" cellspacing="0">
				<tbody>
				  <tr>
					<td height="37" style="font-size:12px" colspan="3"></td>
				  </tr>
				  <tr>
					<td width="10">&nbsp;</td>
					<td align="center" width="687">
						<!--BACKGROUND: #fff url(images/bg_comment_form.gif) repeat-x-->
						<textarea id="Explain" name="Explain" 
						style="BORDER-TOP: #b5b5b5 1px solid; HEIGHT: 58px; BORDER-RIGHT: #ddd 1px solid; 
								BORDER-BOTTOM: #ddd 1px solid; BORDER-LEFT: #b5b5b5 1px solid;
								PADDING:5px 0 9px 9px; MARGIN: 0px 5px 0px 8px; 
								FLOAT: left; DISPLAY: block; POSITION: relative; LINE-HEIGHT: 17px;
								COLOR: #666;WIDTH: 96%; BACKGROUND: #fff; FONT-FAMILY: 굴림, gulim; "></textarea>
					</td>
					<td width="60" style="text-align:left">
						<img src="<?php echo $_SERVER_URL; ?>images/rebt.png"  style="cursor:pointer;"
							onclick="regreply('<?php echo $info->idx; ?>','<?php echo $notice_type; ?>');" /></td>
				  </tr>
				</tbody>
			</table></td>
		  </tr>
		  <tr>
			<td height="5"></td>
		  </tr>
		  
		  
		  <!---------------------------댓글 블록------------------------>
		  <?php foreach($replys as $reply_item) { ?>
		  <tr>
			<td >
			<table style="background-image:url(<?php echo $_SERVER_URL; ?>images/relist.png); 
						  background-repeat:no-repeat; background-position:center; 
						  border-left:solid 1px #ddd; border-right:solid 1px #ddd;" 
				height="81" width="100%" cellpadding="0" cellspacing="0" >
				<tbody>
				  <tr>
					<td style="text-align:left; padding-left:50px;">
						<img src="<?php echo $_SERVER_URL.'images/level_'.$reply_item->level_type.'.gif'; ?>" align="absmiddle">
								<b style="color:#666;FONT-SIZE: 12px; FONT-FAMILY: " 돋움",="" dotum;=""">
							<?php echo $reply_item->write_name; ?></b>
						<span style="FONT-SIZE: 9px;  FONT-FAMILY: tahoma; font-weight:normal; color:#888">
								<?php echo $reply_item->reg_date; ?></span> </td>
				  </tr>
				  <tr>
					<td  style="text-align:left;padding-left:37px; 
							color:#444444;FONT-SIZE: 12px; FONT-FAMILY: 굴림, gulim;  LETTER-SPACING: -0px;">
						<?php echo $reply_item->reply; ?></td>
				  </tr>
				</tbody>
			</table></td>
		  </tr>
		  <tr>
			<td height="5"></td>
		  </tr>
		  <?php } ?>
	</table>
	</td>
	</tr>
	</table>		  		

<script>
	function onnotice_recommend(id){	 
	  var base_url =_server_url + "contents/common/ajax_recommend_qty";
	  $.post(base_url ,
				{notice_id:id},				
		 function(data) { 
			  if(data.substring(data.length-2)=="ok")
			  {
				 recom_count = data.substring(0, data.length-2)-0;
				 $('#recommend_qty').html(recom_count);
			  }
			  else if(data.substring(data.length-2)=="-1")
			  {
				alert("추천하려면 먼저 로그인 해주세요.");
			  }else{
					alert("이미 추천하였습니다.");
			  }
		 });	
		
	}
</script>