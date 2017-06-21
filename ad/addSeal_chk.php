<?php include ("if_ad_login.php");?>

<?php
header('Content-Type:text/html;charset=utf-8'); 
include_once'../conn/conn.php';
  
$reback = '0';

$department = trim($_POST['department']);

$name = $_SESSION['name'];
$rowRst_mark = $conne->getRowsRst("SELECT * FROM tb_user WHERE name='$name'");
$mark = $rowRst_mark['mark'];

$file = $_FILES['seal'];//得到传输的数据
$name = $file['name'];//得到文件名称

$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
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

//添加到数据库
$sql = "insert into tb_seal(name,department,mark) values('$name' ,'$department','$mark') ";
$num = $conne->uidRst($sql);
if($num==1){
	  $reback = '1';
	  }


//添加后获取数据库里id值
$sql_new = "SELECT * FROM tb_seal WHERE name = '$name'";
$RowsRst_new = $conne->getRowsRst($sql_new);
//将id值作为文件在服务器中存储的名字
$newname = $RowsRst_new['id'].".".$type; 
//$conne->close_rst($sql);

//设置文件路径
$upload_path = "../file/seal/";
//在数据库中添加文件路径
$imgsrc = $upload_path.$newname;  
//$sql_update = "UPDATE tb_seal SET imgsrc = '$imgsrc' WHERE name = '$name'";
//$num = $conne->uidRst($sql_update);


//开始移动文件到相应的文件夹
if(move_uploaded_file($file['tmp_name'],$imgsrc)){
	if($reback=='1'){
	  echo("添加成功！");
?>    
	  <form> 
         <input type="button" value="关闭" onClick="window.opener.location.reload();window.close();"> 
      </form> 
<?php
	  }
	else if($reback=='-1'){
	  echo("添加失败！");
	  }
  else{
	  echo($reback);
  }
}
else{
  echo "添加失败!";
}
?>