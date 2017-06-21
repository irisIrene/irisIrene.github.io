<?php
session_start();
//header('Content-Type:text/html;charset=utf-8');
include_once"../conn/conn.php";
$sql = "SELECT * FROM tb_user WHERE name='".$_GET['name']."'";
//获取查询结果的记录数
$num = $conne->getRowsNum($sql);
if($num==1){  //如果有记录
	echo'1';
    }
else if($num==0){  //如果没有记录
	echo'0';
	}
/*else{   //否则出错
	echo mysql_error();
	}*/
?>