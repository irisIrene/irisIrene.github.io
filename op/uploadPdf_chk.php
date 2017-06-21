<?php include ("if_login.php");?>

<?php
header('Content-Type:text/html;charset=utf-8'); 
include_once'../conn/conn.php';
  
$reback = '0';

$author = $_SESSION['name'];

$file = $_FILES['pdf'];//得到传输的数据
$name = $file['name'];//得到文件名称

$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
$allow_type = array('pdf'); //定义允许上传的类型
//判断文件类型是否被允许上传
if(!in_array($type, $allow_type)){
  //如果不被允许，则直接停止程序运行
  //return ;
  echo("不支持的文件格式！");
}
//判断是否是通过HTTP POST上传的
if(!is_uploaded_file($file['tmp_name'])){
  //如果不是通过HTTP POST上传的
  //return ;
  echo("上传出错！");
}

//去掉后缀名之后，加入数据库
//$houzhui = substr(strrchr($name, '.'), 1);
//$pdfname = basename($name,".".$houzhui);
//
//添加到数据库
$sql = "insert into tb_pdf(name,author) values('$name' , '$author') ";
$num = $conne->uidRst($sql);
if($num){
	  $reback = '1';
	  }

//添加后获取数据库里id值
$sql_new = "SELECT * FROM tb_pdf WHERE name = '$name'";
$RowsRst_new = $conne->getRowsRst($sql_new);

//将id值作为文件在服务器中存储的名字
$newname = $RowsRst_new['id'].".".$type; 
//$conne->close_rst($sql);

$sql_user = "SELECT * FROM tb_user WHERE name ='$author' ";
$rowRst_user = $conne -> getRowsRst($sql_user);
$authorid = $rowRst_user['id'];
//$conne -> uidRst($sql);

//设置文件路径
$upload_path = "../file/pdf/".$authorid."/"; 
//在数据库中添加文件路径
$pdfsrc = $upload_path.$newname;  
//$sql_update = "UPDATE tb_pdf SET pdfsrc = '$pdfsrc' WHERE name = '$name'";
//$num = $conne->uidRst($sql_update);
//$upload_path = "../file/pdf/".$author."/"; //上传文件的存放路径
//开始移动文件到相应的文件夹

if(move_uploaded_file($file['tmp_name'],$pdfsrc)){
	if($reback=='1'){
	  echo("上传成功！");
?>    
	  <form> 
         <input type="button" value="关闭" onClick="window.opener.location.reload();window.close();"> 
      </form> 
<?php
	  }
	else if($reback=='-1'){
	  echo("上传失败！");
	  }
  else{
	  echo($reback);
  }
}
else{
  echo "上传失败!";
}

?>