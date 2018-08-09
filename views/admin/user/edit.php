<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#F8F8F8;">
          <tr>
            <td style="width: 100px; vertical-align:middle;" class="content3">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 250px; font-size:20px;">
            	   <?php if($type == 1){ ?>
            	   <strong>관리자등록</strong>
            	   <?php }else{?> <strong>회원관리</strong><?php }?>
            	   </div>
            </td>
          </tr>  
          
           <tr>
            <td>
            <form action="<?php echo $_SERVER_URL; ?>admin/admin/save" enctype="multipart/form-data" method="post" accept-charset="utf-8">
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="subbg">
	              <tr>
	                <td>
	                	<input type="hidden" id="user_type" name="user_type" value="<?php echo $type;?>"> 
						<table width="100%" border="0" cellspacing="0" cellpadding="0" name="<?php echo $info->user_type;?>" id="change_list">
		                    <tr>
		                      <td height="35" align="center" class="content"  style="border:1px solid #cdcdcd"  >
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			                          <tr width="*"><td>&nbsp;</td></tr>
			                          <tr height="45">
			                             <td align="right" class="content3" width="600px;"><strong>아이디</strong></td>
			                             <td style="padding-left: 25px;">
			                             	<input type="hidden" id="idx" name="idx" value="<?php echo $info->idx; ?>">
			                             	<input id = "login_id" name="login_id" type="text" class="span6" value="<?php echo $info->login_id; ?>"></td>
			                          </tr>			                          
			                          <tr height="45">
			                             <td align="right" class="content3" width="600px;">
			                             	<strong><?php if($type == 1){ echo '이름'; }else{echo '닉네임';} ?></strong></td>
			                             <td style="padding-left: 25px;"><input id = "login_name" name="login_name" type="text" class="span6" 
			                             	value="<?php echo $info->name; ?>"></td>
			                          </tr>
			                          
			                          <tr height="45">
			                             <td align="right" class="content3" width="600px;"><strong>이메일주소</strong></td>
			                             <td style="padding-left: 25px;"><input id = "email" name = "email" type="text" class="span6" value="<?php echo $info->email; ?>"></td>
			                          </tr>
			                          <tr height="45">
			                             <td align="right" class="content3" width="600px;"><strong>새 비밀번호</strong></td>
			                             <td style="padding-left: 25px;"><input id = "pwd_new" name = "pwd_new" type="password" class="span6"></td>
			                          </tr>
			                          <tr height="45">
			                             <td align="right" class="content3" width="600px;"><strong>비밀번호확인</strong></td>
			                             <td style="padding-left: 25px;"><input id = "pwd_confirm" type="password" class="span6"></td>
			                          </tr>
			                          <tr height="45">
			                             <td align="right" class="content3"><strong>마지막 로그인IP주소</strong></td>
			                             <td style="padding-left:25px;"><input id="last_loginip" type="text" class="span6" value="<?php echo $info->points;?>"></td>
			                          </tr>
			         <?php if($type == 2) {?>
			                          <tr height="45">
			                             <td align="right" class="content3"><strong>포인트수</strong></td>
			                             <td style="padding-left:25px;"><input id="points" type="text" class="span6" value="<?php echo $info->points;?>"></td>
			                          </tr>
			                          <tr height="45">
			                             <td align="right" class="content3"><strong>게시글수</strong></td>
			                             <td style="padding-left:25px;"><input id="notice_qty" type="text" class="span6" value="<?php echo $info->notice_qty;?>"></td>
			                          </tr>
			                          <tr height="45">
			                             <td align="right" class="content3"><strong>댓글수</strong></td>
			                             <td style="padding-left:25px;"><input id="reply_qty" type="text" class="span6" value="<?php echo $info->reply_qty;?>"></td>
			                          </tr>
			                         <tr height="45" id="level_type">
			                             <td align="right" class="content3" width="600px;"><strong>레벨</strong></td>
			                             <td style="padding-left: 25px;">
			                               <select id="level_type" name="level_type" class="input" style="width: 150px;">
			                                 <option value="1" <?php if($info->level_type == 1){echo "selected='selected'";}else {echo '';}?>>레벨 1</option>
			                                 <option value="2" <?php if($info->level_type == 2){echo "selected='selected'";}else {echo '';}?>>레벨 2</option>
			                                 <option value="3" <?php if($info->level_type == 3){echo "selected='selected'";}else {echo '';}?>>레벨 3</option>
			                                 <option value="4" <?php if($info->level_type == 4){echo "selected='selected'";}else {echo '';}?>>레벨 4</option>
			                                 <option value="5" <?php if($info->level_type == 5){echo "selected='selected'";}else {echo '';}?>>레벨 5</option>
			                                 <option value="6" <?php if($info->level_type == 6){echo "selected='selected'";}else {echo '';}?>>VIP</option>
			                               </select>
			                             </td>
			                         </tr>
			              <?php }?>
			                          <tr height="45">
			                             <td align="right"><div id = "save_btn" style="width:80px;"><a class="join_btn" href="#">등록하기</a></div></td>
					                     <td style="padding-left: 30px;"><div style="width:80px;">
					                         <?php if($type == 1){ ?>
					                         <a class="join_btn" href="<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=1">취소하기</a>
							                 <?php }else{?>
							                 <a class="join_btn" href="<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=2">취소하기</a>
					                         <?php }?>
					                         </div>
							             </td> 
			                          </tr>
			                          <tr width="*"><td>&nbsp;</td></tr>
			                      </table>
			                  </td>
		                    </tr>
		               </table>
	                 </td>
	               </tr>
	               <tr>
	                 <td>&nbsp;</td>
	               </tr>
               </table>
            </form>
		    </td>
		  </tr>
