<?php global $_SERVER_URL; ?>
<!-- <body style="background:#fff;"> -->

<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
		<td height="80" align="left" style="padding-left:11px;">
			<?php if($type==2) { ?>
			<img src="<?php echo $_SERVER_URL; ?>images/title-park.png" height="56">
			<?php } else { ?>
			<img src="<?php echo $_SERVER_URL; ?>images/title_02.png" width="267" height="56">
			<?php } ?>
			</td>
    </tr>
    <tr style="<?php if(count($poster_list)<=0) print('display:none;'); ?>"  >
    	<td style="border:2px solid #80cbfa;">
			<table width="100%" border="0" cellspacing="8" cellpadding="0">
			<tr ><td colspan="4" style="color:#333; size:13px; font-weight:bold;">
							<table style="height:22px;"><tr><td><img style="width:24px;height:24px;cursor:pointer;" 
								src="<?php echo $_SERVER_URL ?>images/important1.gif" /></td>
								<td valign="middle" style="font-size:18px;color:#333; font-weight:bold;">
								인증공원</td></tr></table>
			</td></tr>
			<tr>
				<?php 
				$i= 0;
				foreach($poster_list as $park) { 
				$i ++;
				?>
				<td align="center" style="width: 25%">
					<a onclick='window.location="<?php echo $_SERVER_URL; ?>contents/notice/main_detail?type=2&notice_id=<?php echo $park->idx;?>"'>
						<img src="<?php echo $_SERVER_URL . $park->file_path; ?>" style="width:184px;cursor:pointer;height:115px;" />
					</a>
						<br><span style="font-size:12px; font-weight:bold; color:#666;"><?php echo mb_substr($park->title,0, 10) .  
								(mb_strlen($park->title)>10 ? '...' : ''); ?></span>
					</td>
				<?php } ?> 
			  </tr>
			</table>
    	</td>
    </tr>
    <!--<tr><td>&nbsp;</td></tr>-->
	<tr>
		<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td id ="detail">
					<?php 
						if($viewdetail)
						{
							include_once('ajax_detail.php');
						}
					 ?>
				</td></tr>
			<tr>
                <td style="padding-top:20px;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="subbg">
                  
				  <tr>
                    <td height="50" align="center"><table width="930" border="0" align="center" cellpadding="0" cellspacing="3">
                      <tr>
                        <td width="49" >
							<select name="searchType_1" class="input"  id="searchType_1">
                            	<option value='3'>제목+내용</option>
                            	<option value='2'>내용</option>
                            </select></td>
                        <td width="825" ><input type="text" id="searchKey_1" 
							value="<?php echo $search_key; ?>" 
							name="searchKey_1"  class="input" style="width:100%"/></td>
                        <td width="44" >
					<input id="page_num" type="hidden" value="<?php echo $curPage; ?>" />
					<input id="page_size" type="hidden" value="<?php echo $pageSize; ?>" />
					<input id="count" type="hidden" value="<?php echo $count; ?>" />
						
						<img src="<?php echo $_SERVER_URL; ?>images/btn_search.png" align="absmiddle"  onClick="MysearchContents(
								$('#searchType_1').val(),
								$('#searchKey_1').val() );" > </td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                </tr>
	<tr>
		<td>&nbsp;</td>
	  </tr>
	<?php if($type == 6){ ?>
	<tr><td> <?php include('alpha_list.php'); ?> </td></tr>
	<?php }?>
	
	<tr>
		<td>&nbsp;</td>
	  </tr>
	  
	  <?php include('ajax_list.php'); ?>
	<tr >	
		<td height="50" align="center">
		<table width="0" border="0" align="center" cellpadding="0" cellspacing="3">
		  <tr>
			<td ><select id="searchType" name="searchType" class="input" >
					<option <?php if($search_type==1) echo 'selected'; ?> value="1">제목</option>
					<option <?php if($search_type==2) echo 'selected'; ?> value="2">내용</option>
				</select></td>
			<td ><input type="text" id="searchKey" name="searchKey"  
					class="input" style="width:200px;" value="<?php echo $search_key; ?>" /></td>
			<td ><img src="<?php echo $_SERVER_URL; ?>images/btn_search.png" align="absmiddle" 
					onClick="MysearchContents(
								$('#searchType').val(),
								$('#searchKey').val() );" ></td>
		  </tr>
		</table></td>
	  </tr>
	<tr>
		<td><div align="center" id="pagebar" class="paginate"> 
				<?php echo $pagination; ?>
			</div></td>
	  </tr>
</table>
	</td></tr>
</table>
<!--</body>-->
<script>
	
	var _alpha_type = '<?php print($alpha_type); ?>';
	function filter_mtlist(alpha_type)
	{
		_alpha_type = alpha_type;
		MysearchContents(1, '');
	}
	function MysearchContents(search_type, search_key)
	{
		var base_url = '<?php echo $_SERVER_URL;?>contents/mtlist';
		var type = '<?php echo $type; ?>';
		//var pass = $("#searchType").val();
		//var contents = $("#searchKey").val();
		
		var _url = base_url + "?type=" + type + "&search_type="+search_type+"&"+"search_key="+search_key;
		
		if(_alpha_type)
		{
			_url += ('&alpha_type=' + _alpha_type);
		}
		//alert(_url);
		window.location=_url;		
	}
	
	$("#searchKey_1").change( function() {
		if( $(this).val()!="" ) $("#searchKey").val("");
	});
	$("#searchKey").change( function() {
		if( $(this).val()!="" ) $("#searchKey_1").val("");
	});

  	_server_url = '<?php echo $_SERVER_URL; ?>';	
	_detail_url = '<?php echo $_SERVER_URL; ?>contents/mtlist/detail';
	_pagination = '<?php echo $_SERVER_URL; ?>contents/mtlist';
	list_item_select( document.getElementById('list_td_<?php echo $detailid ?>') );
	
</script>