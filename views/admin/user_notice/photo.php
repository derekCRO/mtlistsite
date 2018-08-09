<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0"
		style="background:#F8F8F8;">
          <tr>
            <td id="detail_link" style="width: 100px; vertical-align:middle;">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 270px; "> 
            		<?php if($notice_type == 16){ echo "레전드PICK";} ?> 
            		<?php if($notice_type == 17){ echo "신출귀몰PICK";} ?>
            		<?php if($notice_type == 18){ echo "1인자PICK";} ?>
            		<?php if($notice_type == 19){ echo "빙고PICK";} ?>
            		<?php if($notice_type == 21){ echo "자유게시판";} ?>
            		<?php if($notice_type == 22){ echo "웃긴사진첩";} ?>
            		<?php if($notice_type == 24){ echo "안구정화";} ?>
            		<?php if($notice_type == 26){ echo "고객센터";} ?>  </div>
            </td>
            
          </tr>
		   
             
            <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="subbg">
                  <tr>
                    <td height="50" align="center"><table width="744px" border="0" align="center" cellpadding="0" cellspacing="3">
                      <tr>
                        <td width="80" >
                        	<select name="search_type" class="input"  id="search_type"
                        		style="width: 80px">
                            <option value = "1" <?php if($search_type == 1){echo "selected";}?>>제목</option>
                            <option value = "2" <?php if($search_type == 2){echo "selected";}?>>내용</option>
                            <option value = "3" <?php if($search_type == 3){echo "selected";}?>>글쓴이</option>
                             </select></td>
                        <td width="500" >
                        	<input type="text" id="search_key" name="search_key" value="<?php echo $search_key; ?>"
                        		class="input"  onkeyup="search_click(event);" style="width:100%"/></td>
                        <td width="120px" >
                        	<img src="<?php echo $_SERVER_URL; ?>images/btn_search.png" align="absmiddle"
                        		onclick="search();" style="cursor: pointer;">
                        </td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
            </tr>
          <tr>
            <td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			 <tr>
                <td id ="detail">
				</td>
			  </tr>
				
              <tr>
                <td>				
				<table width="100%" height="250px" border="0" cellspacing="0" cellpadding="0"  style="margin-top: 20px;">
					<tr>
	                <td height="500" valign="top" align="center"><table width="78%" border="0" cellspacing="0" cellpadding="0">
	                  	<?php 
						      $i = 0;
							  foreach($list as $key => $data){	
							  	$rest = $i % 4;	
							  	$i++;							  			            
						 ?>
						 <?php if($rest == 0){ ?>
							<tr>
			                    <td align="center">&nbsp;</td>
			                    <td align="center">&nbsp;</td>
			                    <td align="center">&nbsp;</td>
			                    <td align="center">&nbsp;</td>
			                  </tr>
						 	<tr>
						 <?php }?>
	                    <td width="25%" align="center"><table width="215" border="0" cellspacing="0" cellpadding="0">
	                      <tr>
	                        <td width="215" height="215" >  
	                        	<A href="#detail_link" style="color: black;" >
	                        	<img src="<?php echo $_SERVER_URL; ?><?php if($data->file_path==''){ echo 'images/photo_table.png';}else{echo $data->file_path;} ?>"
	                        		width="215" height="215" style="cursor: pointer;" onclick="detail(<?php echo $data->idx;?>)">
	                        	</A>
	                        </td>
	                      </tr>
	                      <tr>
	                        <td height="25" align="center" class="content3">[<?php echo $data->write_name; ?>] <?php echo $data->title; ?></td>
	                      </tr>
	                      <tr>
	                        <td  align="center"><table width="120" border="0" cellspacing="5" cellpadding="0">
	                          <tr>
	                            <td><table width="60" border="0" cellspacing="0" cellpadding="0">
	                              <tr>
	                                <td align="center"><DIV><A class="photo1_btn" href="#"><?php echo $data->reply_qty; ?> 댓글</A></DIV></td>
	                              </tr>
	                            </table></td>
	                            <td><table width="60" border="0" cellspacing="0" cellpadding="0">
	                              <tr>
	                                <td align="center">
	                                	<DIV><A class="photo2_btn" href="#"><?php echo $data->recommend_qty; ?> 추천</A>
	                                	</DIV></td>
	                                
	                              </tr>
	                            </table></td>
	                            <td><table width="60" border="0" cellspacing="0" cellpadding="0">
	                              <tr>
	                              	<td align="center">
	                                	<DIV><input type="button" value="수정" onclick="notice_update(<?php echo $data->idx;?>);">
	                                	</DIV></td>
	                                <td align="center">
	                                	<DIV><input type="button" value="삭제" onclick="notice_del(<?php echo $data->idx;?>);">
	                                	</DIV></td>
	                                
	                              </tr>
	                            </table></td>
	                          </tr>
	                        </table></td>
	                      </tr>
	                    </table></td>
	                    <?php }?>
					<?php if($rest == 0){ ?>
					 	</tr>
					 <?php }?>
	                    
	                   
	                  <tr>
	                    <td align="center">&nbsp;</td>
	                    <td align="center">&nbsp;</td>
	                    <td align="center">&nbsp;</td>
	                    <td align="center">&nbsp;</td>
	                  </tr>
	                </table></td>
	              </tr>                  
 
	              <tr>
	                
					<td>
						<div class="admin_btn_add"> 
							<a href="<?php echo $_SERVER_URL; ?>admin/user_notice/edit?notice_type=<?php echo $notice_type; ?>">
                        	<img src="<?php echo $_SERVER_URL; ?>images/btn_add.png" align="absmiddle"
                        		style="cursor: pointer;"></a>
						</div>	
					</td>
	              </tr>
	              <tr>
	                
					<td>
						<div align="center" id="pagebar" class="paginate"> 
							<?php echo $pagination; ?>
						</div>	
					</td>
	              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
		</td>
		</tr>
		</table>

