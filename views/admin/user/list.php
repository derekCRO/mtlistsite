<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#F8F8F8;">
          <tr>
            <td style="width: 100px; vertical-align:middle;" class="content3">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 280px;">
            		<strong>관리자등록</strong></div>
            </td>
          </tr>
		   
             
            <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="subbg">
                  <tr>
                    <td height="50" align="center"><table width="700" border="0" align="left" cellpadding="0" cellspacing="3" style="margin-left:30px;">
                      <tr>
                        <td width="20" align="center" class="content3" style="font-size: 15px;"><strong>검색어</strong></td>
                        <td width="100" >
                        	<input type="text" id="search_key" name="search_key" value="<?php echo $search_key; ?>"
                        		class="input"  onkeyup="search_click(event);" style="width:60%"/>
                            <img src="<?php echo $_SERVER_URL; ?>images/btn_search.png"
                        		onclick="search();" style="cursor: pointer; vertical-align:middle;">      
                        </td>
                        <td width="10"> </td>
                        <td width="10"> </td>   				
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
                      <td height="35" align="center" class="content"  style="border:1px solid #cdcdcd"  background="<?php echo $_SERVER_URL ?>images/board_bg.jpg">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7%" align="center" class="content3"><strong>번호</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3"><strong>아이디</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3"><strong>이름</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3"><strong>이메일주소</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3"><strong>마지막 IP주소</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3"><strong>등록날짜</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="16%" align="center" class="content3"><strong>비고</strong></td>
                          </tr>
                      </table></td>
                    </tr>
                 
				 <?php 
				     foreach ($list as $keys => $item) { $i = $keys%2;
				 ?>
                    <tr>
                      <td height="35" style="border-bottom:1px solid #bebebe"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr idx = "<?php echo $keys; ?>" height="30">
                            <td width="7%" align="center" class="content3"><?php echo $keys+1; ?></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="10%" align="center" class="content3" id="adminID"><strong><?php echo $item->login_id; ?></strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="10%" align="center" class="content3"><?php echo $item->name; ?></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="10%" align="center" class="content3"><?php echo $item->email; ?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="10%" align="center" class="content3"><?php echo $item->last_loginip; ?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="10%" align="center" class="content3"><?php echo $item->reg_date;?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="16%" align="center" class="content3">
                               <a href = "<?php echo $_SERVER_URL; ?>admin/admin/edit?user_id=<?php echo $item->idx; ?>&tab=1&type=1" title = "회원정보수정">
                                 <button type="button">수정 </button>
                               </a>
                                 <button type="button" onclick="onDeleteContent(<?php echo $item->idx;?>)">삭제</button>
                            </td>
       
                          </tr>
                      </table></td>
                    </tr>
              <?php } ?>      
              <tr>
				<td>
					<div class="admin_btn_add"> 
						   <img src="<?php echo $_SERVER_URL; ?>images/btn_add.png" 
						   			style="cursor: pointer; vertical-align:middle;"
							  onclick='window.location="<?php echo $_SERVER_URL; ?>admin/admin/edit?tab=1&type=1"'>
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
 
	function onDeleteContent(userid)
	{ 
		var flag;
	    flag = confirm("삭제하시겠습니까?");
	    if(flag == false)
	    {
	       return; 
	    }
	    $.post("<?php echo $_SERVER_URL; ?>admin/admin/ajax_del", 
	       { 'user_id' : userid  },
				 function(data) {																
				 //alert(data);
				if(data.substring(data.length-2) == 'ok')
			    {
					window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=1";
			    }  						 
				});
	}

	function search_click(event){
		  if(event.keyCode == 13)
			{
			  search();
			}
	  }

	function search(){

		var ss = $("#search_key").val();
		window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=1&search_key="+ss;

  } 
	</script>

	