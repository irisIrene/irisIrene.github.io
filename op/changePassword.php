<?php include ("../op/if_login.php");?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PDF文件在线印章系统</title>
<link rel="stylesheet" type="text/css" href="../css/top.css">
<link rel="stylesheet" type="text/css" href="../css/changePassword.css">

</head>

<body>

  <center id="center_top">
    <div id="top">
      <a id="logo" href="op.php"><img src="../images/logo.png" /></a>
    </div>
  </center>

  <div id="main">
      <center>
        <form name="frmChangePassword" method="post" action="../php/changePassword_chk.php">
            <br />
            <h2>修改密码</h2><br />
              <label>当前密码</label><input id="pwdCurrentPassword" type="password" name="pwdCurrentPassword" required="required"/><br /><br />
              <label>新密码</label><input id="pwdNewPassword" type="password" name="pwdNewPassword" required="required"/><br /><br />
              <label>确认新密码</label><input id="pwdCfmNewPassword" type="password" name="pwdCfmNewPassword"  required="required"/><br /><br /><br />
              <input type="submit" value="确认修改" />
        </form>
      </center>
  </div>
  
</body>
</html>