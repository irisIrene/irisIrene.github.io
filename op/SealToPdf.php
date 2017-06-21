<?php include ("if_login.php");?>

<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

//$sourcefile = $_SESSION['sourcefile'];
//$sourcefile = "../file/empty.pdf";
$name = $_SESSION['name'];
$pdfName = $_SESSION['pdfName'];
$sealName = $_POST['sealName'];

$intX = $_COOKIE['intX']/3.8+"px";
$intY = $_COOKIE['intY']/3.5+"px";

if(isset($_COOKIE['page'])){
    $num = $_COOKIE['page'];
    }
else{
	$num = 1;
	}

$sql_user = "SELECT * FROM tb_user WHERE name ='$name' ";
$rowRst_user = $conne -> getRowsRst($sql_user);
$authorid = $rowRst_user['id'];

$pdf = new FPDI();
$pageCount = $pdf->setSourceFile("../file/pdf/".$authorid."/".$pdfName.".pdf");

for($pageNo = 1; $pageNo <= $num; $pageNo++){
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
}

$pdf->Image("../file/seal/".$sealName.".png",$intX,$intY);
	
for($pageNo; $pageNo <= $pageCount; $pageNo++){
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
}
// import page 1
//$tplIdx = $pdf->importPage($pageNo);
// use the imported page and place it at position 10,10 with a width of 100 mm
//$pdf->useTemplate($templatedId);

// now write some text above the imported page

$pdf->Output();
$pdf->Output('F',"../file/pdf/".$authorid."/".$pdfName.".pdf");

$cookie = "";
//$pdf->Output();
//echo($pdfName);
//header("Location:http://pdf.com/op.php"); 
?>

