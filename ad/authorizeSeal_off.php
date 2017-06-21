<?php include ("if_ad_login.php");?>

<?php
header('Content-Type:text/html;charset=utf-8');
include_once"../conn/conn.php";

$name = $_POST['seal'];
$users = $_POST['users'];
//$deadline = $_SESSION['deadline'];
//$times = $_SESSION['times'];

$sql="DELETE FROM tb_authorizedseal  WHERE name='$name' AND users ='$users'";
$num = $conne->uidRst($sql);

if($num==1){
    echo("<script type='text/javascript'>alert('取消授权成功');window.location.href='ad.php?#toAuthorizedSeal';</script>");
	}
else{
	echo("<script type='text/javascript'>alert('取消授权失败');window.location.href='ad.php?#toAuthorizedSeal';s</script>");
	}
?>