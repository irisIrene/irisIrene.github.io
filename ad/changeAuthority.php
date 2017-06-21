<?php include ("if_ad_login.php");?>

<?php
header('Content-Type:text/html;charset=utf-8');
include_once"../conn/conn.php";

$_SESSION['user'] = $_POST['user'];
$user = $_SESSION['user'];
$sql = "SELECT * FROM tb_user WHERE name ='$user'";
$RowsRst = $conne->getRowsRst($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>修改身份</title>

<style>
div{
	width:300px;
	margin:0 auto;
	margin-top:100px;
	}
form{
	display:inline;
	}
</style>

</head>

<body>
<div>
    <p>将用户 <b> <?php echo($user)?> </b> 的身份设置为:</p>
      <form action="changeAuthority_chk.php" method="post">
        <select id="selId" name="selId" >
             <option value="管理员">管理员</option>
             <option value="操作员">操作员</option>
        </select>
        <button type="submit">确认</button>
      </form>
      <form action="ad.php#toUserManage" method="post">
        <button type="submit">取消</button>
      </form>
      </div>
   
</body>
</html>