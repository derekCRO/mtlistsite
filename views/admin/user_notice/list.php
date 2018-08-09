<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0"
		style="background:#F8F8F8;">
          <tr>
            <td id="detail_link" style="width: 100px; vertical-align:middle;">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 300px; "> 
            		<?php if($notice_type == 16){ echo "레전드PICK";} ?> 
            		<?php if($notice_type == 17){ echo "신출귀몰PICK";} ?>
            		<?php if($notice_type == 18){ echo "1인자PICK";} ?>
            		<?php if($notice_type == 19){ echo "빙고PICK";} ?>
            		<?php if($notice_type == 21){ echo "자유게시판";} ?>
            		<?php if($notice_type == 22){ echo "웃긴사진첩";} ?>
            		<?php if($notice_type == 24){ echo "안구정화";} ?>
            		<?php if($notice_type == 26){ echo "고객센터";} ?></div>
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
                            <option value = "1" <?php if($search_type == 1){echo "selected";} ?>>제목</option>
                            <option value = "2" <?php if($search_type == 2){echo "selected";} ?>>내용</option>
                            <option value = "3" <?php if($search_type == 3){echo "selected";} ?>>글쓴이</option>
                             </select></td>
                        <td width="500" >
                        	<input type="text" id="search_key" name="search_key" value="<?php echo $search_key; ?>"
                        		class="input"  onkeyup="search_click(event);" style="width:100%"/></td>
                        <td width="120px" >
                        	<a>
                        	<img src="<?php echo $_SERVER_URL; ?>images/btn_search.png" align="absmiddle"
                        		onclick="search();" style="cursor: pointer;"></a>
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
                            <td width="40%" align="left" class="content3" style="padding-left:80px;"><strong>제목</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
				<?php if($notice_type==16 || $notice_type==17 || $notice_type==18 || $notice_type==10) { ?>
					<td width="9%" align="center" class="content3" style="padding-left:0px;"><strong>결과</strong></td>
					<td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
				<?php } ?>
                            <td width="15%" align="center" class="content3"><strong>글쓴이</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="9%" align="center" class="content3"><strong>날짜</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="9%" align="center" class="content3"><strong>조회수</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="16%" align="center" class="content3"><strong>조작</strong></td>
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
                            <td width="7%" align="center" class="content3"><?php if($data->is_notice == 0){ echo $i; }else{echo "공지";} ?></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="40%" align="left" class="content3" id="noticeID" 
                            	onClick="onDetail(<?php echo $data->idx;?>)" style="cursor:pointer" notice_id="<?php echo $data->idx;?>">&nbsp;
                            	<A href="#detail_link" style="color: black;" ><strong class="<?php if($data->is_notice == 0){ echo 'content3'; }else{echo 'content7';}?>"><?php echo $data->title;?></strong></A>
                            </td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<?php if($notice_type==16 || $notice_type==17 || $notice_type==18 || $notice_type==10) { ?>
								<td width="9%" align="center" class="clock3" >
									<select style="font-size:12px; width:75px;
											<?php if($data->isgoal==1) print("background-color:#FF9900");
												  elseif($data->isgoal==2)   print("background-color:#66FFFF");  ?>"
											class="chkGoal" idx='<?php echo $data->idx;?>' >
										<option value="0">미정</option>
										<option value="1" <?php if($data->isgoal==1) print("selected"); ?> >적중</option>
										<option value="2" <?php if($data->isgoal==2) print("selected"); ?>>미적중</option>
									</select>
									</td>
								<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<?php  } ?>
                            <td width="15%" align="center" class="clock3"><table width="130" border="0" cellspacing="5" cellpadding="0">
                                <tr>
                                  <td width="21"><img src="<?php echo $_SERVER_URL.'images/level_'.$data->level_type.'.gif';?>" width="24" height="24"></td>
                                  <td ><strong class="content3"><?php echo $data->write_name;?></strong></td>
                                </tr>
                            </table></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="9%" align="center" class="content3"><?php echo $data->reg_date;?></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="9%" align="center" class="content3"><?php echo $data->visit_qty;?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="16%" align="center" class="content3">
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
						<?php if($notice_type == 16 || $notice_type == 17 || 
								 $notice_type == 18 || $notice_type == 19 ||
								 $notice_type == 21
								 ){?>
                        	<a href="<?php echo $_SERVER_URL; ?>admin/user_notice/edit?notice_type=<?php echo $notice_type; ?>">
                        	<img src="<?php echo $_SERVER_URL; ?>images/btn_add.png" align="absmiddle"
                        		style="cursor: pointer;"></a>
                        	<?php }?>
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
	function onDetail(notice_id){

		detail(notice_id);
		
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
	  
	  $(".chkGoal").change( function() {
	  		var _url = "<?php echo $_SERVER_URL;?>admin/user_notice/ajax_update_goal";
	  		var _idx = $(this).attr('idx')-0;
			var _status = $(this).val()-0;
			var obj = $(this);
			$.post( _url, {idx:_idx, status:_status}, function(data) {
				if(data.substring(0,2)=='ok')
				{
					if(_status==1)
						obj.css('background-color', '#FF9900');
					else if(_status==2)
						obj.css('background-color', '#66ffff');
					else
						obj.css('background-color', '#fff');
					//alert("결과등록 성공.");
				}
				else
				{
					alert("결과등록 오류입니다. " + data);
				}
			});
			
	  });
</script>

	