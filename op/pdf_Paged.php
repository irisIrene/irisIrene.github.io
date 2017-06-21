<?php include ("if_login.php");?>

<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

//$sourcefile = $_SESSION['sourcefile'];
//$sourcefile = "../file/empty.pdf";
$name = $_SESSION['name'];
$pdfName = $_SESSION['pdfName'];



if(isset($_POST['pageNum'])){
    $pageNum = $_POST['pageNum'];
    }
else{
    $pageNum = 1;
    }
	
if(isset($_POST['Plus'])){
	$pagePlus = $_POST['Plus'];
    }
else{
	$pagePlus = 0;
	}
	
if(isset($_POST['Minus'])){
	$pageMinus = $_POST['Minus'];
    }
else{
	$pageMinus = 0;
	}	

$sql_user = "SELECT * FROM tb_user WHERE name ='$name' ";
$rowRst_user = $conne -> getRowsRst($sql_user);
$authorid = $rowRst_user['id'];

$pdf = new FPDI();
$pageCount = $pdf->setSourceFile("../file/pdf/".$authorid."/".$pdfName.".pdf");

//for($pageNo = 1; $pageNo <= $pageCount; $pageNo++){
$pageNo = $pageNum + $pagePlus + $pageMinus;

if($pageNo < 1){
	$pageNo = 1;
    }
if($pageNo > $pageCount){
	$pageNo = $pageCount;
    }
	//import a page
	$templatedId = $pdf->importPage($pageNo);
	//get the size of the imported page
	$size = $pdf -> getTemplateSize($templatedId);
	if($size['w'] > $size['h']){
		$pdf -> AddPage('L',array($size['w'],$size['h']));
		}
	else{
		$pdf -> AddPage('P',array($size['w'],$size['h']));
		}
	$pdf->useTemplate($templatedId);

// import page 1
//$tplIdx = $pdf->importPage($pageNo);
// use the imported page and place it at position 10,10 with a width of 100 mm
//$pdf->useTemplate($templatedId);

// now write some text above the imported page
$pdf->Output();
//$pdf->Output();
//echo($pdfName);
//header("Location:http://pdf.com/op.php"); 
?>

