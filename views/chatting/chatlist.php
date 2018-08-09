<?php global $_SERVER_URL; ?>
<?php 
	$max_id = 0;
	$chatcount = count($chatmsg);
	foreach($chatmsg as $chat_item )
	{ ?>
<span><!--height:20px;-->
<div style="float:left; width:98%;  margin-left:2px; vertical-align:top;" id="chatitem<?php print($chat_item->id); ?>" >
	
	<img style="width:20px; height:20px; display:block; float:left; margin-top:-1px;" src="<?php print($chat_item->uimg); //print($_SERVER_URL . 'images/level_' . $chat_item->level . '.gif'); //$chat_item->uimg ?>" />
	<span style="line-height:22px; font-weight:bold;">
<!--</div>  <?php //echo $_SESSION['setting']['chatting_style_' . $chat_item->level ]; ?>

<div style="float:left; height:22px; font-weight:bold; margin-top:2px;">-->
		<?php print($chat_item->anonymous); ?> : </span> 
		
		<span style="visibility:visible;<?php echo $_SESSION['setting']['chatting_style_' . $chat_item->level ]; ?>" > <!--</div>
		
<div style="float:left;margin-top:3px;">--><?php print($chat_item->msg); ?>
		</span>
		
		</div>
<div style="float:left; height:3px; width:100%; background:#fff; border:none;"></div>
</span>
<?php 
	$max_id = $chat_item->id-0;
	}

	//$chatcount += count($notices);	//공지개수를 추가할 필요가 없다.
	print('_&_' . $chatcount . '_&_' . $max_id );
	
	if(count($notices)>0)	print( '_&_' );
	foreach($notices as $notice_item )
	{ ?>
	
		<span>
			<div style="float:left; width:98%;  margin-left:2px; vertical-align:top;" 
				id="chatitem<?php print(0); ?>" >
				<span style="color:#CC9900; font-weight:bold; color:#00FF00;">[공지]</span> 
					<span style="visibility:visible;<?php echo $_SESSION['setting']['chatting_notice']; ?>"><?php print($notice_item->title); ?>
					</span>
					
					</div>
			<div style="float:left; height:5px; width:100%; background:#fff; border:none;"></div>
		</span>	
	<?php  
	}
?>
