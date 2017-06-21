<?php
  session_start();
  header('Content-Type:text/html;charset=utf-8');
?>

<html>
<head>
    <meta charset="UTF-8" />
    <title>PDF文件印章系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="PDF文件处理系统" />
    <meta name="keywords" content="PDF,文件处理,盖章," />
    <link rel="shortcut icon" href="images/logo_mini.png" /> 
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/top.css">
    <script type="text/javascript" src="js/register.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    
<style>        /* #bcad5e #e7e3c5 #626e83 #87877a*/         /*81d5b4*/	
body{
	height:auto;
	background-image:url(images/img.png);
    }
#top{
	background-color:inherit;
	}
#direction{
	float:right;
	}
#direction:hover{
	font-weight:bolder;
	}
#direction img{
	position:relative;
	top:5px;
    }
#container{
	width:1200px;
	margin:0 auto;
	padding-top:50px;
	}
#left{
	float:left;
	width:800px;
	height:400px;
	}
#right{
	float:left;
	color:#87877a;
	font-size:18px;
	}
#wrapper h2{
	text-align:center;
    }
#toregister,#tologin{
	display:none;
	}
#login,#register{
	position:absolute;
	width:400px;
	background-color:#fff;
	}
#login{
	z-index:2;
	}
#register{
	z-index:1;
	opacity:0;
	}
form{margin:0px 10px 0px 100px;}
form span{
	float:right;
	}
.frmElement{
	width:200px;height:25px;
    background-color:#eee;
	border-color:#eee; border-width:2px; border-style:solid; border-radius:3px;
	}
.frmElement:focus{
	 border-color:#73E0B2; border-width:2px; border-style:solid;
	}
input[type="submit"]{
	background-color:#6DCFA6;
	border-color:#6DCFA6; border-width:2px; border-style:solid;
	color:#fff;
	}
input[type="submit"]:hover{
	font-weight:bolder;
	background-color:#73E0B2;
	border-color:#91EBC5; border-width:2px; border-style:solid;
	}
#wrapper a{
	color:#73E0B2;
	}
#wrapper a:hover{
	font-weight:bolder;
	}

</style>
      
</head>
  
<body>	
      <center id="center_top">
        <div id="top">
            <a id="logo" href="#"><img src="images/logo.png" /><b>PDF文件在线印章系统</b></a>
            <div id="direction"><a href="direction.html">
                <img src="images/icon_direction.png" /> 说明</a>
            </div>
        </div>
        </center>	
        
        <div id="container" >
            <div id="left">
                
            </div>
            
            <div id="right">
              <a id="toregister"></a>
              <a id="tologin"></a>
              <div id="wrapper">
              
                <div id="login" class="animate form">
                    <h2> 登  录 </h2>
                    <form  action="php/login_chk.php" method="post" autocomplete="on">  
                            <span id="namespan"></span><p><input type="text" class="frmElement" name="username" id="username" required="required" placeholder="用户名"
                                 onBlur="chk_username();"/></p>
                            <p><input type="password" class="frmElement" name="password" id="password" required="required" placeholder="密码"/></p> 
                            <p><select id="selId" name="selId" class="frmElement">
                                <option value="管理员">管理员</option>
                                <option value="操作员">操作员</option>
                            </select></p>
                            <p><small><a id="link_forgetPassword" href="">忘记密码?</a></small></p>
                            </p><br />
                            <p><input type="submit" class="frmElement" id="submit" value="登 录" /></p>
                            <p><small>没有账号?<a href="#toregister" > 注 册 </a></small></p>
                    </form>
                </div>        
                <div id="register" class="animate form">
                    <h2> 注 册 </h2> 
                    <form  action="php/register_chk.php" method="post" autocomplete="on"> 
                            <span id="namespan_reg"></span><p><input type="text" class="frmElement" id="username_reg" name="username_reg" required="required" placeholder="用户名" 
                                                                onKeyUp="chk_username_1();" onBlur="chk_username_2();"/></p>
                            <span id="emailspan_reg"></span><p><input type="email" class="frmElement" id="email_reg" name="email_reg" required="required" placeholder="邮箱"/></p> 
                            <span id="pwd1span_reg"></span><p><input type="password" class="frmElement" id="pwd1_reg" name="pwd1_reg" required="required" placeholder="密码"
                                                               onBlur="chk_password_1();"/></p>
                            <span id="pwd2span_reg"></span><p><input type="password" class="frmElement" id="pwd2_reg" name="pwd2_reg" required="required" placeholder="确认密码"
                                                               onBlur="chk_password_2();"/></p>
                            <p><select class="frmElement" id="selId_reg" name="selId_reg" ><option value="管理员">管理员</option></select></p><br />
                            <p><input type="submit" class="frmElement" id="submit_reg" value="注 册"/></p>  
                            <p><small>已有账号?<a href="#tologin"> 登 录 </a></small></p>
                    </form>
                </div>
                
              </div> 
            </div>
        
      </div>
      
    </body>
</html>