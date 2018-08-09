<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0"
		style="background:#F8F8F8;">
          <tr>
            <td id="detail_link" style="width: 100px; vertical-align:middle;">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 250px; "> 
            		<?php if($notice_type == 1){ echo "공지사항"; }else{ echo "채팅공지"; } ?> 
            	</div>
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
                        	<a href="#">
                        		<img src="<?php echo $_SERVER_URL; ?>images/btn_search.png" align="absmiddle"
                        		onclick="search();" style="cursor: pointer;">
                        	</a>
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
				</td></tr>
				
              <tr>
                <td>
				
				<table width="100%" height="250px" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="35" align="center" class="content"  style="border:1px solid #cdcdcd"  background="<?php echo $_SERVER_URL; ?>images/board_bg.jpg">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7%" align="center" class="content3"><strong>번호</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="35%" align="left" class="content3" style="padding-left:80px;"><strong>제목</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="18%" align="center" class="content3"><strong>글쓴이</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3"><strong>날짜</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <!--<td width="10%" align="center" class="content3"><strong>유효기간</strong></td>
                            <td><img src="<?php //echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>-->
                            <td width="10%" align="center" class="content3"><strong>조회수</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3"><strong>조작</strong></td>
                          </tr>
                      </table></td>
                    </tr>
                 
				 <?php 
				      $i = 0;
					  foreach($list as $key => $data){	
					  	$i++;			            
				 ?>
                    <tr>
                      <td height="35" style="border-bottom:1px solid #bebebe"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7%" align="center" class="content3"><?php echo $i;?></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="35%" align="left" class="content3" id="noticeID" 
							onClick="detail(<?php echo $data->idx;?>)" 
							style="cursor:pointer" 
							notice_id="<?php echo $data->idx;?>">&nbsp;
                            	<A href="#detail_link" style="color: black;" >
                            	<strong class="content7" style="<?php echo $data->title_style;?>"><?php echo $data->title;?></strong></A></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="18%" align="center" class="clock3"><table width="130" border="0" cellspacing="5" cellpadding="0">
                                <tr>
                                  <td width="21"><img src="<?php echo $_SERVER_URL. 'images/level_' .$data->level_type . '.gif'; ?>" width="24" height="24"></td>
                                  <td ><strong class="content3"><?php echo $data->write_name;?></strong></td>
                                </tr>
                            </table></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="10%" align="center" class="content3"><?php echo $data->reg_date;?></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <!--<td width="10%" align="center" class="content3"><?php //echo $data->days;?></td>
                            <td><img src="<?php //echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>-->
							<td width="10%" align="center" class="content3"><?php echo $data->visit_qty;?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="10%" align="center" class="content3">
								<input type="button" value="수정" onclick="notice_update(<?php echo $data->idx;?>);">
								<input type="button" value="삭제" onclick="notice_del(<?php echo $data->idx;?>);">
				 			</td>
                          </tr>
                      </table></td>
                    </tr>
              <?php } ?>      
              <tr>                
				<td>
					<div class="admin_btn_add"> 
						<a href="<?php echo $_SERVER_URL; ?>admin/notice/edit?notice_type=<?php echo $notice_type; ?>">
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
	    
		$.post("<?php echo $_SERVER_URL; ?>admin/notice/detail?notice_type=<?php echo $notice_type; ?>",
                {notice_id:notice_id}				
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
		  window.location="<?php echo $_SERVER_URL;?>"+"admin/notice?notice_type="+notice_type+"&search_type="+search_type+"&"+"search_key="+search_key;
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
	  				    	window.location="<?php echo $_SERVER_URL;?>"+"admin/notice?notice_type="+notice_type+"&search_type="+search_type+"&"+"search_key="+search_key;
	  				    }
	  	         });
	            }
	        });

	  } 

	  function reply_del(reply_id){		  
		  $.messager.confirm("알림", "삭제하겠습니까?", function (data) {
	            if (data) {  			
	      		  $.post("<?php echo $_SERVER_URL; ?>admin/notice/ajax_reply_del",
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
		   
		  window.location = "<?php echo $_SERVER_URL;?>admin/notice/edit?notice_id="+notice_id+"&notice_type="+notice_type;
	  }
	</script>

	