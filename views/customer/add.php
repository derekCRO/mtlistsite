<?php global $_SERVER_URL; ?>

<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#F8F8F8;">
  <tr>
	<td style="width: 100px; vertical-align:middle;">
		<img src="<?php echo $_SERVER_URL; ?>images/title_09.png" 
			style="margin-left: 20px; margin-top:10px; float: left">
	</td>            
  </tr>
  <tr>
	  <td align="center">
		
		  <table width="850px" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td bgcolor="#e0e0e0" >
			
			<form action="<?php echo $_SERVER_URL; ?>contents/common/ajax_notice_add"
					enctype="multipart/form-data" method="post" accept-charset="utf-8">
			  	<input type="hidden" id="idx" name="idx" value="<?php echo $info->idx; ?>">
			  	<input type="hidden" id="notice_type" name="notice_type" value="<?php echo $notice_type; ?>" />
				<input type="hidden" id="submit_url" name="submit_url" 
						value="<?php echo $_SERVER_URL; ?>contents/customer?type=<?php echo $notice_type; ?>" />			
				<table width="100%" border="0" cellspacing="1" cellpadding="0" 
						style="border-top:solid 1px #ddd;border-left:solid 1px #ddd;">
				<tr>
				  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" 
					style="padding-left:10px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;
							height: 40px">
					<input type="text" id="title" name="title" placeholder="제목"
						value="<?php echo $info->title; ?>" style="width:99%;border-radius: 4px;height: 25px" />
				  </td>
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
						//$oFCKeditor->Config['UserFilesPath']= $_SERVER_URL."uploads";
						$oFCKeditor->Create() ;
					?>          	 
					<!-- <textarea id="content" name="content" cols="120" rows="7" 
						style="width:98.5%;border-radius: 4px; height:300px"><?php echo $info->content; ?></textarea> -->
						
				</td>
				</tr>
				<tr>
				  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" 
					style="height: 40px; padding-left:10px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td width="85"><table width="80" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td align="center" onClick="OnFileOpen();"><DIV><A class="subbtn" href="#">파일첨부</A></DIV></td>
						</tr>
					  </table></td>
					  <td width="60%" id="filepath" name="filepath" style="color: #000000;padding-left:12px">
							<?php if($info->file_path == ''){
				              	echo "파일 첨부 버튼을 클릭하세요.";
				              }else{ 
				              	echo $info->file_path;
				              }?> 
					  </td>
					  <td align="right" style="padding-right: 17px">
					  		비밀글로 하시려면
						  	<input type="checkbox" id="is_secret" name="is_secret" 
						  		<?php if($info->is_secret){?> checked<?php }?> >
					  </td>
					  <td style="display: none;">	                          	
							<input type="file" id="fileOpen" name="fileOpen" >
						</td>
					</tr>
				  </table></td>
				</tr>

			</table></form></td>
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
						<td align="center"><DIV><A class="cancel_btn" href="<?php echo $_SERVER_URL; ?>contents/customer?notice_type=<?php echo $notice_type; ?>">취소하기</A></DIV></td>
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

        var date = "<?php echo date("Y-m-d"); ?>";				 
		$("#attend_check").html("출첵입니다 "+date);	//parent.
    	$("form").submit();
    	 
    }
</script>

	