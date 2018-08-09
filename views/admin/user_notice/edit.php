<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0"
		style="background:#F8F8F8;">
          <tr>
            <td style="width: 100px; vertical-align:middle;">
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
            		<?php if($notice_type == 26){ echo "고객센터";} ?> </div>
            </td>            
          </tr>
          <tr>
              <td align="center">
              	<form action="<?php echo $_SERVER_URL; ?>admin/user_notice/save?idx=<?php echo $info->idx;?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	              <table width="950px" border="0" cellspacing="0" cellpadding="0">
	              <tr>
	                <td bgcolor="#e0e0e0">
						
						<table width="100%" border="0" cellspacing="1" cellpadding="0">
						<?php  if(  $info && 
							($notice_type==16 || $notice_type==17 || $notice_type==18 || $notice_type==10) ){ ?>
	                    <tr>
	                      <td width="15%" height="40" align="left" bgcolor="#f7f7f7"
						  		class="content3" style="padding-left:20px">
							  <strong>
							  <img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" 
									width="14" height="15" align="absmiddle" /> 결과</strong></td>
	                      <td width="85%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px">
								<input id="unknown" <?php if($info->isgoal==0) print('checked'); ?>
									type="checkbox" class="chkGoal" value="0" style="cursor:pointer;"/>
									<label for="unknown" style="cursor:pointer;">미정</label>
						  		<input id="goal"    <?php if($info->isgoal==1) print('checked'); ?>
									 name="goal" type="checkbox" class="chkGoal" value="1" style="cursor:pointer;"/>
									<label for="goal" style="cursor:pointer;">적중</label>
								<input id="goalout"	<?php if($info->isgoal==2) print('checked'); ?>
									 name="goalout" type="checkbox" class="chkGoal"value="1" style="cursor:pointer;" />
									<label for="goalout" style="cursor:pointer;">미적중</label>
	                      </td>
	                    </tr>
						<?php  } ?>
	                    <tr>
	                      <td width="15%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 제목</strong></td>
	                      <td width="85%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px">
	                      	<input type="hidden" id="notice_type" name="notice_type" value="<?php echo $notice_type; ?>" />
	                      	<input type="hidden" id="write_id" name="write_id" value="<?php echo $info->write_id; ?>" />
	                      	<input type="hidden" id="is_secret" name="is_secret" value="<?php echo $info->is_secret; ?>" />
	                      	<input type="text" id="title" name="title" value="<?php echo $info->title; ?>" cols="120" rows="1" style="width:95%;border-radius: 4px;" />
							<input type="hidden" id="title_style" name="title_style" value="<?php echo $info->title_style; ?>" />
							<img src="<?php print($_SERVER_URL); ?>images/style.gif" 
								onclick="subject_css(this);" />
	                      </td>
	                    </tr>
	                    <tr>
	                      <td width="15%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 내용</strong></td>
	                      <td width="85%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px;padding-top:10px;padding-bottom:10px">	                      	 
						  	 <input type="hidden" id="htmlContent" name="htmlContent" value="" />
							<?php
								$oFCKeditor = new FCKeditor('fckContent') ;
								$oFCKeditor->BasePath	= $_SERVER_URL."fckeditor/" ;
								$oFCKeditor->Height		= '350px';
								$oFCKeditor->Value		= $info->content;
								$oFCKeditor->Create() ;
							?>
	                      </td>
	                    </tr>
	                    <tr>
	                      <td width="15%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 파일첨부</strong></td>
	                      <td width="85%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px"><table width="90%" border="0" cellspacing="0" cellpadding="0">
	                        <tr>
	                          <td><table width="80" border="0" cellspacing="0" cellpadding="0">
	                            <tr>
	                              <td align="center" onclick="OnFileOpen();"><DIV><A class="subbtn" href="#">파일첨부</A></DIV></td>
	                            </tr>
	                          </table></td>
	                          <td width="97%" id="filepath" name="filepath" style="color: #000000;padding-left:12px">
	                          		파일 첨부 버튼을 클릭하세요.	                          	
	                          </td>
	                          <td style="display: none;">	                          	
							  		<div>style="display: none;"
	                          		<input type="file" id="fileOpen" name="fileOpen" /></div>
	                          	</td>
	                        </tr>
	                      </table></td>
	                    </tr>
	
	                </table></td>
	              </tr>
	              <tr>
	                <td height="60" align="center"><table width="200" border="0" cellspacing="5" cellpadding="0">
	                    <tr>
	                      <td><table width="100" border="0" cellspacing="0" cellpadding="0">
	                          <tr>
	                            <td align="center" onclick="save();"><DIV><A class="join_btn" href="#">등록하기</A></DIV></td>
	                          </tr>
	                      </table></td>
	                      <td><table width="100" border="0" cellspacing="0" cellpadding="0">
	                          <tr>
	                            <td align="center"><DIV><A class="join_btn" 
	                            	href="<?php echo $_SERVER_URL; ?>admin/user_notice">취소하기</A></DIV></td>
	                          </tr>
	                      </table></td>
	                    </tr>
	                </table></td>
	              </tr>
	            </table>
	            </form>
              </td>
          </tr>
		</table>

<script>
	var htmlEditor;
	$(document).ready(function () {
		htmlEditor = new nicEditor({fullPanel : true}).panelInstance('content');
	});


	function OnFileOpen()
	{
	    document.getElementById("fileOpen").click();
	}

    $('#fileOpen').change( function(){         
		//$("#filepath").html(document.getElementById("fileOpen").value);
		if(document.getElementById("fileOpen").value!='')
			$("#filepath").html(document.getElementById("fileOpen").value);
		else
			$("#filepath").html('파일 첨부 버튼을 클릭해주세요.');		
    });


    function save(){       
        if($("#title").val()==""){
        	//$.messager.alert("알림", "제목을 입력하세요.", "info");
			alert("제목을 입력하세요.");
        	return;
        }
//        if($("#content").val()==""){
//        	//$.messager.alert("알림", "내용을 입력하세요.", "info");
//			alert("내용을 입력하세요.");
//        	return;
//        }
        if($("div.nicEdit-main").html()==""){
        	//$.messager.alert("알림", "내용을 입력하세요.", "info");
			alert("내용을 입력하세요.");
        	return;
        }
		$("#htmlContent").val($("div.nicEdit-main").html());
		

    	$("form").submit();
    	 
    }

function subject_css(v)
{
	var vLeft = getLeft(v);
	var vTop = getTop(v);
	Layer.init('<?php print($_SERVER_URL); ?>admin/style',375,170, vLeft, vTop);
}	

	$(".chkGoal").change( function() {
		$(".chkGoal").removeAttr('checked', '');
		$(this ).attr('checked', 'checked');
	});
</script>

	