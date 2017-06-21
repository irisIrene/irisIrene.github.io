<?php include ("if_ad_login.php");?>

<?php
include_once"../conn/conn.php";

$user = $_POST['user'];

//删除目录文件
$sql_user = "SELECT * FROM tb_user  WHERE name = '$user'";
$rowsRst_user = $conne->getRowsRst($sql_user);
$userid = $rowsRst_user['id'];
rmdir("../file/pdf/$userid");


$sql="DELETE FROM tb_user  WHERE name = '$user'";
$conne->uidRst($sql);

$sql_authorized = "DELETE FROM tb_authorizedseal  WHERE users = '$user'";
$conne->uidRst($sql_authorized);

header("Location:ad.php#toUserManage");
?>