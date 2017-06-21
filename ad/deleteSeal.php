<?php include ("if_ad_login.php");?>

<?php
include_once"../conn/conn.php";

$seal = $_POST['seal'];

$sql_file = "SELECT * FROM tb_seal  WHERE name = '$seal'";
$rowsRst_file = $conne->getRowsRst($sql_file);
$imgid = $rowsRst_file['id'];
$imgsrc = "../file/seal/".$imgid.".png";
//echo($imgsrc);
unlink ("$imgsrc");
//$conne->close_rst($sql_file);

$sql="DELETE FROM tb_seal  WHERE name = '$seal'";
$conne->uidRst($sql);
//$conne->close_rst($sql);

$sql_authorized = "DELETE FROM tb_authorizedseal  WHERE name = '$seal'";
$conne->uidRst($sql_authorized);
//$conne->close_rst($sql_authorized);

header("Location:ad.php?#toSealManage");
?>