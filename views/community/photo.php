<?php global $_SERVER_URL; ?>
<!--<body style="background: #fff;">-->
	<table width="97%" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td height="80" align="left" style="padding-left:16px;"><?php if($type==22) { ?> <!--title_05.png--> <img
				src="<?php echo $_SERVER_URL; ?>images/title_06.png"
				height="56" /> <?php } else if($type==23) { ?> <img
				src="<?php echo $_SERVER_URL; ?>images/title_08.png"
				height="56" /> <?php } else { ?> <img
				src="<?php echo $_SERVER_URL; ?>images/title_05.png"
				height="56" /> <?php } ?>
				
				
				<input id="page_num" type="hidden" value="<?php echo $curPage; ?>" />
				<input id="page_size" type="hidden" value="<?php echo $pageSize; ?>" />
				<input id="count" type="hidden" value="<?php echo $count; ?>" />

			</td>
		</tr>
		<tr>
		<td id="detail" style="border-top: solid 1px gray;">
				<?php 
					if($viewdetail)
					{
						include_once('ajax_detail.php');
					}
				 ?>
		</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" num="0">
					<tr>
						<td height="500" valign="top">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" num="1">
							<?php 
							foreach ($list as $key=>$item)
							{
								if($key%4==0)
								{ ?> <tr> <?php  } ?>
								
								<!--일반 td셀을 현시 sttart-->
								<td width="25%" align="center">
										<table width="215" border="0" cellspacing="0" cellpadding="0" num="2">
											<tr>
												<td>
			<div style="width:215px;height:120px;border:1px solid gray; cursor:pointer;" 
					id="list_td_<?php echo $item->idx; ?>"
					onclick="detail(this.id, '<?php echo $item->idx; ?>', '<?php echo $type; ?>')" 		>
				<img src="<?php echo $_SERVER_URL.$item->file_path;?>"
					width="215" height="120"></div>
												</td>
											</tr>
											<tr>
												<td height="25" align="center" class="content3"><?php echo $item->title;?></td>
											</tr>
											<tr>
												<td align="center">
													<table width="120" border="0" cellspacing="5"
														cellpadding="0">
														<tr>
															
															<td><?php if($_SESSION['user_id'] == $item->write_id){?>
																<table width="60" border="0" cellspacing="0"
																	cellpadding="0">
																	<tr>
																		<td align="center"><DIV >
																				<A class="photo1_btn" href="<?php echo $_SERVER_URL; ?>contents/community/add?idx=<?php echo $item->idx; ?>&notice_type=<?php echo $type; ?>" style="font-family:돋음,dotum;">수정</A>
																			</DIV></td>
																	</tr>
																</table><?php }?>		
															</td>
																											
															<td>
																<table width="60" border="0" cellspacing="0"
																	cellpadding="0">
																	<tr>
																		<td align="center"><DIV onClick="detail(this.id, '<?php echo $item->idx; ?>', '<?php echo $type; ?>')" >
																				<A class="photo1_btn" href="#" style="font-family:돋음,dotum;"><?php echo $item->replay_qty;?>댓글</A>
																			</DIV></td>
																	</tr>
																</table>
															</td>
															<td>
																<table width="60" border="0" cellspacing="0"
																	cellpadding="0">
																	<tr>
																		<td align="center"><DIV onClick="onrecommend('<?php echo $item->idx?>')">
																				<A class="photo2_btn" href="#" style="font-family:돋음,dotum;"><span id='recom_<?php echo $item->idx;?>' ><?php echo $item->recommend_qty;?>추천</span></A>
																			</DIV>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								<!--일반 td셀을 현시 end-->
								<?php 
								if($key%4==3)
								{ ?>
									</tr><tr><td colspan="4">&nbsp;</td></tr>
								<?php  
								}
							}
							
							$rest = count($list) % 4 ;
							for($j = $rest; $j < 4 ;$j++)
							{ ?>
								<td width="25%">&nbsp;</td> 
							<?php 
							} 
							if(count($list)%4!=3) { ?> 
							</tr> <?php } ?>
						</table>
						</td>
					</tr>		
								
					<tr <?php // if( ! isset($_SESSION['user_id']) ) print("style='display:none;'"); ?>  >		
						<!--로그인 한 사용자 만 글쓰기 허가-->
						<td height="50" align="right">
							<a href='<?php echo $_SERVER_URL; ?>contents/community/add?notice_type=<?php echo $type; ?>' >
							<img src="<?php echo $_SERVER_URL; ?>images/btn_write.gif" id="btn_write"
											 style="width:71px;height:23px; cursor:pointer;" />
							</a>						
						</td>
					</tr>
					<tr>
						
						<td height="50" align="center">
							<table width="0" border="0" align="center" cellpadding="0"
								cellspacing="3">
								<tr>
									<td><select name="Search_Type" id="Search_Type" class="input">
											<option value='1'>제목</option>
											<option value='2'>내용</option>
									</select></td>
									<td><input type="text" id="Search_Key" name="Search_Key"
												class="input" style="width: 200px" />
									</td>
									<td><img src="<?php echo $_SERVER_URL;?>images/btn_search.png" align="absmiddle" 
									style="cursor:pointer;" onClick="inputAmount()" /></td>
								</tr>
							</table>
						</td>
						<td>&nbsp;</td>
					</tr>  
					<tr>
						
						<td align="center" width="100%">
							<div class="paginate">
								<?php echo $pagination;?>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<!--</body>-->


<script>
  $("#Search_Key").keyup( function(event) {
		if (event.keyCode == 13) {
			inputAmount();
				
  		}
	});
   function inputAmount(){
	    var pass;
	    var contents;
	  	var type = '<?php echo $type ?>';
	   	if($("#Search_Type").val() == '제목') pass = 1;
	   	else pass = 2;
		
	   	contents = $("#Search_Key").val();
		
	   	window.location="<?php echo $_SERVER_URL;?>contents/community?search_type="+pass+
								"&search_key=" + contents +
								"&type=" + type;
	  }	  
	  

	_server_url = '<?php echo $_SERVER_URL; ?>';	
	_detail_url = '<?php echo $_SERVER_URL; ?>contents/community/detail?notice_type=<?php echo $type; ?>';
	_pagination = '<?php echo $_SERVER_URL; ?>contents/community';
	list_item_select( document.getElementById('list_td_<?php echo $detailid ?>') );
	</script>
