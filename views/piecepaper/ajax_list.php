<?php 
	  $i = 0;
	  foreach($list as $key => $data){
		//print_r($data); exit;
	
?>
<tr>
  <td height="35" style="border-bottom:1px solid #bebebe" 
  		>
	<a href="#detail">
  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>		<!--onClick="info_detail(this, '<?php echo $data->idx; ?>')"-->
		<td width="7%" align="center" class="content3"><?php echo $key+1;?></td>
		<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
		<td width="70%" align="left" class="content3" style="cursor:pointer" 
				notice_id="<?php echo $data->idx;?>">
				<div style="float: left;">
				&nbsp;<strong class="content7">
					<?php echo mb_substr(strip_tags($data->content, "<br>"), 0,40).
						(mb_strlen(strip_tags($data->content, "<br>")>40) ? "..." : ""); ?></strong></div>
				<?php if($data->is_read == 0) { ?>
					<div style="float: right;">
					<img src="<?php echo $_SERVER_URL.'images/new.gif'; ?>">
					</div>
				<?php } ?>
				</td>
		<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
		<td width="20%" align="center" class="content3"><?php echo $data->reg_date; ?></td>
	
	  </tr>
  </table></a></td>
</tr>
<?php } ?>  