<script>
	function onView(){
		search();
	} 
	  function detail(notice_id){
	    
		$.post("<?php echo $_SERVER_URL; ?>admin/user_notice/detail",
                {notice_type:<?php echo $notice_type; ?>,notice_id:notice_id}				
            , function(data) {
			    $("#detail").html(data);
         });	
   	    
	  }

	  function search_click(event){
		  if(event.keyCode == 13)
			{
			  search();
			}
	  }
	  function search(){
		  var notice_type = "<?php echo $notice_type;?>";
		  var search_type = $("#search_type").val();
		  var search_key = $("#search_key").val();
		  window.location="<?php echo $_SERVER_URL;?>"+"admin/user_notice?notice_type="+notice_type+"&search_type="+search_type+"&"+"search_key="+search_key;
	  }

	  function notice_del(notice_id){
		  var notice_type = "<?php echo $notice_type;?>";
		  var search_type = $("#search_type").val();
		  var search_key = $("#search_key").val();
		  
		  //alert(notice_id);return;
		  $.messager.confirm("알림", "삭제하겠습니까?", function (data) {
	            if (data) {  			
	      		  $.post("<?php echo $_SERVER_URL; ?>admin/notice/ajax_del",
	  	                {notice_id:notice_id}				
	  	            , function(data) {
	  				    if(data=="ok"){
	  				    	window.location="<?php echo $_SERVER_URL;?>"+"admin/user_notice?notice_type="+notice_type+"&search_type="+search_type+"&"+"search_key="+search_key;
	  				    }
	  	         });
	            }
	        });

	  } 

	  function reply_del(reply_id){	
		  $.messager.confirm("알림", "삭제하겠습니까?", function (data) {
	            if (data) {  			
	      		  $.post("<?php echo $_SERVER_URL; ?>admin/user_notice/ajax_reply_del",
	  	                {reply_id:reply_id}				
	  	            , function(data) {		
	  				    if(data=="ok"){
	  				    	detail($("#notice_id").val());
	  				    }
	  	         });
	            }
	        });
	  }

	  function notice_update(notice_id){
		  var notice_type = <?php echo $notice_type; ?>;
		   
		  window.location = "<?php echo $_SERVER_URL;?>admin/user_notice/edit?notice_id="+notice_id+"&notice_type="+notice_type;
	  }
</script>

	