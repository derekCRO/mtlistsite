<?php global $_SERVER_URL; ?>
<table width="100%" border="0" cellspacing="13" cellpadding="0">
  <tr>
	<?php 
		///print_r($park_list); //exit;
		$i= 0;
		foreach($parks_list as $park) { 
		$i ++;
		?>
	<td align="center">
		<a onclick="gotoPark('<?php echo $park->idx;?>');">
		<img src="<?php echo $_SERVER_URL . $park->file_path; ?>" 
			style="width:200px;height:125px;cursor:pointer;" />
		</a>	<br><span style="font-size:12px; font-weight:bold;  
					color:#666;"><?php echo mb_substr($park->title,0, 10) .  
								(mb_strlen($park->title)>10 ? '...' : ''); ?></span>
		
	</td>
	<?php }
	
		for($j = $i+1; $j<=4; $j++) 
		{ ?><td align="center" style="width:184px; height:115px;">&nbsp;</td><?php } ?>
  </tr>
</table>
