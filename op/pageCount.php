<?php include ("if_login.php");?>

<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

//$sourcefile = $_SESSION['sourcefile'];
//$sourcefile = "../file/empty.pdf";
$name = $_SESSION['name'];
$pdfName = $_POST['pdfName'];
$_SESSION['pdfName'] = $pdfName;

$sql_user = "SELECT * FROM tb_user WHERE name ='$name' ";
$rowRst_user = $conne -> getRowsRst($sql_user);
$authorid = $rowRst_user['id'];

$pdf = new FPDI();
$pageCount = $pdf->setSourceFile("../file/pdf/".$authorid."/".$pdfName.".pdf");

$_SESSION['pageCount'] = $pageCount;
header("Location:importSeal.php");
?>

