<?php global $_SERVER_URL; ?>

<table width="1314px" border="0" align="center" cellpadding="0" cellspacing="0"
		style="background:#F8F8F8;">
          <tr>
            <td style="width: 100px; vertical-align:middle;">
            	<img src="<?php echo $_SERVER_URL; ?>images/bottom_logo.png" 
            		style="margin-left: 20px; margin-top:10px; float: left">
            	<div class="content20" style="margin-top:28px; padding-bottom:30px; width: 190px; "> 쪽지 </div>
            </td>            
          </tr>
          <tr>
              <td align="center">
              	<form action="<?php echo $_SERVER_URL; ?>admin/piecepaper/save" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	              <table width="850px" border="0" cellspacing="0" cellpadding="0">
	              <tr>
	                <td bgcolor="#e0e0e0"><table width="100%" border="0" cellspacing="1" cellpadding="0">
	                    <tr>
	                      <td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px">
	                      	<input type="hidden" id="receive_ids" name="receive_ids" value="<?php echo $info->receive_ids; ?>">  
	                      	<input type="hidden" id="idx" name="idx" value="<?php echo $info->idx; ?>">
	                      	<strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 수신자아이디</strong></td>
	                      <td width="30%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px">
	                      	<input type="checkbox" id="all" name="all" onchange="all_check();" 
	                      		<?php if($info->receive_ids == "0") echo 'checked'; ?>>전체
	                      	<input type="text" id="receive_names" name="receive_names" cols="120" rows="1" 
	                      		style="width:50%;border-radius: 4px; margin-right: 10px;" 
	                      		value="<?php echo ($login_id=='' ?  $info->receive_names : $login_id); ?>" />
	                      	여러 회원들에게 보내려면 반점으로 구분하세요.
	                      </td>
	                    </tr>
	                    <tr>
	                      <td width="18%" height="40" align="left" bgcolor="#f7f7f7" class="content3" style="padding-left:20px"><strong><img src="<?php echo $_SERVER_URL; ?>images/notice_icon_02.jpg" width="14" height="15" align="absmiddle"> 내용</strong></td>
	                      <td width="82%" align="left" bgcolor="#FFFFFF" class="content3" style="padding-left:10px;padding-top:10px;padding-bottom:10px">	        
						  	 <input type="hidden" id="htmlContent" name="htmlContent" value="" />              	 
	                      	<textarea id="content" name="content" 
	                      		style="width:98.5%;border-radius: 4px; height: 280px"><?php echo $info->content; ?></textarea></td>
	                    </tr>
	                    
	
	                </table></td>
	              </tr>
	              <tr>
	                <td height="60" align="center"><table width="200" border="0" cellspacing="5" cellpadding="0">
	                    <tr>
	                      <td><table width="100" border="0" cellspacing="0" cellpadding="0">
	                          <tr>
	                            <td align="center" onclick="save();"><DIV><A class="join_btn" href="#">쪽지보내기</A></DIV></td>
	                          </tr>
	                      </table></td>
	                      <td><table width="100" border="0" cellspacing="0" cellpadding="0">
	                          <tr>
	                            <td align="center"><DIV><A class="join_btn" 
	                            	href="<?php echo $_SERVER_URL; ?>admin/piecepaper">취소하기</A></DIV></td>
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

	function all_check()
	{
		if($("#all").attr("checked") == "checked"){
			$("#receive_names").attr("readonly", "readonly");
			$("#receive_names").val("");
		}else{
			$("#receive_names").removeAttr("readonly");
		}
	}



    function save(){   
    	if($("#all").attr("checked") != "checked" && $("#receive_names").val()==""){
			alert("수신자를 입력하세요.");
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
		

        if($("#all").attr("checked") == "checked"){
        	$("#receive_names").val("전체");
        	$("#receive_ids").val("0");
		    $("form").submit();
        }else{	
	        $.post("<?php echo $_SERVER_URL; ?>admin/piecepaper/ajax_exist", 
		     	       { 'receive_names' : $("#receive_names").val()},
		     				 function(data) {																
		     				 //alert(data);
		     				if(data.substring(data.length-2) == '-1')
		     			    {
		     					alert("수신자를 정확히 입력하세요.");
		     			    }else{
		         			    $("#receive_ids").val(data);
		     			    	$("form").submit();
		     			    } 						 
		     	});       
        }
    	 
    }
</script>

	