<?php include ("if_ad_login.php");?>

<?php
header('Content-Type:text/html;charset=utf-8');
include_once"../conn/conn.php";

$name = $_POST['seal'];
$users = $_POST['users'];
$date = $_POST['date'];
//$deadline = $_SESSION['deadline'];
//$times = $_SESSION['times'];
$time = $date." 23:59:59";
	
$rowRst_mark = $conne->getRowsRst("SELECT * FROM tb_seal WHERE name='$name'");
$mark = $rowRst_mark['mark'];
$conne->close_rst($rowRst_mark);	
	  
$sql = "insert into tb_authorizedseal(name,users,deadline,mark) values('$name' , '$users' , '$time','$mark') ";
$num = $conne->uidRst($sql);

if($num==1){
    echo("<script type='text/javascript'>alert('授权成功');window.location.href='ad.php?#toAuthorizedSeal';</script>");
	}
else{
	echo("<script type='text/javascript'>alert('授权失败');window.location.href='ad.php?#toAuthorizedSeal';</script>");
	}
//header("Location:../ad.php?#toSealManage");
?>