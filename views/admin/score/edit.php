<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#F8F8F8;">
          <tr>
            <td style="width: 100px; vertical-align:middle;" class="content3">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 250px; font-size:20px;">
            	  <strong>스코어</strong></div>
            </td>
          </tr>  
          
           <tr>
            <td>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="subbg">
	              <tr>
	                <td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
		                    <tr>
		                      <td height="35" align="center" class="content"  style="border:1px solid #cdcdcd"  >
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <?php foreach ($list as $keys => $item) {?>
			                          <tr height="45">
			                            <?php if($item->site_type == 1){?> 
			                             <td width="*">&nbsp;</td>
			                             <td align="right" class="content3" width="150px;"><strong>네임드스코어</strong></td>
			                             <td style="padding-left: 25px;" width="720px;"><input style="width:350px;" id = "name_score" name="<?php echo $item->idx;?>" type="text"  value="<?php echo $item->site_url;?>"></td> 
			                             <td width="*">&nbsp;</td>
			                            <?php }
			                                  if($item->site_type == 2){?>
			                             <td width="*">&nbsp;</td>     
			                             <td align="right" class="content3" width="150px;"><strong>사다리</strong></td>
			                             <td style="padding-left: 25px;" width="720px;"><input style="width:350px;" id = "ladder_score" name="<?php echo $item->idx;?>" type="text" class="span6" value="<?php echo $item->site_url;?>"></td>
			                             <td width="*">&nbsp;</td>
			                             <?php }
			                                   if($item->site_type == 3){?>
			                             <td width="*">&nbsp;</td>      
			                             <td align="right" class="content3" width="150px;"><strong>달팽이</strong></td>
			                             <td style="padding-left: 25px;" width="720px;"><input style="width:350px;" id = "snail_score" name="<?php echo $item->idx;?>" type="text" class="span6" value="<?php echo $item->site_url;?>"></td>      
			                             <td width="*">&nbsp;</td>
			                             <?php } 
			                                   if($item->site_type == 4){?>
			                             <td width="*">&nbsp;</td>      
			                             <td align="right" class="content3" width="150px;"><strong>로하이</strong></td>
			                             <td style="padding-left: 25px;" width="720px;"><input style="width:350px;" id = "tiny_score" name="<?php echo $item->idx;?>" type="text" class="span6" value="<?php echo $item->site_url;?>"></td>
			                             <td width="*">&nbsp;</td>
			                             <?php }?>      
			                             
			                          </tr>
			                      <?php }?>    
			                          <tr>
			                             <td width="*">&nbsp;</td>
			                             <td align="right" class="content3" width="150px;"> </td>
	                                     <td style="padding-right: 90px;" align="center"><div id = "save_btn" style="width:100px;"><a class="join_btn" href="#">등록하기</a></div></td>
	                                     <td width="*">&nbsp;</td>
	                                  </tr>
			                      </table>
			                  </td>
		                    </tr>
		               </table>
	                 </td>
	               </tr>
	               <tr>
	                 <td>&nbsp;</td>
	               </tr>
               </table>
		    </td>
		  </tr>
</table>

<script> 

	$('#save_btn').click(function() {
		//alert("pppp");
			$.post("<?php echo $_SERVER_URL; ?>admin/score/ajax_save", {
				                                                score_id: $('#name_score').attr('name'),
																site_url: $('#name_score').val()}, 
				function(data) {	
					if(data.substring(data.length-2) == 'ok')
				    {    
						 $.post("<?php echo $_SERVER_URL; ?>admin/score/ajax_save", 
							       { 
							           score_id: $('#ladder_score').attr('name'),
				                       site_url : $('#ladder_score').val()},
										 function(data) {																
										if(data.substring(data.length-2) == 'ok')
									    {   
											 $.post("<?php echo $_SERVER_URL; ?>admin/score/ajax_save", 
												       { 
												           score_id: $('#snail_score').attr('name'),
											               site_url : $('#snail_score').val()},
															 function(data) {																
															if(data.substring(data.length-2) == 'ok')
														    {  
																 $.post("<?php echo $_SERVER_URL; ?>admin/score/ajax_save", 
																	       { 
																	           score_id: $('#tiny_score').attr('name'),  
																               site_url : $('#tiny_score').val()},
																				 function(data) {																
																				if(data.substring(data.length-2) == 'ok')
																			    {
																					alert("등록되었습니다.");
																			    }  						 
																				});
														    }  						 
															});
									    }  						 
										});
				    }  															
		           	 
			});	
			
			
	});

</script>

	