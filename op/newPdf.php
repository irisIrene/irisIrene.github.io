<?php include ("if_login.php");?>

<?php
error_reporting(0);
include_once"../conn/conn.php";
header('Content-Type:text/html;charset=gbk');
//define('FPDF_FONTPATH','myfont/');
require('chinese.php');
require_once('fpdi/fpdi.php');

$author = $_SESSION['name'];

$fonColor = $_POST['fontColor'];
$fontSize = $_POST['fontSize'];
$text = $_POST['textContainer'];
$pdfName = $_POST['pdfName'];
$leftMargin = $_POST['leftMargin'];
$rightMargin = $_POST['rightMargin'];
//$topMargin = $_POST['topMargin'];
$fontHeight = $_POST['fontHeight'];

//$lineWidth = $_POST['$lineWidth'];

//$pdfName = $pdfName.".pdf";
$sql = "insert into tb_pdf(name,author) values('$pdfName' , '$author') ";
$conne->uidRst($sql);

//添加后获取数据库里id值
$sql_new = "SELECT * FROM tb_pdf WHERE name = '$pdfName'";
$RowsRst_new = $conne->getRowsRst($sql_new);
//将id值作为文件在服务器中存储的名字
$newname = $RowsRst_new['id']; 

$pdf=new PDF_Chinese();

$pdf->AddPage();
//$pdf->AddGBFont(); 
//$pdf->AddBig5Font();
//$pdf->SetFont('','',20);
//$pdf->Write(10,'你早，清晨！'); 

$pdf->SetAuthor($author);

$pdf->SetLineWidth($linewidth); if(!$linewidth){$pdf->SetLineWidth(0);}
$fontHeight = ($fontHeight*$fontSize)/4; if(!$fontHeight){$fontHeight=0;}

$pdf->SetLeftMargin($leftMargin); if(!$leftMargin){$pdf->SetLeftMargin(10);}
$pdf->SetRightMargin($rightMargin); if(!$rightMargin){$pdf->SetRightMargin(10);}
//$pdf->SetTopMargin($topMargin); if(!$topMargin){$pdf->SetTopMargin(0);}
  
$pdf->AddGBFont('simsun','simsun');
$pdf->SetFont('simsun','',$fontSize."px"); 

$pdf->SetTextColor($fonColor);       
$pdf->Write($fontSize/4+$fontHeight,$text);  

$sql_user = "SELECT * FROM tb_user WHERE name ='$author' ";
$rowRst_user = $conne -> getRowsRst($sql_user);
$authorid = $rowRst_user['id'];

$filesrc = '../file/pdf/'.$authorid.'/'.$newname.'.pdf';
$pdf->Output('F',$filesrc);

header("Location:op.php");
?>