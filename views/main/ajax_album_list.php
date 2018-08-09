<?php global $_SERVER_URL; ?>
<table width="100%" border="0" cellspacing="33" cellpadding="0">
  <tr>
	<?php 
		//print_r($photo_list); exit;
		$i= 0;
		foreach($photo_list as $photo) { 
		$i ++;
		?>
	<td align="center">
		<a onclick="gotoAlbum('<?php echo $photo->idx;?>');">
		<img src="<?php echo $_SERVER_URL . $photo->file_path; ?>" 
				style="width:124px;height:91px; border:solid 1px gray;cursor:pointer;" /></a>
		</td>
	<?php }
	
		for($j = $i+1; $j<=6; $j++) 
		{ ?><td align="center" style="width:124px; height:91px;">&nbsp;</td><?php } ?>
  </tr>
</table>
