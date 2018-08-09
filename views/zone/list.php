<?php global $_SERVER_URL; ?>
<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="80" align="left"><img src="<?php echo $_SERVER_URL; ?>images/title_10.png" height="56"></td>
          </tr>
          <tr style="<?php if(count($poster_list)<=0) print('display:none;'); ?>"  >
		    	<td style="border:2px solid #80cbfa;">
					<table width="100%" border="0" cellspacing="8" cellpadding="0">
					<tr ><td colspan="4" style="color:#333; size:13px; font-weight:bold;">
							<table style="height:22px;"><tr><td><img style="width:24px;height:24px;cursor:pointer;" 
								src="<?php echo $_SERVER_URL ?>images/important1.gif" /></td>
								<td valign="middle" style="font-size:18px; color:#333; font-weight:bold;">
								인증공원</td></tr></table>
					</td></tr>
						  <tr>
							<?php 
						$i= 0;
						foreach($poster_list as $park) { 
						$i ++;
						?>
						<td align="center" style="width: 25%">
							<a onclick='window.location="<?php echo $_SERVER_URL; ?>contents/notice/main_detail?type=2&notice_id=<?php echo $park->idx;?>"'>
								<img src="<?php echo $_SERVER_URL . $park->file_path; ?>" style="width:184px;cursor:pointer;height:115px;" />
							</a>	
							<br><span style="font-size:12px; font-weight:bold; color:#666;"><?php echo mb_substr($park->title,0, 10) .  
								(mb_strlen($park->title)>10 ? '...' : ''); ?></span>
						</td>
						<?php } ?> 
					  </tr>
					</table>
		    	</td>
		    </tr>
		    <tr><td>&nbsp;</td>
          <tr>
            <td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			 <tr>
                <td id ="detail">
					<?php 
						if($viewdetail)
						{
							include_once('ajax_detail.php');
						}
					 ?>
				</td></tr>
				
              <tr>
                <td>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="35" align="center" class="content"  style="border:1px solid #cdcdcd"  background="<?php echo $_SERVER_URL; ?>images/board_bg.jpg">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7%" align="center" class="content3"><strong>번호</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="55%" align="center" class="content3"><strong>제목</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="18%" align="center" class="content3"><strong>글쓴이</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3"><strong>날짜</strong></td>
                            <td><img src="<?php echo $_SERVER_URL; ?>images/board_line.jpg" width="2" height="34"></td>
                            <td width="10%" align="center" class="content3"><strong>조회수</strong></td>
                          </tr>
                      </table></td>
              </tr>
              	
				<?php include('ajax_list.php'); ?>
              <tr <?php // if( ! isset($_SESSION['user_id']) ) print("style='display:none;'"); ?>  >
                <td height="50" align="right">
					<input id="page_num" type="hidden" value="<?php echo $curPage; ?>" />
					<input id="page_size" type="hidden" value="<?php echo $pageSize; ?>" />
					<input id="count" type="hidden" value="<?php echo $count; ?>" />
					<a href='<?php echo $_SERVER_URL; ?>contents/zone/add?notice_type=<?php echo $type; ?>' >
					<img src="<?php echo $_SERVER_URL; ?>images/btn_write.gif" id="btn_write"
									 style="width:71px;height:23px; cursor:pointer;" /></a></td>
              </tr>
				     
              <tr>
                <td height="50" align="center"><table width="0" border="0" align="center" cellpadding="0" cellspacing="3">
                  <tr>
                    <td ><select id="searchType" name="searchType" class="input" >
							<option <?php if($search_type==1) echo 'selected'; ?> value="1">제목</option>
							<option <?php if($search_type==2) echo 'selected'; ?> value="2">내용</option>
                        </select></td>
                    <td ><input type="text" id="searchKey" name="searchKey"  
							class="input" style="width:200px;" value="<?php echo $search_key; ?>"/></td>
                    <td ><img src="<?php echo $_SERVER_URL; ?>images/btn_search.png" 
								align="absmiddle" onClick="searchContents(
									'<?php echo $_SERVER_URL;?>contents/zone',
									'<?php echo $type; ?>');" 
								style="cursor:pointer;"></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
				<td style="text-align:center; color:#666;">
					
					<div align="center" id="pagebar" class="paginate"> 
						<?php echo $pagination; ?>
					</div></td>
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
	_server_url = '<?php echo $_SERVER_URL; ?>';	
	_detail_url = '<?php echo $_SERVER_URL; ?>contents/zone/detail';
	_pagination = '<?php echo $_SERVER_URL; ?>contents/zone';
	list_item_select( document.getElementById('list_td_<?php echo $detailid ?>') );
</script>