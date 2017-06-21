<?php 
session_start();
include_once('../conn/conn.php');
if(!$_SESSION['name']) {header("Location:../index.php");}
else{
	$name = $_SESSION['name'];
	$sql = "SELECT * FROM tb_user WHERE name = '$name' AND authority = '管理员'";
	$rowNum = $conne -> getRowsNum($sql);
	
	if(!$rowNum){
		header("Location:../index.php");
		}
	}
?>