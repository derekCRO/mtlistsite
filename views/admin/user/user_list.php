<?php global $_SERVER_URL; ?>
<!--<body>-->
<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0"
		style="background:#F8F8F8;">
          <tr>
            <td style="width: 100px; vertical-align:middle;" class="content3">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 275px;"><strong>회원관리</strong></div>
            </td>
          </tr>
          <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="subbg">
                  <tr>
                    <td height="50" align="center"><table width="700" border="0" align="center" cellpadding="0" cellspacing="3">
                      <tr>
                      	<td width="20" align="center" class="content3" style="font-size: 15px;"><strong>검색어</strong>
                      	</td>
                        <td width="100" >
                        	<input type="text" id="search_key" name="search_key" 
                        		class="input"  onkeyup="search_click(event);" style="width:60%"
                        		value="<?php echo $search_key;?>" />
                            <img src="<?php echo $_SERVER_URL; ?>images/btn_search.png"
                        		onclick="search();" style="cursor: pointer; vertical-align:middle">
                        </td>
                      </tr>
                       
                    </table></td>
                  </tr>
                </table></td>
            </tr>
          <tr>
            <td>
			<table width="100%" height="250px" border="0" cellspacing="0" cellpadding="0">
                <td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="35" align="center" class="content"  style="border:1px solid #cdcdcd"  background="<?php echo $_SERVER_URL ?>images/board_bg.jpg">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7%" align="center" class="level_type"><strong>번호</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="7%" align="center" class="content3 level_type" onClick="arrange_login()">
                              <?php if($sort_type == 0 || $sort_type == 3 || $sort_type == 4 || $sort_type == 5 || $sort_type == 6 || $sort_type == 7 || $sort_type == 8){?>
                                <strong class="level_type" number="1">아이디</strong>
                              <?php }elseif($sort_type == 1){?><strong class="level_type" number="2">아이디▼</strong>
                              <?php }elseif($sort_type == 2){?><strong class="level_type" number="3">아이디▲</strong><?php }?>
                            </td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3 level_type"><strong>이름</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="13%" align="center" class="content3 level_type"><strong>이메일주소</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="13%" align="center" class="content3 level_type"><strong> IP주소</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="5%" align="center" class="content3 level_type" onClick="arrange_level()">
                              <?php if($sort_type == 0 || $sort_type == 1 || $sort_type == 2 || $sort_type == 5 || $sort_type == 6 || $sort_type == 7 || $sort_type == 8){?><strong>레벨</strong>
                              <?php }elseif($sort_type == 3){?><strong>레벨▼</strong>
                              <?php }elseif($sort_type == 4){?><strong>레벨▲</strong><?php }?>
                            </td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="5%" align="center" class="content3 level_type" onClick="arrange_notice()">
                              <?php if($sort_type == 0 || $sort_type == 1 || $sort_type == 2 || $sort_type == 3 || $sort_type == 4 || $sort_type == 7 || $sort_type == 8){?><strong>게시글수</strong>
                              <?php }elseif($sort_type == 5){?><strong>게시글수▼</strong>
                              <?php }elseif($sort_type == 6){?><strong>게시글수▲</strong><?php }?>
                            </td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="5%" align="center" class="content3 level_type" onClick="arrange_reply()">
                              <?php if($sort_type == 0 || $sort_type == 1 || $sort_type == 2 || $sort_type == 3 || $sort_type == 4 || $sort_type == 5 || $sort_type == 6){?><strong>댓글수</strong>
                              <?php }elseif($sort_type == 7){?><strong>댓글수▼</strong>
                              <?php }elseif($sort_type == 8){?><strong>댓글수▲</strong><?php }?>
                            </td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3 level_type"><strong>포인트수</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3 level_type"><strong>등록날짜</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="16%" align="center" class="content3 level_type"><strong>조작</strong></td>
                          </tr>
                      </table></td>
                    </tr>
                 
				 <?php 
				     foreach ($list as $keys => $item) { $i = $keys%2;
				 ?>
                    <tr>
                      <td height="35" style="border-bottom:1px solid #bebebe"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr height="30">
                            <td width="7%" align="center" class="content3"><?php echo $keys+1; ?></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="7%" align="center" class="content3" id="adminID"><strong><?php echo $item->login_id; ?></strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="10%" align="center" style="vertical-align: middle;" class="content3">
                            	<?php echo $item->name; ?></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="13%" align="center" class="content3"><?php echo $item->email; ?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="13%" align="center" class="content3"><?php echo $item->last_loginip; ?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>							 
							<td width="5%" align="center" class="content3">
								<img src="<?php echo $_SERVER_URL.'images/level_'.$item->level_type.'.gif'; ?>" width="23" height="25"></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="5%" align="center" class="content3"><?php echo $item->notice_qty; ?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="5%" align="center" class="content3"><?php echo $item->reply_qty; ?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="10%" align="center" class="content3"><?php echo $item->points;?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
							<td width="10%" align="center" class="content3"><?php echo $item->reg_date; ?></td>
							<td><img src="<?php echo $_SERVER_URL; ?>images/board_line2.jpg" width="1" height="9"></td>
                            <td width="16%" align="center" class="content3">
								<button type="button" onClick="letterTo('<?php echo $item->login_id;?>');">쪽지보내기</button>
                               <a href = "<?php echo $_SERVER_URL; ?>admin/admin/edit?user_id=<?php echo $item->idx; ?>&tab=1&type=2" title = "회원정보수정">
                                 <button type="button">수정 </button>
                               </a>
                                 <button type="button" onClick="onDeleteContent(<?php echo $item->idx;?>)">삭제</button>
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
							  onclick='window.location="<?php echo $_SERVER_URL; ?>admin/admin/edit?tab=1&type=2"'>				
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
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
		</td>
		</tr>
		</table>
<!--</body>-->
<script>
	function onDeleteContent(userid)
	{
		var flag;
	    flag = confirm("정말로 삭제하겠습니까?");
	    if(flag == false)
	    {
	       return; 
	    }
	    $.post("<?php echo $_SERVER_URL; ?>admin/admin/ajax_del", 
	       { user_id : userid  },
				 function(data) {																
				 // alert(data);
				if(data.substring(data.length-2) == 'ok')
			    {
				    alert("삭제되었습니다.");
					window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2";
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
	//	var sort_type = $("#sort_type").val();
		var ss = $("#search_key").val();
		window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&search_key="+ss+"&sort_type="+0;

    }  

    $(".level_type").click( function(){

       var _level_type = $(this).attr('number');
       alert(_level_type);
    	
    });
	
    function arrange_login()
    {
       var temp =<?php echo $sort_type; ?>;

       if(temp == 0)
       {
         window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+1;
       }
       if(temp == 1)
       {
         window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+2;
       }
       if(temp == 2)
       {
         window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+0;
       }
       
     }

    function arrange_level()
    {
    	var temp =<?php echo $sort_type; ?>;

    	if(temp == 0)
        {
          window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+3;
        }
    	if(temp == 3)
        {
          window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+4;
        }
    	if(temp == 4)
        {
          window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+0;
        }
    
    }

    function arrange_notice()
    {
    	var temp =<?php echo $sort_type; ?>;

    	if(temp == 0)
        {
          window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+5;
        }
    	if(temp == 5)
        {
          window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+6;
        }
    	if(temp == 6)
        {
          window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+0;
        }
        
    }

    function arrange_reply()
    {
    	var temp =<?php echo $sort_type; ?>;

    	if(temp == 0)
        {
          window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+7;
        }
    	if(temp == 7)
        {
          window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+8;
        }
    	if(temp == 8)
        {
          window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2&sort_type="+0;
        }
    }
	
	function letterTo(login_id)
	{
		window.location = "<?php echo $_SERVER_URL; ?>admin/piecepaper/edit?login_id="+login_id;
	}
</script>

	