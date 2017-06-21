<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
include_once"../conn/conn.php";

$name = $_POST['username'];
$password = md5($_POST['password']);
$authority = $_POST['selId'];

$_SESSION['name']=$name; 

$sql = "SELECT * FROM tb_user WHERE name='$name'";
$rowsRst = $conne->getRowsRst($sql);
    if($password == ($rowsRst['password'])){
		if($rowsRst['authority'] == "管理员"){
			if($authority=="管理员"){
				sleep(2);
				header("Location:../ad/ad.php");
				}
			else{
				sleep(2);
				header("Location:../op/op.php");
				}
			}
		else{
			if($authority=="操作员"){
				sleep(2);
				header("Location:../op/op.php");
				}
			else{
				echo("<script>alert('非管理员身份！');window.history.back(-1);</script>");
				}
			}
		}	
    else if($password != $rowsRst['password']){
	    echo("<script>alert('密码错误！');window.history.back(-1);</script>");
	    }	
?>