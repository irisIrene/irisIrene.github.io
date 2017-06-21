<?php include ("if_ad_login.php");?>

<?php
header('Content-Type:text/html;charset=utf-8');
include_once"../conn/conn.php";

$name=$_SESSION['name'];

$rowRst_mark = $conne->getRowsRst("SELECT * FROM tb_user WHERE name='$name'");
$mark = $rowRst_mark['mark'];
$conne->close_rst($rowRst_mark);

$sql_User = "SELECT * FROM tb_user WHERE mark = '$mark'";

$num_User = $conne->getRowsNum($sql_User);
$rowsArray_User = $conne->getRowsArray($sql_User);
?>

<!doctype html>
<html>
<head>
<title>PDF文件印章系统</title>
<link rel="shortcut icon" href="../images/logo_mini.png" /> 
<link rel="stylesheet" type="text/css" href="../css/top.css" />
<link rel="stylesheet" type="text/css" href="../css/animate.css" />
<script src="../js/jquery.js"></script>
<script src="../js/ad.js"></script>

<style type="text/css">
#top span{
	float:right;
	margin-top:10px;
	}
#main{
	background-color:inherit;
	}
#nav{ 
	height:27px;
	}
#nav ul{
	margin:0;
	padding:0;
	}
#nav a{
	float:left;
	width:398px;              /****************** 1200px - 3px*2 = 990px     1194px / 3 = 398px;*******************************/
	color:#fff;
	font-size:16px;
	text-align:center;
	background-color:#6DCFA6;
	padding:2px 0 2px 0;	
	}	
#link_userManage,#link_sealManage{
	margin-right:3px;
	}
#wrapper a{
	display:none;
    }
#wrapper > div{
	width:1200px;                       
	height:548px;                     
	border:0;
	background-color:#fff;
	text-align:center;
	position:absolute;
	}
table{
	width:1200px; 
	background-color:#fff;	
	}
th{
	background-color:#aaa;
	}
#userManage_tb td , #authorizedSeal_tb td{
	height:25px;
	}
#sealManage_tb td{
	height:60px;
	}
.heavy{
	background-color:#ddd;
	}
.light{
	background-color:#eee;
	}
#table_1{
	z-index:2;
	}
#table_2,#table_3{
	z-index:1;
	opacity:0;
	}
.operating{
	width:100px;
	}
.operating > button{
	border:0;
	display:block;
	margin-left:20px;
    background-color:#439674;
	color:#fff;
    }
.operating > button:hover{
	background-color:#fff;
	color:#439674;
	}
.hidetd{
	opacity:0;
	}
tr:hover > .hidetd{
	opacity:1;
	}
.hidetd button{
	border:0;
	background-color:#ACDBC7;
	}
.hidetd button:hover{
	background-color:#fff;
	}
form{
	margin-left:14px;
	float:left;
	}
.hide{
	display:none;
	}
</style>

</head>

