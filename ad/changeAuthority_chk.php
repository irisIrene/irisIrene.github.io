<?php include ("if_ad_login.php");?>

<?php
header('Content-Type:text/html;charset=utf-8');
include_once"../conn/conn.php";

$authority = $_POST['selId'];

$user = $_SESSION['user'];

if($authority=="管理员"){
	$sql="UPDATE tb_user SET authority = '管理员' WHERE name = '$user'";
	}
else{
	$sql="UPDATE tb_user SET authority = '操作员' WHERE name = '$user'";
	}
$num = $conne->uidRst($sql);
if($num){
	echo("<script type='text/javascript'>alert('修改成功！');window.location.href='ad.php?#toUserManage';</script>");
	}
else{
	echo("<script type='text/javascript'>alert('修改失败！');window.location.href='ad.php?#toUserManage';</script>");
	}
session_destory();
?>