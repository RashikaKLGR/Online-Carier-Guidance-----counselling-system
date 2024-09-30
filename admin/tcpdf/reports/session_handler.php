<?php
session_start();
	$ses_user=$_SESSION['login_user'];
	$ses_ukey=$_SESSION['user_keye'];
	$ses_ulevel=$_SESSION['user_level'];
	

	
	if(!isset($_SESSION['login_user'])){
		header("location:../index.php");
	}


?>