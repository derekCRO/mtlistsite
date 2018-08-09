<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#F8F8F8;">
          <tr>
            <td style="width: 100px; vertical-align:middle;" class="content3">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 250px; font-size:20px;">
            	  <strong>설정</strong></div>
            </td>
          </tr>
          <tr>
             <td width="50%;" align="center" valign="top">
                 <div style="border:2px solid #cdcdcd; margin-left: 30px; margin-right:15px;">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
	   <tr style="height:30px; background:#ddd">
			<td align="left" colspan="4" ><strong style="font-size: 13px;">포인트 설정</strong></td></tr>

                       <tr height="20px;"><td width="*">&nbsp;</td></tr>
                       <?php foreach ($list as $keys => $item){
                              if($item->setting_type == 1){?>
                         <tr height="50px">
                             <td width="*">&nbsp;</td>
                             <td align="center" width="200px"><strong style="font-size: 13px;">게시글 작성 시 적립 포인트</strong></td>
                             <td align="left" width="250px"><input style="width:250px;" id = "name_point" type="text" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" value="<?php echo $item->value1;?>" ></td> 
                             <td width="*">&nbsp;</td>
                         </tr>
                         <?php }elseif($item->setting_type == 2){?>
                         <tr height="50px">
                             <td width="*">&nbsp;</td>
                             <td align="center" width="200px"><strong style="font-size: 13px;">댓글 등록 시 적립 포인트</strong></td>
                             <td align="left" width="250px"><input style="width:250px;" id = "ladder_point"  setting_type="<?php echo $item->setting_type; ?>" class="setting_input" type="text"  value="<?php echo $item->value1;?>" ></td> 
                             <td width="*">&nbsp;</td>
                         </tr>
                         <?php }elseif($item->setting_type == 4){?>
                         <tr height="50px">
                             <td width="*">&nbsp;</td>
                             <td align="center" width="200px"><strong style="font-size: 13px;">먹튀검증요청 시 포인트 소비</strong></td>
                             <td align="left" width="250px"><input style="width:250px;" id = "spend_point"  setting_type="<?php echo $item->setting_type; ?>" class="setting_input" type="text"  value="<?php echo $item->value1;?>" ></td> 
                             <td width="*">&nbsp;</td>
                         </tr>
                         <?php }elseif($item->setting_type == 3){?>
                         <tr height="50px">
                             <td width="*">&nbsp;</td>
                             <td align="center" width="200px"><strong style="font-size: 13px;">포인트 점수</strong><strong style="font-size: 13px; display:none;">매일 첫접속 회원수</strong></td>
                             <td align="left" width="250px"><input style="width:70px; display:none;" id = "snail_point"  setting_type="<?php echo $item->setting_type; ?>" type="text"  value="<?php echo $item->value2;?>" >
                                  
			                      <input style="width:250px;" id = "first_point" setting_type="<?php echo $item->setting_type; ?>" type="text"  value="<?php echo $item->value1;?>">
                             </td>
                             <td width="*">&nbsp;</td> 
                         </tr>
                         <?php }elseif($item->setting_type == 11){?>
                         <tr height="50px">
                            <td width="*">&nbsp;</td>
                            <td align="center" width="200px"><strong style="font-size: 13px;">레벨2 달성포인트</strong></td>
			                <td align="left" width="250px"><input style="width:250px;" id = "second_point" setting_type="<?php echo $item->setting_type;?>" type="text" value="<?php echo $item->value1;?>" ></td>
                            <td width="*">&nbsp;</td>
                         </tr>
                         <?php }elseif($item->setting_type == 12 ){?>
                         <tr height="50px">
                            <td width="*">&nbsp;</td>
                            <td align="center"  width="200px"><strong style="font-size: 13px;">레벨3 달성포인트</strong></td>
			                <td align="left" width="250px"><input style="width:250px;" id = "third_point" setting_type="<?php echo $item->setting_type;?>" type="text" value="<?php echo $item->value1;?>" ></td>
                            <td width="*">&nbsp;</td>
                         </tr>
                         <?php }elseif($item->setting_type == 13){?>
                         <tr height="50px">
                            <td width="*">&nbsp;</td>
                            <td align="center" width="200px"><strong style="font-size: 13px;">레벨4 달성포인트</strong></td>
			                <td align="left" width="250px"><input style="width:250px;" id = "four_point" setting_type="<?php echo $item->setting_type;?>" type="text" value="<?php echo $item->value1;?>" ></td>
                            <td width="*">&nbsp;</td>
                         </tr>
                         <?php }elseif($item->setting_type == 14){?>
                         <tr height="50px">
                            <td width="*">&nbsp;</td>
                            <td align="center" width="200px"><strong style="font-size: 13px;">레벨5 달성포인트</strong></td>
			                <td align="left" width="250px"><input style="width:250px;" id = "five_point" setting_type="<?php echo $item->setting_type;?>" type="text" value="<?php echo $item->value1;?>" ></td>
                            <td width="*">&nbsp;</td>
                         </tr>
		   <tr style="height:30px; background:#ddd">
			 <td align="left" colspan="4" ><strong style="font-size: 13px;">현시설정</strong></td></tr>
			             <?php }elseif($item->setting_type == 32){ ?>
						 <tr height="50px">
                            <td width="*">&nbsp;</td>
                            <td align="center" width="200px"><strong style="font-size: 13px;">인증공원/먹튀리스트  현시행수</strong></td>
			                <td align="left" width="250px"><input style="width:250px;" id = "list_display" setting_type="<?php echo $item->setting_type;?>" class="setting_input" type="text" value="<?php echo $item->value1;?>" ></td>
                            <td width="*">&nbsp;</td>
                         </tr>
                         <?php }elseif($item->setting_type == 33){?>
                         <tr height="50px">
                            <td width="*">&nbsp;</td>
                            <td align="center" width="200px"><strong style="font-size: 13px;">먹튀검증 현시행수</strong></td>
			                <td align="left" width="250px"><input style="width:250px;" id = "check_list" setting_type="<?php echo $item->setting_type;?>" class="setting_input" type="text" value="<?php echo $item->value1;?>" ></td>
                            <td width="*">&nbsp;</td>
                         </tr>
                         <?php }elseif($item->setting_type == 34){ ?>
                         <tr height="50px">
                            <td width="*">&nbsp;</td>
                            <td align="center" width="200px"><strong style="font-size: 13px;">사진첩 현시행수</strong></td>
			                <td align="left" width="250px"><input style="width:250px;" id = "photo_list" setting_type="<?php echo $item->setting_type;?>" class="setting_input" type="text" value="<?php echo $item->value1;?>" ></td>
                            <td width="*">&nbsp;</td>
                         </tr>				   
                         <?php }elseif($item->setting_type == 100){?>
                         <tr height="50px">
                            <td width="*">&nbsp;</td>
                            <td align="center" width="200px"><strong style="font-size: 13px;">관리자 자동 이메일주소</strong></td>
			                <td align="left" width="250px"><input style="width:250px;" id = "admin_email" setting_type="<?php echo $item->setting_type;?>" class="setting_input" type="text" value="<?php echo $item->value1;?>" ></td>
                            <td width="*">&nbsp;</td>
                         </tr>
                         <?php }?>
                       <?php }?>
                         <tr height="20px;"><td width="*">&nbsp;</td></tr>
                      </table>
                 </div>            
             </td>
             <td width="50%;">
                <div style=" margin-left: 15px; margin-right:30px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                         <td>   
	                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
	                        <?php foreach($list as $keys => $item){ 
	                        	if($item->setting_type == 21){?>
	                          <tr>
	                              <td align="center" valign="top">
	                                    <div>
	                                       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #cdcdcd">
		   <tr style="height:30px; background:#ddd">
			 <td align="left" colspan="2" ><strong style="font-size: 13px;">인증공원 현시 설정</strong></td></tr>
										   
		                                        <tr height="35px;">
		                                           <td align="center" width="200px" style="border:1px solid #cdcdcd"><strong style="font-size:13px;">게시글페지</strong></td>
		                                           <td align="center" width="250px" style="border:1px solid #cdcdcd"><strong>인증공원현시</strong></td>
		                                        </tr>
		                                        <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">먹튀리스트</td>
		                                           <td width="250px" align="center" style="border:1px solid #cdcdcd"><input id = "mt_list" name="6" type="checkbox" 
		                                           	<?php if( substr_count($item->value1, ',6,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                        <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">먹튀검증요청</td>
		                                           <td width="250px" align="center" style="border:1px solid #cdcdcd"><input id = "mt_test" name="11" type="checkbox" <?php if( substr_count($item->value1, ',11,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                         <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">먹튀신고</td>
		                                           <td width="250px" align="center" style="border:1px solid #cdcdcd"><input id = "mt_singo" name="12" type="checkbox" <?php if( substr_count($item->value1, ',12,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                         <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">먹튀교환</td>
		                                           <td width="250px" align="center"><input id = "mt_change" name="13" type="checkbox" <?php if( substr_count($item->value1, ',13,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                         <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">픽스트zone-레전드pick</td>
		                                           <td width="250px" align="center" style="border:1px solid #cdcdcd"><input id = "zone1" name="16" type="checkbox" <?php if( substr_count($item->value1, ',16,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                         <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">픽스트zone-신출귀몰pick</td>
		                                           <td width="250px" align="center" style="border:1px solid #cdcdcd"><input id = "zone2" name="17" type="checkbox" <?php if( substr_count($item->value1, ',17,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                         <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">픽스트zone-1인자pick</td>
		                                           <td width="250px" align="center" style="border:1px solid #cdcdcd"><input id = "zone3" name="18" type="checkbox" <?php if( substr_count($item->value1, ',18,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                         <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">픽스트zone-빙고pick</td>
		                                           <td width="250px" align="center" style="border:1px solid #cdcdcd"><input id = "zone4" name="19" type="checkbox" <?php if( substr_count($item->value1, ',19,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                         <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">커뮤니티-자유게시판</td>
		                                           <td width="250px" align="center" style="border:1px solid #cdcdcd"><input id = "community_notice" name="21" type="checkbox" <?php if( substr_count($item->value1, ',21,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                        <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">커뮤니티-웃긴사진첩</td>
		                                           <td width="250px" align="center" style="border:1px solid #cdcdcd"><input id = "community_photo" name="22" type="checkbox" <?php if( substr_count($item->value1, ',22,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                        <tr height="25px;">
		                                           <td width="200px" align="center" style="border:1px solid #cdcdcd">고객센터</td>
		                                           <td width="250px" align="center" style="border:1px solid #cdcdcd"><input id = "guest_center" name="26" type="checkbox" <?php if( substr_count($item->value1, ',26,')>0){echo 'checked';}?>></td>
		                                        </tr>
		                                  </table>
		                               </div>
		                           </td> 
	                           </tr>
	                     </table>
	                    </td> 
                      </tr>
                      <tr><td width="*">&nbsp;</td></tr>
                      <tr>
                          <td>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:2px solid #cdcdcd">
		   <tr style="height:30px; background:#ddd">
			 <td align="left" colspan="2" ><strong style="font-size: 13px;">상세보기 및 날짜</strong></td></tr>
			                          <?php }elseif($item->setting_type == 22){?>
			                          <tr height="30px">
			                              <td align="center" width="200px"><strong style="font-size: 13px;">
										  로그인 후에만 상세보기 허용</strong></td>
						                  <td align="left" width="250px"><input style="width:250px;" id = "detail_see" type="checkbox" <?php if($item->value1 == 1){echo 'checked';}?> ></td> 
			                          </tr>
			                          <?php }elseif($item->setting_type == 23){?>
			                          <tr height="30px">
			                             <td align="center" width="200px;"><strong style="font-size: 13px;">새로운 게시글 표식 날짜</strong></td>
						                 <td align="left" width="250px"><input style="width:150px;" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" id = "notice_setting" name="notice" type="text" value="<?php echo $item->value1;?>"></td> 
			                          </tr>
			                          <?php }?>
			                          <?php if($item->setting_type == 24){?>
			                          <tr height="30px">
			                             <td align="center" width="200px"><strong style="font-size: 13px;">
										 채팅창 공지 현시 날짜</strong></td>
						                 <td align="left" width="250px"><input style="width:150px;" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" id = "chatting_see" type="text" value="<?php echo $item->value1;?>"></td> 
			                          </tr>
			                          <?php }?>
			                          <?php if($item->setting_type == 25){?>
									  <tr style="height:30px; background:#ddd">
			                             <td align="left" colspan="2" ><strong style="font-size: 13px;">채팅문자열 스타일</strong></td></tr>
			                          <tr height="30px">
			                             <td align="center" width="200px"><strong style="font-size: 13px;">레벨1</strong></td>
						                 <td align="left" width="250px"><input style="width:250px;<?php echo $item->value1;?>" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" id = "chatting_level1" 
										 	
										 	type="text" value="<?php echo $item->value1;?>">
										 	<img src="<?php print($_SERVER_URL); ?>images/style.gif" 
													onclick="subject_css(this, 'chatting_level1');" /></td>
			                          </tr>
			                          <?php }elseif($item->setting_type == 26){?>
			                          <tr height="30px">
			                             <td align="center" width="200px"><strong style="font-size: 13px;">레벨2</strong></td>
						                 <td align="left" width="250px"><input style="width:250px;<?php echo $item->value1;?>" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" id = "chatting_level2" 
										 
										 type="text" value="<?php echo $item->value1;?>">
										 	<img src="<?php print($_SERVER_URL); ?>images/style.gif" 
													onclick="subject_css(this, 'chatting_level2');" /></td>
			                          </tr>
			                          <?php }elseif($item->setting_type == 27){?>
			                          <tr height="30px">
			                             <td align="center" width="200px"><strong style="font-size: 13px;">레벨3</strong></td>
						                 <td align="left" width="250px"><input style="width:250px;<?php echo $item->value1;?>" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" id = "chatting_level3" 
										 
										 type="text" value="<?php echo $item->value1;?>">
										 	<img src="<?php print($_SERVER_URL); ?>images/style.gif" 
													onclick="subject_css(this, 'chatting_level3');" /></td>
			                          </tr>
			                          <?php }elseif($item->setting_type == 28){?>
			                          <tr height="30px">
			                             <td align="center" width="200px"><strong style="font-size: 13px;">레벨4</strong></td>
						                 <td align="left" width="250px"><input style="width:250px;<?php echo $item->value1;?>" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" id = "chatting_level4" 
										 
										 type="text" value="<?php echo $item->value1;?>">
										 	<img src="<?php print($_SERVER_URL); ?>images/style.gif" 
													onclick="subject_css(this, 'chatting_level4');" /></td>
			                          </tr>
			                          <?php }elseif($item->setting_type == 29){?>
			                          <tr height="30px">
			                             <td align="center" width="200px"><strong style="font-size: 13px;">레벨5</strong></td>
						                 <td align="left" width="250px"><input style="width:250px;<?php echo $item->value1;?>" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" id = "chatting_level5" 
										 
										 type="text" value="<?php echo $item->value1;?>">
										 	<img src="<?php print($_SERVER_URL); ?>images/style.gif" 
													onclick="subject_css(this, 'chatting_level5');" /></td>
			                          </tr>
			                          <?php }elseif($item->setting_type == 30){?>
			                          <tr height="30px">
			                             <td align="center" width="200px"><strong style="font-size: 13px;">VIP회원</strong></td>
						                 <td align="left" width="250px"><input style="width:250px;<?php echo $item->value1;?>" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" id = "chatting_level6" 
										 
										 type="text" value="<?php echo $item->value1;?>">
										 	<img src="<?php print($_SERVER_URL); ?>images/style.gif" 
													onclick="subject_css(this, 'chatting_level6');" /></td>
			                          </tr>
			                          <?php }elseif($item->setting_type == 31){?>
			                          <tr height="30px">
			                             <td align="center" width="200px"><strong style="font-size: 13px;">관리자</strong></td>
						                 <td align="left" width="250px"><input style="width:250px;<?php echo $item->value1;?>" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" id = "chatting_level7" 
										 
										 type="text" value="<?php echo $item->value1;?>">
										 	<img src="<?php print($_SERVER_URL); ?>images/style.gif" 
													onclick="subject_css(this, 'chatting_level7');" /></td>
			                          </tr>
			                          <?php }elseif($item->setting_type == 35){?>
			                          <tr height="30px">
			                             <td align="center" width="200px"><strong style="font-size: 13px;">채팅창 공지 문자열</strong></td>
						                 <td align="left" width="250px"><input style="width:250px;<?php echo $item->value1;?>" setting_type="<?php echo $item->setting_type; ?>" class="setting_input" id = "chatting_level9" 
										 
										 type="text" value="<?php echo $item->value1;?>">
										 	<img src="<?php print($_SERVER_URL); ?>images/style.gif" 
													onclick="subject_css(this, 'chatting_level9');" /></td>
			                          </tr>
			                          <?php }?>  
			                        <?php }?>
	 <tr style="height:30px;">
			 <td align="left" colspan="2" ><strong style="font-size: 13px;">&nbsp;</strong></td></tr>
			                  </table>
                         </td>
                    </tr>
                 </table>
             </div>    
          </td>
       </tr>              
</table>                         
<script>

    var _url_ajax_save = "<?php echo $_SERVER_URL; ?>admin/setting/ajax_item_save";

	 $(".setting_input").focus( function() { $(this).select(); });
	 $(".setting_input").blur( function(){
	 	   var _setting_type=$(this).attr('setting_type');
		    $.post(_url_ajax_save, 
			       { setting_type:_setting_type,value1:$(this).val()},
						 function(data) {

						 	//alert('data---');
						 });
	      
	     });

		
	 $(".setting_input").keyup( function(event) {
		 if (event.keyCode == 13) {
		 	   var _setting_type=$(this).attr('setting_type');
			    $.post(_url_ajax_save, 
				       { setting_type:_setting_type,value1:$(this).val()},
							 function(data) {
	
							 	//alert('data---');
							 });
		 }
	      
	     });

     $("#first_point").keyup( function(event){
    	 if (event.keyCode == 13) {
		 	 $("#first_point").blur();}
//    	 $.post(_url_ajax_save, 
//			       { setting_type:3,value1:1,value2:$("#snail_point").val()},
//						 function(data) {
//						 	//alert(data);
//						 });
//    	 }
     });
/*
     $("#snail_point").keyup( function(event){
    	 if (event.keyCode == 13) {
    	 $.post(_url_ajax_save, 
			       { setting_type:3,value2:$(this).val(),value1:$("#first_point").val()},
						 function(data) {
						 	//alert(data);
						 });
    	 }
     });
//*/
     $("#first_point").blur( function(){
    	 $.post(_url_ajax_save, 
			       { setting_type:3,value1:$(this).val(),value2:$("#snail_point").val()},
						 function(data) {
						 	//alert(data);
						 }); 
     });

     $("#second_point").keyup( function(event){
    	 var _setting_type=$(this).attr('setting_type');
    	 if (event.keyCode == 13) { 	
		 	 $("#second_point").blur();}
//         if(  ($(this).val() < $("#third_point").val())  )
//         {
//            $.post(_url_ajax_save, 
//        	    { setting_type:_setting_type,value1:$(this).val()},
//        		    function(data) {
//        			    //alert('data---');
//        			});
//         }else{ alert("등록 실패했습니다.");}}  
     });

     $("#second_point").blur( function(event){
    	 var _setting_type=$(this).attr('setting_type');
         if(	($(this).val()-0 < $("#third_point").val()-0)   )
         {
            $.post(_url_ajax_save, 
        	    { setting_type:_setting_type,value1:$(this).val()},
        		    function(data) {
        			    //alert('data---');
        			});
         }else{ alert("등록 실패했습니다.");}  
     });
     
     $("#third_point").keyup( function(){
    	 var _setting_type=$(this).attr('setting_type');
    	 if (event.keyCode == 13) {
				$("#third_point").blur();		 }
//         if(	($(this).val() > $("#second_point").val()) && 
//	 	($(this).val() < $("#four_point").val()) )
//         {
//            $.post(_url_ajax_save, 
//        	    { setting_type:_setting_type,value1:$(this).val()},
//        		    function(data) {
//        			    //alert('data---');
//        			});
//         }else{ alert("등록 실패했습니다.");}}
     });

     $("#third_point").blur( function(){
    	 var _setting_type=$(this).attr('setting_type');
         if(	($(this).val()-0 > $("#second_point").val()-0) && 
	 			($(this).val()-0 < $("#four_point").val()-0)  )
         {
            $.post(_url_ajax_save, 
        	    { setting_type:_setting_type,value1:$(this).val()},
        		    function(data) {
        			    //alert('data---');
        			});
         }else{ alert("등록 실패했습니다.");}
     });
     
     $("#four_point").keyup( function(){
    	 var _setting_type=$(this).attr('setting_type');
    	 if (event.keyCode == 13) {
		 	$("#four_point").blur(); }
//         if(	($(this).val() > $("#third_point").val()) && 
//	 	($(this).val() < $("#five_point").val() )    )
//         {
//            $.post(_url_ajax_save, 
//        	    { setting_type:_setting_type,value1:$(this).val()},
//        		    function(data) {
//        			    //alert('data---');
//        			});
//         }else{ alert("등록 실패했습니다.");}}
 
     });

     $("#four_point").blur( function(){
    	 var _setting_type=$(this).attr('setting_type');
         if( 	($(this).val()-0 > $("#third_point").val()-0) && 
	 	( $(this).val()-0 < $("#five_point").val()-0)    )
         {
            $.post(_url_ajax_save, 
        	    { setting_type:_setting_type,value1:$(this).val()},
        		    function(data) {
        			    //alert('data---');
        			});
         }else{ alert("등록 실패했습니다.");}
 
     });

     $("#five_point").keyup( function(){
    	 var _setting_type=$(this).attr('setting_type');
    	 if (event.keyCode == 13) {
		 $("#five_point").blur( );}
//         if(  ($(this).val() < $("#four_point").val() )  )
//         {
//            $.post(_url_ajax_save, 
//        	    { setting_type:_setting_type,value1:$(this).val()},
//        		    function(data) {
//        			    //alert('data---');
//        			});
//         }else{ alert("등록 실패했습니다.");}}

     });
     
      $("#five_point").blur( function(){
    	 var _setting_type=$(this).attr('setting_type');
         if(  ($(this).val()-0 > $("#four_point").val()-0)  )
         {
            $.post(_url_ajax_save, 
        	    { setting_type:_setting_type,value1:$(this).val()},
        		    function(data) {
        			    //alert('data---');
        			});
         }else{ alert("등록 실패했습니다.");}

     });
     
/*
     $("#snail_point").blur( function(){
    	 $.post(_url_ajax_save, 
			       { setting_type:3,value2:$(this).val(),value1:$("#first_point").val()},
						 function(data) {
						 	//alert(data);
						 });

     });
     //*/
	$("#detail_see").click( function() {
		var v = document.getElementById('detail_see'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       {setting_type: 22, value1 : flag},
						 function(data) {});
    });

	$("#mt_list").click( function(){
		var v = document.getElementById('mt_list'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       {setting_type: 21, value1:$("#mt_list").attr('name'),value2:flag},
						 function(data) {});
	});

	$("#mt_test").click( function(){

		var v = document.getElementById('mt_test'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       { setting_type: 21, value1 : $("#mt_test").attr('name'),value2:flag},
						 function(data) {});
	});

	$("#mt_singo").click( function(){

		var v = document.getElementById('mt_singo'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       { setting_type: 21, value1 : $("#mt_singo").attr('name'),value2:flag},
						 function(data) {});

	});

	$("#mt_change").click( function(){
        
		var v = document.getElementById('mt_change'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       { setting_type: 21, value1 : $("#mt_change").attr('name'),value2:flag},
						 function(data) {});

	});

	$("#zone1").click( function(){

		var v = document.getElementById('zone1'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       { setting_type: 21, value1 : $("#zone1").attr('name'),value2:flag},
						 function(data) {});

	});

	$("#zone2").click( function(){

		var v = document.getElementById('zone2'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       { setting_type: 21, value1 : $("#zone2").attr('name'),value2:flag},
						 function(data) {});

	});

	$("#zone3").click( function(){

		var v = document.getElementById('zone3'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       { setting_type: 21, value1 : $("#zone3").attr('name'),value2:flag},
						 function(data) {});

	});

	$("#zone4").click( function(){

		var v = document.getElementById('zone4'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       { setting_type: 21, value1 : $("#zone4").attr('name'),value2:flag},
						 function(data) {});

	});

	$("#community_notice").click( function(){

		var v = document.getElementById('community_notice'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       { setting_type: 21, value1 : $("#community_notice").attr('name'),value2:flag},
						 function(data) {});

	});

	$("#community_photo").click( function(){

		var v = document.getElementById('community_photo'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       { setting_type: 21, value1 : $("#community_photo").attr('name'),value2:flag},
						 function(data) {});

	});

	$("#guest_center").click( function(){

		var v = document.getElementById('guest_center'); 
		var flag = 0;;
		if(v.checked == true)
		{
          flag = 1;
		}
		else
	    {
          flag = 0;
		}	
		$.post(_url_ajax_save, 
			       { setting_type: 21, value1 : $("#guest_center").attr('name'),value2:flag},
						 function(data) {});

	});
	
	
	function subject_css(v, ctrlID)
	{
		var vLeft = getLeft(v);
		var vTop = getTop(v);
		Layer.init('<?php print($_SERVER_URL); ?>admin/style?ctrl='+ctrlID+'&ctrlStyle='+ctrlID,375,170, vLeft, vTop);
	}	
</script>     