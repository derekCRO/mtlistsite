<?php global $_SERVER_URL; ?>

<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#F8F8F8;">
  <tr>
	<td style="width: 100px; vertical-align:middle;">
		<img src="<?php echo $_SERVER_URL; ?>images/title_10.png" 
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
				<input type="hidden" id="notice_type" name="notice_type" value="<?php echo $notice_type; ?>" />
				<input type="hidden" id="submit_url" name="submit_url" value="<?php echo $_SERVER_URL; ?>contents/zone?type=<?php echo $notice_type; ?>" />
				<table width="100%" border="0" cellspacing="1" cellpadding="0" 
						style="border-top:solid 1px #ddd;border-left:solid 1px #ddd;">
				<!--<tr>
				  <td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 구분</strong></td>
				  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px">
					<select id="notice_type" name="notice_type" style="width:99%;border-radius: 4px;">
						<option value = "1">일반공지</option>
						<option value = "16">레전드pick</option>
						<option value = "17">신출귀몰pick</option>
						<option value = "18">1인자pick</option>
						<option value = "21">커뮤니티</option>             	
					</select>
				  </td>
				</tr>-->
				<tr>
				  <td width="18%" height="40" align="left" bgcolor="#f7f7f7" 
					class="content3" 
						style="padding-left:20px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
					<strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 제목</strong></td>
				  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" 
					style="padding-left:10px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">
					<input type="text" id="title" name="title" cols="120" rows="1" style="width:99%;border-radius: 4px;" />
				  </td>
				</tr>
				<tr>
				  <td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" 
					style="padding-left:20px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 내용</strong></td>
				  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" 
					style="padding-left:10px;padding-top:10px;padding-bottom:10px;
							border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;">	                      	 
					<textarea id="content" name="content" cols="120" rows="7" 
						style="width:98.5%;border-radius: 4px; height: 100px"></textarea></td>
				</tr>
				<tr>
				  <td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" 
						style="padding-left:20px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg"
						 width="14" height="15" align="absmiddle"> 파일첨부</strong></td>
				  <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" 
					style="padding-left:10px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;"><table width="90%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td><table width="80" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td align="center" onClick="OnFileOpen();"><DIV><A class="subbtn" href="#">파일첨부</A></DIV></td>
						</tr>
					  </table></td>
					  <td width="97%" id="filepath" name="filepath" style="color: #000000;padding-left:20px">
							파일 첨부 버튼을 클릭하세요.	                          	
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
			alert( "제목을 입력하세요.");
        	return;
        }
        if($("#content").val()==""){
        	//$.messager.alert("알림", "내용을 입력하세요.", "info");
			alert("내용을 입력하세요.");
        	return;
        }
        var date = "<?php echo date("Y-m-d"); ?>";				 
		$("#attend_check").html("출첵입니다 "+date);	//parent.
    	$("form").submit();
    	 
    }
</script>

	