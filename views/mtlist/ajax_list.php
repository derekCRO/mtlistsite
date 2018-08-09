 <?php 
 foreach($list as $key => $data)
 {
 ?>
 
<tr id="list_td_<?php echo $data->idx; ?>"
		onclick="detail(this.id,'<?php echo $data->idx; ?>', '<?php echo $type; ?>');"   >
<td>
<a href="#detail">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td height="125" class="td_info"  style="border-left:3px solid #ffffff; border-top:1px solid #bebebe">
	
	  <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="13%" valign="top"><img src="<?php echo $_SERVER_URL . ($data->file_path == '' ? '/images/logo.png' : $data->file_path); ?>" width="102" height="52"></td>
		<td width="87%" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td height="30" class="content14" style="cursor:pointer" notice_id="<?php echo $data->idx;?>">
				<strong><?php echo $data->title; ?>
					<?php if(date("Y-m-d",strtotime($data->reg_date)) > $new_start_date ){?>
						<img src="<?php echo $_SERVER_URL.'images/new.gif'; ?>">
					<?php }?>  
				</strong></td>
		  </tr>
		  <tr>
			<td height="25" style="color:#000"><?php echo mb_substr(strip_tags($data->content, "<br>"), 0, 40).
						(mb_strlen(strip_tags($data->content, "<br>")>40) ? "..." : ""); ?></td>
		  </tr>
		  <tr>
			<td height="30">
			<span class="content8">
				<img src="<?php echo $_SERVER_URL; ?>images/icon_01.jpg" width="14" height="14" align="absmiddle" />
				<?php echo $data->writedate; ?>&nbsp;
				<img src="<?php echo $_SERVER_URL; ?>images/icon_02.jpg" width="14" height="14" align="absmiddle" />
				<?php echo $alpha;?> &nbsp;
				<img src="<?php echo $_SERVER_URL; ?>images/icon_03.jpg" width="15" height="14" align="absmiddle" />
				<img src="<?php echo $_SERVER_URL.'images/level_'.$data->level_type.'.gif'; ?>" width="23" height="25" align="absmiddle" />
				<?php echo $data->write_name; ?> &nbsp;
				<img src="<?php echo $_SERVER_URL; ?>images/icon_04.jpg" width="16" height="14" align="absmiddle" />
				<?php echo $data->recommend_qty; ?> &nbsp;
				<img src="<?php echo $_SERVER_URL; ?>images/icon_05.jpg" width="17" height="14" align="absmiddle" />
				<?php echo $data->visit_qty; ?>
			</span>
			<font color="#000000"> &nbsp;사이트이름&nbsp;</font>
			<span class="content8"><?php echo $data->site_name; ?></span>
			<font color="#000000">&nbsp;사이트주소&nbsp;</font>
			<span class="content8"><?php echo $data->site_url; ?></span>
			</td>
		  </tr>
		</table></td>
	  </tr>
	</table>
	</td>
  </tr>
</table>
</a>
</td>
</tr>
<?php }?> 
<tr><td style="border-bottom:1px solid #bebebe; "></td></tr>

<script>
	$(".td_info").mouseover( function() {
		$(this).css("border","none");
		$(this).css("border","3px solid #80cbfa");
	});
	$(".td_info").mouseout( function() {
		$(this).css("border","none");
		$(this).css("border-left","3px solid #ffffff");  
		$(this).css("border-top","1px solid #bebebe");
	});
</script>