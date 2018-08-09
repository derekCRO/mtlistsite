<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0"
		style="background:#F8F8F8;">
          <tr>
            <td style="width: 100px; vertical-align:middle;">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 300px; ">
            		<?php if($notice_type == 6){ echo "먹튀리스트";} ?> 
					<?php if($notice_type == 11){ echo "먹튀검증요청";} ?> 
            		<?php if($notice_type == 12){ echo "먹튀신고";} ?>
            		<?php if($notice_type == 13){ echo "교환";} ?>
            		<?php if($notice_type == 2){ echo "인증공원";} ?>
            	</div>
            </td>            
          </tr>
          <tr>
              <td align="center">
              	<form action="<?php echo $_SERVER_URL; ?>admin/mtlist/save" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	              <table width="950px" border="0" cellspacing="0" cellpadding="0">
	              <tr>
	                <td bgcolor="#e0e0e0"><table width="100%" border="0" cellspacing="1" cellpadding="0">
	                	<input type="hidden" id="idx" name="idx" value="<?php echo $info->idx; ?>">
	                    <input type="hidden" id="notice_type" name="notice_type" value="<?php echo $notice_type; ?>">
	                    <tr>
	                      <td width="15%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 제목</strong></td>
	                      <td width="85%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px">
	                      	<input type="text" id="title" name="title" cols="120" rows="1" style="width:99%;border-radius: 4px;"
	                      		value="<?php echo $info->title; ?>">
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
	                      <td width="15%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 사이트이름</strong></td>
	                      <td width="85%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px">
	                      	<input type="text" id="site_name" name="site_name"  
	                      		value="<?php echo $info->site_name; ?>"
								placeholder="사이트이름은 6글자이하로 하나만 입력하세요. 예)베팅온"
	                      		style="width:99%;border-radius: 4px;" />
	                      </td>
	                    </tr>
	                    <tr>
	                      <td width="15%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 사이트주소</strong></td>
	                      <td width="85%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px">
	                      	<input type="text" id="site_url" name="site_url" cols="120" rows="1" 
	                      		style="width:99%;border-radius: 4px;"
								placeholder="사이트주소는 http://를 포함하여 하나만 적어주세요. 예) http://www.google.com"
	                      		value="<?php echo $info->site_url; ?>" >
	                      </td>
	                    </tr>
	                    <tr>
	                      <td width="15%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 파일첨부</strong></td>
	                      <td width="85%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px"><table width="90%" border="0" cellspacing="0" cellpadding="0">
	                        <tr>
	                          <td><table width="80" border="0" cellspacing="0" cellpadding="0">
	                            <tr>
	                              <td align="center" onclick="OnFileOpen();"><DIV><A class="subbtn" href="#">스크린샷</A></DIV></td>
	                            </tr>
	                          </table></td>
	                          <td width="97%" id="filepath" name="filepath" style="color: #000000;padding-left:12px">
	                          		<?php if($info->file_path == ''){
	                          			echo "파일 첨부 버튼을 클릭하세요.";
	                          		}else{ 
	                          			echo $info->file_path;
	                          		}?> 	                          	
	                          		<input type="hidden" id = "file_path" name="file_path" value="<?php echo $info->file_path;?>" >
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
	                            	href="<?php echo $_SERVER_URL; ?>admin/mtlist?notice_type=<?php echo $notice_type; ?>">취소하기</A></DIV></td>
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
		
		
        if($("#site_name").val()==""){
			alert("사이트이름을 입력하세요.");
        	return;
        }
        if($("#site_url").val()==""){
			alert("사이트주소를 입력하세요.");
        	return;
        }
    	$("form").submit();
    	 
    }
</script>

	