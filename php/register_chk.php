<?php
  session_start();
  header('Content-Type:text/html;charset=utf-8');
  include_once'../conn/conn.php';
  
  $name = trim($_POST['username_reg']);
  
  $reback = '0';
  $sql = "insert into tb_user(name,password,email,authority,superAd,mark)
values('$name' , '".md5(trim($_POST['pwd1_reg']))."' , '".$_POST['email_reg']."' , '".$_POST['selId_reg']."' , 'yes','".trim($_POST['username_reg'])."' ) ";
  $num = $conne->uidRst($sql);
  
  $sql_new = "SELECT * FROM tb_user WHERE name = '$name'";
  $RowsRst_new = $conne->getRowsRst($sql_new);
  $newname = $RowsRst_new['id'];
  
  if($num==1){
	  $dirname = "../file/pdf/$newname";
	  mkdir($dirname,0777);
	  $reback = '1';
	  //$file = '../ad.php';
	  //$newfile = "../file/pdf/$username/index.php";
	  //if(!copy($file,$newfile)){
		 // echo"failed to copy $file...\n";
	  //}
	  }
  else{
	  $reback = $conne->msg_error();
	  }
	  
  if($reback=='1'){
	  sleep(5);
	  echo("<script>alert('注册成功,前往登录！');window.location.href='../index.php';</script>");
	  }
  else if($reback=='-1'){
	  sleep(5);
	  echo("<script>alert('注册失败！');window.history.back(-1);</script>");
	  }
  else{
	  echo($reback);
  }
?>