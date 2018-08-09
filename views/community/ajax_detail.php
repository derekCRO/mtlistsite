<?php global $_SERVER_URL; //print_r($info); exit;?>
<?php //foreach($info as $key => $data)
	//print_r($replys); exit;
	{ ?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td height="40" bgcolor="#eaeaea" style="border-bottom:1px solid #e2e2e2"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="62%" class="content7"><strong><?php echo $info->title;?></strong></td>
					<td width="30%" align="right" class="content3"><?php echo $info->writedate;?></td>
					<td width="8%" align="center" class="content3">
						<DIV onClick="onnotice_recommend('<?php echo $info->idx?>')">
						<a class="photo2_btn" id="recommand_btn" style="width:50px; font-size:12px; font-family:돋음,dotum;" href="#">
							추천 
						</a>
						</DIV>
					</td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td height="40" bgcolor="#FFFFFF" style="border-bottom:1px solid #e2e2e2"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="62%" class="content7"><img src="<?php echo $_SERVER_URL.'images/level_'.$info->level_type.'.gif';?>" align="absmiddle"><b style="FONT-SIZE: 12px; FONT-FAMILY: " 돋움",="" dotum;="" color:="" #666"=""> <span class="content3"><?php echo $info->write_name;?></span></b><span class="content3">&nbsp;</span></td>
					<td width="38%" align="right" class="content3">
						<?php if($info->file_path != ""){ ?>
							<a  href="#" onclick="onDownload();"
								title="첨부파일을 다운로드하려면 여기를 눌러주세요."
								style="color: red;">첨부파일</a>&nbsp;&nbsp;&nbsp;
						<?php }?>
						조회수 <strong><?php echo $info->visit_qty;?> </strong>&nbsp;&nbsp;&nbsp;
						추천수 <strong id="recommend_qty"><?php echo $info->recommend_qty;?> </strong>&nbsp;&nbsp;&nbsp;
						댓글 <strong><?php echo $info->reply_qty;?></strong></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td align="center" class="content3" 
					style="padding-top:20px; padding-bottom:20px; font-weight:bold; font-size:13px;">
					<?php  if($notice_type==11 || $notice_type==12 ||$notice_type==13 ||$notice_type==21 ) {
								echo nl2br($info->content); 
							}
							else
							{																	?>
					<table style="width:100%;"><tr> <td style="width:200px; padding-left:40px;">
							<img style="width:160px; height:120px;" src="<?php echo $_SERVER_URL . $info->file_path; ?>" />
								</td>
					<td width="*"><?php echo nl2br($info->content); ?></td></tr></table>		<?php
							}																	?>
							
				  
			  </tr>
			  <tr>
				<td height="40" style="border-bottom:1px solid #e2e2e2">
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="50%"  id="left_td_<?php echo $info->idx; ?>"
						<?php if($prev_id) { ?>
						onclick="detail(this.id, '<?php echo $prev_id; ?>','<?php echo $notice_type; ?>');" 
						<?php } ?>
						style="cursor:pointer;">
						<?php if($prev_id) { ?>
						<span class="content3">&lt;이전글&nbsp;&nbsp;&nbsp;</span>
						<!--<strong class="content7">
						<?php //echo $prev_title; ?></strong>-->
						<?php } ?>
						</td>
					<td width="50%"   id="right_td_<?php echo $info->idx; ?>"
						<?php if($next_id) { ?>
						onclick="detail(this.id, '<?php echo $next_id; ?>','<?php echo $notice_type; ?>');"
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
		  <?php }?>
		  <tr>
			<td><table style="background-image:url(<?php echo $_SERVER_URL; ?>images/bbsre.png); background-repeat:no-repeat; background-position:center;" height="120" width="100%" cellpadding="0" cellspacing="0">
				<tbody>
				  <tr>
					<td height="37" style="font-size:12px" colspan="3"></td>
				  </tr>
				  <tr>
					<td width="10">&nbsp;</td>
					<td align="center" width="687">
						<!--url(<?php echo $_SERVER_URL; ?>images/bg_comment_form.gif)-->
					<textarea id="Explain" name="Explain" style="BORDER-TOP: #b5b5b5 1px solid; HEIGHT: 58px; BORDER-RIGHT: #ddd 1px solid; WIDTH: 96%; BACKGROUND:#fff repeat-x; BORDER-BOTTOM: #ddd 1px solid; POSITION: relative; FLOAT: left; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 9px; MARGIN: 0px 5px 0px 8px; BORDER-LEFT: #b5b5b5 1px solid; PADDING-RIGHT: 9px; padding-top:5px; DISPLAY: block; LINE-HEIGHT: 17px;COLOR: #666;FONT-FAMILY: 굴림, gulim; "></textarea>
					</td>
					<td width="60" style="text-align:left">
						<img src="<?php echo $_SERVER_URL; ?>images/rebt.png" style="cursor:pointer;"
							onclick="regreply('<?php echo $info->idx; ?>','<?php echo $notice_type; ?>');" /></td>
				  </tr>
				</tbody>
			</table></td>
		  </tr>
		  <tr>
			<td height="5"></td>
		  </tr>
		  
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
		var write_id = "<?php echo $info->write_id?>";	
		var my_id = "<?php echo $_SESSION['user_id'];?>";
		//if(my_id=='') alert( "로그인해야 합니다." );
		
		if(write_id == my_id){
			alert("자기 게시글은 추천할수 없습니다.");
			return;
		}	
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

	function onDownload(){	
		 
		var notice_id = "<?php echo $info->idx; ?>";
		window.location = "<?php echo $_SERVER_URL;?>contents/common/download?notice_id="+notice_id;
	}
	
</script>		  		
