<?php global $_SERVER_URL; ?>
<?php  { ?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td height="40" bgcolor="#eaeaea" style="border-bottom:1px solid #e2e2e2"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="62%" class="content7"><strong><?php echo $info->title;?></strong></td>
					<td width="38%" align="right" class="content3"><?php echo $info->reg_date;?></td>
				  </tr>
				</table></td>
			  </tr>
			   
			  <tr>
				<td align="center" class="content3" 
					style="padding-top:20px; padding-bottom:20px; font-weight:bold; font-size:13px;">
					 
					<table style="width:100%;"><tr> <td style="width:200px; padding-left:40px;">
						</td>
						<td width="*"><?php echo nl2br($info->content); ?></td></tr>
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
			<td height="5"></td>
		  </tr>
		  
		  
		  
	</table>
	</td>
	</tr>
</table>		  		
