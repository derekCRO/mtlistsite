<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0"
		style="background:#F8F8F8;">
          <tr>
            <td  style="width: 100px; vertical-align:middle;">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 190px; "> 쪽지 </div>
            </td>
            
          </tr>
		   
             
            <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="subbg">
                  <tr>
                    <td height="50" align="center"><table width="744px" border="0" align="center" cellpadding="0" cellspacing="3">
                      <tr>
                      	 
                        <td width="500" >
                        	<input type="text" id="search_key" name="search_key" value="<?php echo $search_key; ?>"
                        		class="input"  onkeyup="search_click(event);" style="width:100%"/></td>
                        <td width="120px" >
                        	<a>
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
                <td>
				
				<table width="100%" height="250px" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="35" align="center" class="content"  style="border:1px solid #cdcdcd"  background="<?php echo $_SERVER_URL; ?>images/board_bg.jpg">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="5%" align="center" class="content3"><strong>번호</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="50%" align="left" class="content3" style="padding-left:100px;"><strong>내용</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
<!--                            <td width="5%" align="center" class="content3"><strong>글쓴이</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
-->                            <td width="10%" align="center" class="content3"><strong>수신자</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3"><strong>날짜</strong></td>
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
                            <td width="5%" align="center" class="content3"><?php if($data->is_notice == 0){ echo $i; }else{echo "공지";} ?></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="50%" align="left" class="content3" id="noticeID" 
                            	notice_id="<?php echo $data->idx;?>">
                            	<strong class="content3"><?php echo $data->content;?></strong> 
                            </td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
<!--                            <td width="5%" align="center" class="clock3">
                            <table width="" border="0" cellspacing="5" cellpadding="0">
                                <tr>
                                  <td ><strong class="content3"><?php echo $data->write_name;?></strong></td>
                                </tr>
                            </table></td>
                           <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>--> 
                            <td width="10%" align="center" class="content3"><?php echo $data->receive_names;?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="10%" align="center" class="content3"><?php echo $data->reg_date;?></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="10%" align="center" class="content3">
								<input type="button" value="수정" onclick="notice_update(<?php echo $data->idx;?>);">
								<input type="button" value="삭제" onclick="del(<?php echo $data->idx;?>);">
				 			</td>
                          </tr>
                      </table></td>
                    </tr>
              <?php } ?>      
              <tr>
                
				<td>
					<div class="admin_btn_add"  style="width:80px"> 
						<DIV><A class="buttonon" href="<?php echo $_SERVER_URL; ?>admin/piecepaper/edit">쪽지보내기</A></DIV>
							<!--<a href="<?php echo $_SERVER_URL; ?>admin/piecepaper/edit">
                        		<img src="<?php echo $_SERVER_URL; ?>images/btn_add.png" align="absmiddle"
                        		style="cursor: pointer;"></a>-->
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
	 

	  function search_click(event){
		  if(event.keyCode == 13)
			{
			  search();
			}
	  }
	  function search(){
		  var search_key = $("#search_key").val();
		  window.location="<?php echo $_SERVER_URL;?>"+"admin/piecepaper?search_key="+search_key;
	  }

	  function del(idx){
		  var search_type = $("#search_type").val();
		  var search_key = $("#search_key").val();
		  
		  //alert(notice_id);return;
		  $.messager.confirm("알림", "삭제하겠습니까?", function (data) {
	            if (data) {  			
	      		  $.post("<?php echo $_SERVER_URL; ?>admin/piecepaper/ajax_del",
	  	                {idx:idx}				
	  	            , function(data) {
	  				    if(data=="ok"){
	  				    	window.location="<?php echo $_SERVER_URL;?>"+"admin/piecepaper?search_key="+search_key;
	  				    }
	  	         });
	            }
	        });

	  } 

	  function notice_update(notice_id){
		  window.location = "<?php echo $_SERVER_URL;?>admin/piecepaper/edit?notice_id="+notice_id;
	  }
</script>

	