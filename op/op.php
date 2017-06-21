<?php include ("if_login.php");?>

<?php
header('Content-Type:text/html;charset=utf-8');
include_once"../conn/conn.php";
include ("../php/Paged Display.php");

$name=$_SESSION['name'];

//连接数据表：已授权公章列表
$sql = "SELECT * FROM tb_authorizedseal WHERE users='$name'";
$num = $conne->getRowsNum($sql);
$rowsArray = $conne->getRowsArray($sql);
//返回一个一维数组：记录了已授权公章的名称（在数据库中的名称）
$k=0;
for(;$k<$num;$k++){	  
$array_seal[$k] = $rowsArray[$k]['name'];
}
$conne->close_rst($sql);
//根据返回的值，连接到数据表：公章列表，查找到对应公章的id值,存到一个一维数组中
$m=0;  // 全局变量 m 
for(;$m<$k;$m++){
$sql = "SELECT * FROM tb_seal WHERE name='$array_seal[$m]'";
$rowsRst_seal = $conne->getRowsRst($sql);
$id[$m] = $rowsRst_seal['id'];      //一维数组 $id
$conne->close_rst($sql);
}		  
?>

<!doctype html>
<html>
<head>
<title>PDF文件在线印章系统</title>
<!--<base target="iframe" />-->
<link rel="shortcut icon" href="../images/logo_mini.png" /> 
<link rel="stylesheet" type="text/css" href="../css/top.css" />
<script type="text/javascript" src="../js/op.js"></script>

<style type="text/css">
#top span{
	float:right;
	margin:10px;
	}
#main{
	background-color:inherit;
	}
#left{
	float:left;
	width:200px;
	height:532px;/*     height:580px      */                 
	font-size:18px;
	color:#000;
	background-color:#fff;
	}
#left div{
	height:20px;
	padding:5px;
	background-color:#333;
	color:#6DCFA6;
	}
#left div a , #left div button{
	float:right;
	background-color:#B2F1D7;
	color:#2F3231;
	font-size:12px;
	text-align:center;
	border:0;
	margin-right:10px;
	padding:2px;
	}
#left button:hover , #left a:hover{
	color:#fff;
	}
#pdfFile{
	width:100%;
	}
#pdfFile td{
	height:60px;
	}
#pdfFile a{
	width:80px;
	padding-right:2px;
	}
#pdfFile form{
	float:right;
	margin-left:10px;
	display:none;
	}
#pdfFile td:hover form{
	display:block;
	}
#pdfFile form button:hover{
	background-color:#CEEFE1;
	}
.heavy{
	background-color:#CEEFE1;
	}
.light{
	background-color:#D3FCEB;
	}
.heavy:hover{
	background-color:#B5FCDF;
	}
.light:hover{
	background-color:#B5FCDF;
	}
.hide{
	display:none;
	}

#dispageDiv{
	position:absolute;
	width:190px;
	height:40px;
	font-size:16px;
	font-weight:bold;
	color:#6DCFA6;
	bottom:0;
	}
#right{
	width:996px;        /* 1200px - 200px - 4px（左边空出4px） =996px;  */
	height:530px;
	margin-left:204px;
	border:0;
	color:#000;
	background-color:#000;
	padding:0;
	}
#container{
	width:996px; 
	height:inherit;
	border:0;
	}
.formspan button{
	background-color:#fff;
	border:2px solid #fff;
	}
</style>
</head>

