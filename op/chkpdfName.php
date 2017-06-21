<?php include ("if_login.php");?>

<?php
include_once"../conn/conn.php";
$name = $_SESSION['name'];
$pdfName = $_GET['pdfName'];
$sql = "SELECT * FROM tb_pdf WHERE name='$pdfName' AND author = '$name'";
//获取查询结果的记录数
$num = $conne->getRowsNum($sql);
if($num!=0){  //如果有记录
	echo'1';
    }
else if($num==0){  //如果没有记录
	echo'0';
	}
/*else{   //否则出错
	echo mysql_error();
	}*/
?>