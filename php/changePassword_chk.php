<?php include ("../op/if_login.php");?>

<?php
include_once"../conn/conn.php";
header('Content-Type:text/html;charset=utf-8');

$name = $_SESSION['name'];

$pwdCurrentPassword = md5($_POST['pwdCurrentPassword']);
$pwdNewPassword = md5($_POST['pwdNewPassword']);
$pwdCfmNewPassword = md5($_POST['pwdCfmNewPassword']);

$sql = "SELECT * FROM tb_user WHERE name='$name'";
$rowsRst = $conne->getRowsRst($sql);

if($pwdCurrentPassword== ($rowsRst['password'])){
	if($pwdNewPassword == $pwdCfmNewPassword){
		$sqlUpdate="UPDATE tb_user SET password = '$pwdNewPassword' WHERE name = $name'";
		echo("<script>alert('密码修改成功！');window.history.back(-1);</script>");
		}
	else{
		echo("<script>alert('两次密码不一致！');window.history.back(-1);</script>");
		}
	}
else if($pwdCurrentPassword != ($rowsRst['password'])){
	    echo("<script>alert('当前密码输入错误！');window.history.back(-1);</script>");
	    }	
?>