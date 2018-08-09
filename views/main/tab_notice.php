<ul width="95%" style="padding-left:15px; margin-left:0px;  margin-bottom:2px;" 
	class="list_notice noticelist" >
  <?php 
  //print_r(count($notice_list));
	$i = 0;
	foreach($notice_list as $notice_item) { 
	$i ++;
	?>
  <!-- <a href="<?php echo $_SERVER_URL;?>contents/notice?type=1&notice_id=<?php echo $notice_item->idx; ?>" > -->	
  
  <li style="list-style:none; cursor:pointer; height:34px; padding-bottom:0px;
		<?php echo $notice_item->title_style; ?>">
	<div style="float:left; width:300px; height:23px;margin-top:6px;
			text-align:left; padding-left:0px; font-size:14px;
			<?php echo $notice_item->title_style; ?>" 
			class="content12" 
			onclick='window.location="<?php echo $_SERVER_URL; ?>contents/notice/main_detail?type=1&notice_id=<?php echo $notice_item->idx;?>"'>
			★ <?php echo mb_substr($notice_item->title, 0, 26) . (mb_strlen($item->title)>26 ? '...' : '' ); ?></div>
	<div style="float:right; width:100px; height:23px; margin-top:6px;
			text-align:right;padding-right:10px; font-size:14px;
				<?php echo $notice_item->title_style; ?>"
			class="content11"><?php echo $notice_item->writedate; ?></div>
  </li><!--</a>-->
  <?php 
	if($i>=5) break;
  } ?>
</ul>

			<!--<ul width="95%" style="padding-left:15px; margin-left:0px;  margin-bottom:2px; display:none;" 
				class="list_notice mtlist" >
			  <?php 
				$i = 0;
				//foreach($mt_list as $notice_item) 
				{ 
				$i ++;
				?>

			  
			  <li style="list-style:none; cursor:pointer; height:34px; padding-bottom:0px;
					<?php echo $notice_item->title_style; ?>">
				<div style="float:left; width:300px; height:23px;margin-top:6px;
						text-align:left; padding-left:0px; font-size:14px;
						<?php echo $notice_item->title_style; ?>" 
						class="content12" 
						onclick='window.location="<?php echo $_SERVER_URL; ?>contents/notice/main_detail?type=1&notice_id=<?php echo $notice_item->idx;?>"'>
						★ <?php echo $notice_item->title; ?></div>
				<div style="float:right; width:100px; height:23px; margin-top:6px;
						text-align:right;padding-right:10px; font-size:14px;
							<?php echo $notice_item->title_style; ?>"
						class="content11"><?php echo $notice_item->writedate; ?></div>
			  </li>
			  <?php 
				if($i>=5) break;
			  } ?>
			</ul>
-->

<ul width="95%" style="padding-left:15px;  display:none;" 
	class="list_notice mtrequest" >
  <?php 
	$i = 0;
	foreach($mt_request as $notice_item) { 
	$i ++;
	?>
  <!-- <a href="<?php echo $_SERVER_URL;?>contents/notice?type=1&notice_id=<?php echo $notice_item->idx; ?>" > -->	
  
  <li style="list-style:none; cursor:pointer; padding-bottom:0px;
		<?php echo $notice_item->title_style; ?>">
	<div style="float:left; width:300px; height:23px;
			text-align:left; padding-left:0px; 
			<?php echo $notice_item->title_style; ?>" 
			class="content12" 
			onclick='window.location="<?php echo $_SERVER_URL; ?>contents/notice/main_detail?type=1&notice_id=<?php echo $notice_item->idx;?>"'>
			★ <?php echo mb_substr($notice_item->title, 0, 26) . (mb_strlen($item->title)>26 ? '...' : '' ); ?></div>
	<div style="float:right; width:100px; height:23px; 
			text-align:right;padding-right:10px; 
				<?php echo $notice_item->title_style; ?>"
			class="content11"><?php echo $notice_item->writedate; ?></div>
  </li><!--</a>-->
  <?php 
	if($i>=7) break;
  } ?>
</ul>

<ul width="95%" style="padding-left:15px;  display:none;" 
	class="list_notice mtreport" >
  <?php 
	$i = 0;
	foreach($mt_report as $notice_item) { 
	$i ++;
	?>
  <!-- <a href="<?php echo $_SERVER_URL;?>contents/notice?type=1&notice_id=<?php echo $notice_item->idx; ?>" > -->	
  
  <li style="list-style:none; cursor:pointer;  padding-bottom:0px;
		<?php echo $notice_item->title_style; ?>">
	<div style="float:left; width:300px; height:23px;
			text-align:left; padding-left:0px; 
			<?php echo $notice_item->title_style; ?>" 
			class="content12" 
			onclick='window.location="<?php echo $_SERVER_URL; ?>contents/notice/main_detail?type=1&notice_id=<?php echo $notice_item->idx;?>"'>
			★ <?php echo mb_substr($notice_item->title, 0, 26) . (mb_strlen($item->title)>26 ? '...' : '' ); ?></div>
	<div style="float:right; width:100px; height:23px; 
			text-align:right;padding-right:10px; 
				<?php echo $notice_item->title_style; ?>"
			class="content11"><?php echo $notice_item->writedate; ?></div>
  </li><!--</a>-->
  <?php 
	if($i>=7) break;
  } ?>
</ul>

<ul width="95%" style="padding-left:15px;display:none;" 
	class="list_notice mtexchange" >
  <?php 
	$i = 0;
	foreach($mt_exchange as $notice_item) { 
	$i ++;
	?>
  <!-- <a href="<?php echo $_SERVER_URL;?>contents/notice?type=1&notice_id=<?php echo $notice_item->idx; ?>" > -->	
  
  <li style="list-style:none; cursor:pointer; padding-bottom:0px;
		<?php echo $notice_item->title_style; ?>">
	<div style="float:left; width:300px; height:23px;
			text-align:left; padding-left:0px; 
			<?php echo $notice_item->title_style; ?>" 
			class="content12" 
			onclick='window.location="<?php echo $_SERVER_URL; ?>contents/notice/main_detail?type=1&notice_id=<?php echo $notice_item->idx;?>"'>
			★ <?php echo mb_substr($notice_item->title, 0, 26) . (mb_strlen($item->title)>26 ? '...' : '' ); ?></div>
	<div style="float:right; width:100px; height:23px; 
			text-align:right;padding-right:10px; 
				<?php echo $notice_item->title_style; ?>"
			class="content11"><?php echo $notice_item->writedate; ?></div>
  </li><!--</a>-->
  <?php 
	if($i>=7) break;
  } ?>
</ul>