<body onMouseDown="whichElement(event);">     
  <center id="center_top">
    <div id="top">
      <a id="logo" href=""><img src="../images/logo.png" /></a>
      <ul id="user">
        <a href="#"><img src="../images/icon_op.png" />操作员</a>
        <ul>
          <li><button id="link_quit" onClick="sure_quit();">退出</button></li>
          <li><a id="link_changePassword" href="changePassword.php">修改密码</a></li>
        </ul>
      </ul>
      <span><?php echo($name)?></span>
    </div>
  </center>

  <div id="main">
    <div id="left">
      <div>文件列表
           <a href="newFile.php" target="_blank">新建</a>
           <button onClick="uploadFile();">上传</button>
      </div> 
      <table id="pdfFile" name="pdfFile">
        <?php
		  $rows = $conne-> getRowsNum("SELECT * FROM tb_pdf WHERE author='$name'");
		  Page($rows,7);   // 用Page函数计算出 $select_from 从哪条记录开始检索、$pagenav 输出分页导航
		  
		  $sql_user = "SELECT * FROM tb_user WHERE name ='$name' ";
          $rowRst_user = $conne -> getRowsRst($sql_user);
          $authorid = $rowRst_user['id'];
          //$conne -> uidRst($sql);

		   
		  $sql_pdf = "SELECT * FROM tb_pdf WHERE author='$name' limit $select_from $select_limit";
		  $num_pdf = $conne->getRowsNum($sql_pdf);
		  $rowsArray_pdf = $conne->getRowsArray($sql_pdf);
		  
		  for($i=0;$i<$num_pdf;$i++){
			  
			  if($i%2 == 0){
		?>
                  <tr>
                      <td class="heavy">
                          <a href="#" name="../../../file/pdf/<?php echo($authorid)?>/<?php echo($rowsArray_pdf[$i]['id'])?>.pdf"
                             onClick="viewPdf();changeColor();">
				              <?php echo($rowsArray_pdf[$i]['name'])?>
                          </a><br />
                       <span class="formspan">
                             <form action="deletePdf.php" method="post" onSubmit="return sure_deletePdf();" >
                                <button>
                                    <img src="../images/icon_delete.png" name="<?php echo($rowsArray_pdf[$i]['name'])?>" title="删除文件"/>
                                </button>
                                <input name="pdf" value="<?php echo($rowsArray_pdf[$i]['id'])?>" class="hide" />
                             </form>
                             <form action="pageCount.php" method="post" target="_blank">
                                <button>
                                    <img src="../images/icon_stamp.png" name="<?php echo($rowsArray_pdf[$i]['name'])?>" title="盖章"/>
                                </button>
                                <input name="pdfName" value="<?php echo($rowsArray_pdf[$i]['id'])?>" class="hide" />
                             </form>
                       </span>
                     </td>
                  </tr>
        <?php 
		      }
              else{
        ?>
                  <tr>
                      <td class="light">
                          <a href="#" name="../../../file/pdf/<?php echo($authorid)?>/<?php echo($rowsArray_pdf[$i]['id'])?>.pdf"
                             onClick="viewPdf();changeColor();">
				              <?php echo($rowsArray_pdf[$i]['name'])?>
                          </a><br />
                       <span class="formspan">
                             <form action="deletePdf.php" method="post" onSubmit="return sure_deletePdf();" >
                                <button>
                                    <img src="../images/icon_delete.png" name="<?php echo($rowsArray_pdf[$i]['name'])?>" title="删除文件"/>
                                </button>
                                <input name="pdf" value="<?php echo($rowsArray_pdf[$i]['name'])?>" class="hide" />
                             </form>
                             <form action="pageCount.php" method="post" target="_blank">
                                <button>
                                    <img src="../images/icon_stamp.png" name="<?php echo($rowsArray_pdf[$i]['name'])?>" title="盖章"/>
                                </button>
                                <input name="pdfName" value="<?php echo($rowsArray_pdf[$i]['id'])?>" class="hide" />
                             </form>
                       </span>
                     </td>
                  </tr>
        <?php
			  }
		  }
		  $conne->close_rst($sql); 
	    ?>
      </table>
          <span id="dispageDiv">
          <?php if($rows>1){echo $pagenav;}?>
          </span>
    </div>
    
    <div id="right">
      <iframe id="container" src="PDFJS/web/viewer_1.html?file="></iframe>        
    </div> 
    
  </div>
</body>
</html>
