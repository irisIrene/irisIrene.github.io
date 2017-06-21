<?php include ("if_login.php");?>

<?php
include_once"../conn/conn.php";

$pdf = $_POST['pdf'];
$name = $_SESSION['name'];

$sql_name = "SELECT * FROM tb_user  WHERE name = '$name'";
$rowsRst_id = $conne->getRowsRst($sql_name);
$name_id = $rowsRst_id['id'];

$pdfsrc = "../file/pdf/".$name_id."/".$pdf.".pdf";
unlink ($pdfsrc);

//$conne->close_rst($sql_file);

$sql="DELETE FROM tb_pdf  WHERE id = '$pdf'";
$conne->uidRst($sql);
//$conne->close_rst($sql);

header("Location:op.php");
?>