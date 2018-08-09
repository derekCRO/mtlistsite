<!--<img src="images/chatting.png" />-->
<?php global $_SERVER_URL; ?>
<div style="width:318px;height:679px;">
	<div style="width:100%; height:25px;background:#eee;">
		<div style="width:85%; height:22px; color:#222;float:left; 
				text-align:left; padding-left:10px;padding-top:7px;">베팅온 공개채팅</div>
		<div style="width:20px; float:right;"> &nbsp;
			<!--<img style="width:18px; height:18px; margin-top:3px; margin-left:-10px;" />--></div>
	</div>

	<div style="float:left; width:100%;<?php echo $_SESSION['setting']['chatting_notice']; ?> " id="div_chat_notice">
			<!-- 채팅공지문자열 현시구역--></div>
	<div style="width:100%; height:450px;background:#fff; display:block; overflow:auto; border-top:solid 1px #ddd;"
		id="chat_main_body">
		
		<div style="float:right; width:100%; height:1px;" id="div_chat_bottom">
			<!-- 채팅문자열 현시구역의 아래한계--></div>
		
	</div>
	
	<div style="width:100%; height:25px;background:#eee; display:block;" id="div_alert">
		<div style="width:85%; height:22px; color:#222;float:left; 
				text-align:left; padding-left:10px;padding-top:7px;">&nbsp;<!--빈구역--></div>
		<div style="width:20px; float:right;">
			&nbsp;
			<!--<img style="width:18px; height:18px; margin-top:5px;" />--></div>

	</div>

	<div style="width:100%; height:25px;background:#eee; display:block; padding-top:0px;">
		<div style="width:98%; height:22px; color:#222;float:left; 
				text-align:left; padding-left:1px;padding-top:0px;padding-right:1px;">
		<input id="chatting_input" placeholder="대화를 입력해주세요."
			style="width:95%; height:20px; border:solid 1px #999;padding-left:8px; padding-right:8px;" />
		</div>
	</div>
	
</div>