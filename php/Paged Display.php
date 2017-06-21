<?php 
error_reporting(0);
header('Content-Type:text/html;charset=utf-8');
// Page分页函数
 
$page = $_GET["page"]; 
function Page($rows,$page_size){ 
global $page,$select_from,$select_limit,$pagenav; 
$page_count = ceil($rows/$page_size); 
if($page <= 1 || $page == '') $page = 1; 
if($page >= $page_count) $page = $page_count; 
$select_limit = $page_size; 
$select_from = ($page - 1) * $page_size.','; 
$pre_page = ($page == 1)? 1 : $page - 1; 
$next_page= ($page == $page_count)? $page_count : $page + 1 ; 

$pagenav .= "<a href='?page=$pre_page' style='background-color:#FFF4D2;margin:3px'>上一页</a> "; 
$pagenav .= "<a href='?page=$next_page' style='background-color:#FFF4D2'>下一页</a> "; 
//$pagenav .= "<a href='?page=1' style='background-color:#FFF4D2;margin:10px;'>首页</a> ";
//$pagenav .= "<a href='?page=$page_count' style='background-color:#FFF4D2;margin:10px;'>末页</a>";  
$pagenav .= "第 $page/$page_count 页  "; //共 $rows 个pdf文件


//$pagenav.=" 跳到<select name='topage' size='1' onchange='window.location=\"?page=\"+this.value'>\n"; 
//		if($i==$page) $pagenav.="<option value='$i' selected>$i</option>\n"; 
//		else $pagenav.="<option value='$i'>$i</option>\n"; 
//	    } 
     }  
?> 