</table>

<script>
	function OnFileOpen()
	{
	    document.getElementById("fileOpen").click();
	}
	
	$('#fileOpen').change( function(){
		
		//$("#admin_icon").val(document.getElementById("fileOpen").value);
		if(document.getElementById("fileOpen").value!='')
			$("#filepath").html(document.getElementById("fileOpen").value);
		else
			$("#filepath").html('파일 첨부 버튼을 클릭해주세요.');		
		
	});
	
	$('#save_btn').click(function() {	
		var user_type = <?php echo $type; ?>;
			 
		if($('#login_id').val().length < 3){
			alert("로그인아이디는 최소 3자이상 입력하세요.");
			return;
		}		

		if($('#login_name').val()==""){
			alert("네임을 입력하세요.");
			return;
		}	
		if($("#email").val().indexOf('@') <=0 || $("#email").val().indexOf('@')>= $("#email").val().length){
			alert("이메일주소를 입력하세요.");
			return;
		}
		
		var idx_ = '<?php echo $info->idx; ?>'-0;
		if(idx_==0)
		{
			if($('#pwd_new').val()==""){
				alert("비밀번호를 입력하세요.");
				return;
			}
			
			if($('#pwd_confirm').val()!=$('#pwd_new').val()){
				alert("비밀번호를 다시 한번 확인해주세요.");
				return;
			}
		}
			
			
			$.post("<?php echo $_SERVER_URL; ?>admin/admin/exist_check", 
					{	//아이디 및 네임중복검사
				         idx:idx_,
						 login_id :$('#login_id').val(),
				         name:$('#login_name').val(),
				         user_type:user_type}, 
				function(data) {	
		           	if(data.substring(data.length-2) == 'ok')
			        {	//아이디 또는 네임이 중복되지 않았으면			 						 
		           		$("form").submit();
		           	}else if(data.substring(data.length-2) == '-1'){
						alert("로그인아이디 중복");
		           	}else{
						alert("이름 중복");
		           	}
					 
			});	
		
   });

</script>

	