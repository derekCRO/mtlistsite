<?php global $_SERVER_URL;?>
<body style="background:#f8f8f8;">
<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td height="80">
		<?php if($notice_type==11) { ?>
		<img src="<?php echo $_SERVER_URL;?>images/title_04.png" height="56" >
		<?php } else { ?>
		<img src="<?php echo $_SERVER_URL;?>images/title-report.png" height="56" >
		<?php } ?>
		</td>
  </tr>
  <tr>
	<td>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td bgcolor="#e0e0e0">
			<form 	action="<?php echo $_SERVER_URL; ?>contents/mtrequest/save" 
					enctype="multipart/form-data" method="post" accept-charset="utf-8">
					<input type="hidden" id="idx" name="idx" value="<?php echo $info->idx; ?>">
					<input type="hidden" id="notice_type" name="notice_type" value="<?php echo $notice_type; ?>" />
			<table width="100%" border="0" cellspacing="1" cellpadding="0" 
				style="border-top:solid 1px #ddd;border-left:solid 1px #ddd;">
			<tr>
			  <td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" 
					style="padding-left:20px;
						border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
				
				<strong><img src="<?php echo $_SERVER_URL;?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 제목</strong></td>
			  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" 
					style="padding-left:10px;
						border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
				<input id="title" name="title" 
					value="<?php echo $info->title; ?>" style="width:97%;border-radius: 4px; height:26px;" /></td>
			</tr>
			
			<tr>
			  <td height="40" align="left" bgcolor="#f7f7f7" class="content3" 
					style="padding-left:20px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
					<strong><img src="<?php echo $_SERVER_URL;?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle" /> 사이트이름</string></td>
			  <td align="left" bgcolor="#FFFFFF" class="content3" 
					style="padding-left:10px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
					<input id="site_name" name="site_name" 
						 placeholder="사이트이름은 6글자 이하로 하나만 적어주세요. 예) 베팅온"
						value="<?php echo $info->site_name; ?>" style="width:97%;border-radius: 4px; height:26px;" />
			  </td>
			  </tr>
			<tr>
			  <td height="40" align="left" bgcolor="#f7f7f7" class="content3" 
					style="padding-left:20px;
						border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;"><strong><img src="<?php echo $_SERVER_URL;?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 사이트주소</strong></td>
			  <td align="left" bgcolor="#FFFFFF" class="content3" 
					style="padding-left:10px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
					<input id="site_address" name="site_address"
						placeholder="사이트주소는 html:// 포함하여 하나만 적어주세요."
						value="<?php echo $info->site_url; ?>" style="width:97%;border-radius: 4px; height:26px;" />
			  </td>
			  </tr>
			  
			<tr>
			  <td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" 
						style="padding-left:20px;
						border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;"><strong><img src="<?php echo $_SERVER_URL;?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 내용</strong></td>
			  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" 
							style="padding-left:10px;padding-top:10px;padding-bottom:10px;
						border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
							<input type="hidden" id="htmlContent" name="htmlContent" value="" />
							<textarea id="content" name="content" cols="120" rows="7" 
									style="width:97%;border-radius: 4px; height:300px;"><?php echo $info->content; ?></textarea></td>
			</tr>

			<tr>
			  <td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" 
						style="padding-left:20px;
						border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;"><strong><img src="<?php echo $_SERVER_URL;?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle">스크린샷</strong></td>
			  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" 
						style="padding-left:10px;
						border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
				<table width="90%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td><table width="80" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td align="center" onClick="OnFileOpen();"><DIV><A class="subbtn" href="#">파일첨부</A></DIV></td>
					</tr>
				  </table></td>
				  <td width="97%" id="filepath" style="color:#000; padding-left:20px;">
					  <?php if($info->file_path == ''){
		              	echo "파일 첨부 버튼을 클릭하세요.";
		              }else{ 
		              	echo $info->file_path;
		              }?> 	                          	
	               		<input type="hidden" id = "file_path" name="file_path" value="<?php echo $info->file_path;?>" >
				  	</td>
				  
				</tr>
			  </table>	<div style="display: none;">
					<input type="file" id="fileOpen" name="fileOpen" value="" />
	                </div>		  </td>
			</tr>
		</table>
		</form>
		</td>
	  </tr>
	  <tr>
		<td height="60" align="center"><table width="200" border="0" cellspacing="5" cellpadding="0">
			<tr>
			  <td><table width="100" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="center" onClick="save();"><DIV><A class="join_btn" href="#">등록하기</A></DIV></td>
				  </tr>
			  </table></td>
			  <td><table width="100" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="center"><DIV><A class="cancel_btn" onClick="window.history.back(-2);">취소하기</A></DIV></td>
				  </tr>
			  </table></td>
			</tr>
		</table></td>
	  </tr>
	</table>
   </td>
  </tr>
 </table>
</body>
<script>
	var htmlEditor;
	$(document).ready(function () {
		htmlEditor = new nicEditor({fullPanel : true}).panelInstance('content');
	});
	
	//htmlEditor.removeInstance('content');
	
function OnFileOpen()
{
	document.getElementById("fileOpen").click();
}

$('#fileOpen').change( function(){         
	if(document.getElementById("fileOpen").value!='')
		$("#filepath").html(document.getElementById("fileOpen").value);
	else
		$("#filepath").html('파일 첨부 버튼을 클릭해주세요.');
});

 function save(){       
 		//alert(htmlEditor.getContent() ); return;
		/*
		var sss;
		for(sss in htmlEditor)
		{
			if(confirm(sss))	break;
		}
		
		alert($("div.nicEdit-main").html());
		return;
		//*/
 		if($("#site_name").val()==""){
        	//$.messager.alert("알림", "제목을 입력하세요.", "info");
			alert("사이트 이름을 입력하세요.");
        	return;
        }
 		if($("#site_address").val().length<10){
        	//$.messager.alert("알림", "제목을 입력하세요.", "info");
			alert("사이트 주소를 입력하세요.");
        	return;
        }
 		if(	$("#site_address").val().substring(0,7)!="http://" &&
			$("#site_address").val().substring(0,7)!="Http://" &&
			$("#site_address").val().substring(0,7)!="HTTP://" ){
        	//$.messager.alert("알림", "제목을 입력하세요.", "info");
			alert("사이트 주소를 정확히 입력하세요.");
        	return;
        }
		
        if($("#title").val()==""){
        	//$.messager.alert("알림", "제목을 입력하세요.", "info");
			alert("제목을 입력하세요.");
        	return;
        }
        //if($("#content").val()==""){
		if($("div.nicEdit-main").html()==""){
        	//$.messager.alert("알림", "내용을 입력하세요.", "info");
			alert("내용을 입력하세요.");
        	return;
        }
		
		$("#htmlContent").val($("div.nicEdit-main").html());
		
        var date = "<?php echo date("Y-m-d"); ?>";				 
		parent.$("#attend_check").html("출첵입니다 "+date);
    	$("form").submit();
    	 
    }
</script>
		