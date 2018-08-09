<?php global $_SERVER_URL; 
	  global $_ALPHA_GROUP;
?>
<table width="1314px"  border="0" align="center" cellpadding="0" cellspacing="0" style="background:#F8F8F8;">
   <tbody>
       <tr>
           <td id="detail_link" style="width: 100px; vertical-align:middle;">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 270px; font-size:24px; "> 
            		<?php if($notice_type == 6){ echo "먹튀리스트"; }else{ echo "인증공원"; } ?> </div>
            </td>
       </tr>
       <tr>
           <td>
               <table width="100%" height="280px" cellpadding="0" cellspacing="0" border="0" align="center">
                    <tbody>
                         <tr>
                             <td id="detail_page"></td>
                         </tr>
                         <tr>
                            <td>
                                <table class="subbg" width="100%" cellpadding="0" cellspacing="0">
                                     <tr>
                                       <td height="50" align="center"><table width="744px" border="0" align="center" cellpadding="0" cellspacing="3">
                                         <tr>
                                            <td width="80" >
                        	                    <select name="search_type" class="input"  id="search_type" style="width: 80px">
                                                  <option value = "1" <?php if($search_type == 1){echo "selected='selected'";}else {echo '';}?>>제목</option>
                                                  <option value = "2" <?php if($search_type == 2){echo "selected='selected'";}else {echo '';}?>>내용</option>
                                                </select></td>
                                            <td width="500" >
                        	                    <input type="text" id="search_key" name="search_key" value="<?php echo $search_key; ?>"
                        		                  class="input"  onkeyup="search_click(event);" style="width:100%"/></td>
                                            <td width="120px" >
                                            	<a>
                        	                  	 <img src="<?php echo $_SERVER_URL; ?>images/btn_search.png"
                        		                  onclick="search();" align="absmiddle" style="cursor: pointer;   padding-left:20px;">
                        		                </a>
                                            </td>
                                        </tr>
                                    </table></td>
                                  </tr>
                               </table>
                            </td>
                         </tr>
                         <tr>
                             <td>  </td>
                         </tr>
                         <?php if($notice_type == 6){ ?>
                         <tr>
                             <td>
                                 <table width="100%" cellpadding="0" cellspacing="5" border="0" align="left">
                                     <tbody>
                                          <tr>
                                              <td width="*">&nbsp;</td>
                                              <td width="20">
                                              	<input type="hidden" id="alpha_type" name="alpha_type" value="<?php echo $alpha_type;?>">
                                                <table width="80" cellpadding="0" cellspacing="0" border="0">
                                                   <tr><td align="center">
                                                      <div><a class="<?php echo ($alpha_type==0 ? 'list_btn' : 'list_btn_off'); ?>" href="#" onclick="Alpha_click(0);">전체</a></div>
                                                   </td></tr>
                                                </table>
                                              </td>
                                              <td width="20">
                                                <table width="80" cellpadding="0" cellspacing="0" border="0">
                                                   <tr><td align="center">
                                                      <div><a class="<?php echo ($alpha_type==1 ? 'list_btn' : 'list_btn_off'); ?>" href="#" onclick="Alpha_click(1);">ㄱ ~ ㄴ</a></div>
                                                   </td></tr>
                                                </table>
                                              </td>
                                              <td width="20">
                                                <table width="80" cellpadding="0" cellspacing="0" border="0">
                                                   <tr><td align="center">
                                                      <div><a class="<?php echo ($alpha_type==2 ? 'list_btn' : 'list_btn_off'); ?>" href="#" onclick="Alpha_click(2);">ㄷ ~ ㄹ</a></div>
                                                   </td></tr>
                                                </table>
                                              </td>
                                              <td width="20">
                                                <table width="80" cellpadding="0" cellspacing="0" border="0">
                                                   <tr><td align="center">
                                                      <div><a class="<?php echo ($alpha_type==3 ? 'list_btn' : 'list_btn_off'); ?>" href="#" onclick="Alpha_click(3);">ㅁ ~ ㅂ</a></div>
                                                   </td></tr>
                                                </table>
                                              </td>
                                              <td width="20">
                                                <table width="80" cellpadding="0" cellspacing="0" border="0">
                                                   <tr><td align="center">
                                                      <div><a class="<?php echo ($alpha_type==4 ? 'list_btn' : 'list_btn_off'); ?>" href="#" onclick="Alpha_click(4);">ㅅ ~ ㅇ</a></div>
                                                   </td></tr>
                                                </table>
                                              </td>
                                              <td width="20">
                                                <table width="80" cellpadding="0" cellspacing="0" border="0">
                                                   <tr><td align="center">
                                                      <div><a class="<?php echo ($alpha_type==5 ? 'list_btn' : 'list_btn_off'); ?>" href="#" onclick="Alpha_click(5);">ㅈ ~ ㅊ</a></div>
                                                   </td></tr>
                                                </table>
                                              </td>
                                              <td width="20">
                                                <table width="80" cellpadding="0" cellspacing="0" border="0">
                                                   <tr><td align="center">
                                                      <div><a class="<?php echo ($alpha_type==6 ? 'list_btn' : 'list_btn_off'); ?>" href="#" onclick="Alpha_click(6);">ㅋ ~ ㅌ</a></div>
                                                   </td></tr>
                                                </table>
                                              </td>
                                              <td width="20">
                                                <table width="80" cellpadding="0" cellspacing="0" border="0">
                                                   <tr><td align="center">
                                                      <div><a class="<?php echo ($alpha_type==7 ? 'list_btn' : 'list_btn_off'); ?>" href="#" onclick="Alpha_click(7);">ㅍ ~ ㅎ</a></div>
                                                   </td></tr>
                                                </table>
                                              </td>
                                              <td>
                                                <table width="80" cellpadding="0" cellspacing="0" border="0">
                                                   <tr><td align="center">
                                                      <div><a class="<?php echo ($alpha_type==8 ? 'list_btn' : 'list_btn_off'); ?>" href="#" onclick="Alpha_click(8);">123 ~ abc</a></div>
                                                   </td></tr>
                                                </table>
                                              </td>
                                              <td width="*">&nbsp;</td>
                                          </tr>
                                          
                                     </tbody>
                                 </table>
                             </td>
                         </tr>
                         <?php } ?>
                         <tr>
                             <td>&nbsp;</td>
                         </tr>
                          <?php
						  	//print_r($list);
						   foreach($list as $key => $data){
								$alpha = $_ALPHA_GROUP[$data->alpha_type];
						  ?>
                         <tr>
                            <td>
                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td height="125" bgcolor="#ffffff" style="border-bottom: 1px solid #bebebe; border-top: 1px solid #bebebe">
                                           <table width="96%" cellpadding="0" cellspacing="0" border="0" align="center">
                                              <tr>
                                                  <td width="*">&nbsp;</td>
                                                  <td width="13%" valign="top">
                                                  	<img width="102" height="52" 
														src="<?php echo $_SERVER_URL.$data->file_path;?>"></td>
                                                  <td width="87%" valign="top">
                                                     <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td class="content14" height="30" id="noticeID" onClick="detail(<?php echo $data->idx;?>)" style="cursor:pointer" notice_id="<?php echo $data->idx;?>">
                                                            	<A href="#detail_link" style="color: black;" ><strong><?php echo $data->title; ?></strong></A></td>
                                                        </tr>
                                                        <tr>
                                                            <td height="25"><?php echo mb_substr(strip_tags($data->content, "<br>"), 0,40).'...'; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td height="30" style="width:80%">
                                                              <span class="content8">
                                                                 <img width="14" height="13" align="absmiddle" src="<?php echo $_SERVER_URL;?>images/icon_01.jpg"><?php echo $data->reg_date; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                 <img width="14" height="13" align="absmiddle" src="<?php echo $_SERVER_URL;?>images/icon_02.jpg"><?php echo $alpha;?> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                 <img width="15" height="14" align="absmiddle" src="<?php echo $_SERVER_URL;?>images/icon_03.jpg">
                                                                 <img width="25" height="25" align="absmiddle" src="<?php echo $_SERVER_URL.'images/level_' .$data->level_type . '.gif';?>"><?php echo $data->write_name; ?> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                 <img width="16" height="14" align="absmiddle" src="<?php echo $_SERVER_URL;?>images/icon_04.jpg"><?php echo $data->recommend_qty; ?> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                 <img width="17" height="13" align="absmiddle" src="<?php echo $_SERVER_URL;?>images/icon_05.jpg"><?php echo $data->visit_qty; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                              </span>사이트이름
                                                              <span class="content8"><?php echo $data->site_name; ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>사이트주소
                                                              <span class="content8"><?php echo $data->site_url; ?></span>
                                                            </td>
                                                             <td>
                                                             	<input type="button" value="수정" onclick="notice_update(<?php echo $data->idx;?>);">
                                                            	<input type="button" value="삭제" onclick="notice_del(<?php echo $data->idx;?>);">
                                                            </td>
                                                        </tr>
                                                     </table>
                                                  </td>
                                                  <td width="*">&nbsp;</td>
                                              </tr>
                                           </table>
                                        </td>
                                    </tr> 
                                </table>
                            </td>
                         </tr>
                         <?php }?>
                    </tbody>
               </table>
           </td>
       </tr>
       <tr>
           <td>
				<div class="admin_btn_add" > 
					 <a href="<?php echo $_SERVER_URL; ?>admin/mtlist/edit?notice_type=<?php echo $notice_type; ?>">
							<img src="<?php echo $_SERVER_URL; ?>images/btn_add.png" align="absmiddle"
										style="cursor: pointer;">
									</a>					
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
   </tbody>       
