<?php include ("../op/if_login.php");?>

<?php 
if(isset($_SESSION['name'])){
	unset($_SESSION['name']);
	}
if(isset($_SESSION['user'])){
	unset($_SESSION['user']);
	}
session_destroy();
header("Location:../index.php");
?>