<body  onmousedown="whichElement(event);"> 
  <center id="center_top">
    <div id="top">
      <a id="logo" href="ad.php" name="logo"><img src="../images/logo.png" /></a>
      <ul id="user">
        <a href="#"><img src="../images/icon_ad.png" />管理员</a>
        <ul>
          <li><button id="link_quit" onClick="sure_quit();">退出</button></li>
          <li><a id="link_changePassword" href="changePassword.php">修改密码</a></li>
        </ul>
      </ul>
      <span><?php echo($name);?></span>
    </div>
  </center>

  <div id="main">
  
      <div id="nav">
        
          <a id="link_userManage" href="#toUserManage" onClick="changeColor(this);">用户管理</a>
          <a id="link_sealManage" href="#toSealManage" onClick="changeColor(this);">公章库</a>
          <a id="link_authorizedSeal" href="#toAuthorizedSeal" onClick="changeColor(this);">已授权公章列表</a>
        
      </div>
      
      <div id="wrapper">
          <a id="toUserManage"></a>
          <a id="toSealManage"></a>
          <a id="toAuthorizedSeal"></a>
      
        <div id="table_1"  class="animate">
          <table id="userManage_tb">
            <thead>
              <tr>
                <th>编号</th>
                <th>用户名</th>
                <th>身份</th>
                <th class="operating">操作<button title="添加用户" onClick="addUser();">添加用户</button></th>
              </tr>
            </thead>
        <?php
		  $i= 0;  
		?>
			      <tr class="heavy">
                      <td><?php echo($rowsArray_User[$i]['id'])?></td>
                      <td><?php echo($rowsArray_User[$i]['name'])?></td>
                      <td><?php echo($rowsArray_User[$i]['authority'])?></td>
                      <td class="hidetd">
                        <form>
                              <button title="禁止修改" disabled="disabled">
                                  <img src="../images/icon_modify.png"/>
                              </button>
                        </form>  
                        <form>
                              <button title="禁止删除" disabled="disabled" >
                                  <img src="../images/icon_delete.png"/>
                              </button>
                        </form>
                      </td>
                  </tr>
        <?php
		          $i++;
			  
		  for(;$i<$num_User;$i++){
			  if($i%2 == 0){
		?>
                  <tr class="heavy">
                      <td><?php echo($rowsArray_User[$i]['id'])?></td>
                      <td><?php echo($rowsArray_User[$i]['name'])?></td>
                      <td><?php echo($rowsArray_User[$i]['authority'])?></td>
                      <td class="hidetd">
                        <form action="changeAuthority.php" method="post">
                              <button type="submit" title="修改身份" >
                                  <img src="../images/icon_modify.png" name="<?php echo($rowsArray_User[$i]['name'])?>"/>
                              </button>
                              <input name="user" value="<?php echo($rowsArray_User[$i]['name'])?>" class="hide" />
                        </form>  
                        <form action="deleteUser.php" method="post" onSubmit="return sure_deleteUser();">
                              <button type="submit" title="删除用户">
                                  <img src="../images/icon_delete.png" name="<?php echo($rowsArray_User[$i]['name'])?>"/>
                              </button>
                              <input name="user" value="<?php echo($rowsArray_User[$i]['name'])?>" class="hide" />
                        </form>
                      </td>
                  </tr>
        <?php 
		      }
              else{
        ?>
                  <tr class="light">
                      <td><?php echo($rowsArray_User[$i]['id'])?></td>
                      <td><?php echo($rowsArray_User[$i]['name'])?></td>
                      <td><?php echo($rowsArray_User[$i]['authority'])?></td>
                      <td class="hidetd">
                        <form action="changeAuthority.php" method="post">
                                <button type="submit" title="修改身份">
                                    <img src="../images/icon_modify.png" name="<?php echo($rowsArray_User[$i]['name'])?>"/>
                                </button>
                                <input name="user" value="<?php echo($rowsArray_User[$i]['name'])?>" class="hide" />
                        </form>  
                        
                        <form action="deleteUser.php" method="post" onSubmit="return sure_deleteUser();">
                              <button type="submit" title="删除用户">
                                  <img src="../images/icon_delete.png" name="<?php echo($rowsArray_User[$i]['name'])?>"/>
                              </button>
                              <input name="user" value="<?php echo($rowsArray_User[$i]['name'])?>" class="hide" />
                        </form>
                      </td>
                  </tr>
        <?php
			  }
		  }
		$conne->close_rst($sql_User);
	    ?>
          </table>
        </div>
          
        <div id="table_2"  class="animate">
          <table id="sealManage_tb" >
            <thead>
              <tr>
                <th>序号</th>
                <th>名称</th>
                <th>缩略图</th>
                <th>所属部门</th>
                <th>入库时间</th>
                <th class="operating">操作<button title="导入公章" onClick="addSeal();">导入公章</button></th>
              </tr>
            </thead>
            <?php
			  $sql_Seal = "SELECT * FROM tb_seal WHERE mark='$mark'";
              $num_Seal = $conne->getRowsNum($sql_Seal);
              $Array_Seal = $conne->getRowsArray($sql_Seal);
			
			  for($j=0;$j<$num_Seal;$j++){
				  if($j%2 == 0){
			?>
					  <tr class="heavy">
						  <td><?php echo ($j+1) ?></td>
						  <td><?php echo($Array_Seal[$j]['name'])?></td>
                          <td><img src="../file/seal/<?php echo($Array_Seal[$j]['id'])?>.png" width="60"/></td>
						  <td><?php echo($Array_Seal[$j]['department'])?></td>
						  <td><?php echo($Array_Seal[$j]['addtime'])?></td>
                          <td class="hidetd">
                            <form action="authorizeSeal.php" method="post">
                                  <button type="submit" title="公章授权">
                                      <img src="../images/icon_authorizeSeal.png"/>
                                  </button>
                                  <input name="seal" value="<?php echo($Array_Seal[$j]['name'])?>" class="hide" />
                            </form>
                            <form action="deleteSeal.php" method="post" onSubmit="return sure_deleteSeal();">
                                  <button type="submit" title="删除公章">
                                      <img src="../images/icon_delete.png"  name="<?php echo($Array_Seal[$j]['name'])?>"/>
                                  </button>
                                  <input name="seal" value="<?php echo($Array_Seal[$j]['name'])?>" class="hide" />
                            </form>
                            </td>
					  </tr>
			<?php 
				  }
				  else{
			?>
					  <tr class="light">
						  <td><?php echo ($j+1) ?></td>
						  <td><?php echo($Array_Seal[$j]['name'])?></td>
                          <td><img src="../file/seal/<?php echo($Array_Seal[$j]['id'])?>.png" width="60"/></td>
						  <td><?php echo($Array_Seal[$j]['department'])?></td>
						  <td><?php echo($Array_Seal[$j]['addtime'])?></td>
                          <td class="hidetd">
                            <form action="authorizeSeal.php?seal=<?php echo($Array_Seal[$j]['name'])?>" method="post">
                                  <button type="submit" title="公章授权">
                                      <img src="../images/icon_authorizeSeal.png"/>
                                  </button>
                                  <input name="seal" value="<?php echo($Array_Seal[$j]['name'])?>" class="hide" />
                            </form>
                            <form action="deleteSeal.php" method="post" onSubmit="return sure_deleteSeal();">
                                  <button type="submit" title="删除公章">
                                      <img src="../images/icon_delete.png" name="<?php echo($Array_Seal[$j]['name'])?>"/>
                                  </button>
                                  <input name="seal" value="<?php echo($Array_Seal[$j]['name'])?>" class="hide" />
                            </form>
                          </td>
					  </tr>
			<?php
				  }
			  }
			  $conne->close_rst($sql_Seal);
			?>
          </table>
        </div>
          
        <div id="table_3"  class="animate">  
          <table id="authorizedSeal_tb" >
            <thead>
              <tr>
                <th>序号</th>
                <th>公章名称</th>
                <th>用户</th>
                <th>授权时间</th>
                <th>使用期限</th>
              </tr>
            </thead>
            <?php
			  $sql_authorizedseal = "SELECT * FROM tb_authorizedseal WHERE mark = '$mark' ORDER BY name";
              $num_authorizedseal = $conne->getRowsNum($sql_authorizedseal);
              $Array_authorizedseal = $conne->getRowsArray($sql_authorizedseal);
			  	
			  for($k=0;$k<$num_authorizedseal;$k++){
				  if($k%2 == 0){
			?>
					  <tr class="heavy">
						  <td><?php echo ($k+1) ?></td>
						  <td><?php echo($Array_authorizedseal[$k]['name'])?></td>
                          <td><?php echo($Array_authorizedseal[$k]['users'])?></td>
						  <td><?php echo($Array_authorizedseal[$k]['addtime'])?></td>
						  <td><?php echo($Array_authorizedseal[$k]['deadline'])?></td>
					  </tr>
			<?php 
				  }
				  else{
			?>
					  <tr class="light">
						  <td><?php echo($k+1) ?></td>
						  <td><?php echo($Array_authorizedseal[$k]['name'])?></td>
                          <td><?php echo($Array_authorizedseal[$k]['users'])?></td>
						  <td><?php echo($Array_authorizedseal[$k]['addtime'])?></td>
						  <td><?php echo($Array_authorizedseal[$k]['deadline'])?></td>
					  </tr>
			<?php
				  }
			  }
			$conne->close_rst($sql_authorizedseal);
			?>
          </table>
        </div>
          
      </div>  
    </div>
</body>
</html>
