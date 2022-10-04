<?php
	session_start();
	$role = $_SESSION['role'];
	function logout(){
		session_unset();
		session_destroy();
	}//header("location: login.php");
	if($role == 1){
		logout();
		header("location: admin/login.php");
	} else {
		logout();
		header("location: login.php");
	}
	exit();
?>