<!DOCTYPE html>
<?php global  $_SERVER_URL; ?>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>베팅온</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="./favicon.ico">
        <script src="<?php echo $_SERVER_URL; ?>js/jquery-1.7.1.min.js"></script>
		<script src="<?php echo $_SERVER_URL; ?>js/myfunction.js"></script>
		<script src="<?php echo $_SERVER_URL; ?>js/nicEdit.js"></script>
        <link href="<?php echo $_SERVER_URL; ?>css/mainstyle.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $_SERVER_URL; ?>css/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $_SERVER_URL; ?>css/toto.css" rel="stylesheet" type="text/css">
		
		
			<script src="<?php echo $_SERVER_URL; ?>js/jquery.tablesorter.min.js"></script>
			<script src="<?php echo $_SERVER_URL; ?>js/jquery.tablecloth.js"></script>  <!-- 페지바 구현 -->
			<script language="javascript" type="text/javascript" src="<?php echo $_SERVER_URL; ?>js/jquery.easyui.min.js"></script><!-- 페지바 구현 --> 
			<script language="javascript" type="text/javascript" src="<?php echo $_SERVER_URL; ?>js/easyui-lang-zh_cn.js"></script><!-- 페지바 구현 -->	
			<link rel="stylesheet" type="text/css" href="<?php echo $_SERVER_URL; ?>css/tableform.css"/> <!-- 페지바 구현 -->
			<link href="<?php echo $_SERVER_URL;?>css/tablecloth.css" rel="stylesheet"> 			
			<link href="<?php echo $_SERVER_URL;?>css/easyui.css" rel="stylesheet">
	
		
</head>
<?php


if( !isset($_SESSION['user_info']))
{
//    $url = $_SERVER_URL . 'main';
//    if( !isset($login) ||  ! $login)
//    {
//        print('<script>window.location="'.$url.'"< / script>');exit;
//    }
    //header('Location: ' . $url ); exit;
}
?>