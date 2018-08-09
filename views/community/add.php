<?php global $_SERVER_URL;?>

<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td height="80" align="left">
	
			<img src="<?php echo $_SERVER_URL;?>images/<?php
				 if($notice_type==13) 				print('title-exchange.png');
				 else if($notice_type==12)          print('title-report.png');
				 else if($notice_type==11)          print('title_04.png');
				 else if($notice_type==21)          print('title_03.png');
				 else if($notice_type==22)          print('title_06.png');
				 else if($notice_type==23)          print('title_08.png');
				 else 				         		print('title_05.png');
					 ?>" height="56">
			
			</td>
  </tr>
  <tr>
	<td>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td bgcolor="#e0e0e0">
			<form action="<?php echo $_SERVER_URL; ?>contents/common/ajax_notice_add"
					enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<input type="hidden" id="idx" name="idx" value="<?php echo $info->idx; ?>">
				<input type="hidden" id="notice_type" name="notice_type" value="<?php echo $notice_type; ?>" />
				<input type="hidden" id="submit_url" name="submit_url" 
						value="<?php echo $_SERVER_URL; ?>contents/community?type=<?php echo $notice_type; ?>" />
				<table width="100%" border="0" cellspacing="1" cellpadding="0" 
					style="border-top:solid 1px #ddd;border-left:solid 1px #ddd;">
				<tr>
				  <td width="82%" height="40" align="left" bgcolor="#FFFFFF" class="content3" 
						style="padding-left:10px;
							border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
					<input type="text" id="title" name="title"  placeholder="제목"
						value="<?php echo $info->title; ?>" style="width:99%;border-radius: 4px;" /></td>
				</tr>
				<tr>
				  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" 
								style="padding-left:10px;padding-top:10px;padding-bottom:10px;
							border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
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
				  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" 
							style="height: 40px; padding-left:10px;
							border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
					<table width="90%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td><table width="80" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td align="center" onClick="OnFileOpen();"><DIV><A class="subbtn" href="#">파일첨부</A></DIV></td>
						</tr>
					  </table></td>
					  <td width="97%" style="color:#000000; padding-left:20px;" id="filepath">
						  	<?php if($info->file_path == ''){
				              	echo "파일 첨부 버튼을 클릭하세요.";
				              }else{ 
				              	echo $info->file_path;
				              }?> 
				              <input type="hidden" id = "file_path" name="file_path" value="<?php echo $info->file_path;?>" >
						</td>
					  <td style="display: none;">	                          	
							<input type="file" id="fileOpen" name="fileOpen" />
						</td>
					</tr>
				  </table>
				  </td>
				</tr>
	
			</table></form></td>
		  </tr>
		  <tr>
			<td height="60" align="center"><table width="200" border="0" cellspacing="5" cellpadding="0">
				<tr>
				  <td><table width="100" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td align="center" onClick="save()" ><DIV><A class="join_btn" href="#">등록하기</A></DIV></td>
					  </tr>
				  </table></td>
				  <td><table width="100" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td align="center"><DIV><A class="cancel_btn" onClick="window.history.back(-1);">취소하기</A></DIV></td>
					  </tr>
				  </table></td>
				</tr>
			</table></td>
		  </tr>
		</table>
	  
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
		if(document.getElementById("fileOpen").value!='')
			$("#filepath").html(document.getElementById("fileOpen").value);
		else
			$("#filepath").html('파일 첨부 버튼을 클릭해주세요.');		
    });


    function save(){       
        if($("#title").val()==""){
        	//$.messager.alert("알림", "제목을 입력하세요.", "info");
			alert( "제목을 입력하세요.");
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
		
		var date = "<?php echo date("Y-m-d"); ?>";				 
		$("#attend_check").html("출첵입니다 "+date);	//parent.
    	$("form").submit();
    	 
    }
</script>
		
