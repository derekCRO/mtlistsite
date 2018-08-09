<?php global $_SERVER_URL; //print_r($info); exit;?>
<!--<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>베팅온</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="./favicon.ico">
        <script src="<?php echo $_SERVER_URL; ?>js/jquery-1.7.1.min.js"></script>
		<script src="<?php echo $_SERVER_URL; ?>js/myfunction.js"></script>
        <link href="<?php echo $_SERVER_URL; ?>css/mainstyle.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $_SERVER_URL; ?>css/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $_SERVER_URL; ?>css/toto.css" rel="stylesheet" type="text/css">
			<link href="<?php echo $_SERVER_URL;?>css/tablecloth.css" rel="stylesheet"> 			
			<link href="<?php echo $_SERVER_URL;?>css/easyui.css" rel="stylesheet">
</head>
<body style="background:#fff;">-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="80" align="left">
            <?php if($info->notice_type == 1){ ?>
            <img src="<?php echo $_SERVER_URL; ?>images/title_01.png" width="267" height="56">
            <?php }
            	  if($info->notice_type == 2){?>
            <img src="<?php echo $_SERVER_URL; ?>images/title-park.png" width="267" height="56">      
            <?php }
                  if($info->notice_type == 6){?>
            <img src="<?php echo $_SERVER_URL; ?>images/title_02.png" width="267" height="56">      
            <?php }
                  if($info->notice_type == 11){?>
            <img src="<?php echo $_SERVER_URL; ?>images/title_04.png" width="267" height="56">      
            <?php }
                  if($info->notice_type == 16 || $info->notice_type == 17 || $info->notice_type == 18){?>
            <img src="<?php echo $_SERVER_URL; ?>images/title_10.png" width="267" height="56">      
            <?php }
                  if($info-> notice_type == 21){?>
            <img src="<?php echo $_SERVER_URL; ?>images/title_03.png" width="267" height="56">
            <?php }
                  if($info-> notice_type == 22){?>
            <img src="<?php echo $_SERVER_URL; ?>images/title_06.png" width="267" height="56">      
            <?php }
                  if($info-> notice_type == 23){?>
            <img src="<?php echo $_SERVER_URL; ?>images/title_08.png" width="267" height="56">
            <?php }
                  if($info-> notice_type == 26){?>
            <img src="<?php echo $_SERVER_URL; ?>images/title_09.png" width="267" height="56">
            <?php }?>                                          
            </td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="40" bgcolor="#eaeaea" style="border-bottom:1px solid #e2e2e2"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="62%" class="content7"><strong><?php echo $info->title;?></strong></td>
                        <td width="38%" align="right" class="content3"><?php echo $info->reg_date;?></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="40" bgcolor="#FFFFFF" style="border-bottom:1px solid #e2e2e2"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="62%" class="content7"><img src="<?php echo $_SERVER_URL. 'images/level_' .$info->level_type . '.gif';?>" align="absmiddle"><b style="FONT-SIZE: 12px; FONT-FAMILY: " 돋움",="" dotum;="" color:="" #666"=""> <span class="content3"><?php echo $info->write_name;?></span></b><span class="content3">&nbsp;</span></td>
                        <td width="38%" align="right" class="content3">
	                        <?php if($info->file_path != ""){ ?>
								<a  href="#" onClick="onDownload();"
									title="첨부파일을 다운로드 하려면 여기를 눌러주세요."
									style="color: red;">첨부파일</a>&nbsp;&nbsp;&nbsp;
							<?php }?>
                        	조회수 <strong><?php echo $info->visit_qty;?> </strong>&nbsp;&nbsp;&nbsp;추천수 <strong><?php echo $info->recommend_qty;?> </strong>&nbsp;&nbsp;&nbsp;댓글 <strong><?php echo $info->reply_qty;?></strong></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="center" class="content3"  style="padding-top:20px; padding-bottom:20px"><p><strong><?php echo $info->content;?></strong></p>
                      
                  </tr>
                 
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
			
              <tr>
                <td><table style="background-image:url(<?php echo $_SERVER_URL; ?>images/bbsre.png); background-repeat:no-repeat; background-position:center;" height="120" width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td height="37" style="font-size:12px" colspan="3"></td>
                      </tr>
                      <tr>
                        <td width="10">&nbsp;</td>
                        <td align="center" width="687"><textarea id="Explain" name="Explain" style="BORDER-TOP: #b5b5b5 1px solid; HEIGHT: 58px; BORDER-RIGHT: #ddd 1px solid; WIDTH: 96%; BACKGROUND: url(images/bg_comment_form.gif) #fff repeat-x; BORDER-BOTTOM: #ddd 1px solid; POSITION: relative; FLOAT: left; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 9px; MARGIN: 0px 5px 0px 8px; BORDER-LEFT: #b5b5b5 1px solid; PADDING-RIGHT: 9px; padding-top:5px; DISPLAY: block; LINE-HEIGHT: 17px;COLOR: #666;FONT-FAMILY: 굴림, gulim; "></textarea>
                        </td>
                        <td width="60" style="text-align:left; padding-right:10px;" onClick="data_add(<?php echo $info->idx; ?>)"><img src="<?php echo $_SERVER_URL; ?>images/rebt.png"></td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td height="5"></td>
              </tr>
              <?php foreach($replys as $reply_item) {?>
              <tr>
                <td ><table style="background-image:url(<?php echo $_SERVER_URL; ?>images/relist.png); background-repeat:no-repeat; background-position:center;" height="81" width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td style="text-align:left; padding-left:60px;"><img src="<?php echo $_SERVER_URL. 'images/level_' . $reply_item->level_type . '.gif';?>" align="absmiddle"><b style="color:#666;FONT-SIZE: 12px; FONT-FAMILY: " 돋움",="" dotum;="""><?php echo $reply_item->write_name;?></b>&nbsp;&nbsp;<span style="FONT-SIZE: 9px;  FONT-FAMILY: tahoma; font-weight:normal; color:#888"><?php echo $reply_item->reg_date;?></span> </td>
                      </tr>
                      <tr>
                        <td  style="text-align:left;padding-left:37px; color:#444444;FONT-SIZE: 12px; FONT-FAMILY: 굴림, gulim;  LETTER-SPACING: -0px;"><?php echo $reply_item->reply;?></td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td height="5"></td>
              </tr>
              <?php }?>
              <tr>
                <td >&nbsp;</td>
              </tr>
              <tr>
                 <td>
                     <table width="100%" border="0" cellpadding="0" cellspacing="0">
                       <tr>
                           <td width="*">&nbsp;</td>
                           <td width="400px;" align="right"><div style="width:80px;">
                           		<a class="join_btn" onClick="window.history.back(-1);">돌아가기</a></div></td>
	                       <td width="100px;" align="right"><div style="width:80px;">
	                           <?php if($info-> notice_type == 1){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/notice?type=1">목록보기</a>
	                           <?php }
	                                if($info->notice_type == 6){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/mtlist?type=6">목록보기</a>
	                           <?php }
	                                if($info->notice_type == 11){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/mtrequest?type=11">목록보기</a>
	                           <?php }
	                                if($info->notice_type == 12){?> 
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/mtrequest?type=12">목록보기</a>   
	                           <?php }
	                                if($info->notice_type == 13){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/mtrequest?type=13">목록보기</a>    
	                           <?php }
	                                if($info->notice_type == 16){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/zone?type=16">목록보기</a>    
	                           <?php }
	                               if($info->notice_type == 17){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/zone?type=17">목록보기</a>  
	                           <?php }
	                              if($info->notice_type == 18){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/zone?type=18">목록보기</a> 
	                           <?php }
	                              if($info->notice_type == 21){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/community?type=21">목록보기</a> 
	                           <?php }
	                              if($info->notice_type == 22){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/community?type=22">목록보기</a> 
	                           <?php }
	                              if($info->notice_type == 23){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/community?type=23">목록보기</a> 
	                           <?php }
	                              if($info->notice_type == 26){?>
	                             <a class="join_btn" href="<?php echo $_SERVER_URL; ?>contents/customer?type=26">목록보기</a> 
	                           <?php } ?>
	                                                               
	                           </div>
	                       </td>
	                       <td width="*">&nbsp;</td>
                       </tr>
                     </table>
                 </td> 
              </tr>
             
	   </table>
	 </td>
  </tr>
</table>		  		
<!--</body>
-->
<script>
    function data_add(notice_id)
    {
        //alert("pppp");
        if($("#Explain").val().length == 0 || $("#Explain").val() == "")
        {
            alert("자료가 없습니다.");
            return;
        }
    	 $.post("<?php echo $_SERVER_URL; ?>contents/common/ajax_reply_add",
	                {notice_id:notice_id, reply: $("#Explain").val()}				
	            , function(data) {
				    if(data == 'ok')
					{
				      window.location="<?php echo $_SERVER_URL; ?>contents/notice/main_detail?notice_id=<?php echo $info->idx;?>";
					}
	         });
    }

	function onDownload(){	
		 
		var notice_id = "<?php echo $info->idx; ?>";
		window.location = "<?php echo $_SERVER_URL;?>contents/common/download?notice_id="+notice_id;
	}
</script>