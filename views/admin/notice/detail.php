<?php global $_SERVER_URL; ?>
<input type="hidden" id="notice_id" name="notice_id" value="<?php echo $info->idx; ?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td align="center"><table width="968px" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="40" bgcolor="#eaeaea" style="border-bottom:1px solid #e2e2e2"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="62%" class="content7"><strong><?php echo $info->title;?></strong></td>
			<td width="38%" align="right" class="content3"><?php echo $info->reg_date;?></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td height="40" bgcolor="#FFFFFF" style="border-bottom:1px solid #e2e2e2"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="62%" class="content7"><img src="<?php echo $_SERVER_URL.'images/level_'.$info->level_type.'.gif'; ?>" align="absmiddle">
			<b style="FONT-SIZE: 12px; FONT-FAMILY: " 돋움",="" dotum;="" color:="" #666"=""> 
			<span class="content3"><?php echo $info->write_name;?></span></b><span class="content3">&nbsp;</span></td>
			<td width="38%" align="right" class="content3">조회수 <strong><?php echo $info->visit_qty;?> 
			</strong>&nbsp;&nbsp;&nbsp;추천수 <strong><?php echo $info->recommend_qty;?> 
			</strong>&nbsp;&nbsp;&nbsp;댓글 <strong><?php echo $info->reply_qty;?></strong></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td align="center" class="content3"  style="padding-top:20px; padding-bottom:20px">
		  <p><strong style="line-height: 25px"><?php echo str_replace("\n", "<br>", $info->content);?></strong></p>
		</td>
	  </tr>
	  <tr>
		<td height="40" style="border-bottom:1px solid #e2e2e2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="50%">
				<?php if($prev_id){?>
				<span class="content3" style="cursor: pointer;" onclick="detail(<?php echo $prev_id; ?>);">&lt;이전글&nbsp;&nbsp;&nbsp;</span>				 
				<!--<strong class="content7"><?php echo $prev_title; ?></strong>-->
				<?php }?>
			</td>
			<td width="50%" align="right">
				<?php if($next_id){?>
				<!--<strong class="content7"><?php echo $next_title; ?></strong>-->
				&nbsp;&nbsp;&nbsp;
				<span class="content3" style="cursor: pointer;" onclick="detail(<?php echo $next_id; ?>);">다음글&gt;</span>
				<strong class="content7"></strong>
				<?php }?>
			</td>
		  </tr>
		</table></td>
	  </tr>
	</table></td>
  </tr>
  <tr>
	<td>&nbsp;</td>
  </tr>
 
  <?php foreach ($replys as $reply) { ?>
      <tr>
		<td height="5"></td>
	  </tr>
	  <tr>
		<td align="center"><table style="background-image:url(<?php echo $_SERVER_URL; ?>images/relist.png); background-repeat:no-repeat; background-position:center;" height="81" width="962px" cellpadding="0" cellspacing="0">
			<tbody>
			  <tr>
				<td style="text-align:left; padding-left:50px;">
					<img src="<?php echo $_SERVER_URL.'images/level_'.$reply->level_type.'.gif'; ?>" align="absmiddle">
					<b style="FONT-SIZE: 12px;color:#000000;"  ><?php echo $reply->write_name;?></b>
					&nbsp;&nbsp;<span style="FONT-SIZE: 9px;  FONT-FAMILY: tahoma; font-weight:normal; color:#888"><?php echo $reply->reg_date;?> </span> 
				</td>
				<td align="right">
					<input type="button" value="삭제" onclick="reply_del(<?php echo $reply->idx;?>);"
						 style="margin-right: 20px">
				</td>
			  </tr>
			  <tr>
				<td c="" style="text-align:left;padding-left:37px; color:#444444;FONT-SIZE: 12px; FONT-FAMILY: 굴림, gulim;  LETTER-SPACING: -0px;"><?php echo str_replace("\n", "<br>", $reply->reply);?> </td>
			  </tr>
			</tbody>
		</table></td>
	  </tr>
  <?php }?>
 
  <tr>
	<td >&nbsp;</td>
  </tr>

</table>