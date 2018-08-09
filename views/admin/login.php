<?php global $_SERVER_URL;?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>베팅온</title>

<!-- styles -->
<!--<link href="<?php // echo $_SERVER_URL;?>css/bootstrap.css" rel="stylesheet">-->

<link href="<?php echo $_SERVER_URL; ?>css/font-awesome.css" rel="stylesheet">

<link href="<?php echo $_SERVER_URL; ?>css/styles_admin.css" rel="stylesheet">
<link href="<?php echo $_SERVER_URL; ?>css/theme-blue.css" rel="stylesheet">

<link rel="shortcut icon" href="<?php echo $_SERVER_URL; ?>images/logo.JPG">

<!--============javascript===========-->
<script src="<?php echo $_SERVER_URL; ?>js/jquery.js"></script>
<script src="<?php echo $_SERVER_URL; ?>js/jquery-ui-1.10.1.custom.min.js"></script>
<script src="<?php echo $_SERVER_URL; ?>js/bootstrap.js"></script>
</head>
<!--<body>-->
<div class="layout">
	<div class="container">
		<div class="form-signin" style="width:300px; margin-top:150px;">
			<h3 class="form-signin-heading" style = "font-weight:bold">가입인증！</h3>
			<div>	
				<input style="padding-left:15px;" id = "login_id" type="text" class="input-block-level" tabindex="1" placeholder="아이디" />
			</div>
			<div>	
				<input style="padding-left:15px;" id = "pass" type="password" class="input-block-level" tabindex="2" placeholder="비밀번호" />
			</div>
			
			<button class="btn btn-inverse btn-block" id = "login_btn" style = "width:300px; font-size : 1.3em; font-weight : bold" tabindex="4">확&nbsp;인</button>
		</div>
	</div>
</div>
<!--</body>-->
<script>

   $("#login_btn").click( function(){
      
	   if($('#login_id').val()== ""){
			alert("아이디를 입력하세요.");
			return;
		}	

	   if($('#pass').val()== ""){
			alert("비밀번호를 입력하세요.");
			return;
		}
		
	   $.post("<?php echo $_SERVER_URL; ?>admin/admin/admin_login", {
			'login_id' : $('#login_id').val(),
			'passwd' : $('#pass').val()}, function(data) {																
			  //alert(data);
			  if(data.substring(data.length-2)=='ok'){
			    window.location = "<?php echo $_SERVER_URL; ?>admin/admin/admin_list?type=1";
			  }else{
                  alert("가입정보가 맞지 않습니다.");
				  }						 
			});	
	   
   });


	$("#login_id").keyup( function(event) {
		if (event.keyCode == 13) {
        	$("#pass").focus();
    	}
	});

	$("#pass").keyup( function(event) {
		if (event.keyCode == 13) {
        	$("#login_btn").focus();
		}
    });

	$("#login_id").focus( function(){
		$(this).select();
	});
	
	$("#pass").focus( function(){
		$(this).select();
	});
	
	$(document).ready( function() {
		$("#login_id").focus();
	});
</script>
</html>
