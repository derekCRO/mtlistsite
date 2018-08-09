<ul class="listbody recentlist">
	  <?php foreach($last_list as $item) { ?>
	  <!-- <a href="<?php echo $_SERVER_URL;?>contents/notice?notice_id=<?php echo $item->idx; ?>" > -->
	  
	  <li style="list-style:none; cursor:pointer;">
		<div style="float:left; width:300px; height:23px; text-align:left; padding-left:0px;" 
				class="content12" onclick='window.location="<?php echo $_SERVER_URL; ?>contents/notice/main_detail?notice_id=<?php echo $item->idx;?>"'>★ <?php echo mb_substr($item->title, 0, 25) . (mb_strlen($item->title)>25 ? '...' : '' ); ?></div>
		<div style="float:right; width:100px; height:23px; text-align:right;padding-right:10px;"
				class="content11"><?php echo $item->writedate; ?></div>
	  </li><!--</a>-->
	  <?php } ?>
  </ul>
  
  
  <ul class="listbody hotlist" style="display:none;">
	  <?php foreach($interest_list as $item) { ?>
	  <!-- <a href="<?php echo $_SERVER_URL;?>contents/notice?notice_id=<?php echo $item->idx; ?>" > -->  
	  <li style="list-style:none; cursor:pointer;">
		<div style="float:left; width:300px; height:23px; text-align:left; padding-left:0px;" 
				class="content12"  onclick='window.location="<?php echo $_SERVER_URL;?>contents/notice/main_detail?notice_id=<?php echo $item->idx;?>"'>★ <?php echo mb_substr($item->title, 0, 25) . (mb_strlen($item->title)>25 ? '...' : '' ); ?></div>
		<div style="float:right; width:100px; height:23px; text-align:right;padding-right:10px;"
				class="content11"><?php echo $item->writedate; ?></div>
	  </li><!--</a>-->
	  <?php } ?>
  </ul>



  <ul class="listbody replyhot" style="display:none; cursor:pointer;">
	  <?php foreach($reply_qty_list as $item) { ?>
	  <!-- <a href="<?php echo $_SERVER_URL;?>contents/notice?notice_id=<?php echo $item->idx; ?>" > -->
	  <li style="list-style:none;">
		<div style="float:left; width:300px; height:23px; text-align:left; padding-left:0px;" 
				class="content12" onclick='window.location="<?php echo $_SERVER_URL;?>contents/notice/main_detail?notice_id=<?php echo $item->idx;?>"' >★ <?php echo mb_substr($item->title, 0, 25) . (mb_strlen($item->title)>25 ? '...' : '' ); ?></div>
		<div style="float:right; width:100px; height:23px; text-align:right;padding-right:10px;"
				class="content11"><?php echo $item->writedate; ?></div>
	  </li><!--</a>-->
	  <?php } ?>
  </ul>