<?php include ("if_ad_login.php");?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>添加用户</title>
<script src="../js/register.js"></script>
</head>

<body>
	<form  action="addUser_chk.php" method="post" autocomplete="on"> 
                            <p><input type="text" class="frmElement" id="username_reg" name="username_reg" required="required" placeholder="用户名" 
                                 onKeyUp="chk_username_1();" onBlur="chk_username_2();"/> 
                                 <span id="namespan_reg"></span></p>
                            <p><input type="password" class="frmElement" id="pwd1_reg" name="pwd1_reg" required="required" placeholder="密码"
                                 onBlur="chk_password_1();"/>
                                 <span id="pwd1span_reg"></span></p>
                            </span><p><input type="password" class="frmElement" id="pwd2_reg" name="pwd2_reg" required="required" placeholder="确认密码"
                                 onBlur="chk_password_2();"/>
                                 <span id="pwd2span_reg"></p>
                            <p>
                              <select class="frmElement" id="selId_reg" name="selId_reg" >
                                   <option value="管理员">管理员</option>
                                   <option value="操作员">操作员</option>
                              </select>
                            </p><br />
                            <p><input type="submit" class="frmElement" id="submit_reg" value="添  加 "/></p>  
                    </form>

</body>
</html>