</table>

<script>
	function Alpha_click(alpha_type){
		$("#alpha_type").val(alpha_type);
		 
		search();
	}
		function detail(notice_id){
		    //alert(notice_id);
			$.post("<?php echo $_SERVER_URL; ?>admin/mtlist/detail",
		            {notice_type:<?php echo $notice_type;?>,notice_id:notice_id}				
		        , function(data) {
				    $("#detail_page").html(data);
		     });	
			    
		  }

	  function search_click(event){
		  if(event.keyCode == 13)
			{
			  search();
			}
	  }
	  function search(){
		  
		  var search_type = $("#search_type").val();
		  var search_key = $("#search_key").val();
		  var alpha_type = $("#alpha_type").val();
		  window.location="<?php echo $_SERVER_URL;?>admin/mtlist?notice_type="+<?php echo $notice_type;?>+"&search_type="+search_type+"&"+"search_key="+search_key+"&alpha_type="+alpha_type;
	  }

	  function notice_del(notice_id){
		 
		  //alert(notice_id);return;
		  $.messager.confirm("알림", "삭제하겠습니까?", function (data) {
	            if (data) {  			
	      		  $.post("<?php echo $_SERVER_URL; ?>admin/mtlist/ajax_del",
	  	                {notice_id:notice_id}				
	  	            , function(data) {
	  				    if(data=="ok"){
	  				    	search();
	  				    	 
	  				    }
	  	         });
	            }
	        });

	  } 

	  function notice_update(notice_id){
		  var notice_type = <?php echo $notice_type; ?>;
		  window.location = "<?php echo $_SERVER_URL;?>admin/mtlist/edit?notice_id="+notice_id+"&notice_type="+notice_type;
	  }
	  
</script>

	