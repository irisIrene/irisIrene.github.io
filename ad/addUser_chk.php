<?php include ("if_ad_login.php");?>

<?php
  header('Content-Type:text/html;charset=utf-8');
  include_once'../conn/conn.php';
  $reback = '0';
  
  $name = $_SESSION['name'];
  $rowRst_mark = $conne->getRowsRst("SELECT * FROM tb_user WHERE name='$name'");
  $mark = $rowRst_mark['mark'];
  
  $sql = "insert into tb_user(name,password,authority,mark)
values('".trim($_POST['username_reg'])."' , '".md5(trim($_POST['pwd1_reg']))."' , '".$_POST['selId_reg']."','$mark') ";
  $num = $conne->uidRst($sql);
  
  $user = trim($_POST['username_reg']);
  $sql_new = "SELECT * FROM tb_user WHERE name = '$user'";
  $RowsRst_new = $conne->getRowsRst($sql_new);
  $newname = $RowsRst_new['id'];
  
  if($num==1){
	  $dirname = "../file/pdf/$newname";
	  mkdir($dirname,0777);
	  $reback = '1';
	  
	  }
  else{
	  $reback = $conne->msg_error();
	  }
	  
  if($reback=='1'){
	  
	  echo("添加成功!");
?>    
	  <form> 
         <input type="button" value="关闭" onClick="window.opener.location.reload();window.close();"> 
      </form> 
<?php
	  }
  else if($reback=='-1'){
	  
	  echo("添加失败");
	  }
  else{
	  echo($reback);
  }
?>