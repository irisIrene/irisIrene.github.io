<?php include ("if_login.php");?>

<?php
header('Content-Type:text/html;charset=utf-8');
include_once"../conn/conn.php";
//include ("../php/Paged Display.php");

$name = $_SESSION['name'];
$pdfName = $_SESSION['pdfName'];
//if(!$pdfName == $_POST['pdfName']){$pdfName = $_GET['pdfName'];}
$_SESSION['pdfName'] = $pdfName;
$pageCount = $_SESSION['pageCount'];

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
$department[$m] = $rowsRst_seal['department'];  //一维数组 $department
$conne->close_rst($sql);
}		  
?>

<html>
<head>
<script type="text/javascript" src="../js/importSeal.js"></script>
<style>
#formdiv{
	position:fixed;
	width:100%;
	height:30px;
	z-index:999;
	background-color:#454645;
	color:#fff;
	padding:8px 0 0 20px;
	font-family:"造字工房悦圆演示版常规体", "造字工房悦黑演示版常规体", "造字工房悦黑演示版纤细体", "造字工房悦黑演示版特细体", "造字工房悦黑演示版细体";
    }
#formdiv  a {
	float:left;
	margin-right:300px;
	}
#formdiv > div{
	width:1200px;
	}
form{
	float:left;
	margin-right:30px;
	}
form button{
	background-color:#fff;
	color:#6DCFA6;
	border:0;
	height:20px;
	display:inline;
	margin-right:10px;
	}
form input{
	width:30px;
    }
body{
	width:1200px;
	margin:0;
	background-color:#2C2D2C;
	}
#containertdiv{
    margin-left:80px;
	}
#container{
	width:800px;
	height:1110px;
	border:0;
	position:absolute;
	left:300px;
	top:40px;
	}
#content{
	width:800px;
	height:1050px;
	position:absolute;
	margin:40px 0 0 300px;
	z-index:99;

	}
#importSeal{
	position:fixed;
	top:40px;
	left:80px;
	color:#6DCFA6;
	font-size:18px;
	font-family:"造字工房悦圆演示版常规体", "造字工房悦黑演示版常规体", "造字工房悦黑演示版纤细体", "造字工房悦黑演示版特细体", "造字工房悦黑演示版细体";
	}
#seal{
	margin:0;
	padding:0;
	width:150px;
	list-style:none;
	background-color:#eee;
	border:2px #999 solid;
	position:fixed;
	left:0;
	}
#seal li{
	padding-left:0;
	background-color:#fff;
	margin-bottom:3px;
	padding:10px;
	padding-left:30px;
	}
#seal li img{
	margin:5px;
	}
.hide{
	display:none;
	}
.hideform{
	display:none;
	}
input{
	text-align:center;
	}
</style>

			
<script>			
    //window.onscroll=function()
    /*var a;
    function getscroll()
    { 
     a = document.getElementById('container').contentWindow.document.body.clientHeight;
     //alert(a);
    } */
	
	// JavaScript Document
        document.cookie="";
		
		function $(idValue){
			return document.getElementById(idValue);
			}
		//设置全局变量
		var tname; 
		var tid;
		var sealName;
		//
		function whichElement(e){
			document.getElementById("ImgFly").style.opacity = '1';
			var targ
			if(!e){
				var e = window.event;
				}
			if(e.target){
				targ = e.target;
				}
			else if(e.srcElement){
				targ = e.srcElement;
				}
			if(targ.nodeType == 3){      // defeat Safari bug
				targ = targ.parentNode;
				}
			   
			tname = targ.name;
			tid = targ.id;	
			tsrc = targ.src;	
			//alert(tname);
	    }
			
			
		function DivFlying() {
		var div = document.getElementById("ImgFly");
		if (!(div&&tname)) {
	   return;
		}
		var intX = window.event.clientX;
		var intY = window.event.clientY;
		div.src = tsrc;
		div.style.left = intX + "px";
		div.style.top = intY + "px";
		div.style.zIndex = 99;
	  }			
			
		function insertWithin() {/*idstr: 图片标签的id，url:插入的图片的路径*/
		    if(tname){
            //指定结点 id
				var node = document.getElementsByClassName("content")[0];
				//var node = document.getElementsByTagName("body")[0];
				//创建
				var NewDiv = document.createElement("div");
				//对div设置定位  
				NewDiv.style.position = "absolute";
				NewDiv.style.left = event.offsetX;
				NewDiv.style.top = event.offsetY;
				//创建div内加入的内容
				var Newimg = document.createElement("img");
				//对图片设置路径和img的id
				Newimg.src = tsrc;
				//Newimg.id = tname+'id';
				//追加一个新的子结点
				
				NewDiv.appendChild(Newimg);
				//追加一个新的结点
				node.appendChild(NewDiv);
				NewDiv.id = tname+'id';
				tid = NewDiv.id;
				//alert(tid);
				//alert(a);
				}
			
			
			
			sealName = 'seal'+tname;
			$(sealName).style.display = 'inline';	
			//alert(sealName);
			tname = '';
			$("ImgFly").style.opacity = '0';
			//alert(sealArray);
			
			//alert(document.getElementById("container").contentWindow.document.body.offsetHeight);
			//alert(document.getElementById("container").contentWindow.document.documentElement.scrollTop);//垂直方向
            //alert(document.getElementById("container").contentWindow.document.documentElement.scrollLeft);//水平方向
			
			//alert(document.getElementById("container").contentWindow.document.documentElement.scrollHeight);
        }	
		
		function move(event){
			//alert(tid);
			if(tid){//alert(tid);
				x = parseInt($(tid).offsetLeft);   // 此处是 offsetLeft 而不是 left
				y = parseInt($(tid).offsetTop);    // 此处是 offsetTop 而不是 top
				var step = 20;
				if (event.keyCode == 37)  $(tid).style.left = x - step;
				if (event.keyCode == 38)  $(tid).style.top  = y - step;
				if (event.keyCode == 39)  $(tid).style.left = x + step;
				if (event.keyCode == 40)  $(tid).style.top  = y + step;
				}
			intX = $(tid).offsetLeft;
			intY = $(tid).offsetTop;
			
            document.cookie = "intX="+intX;
			document.cookie = "intY="+intY;
			
			//alert(document.cookie);
			}
</script>

</head>
<body  onMouseMove="DivFlying()" onkeyup="move(event)" onscroll="getscroll();">
    <div id="top"></div>
    <img  id="ImgFly" style="position:absolute" />
    
    <div id="formdiv"><div>
        <a href="op.php"><img src="../images/logo.png" /></a>
        <form action="pdf_Paged.php" method="post" target="container" onSubmit=" pageCoolie();">
        <button type="submit">前往</button>
          第<input name="pageNum" id="pageNum" value="1" width="20"/>/ <?php echo($pageCount) ?> 页 
          
          <button type="submit"><img src="../images/icon_ppage.png" title="下一页" onClick="previousPage();" name="Minus" value="-1" /></button>
          <button type="submit"><img src="../images/icon_npage.png" title="上一页" onClick="nextPage();" name="Plus" value="1" /></button>
        </form>
        
        <input id="pageCount" value="<?php echo($pageCount) ?>" class="hide"/>
        
        <form action="#">
            <button type="reset" onclick="location.reload()">取消</button>
        </form>
        <?php
        for($j=0;$j<$m;$j++){
         ?>
            <form action="SealToPdf.php" method="post" class="hideform" id="seal<?php echo($id[$j])?>">
                <button type="submit">确认导入</button>
                <input name="sealName" value="<?php echo($id[$j])?>" class="hide" />
            </form>
         <?php
              } 
         ?>  
    </div></div>

    <div id="containertdiv">
          <?php
          $sql_user = "SELECT * FROM tb_user WHERE name ='$name' ";
          $rowRst_user = $conne -> getRowsRst($sql_user);
          $authorid = $rowRst_user['id'];
          //$conne -> uidRst($sql);
          ?>
        <iframe id="container" name="container" src="pdf_Paged.php"></iframe>
    </div>
    <div class="content" id="content" onMouseDown="insertWithin();">  
    </div> 
     
    <div id="importSeal">
        <ul id="seal" name="seal">
          <li>可用公章</li>
          <?php
              for($j=0;$j<$m;$j++){
            ?>
                <li style="height:80px;"><img name="<?php echo($id[$j])?>" src="../file/seal/<?php echo($id[$j])?>.png" style="position:fixed;" width="80" onMouseDown="whichElement(event);" title="<?php echo($department[$j]) ?>"/></li>
            <?php
              } 
            ?>  
        </ul>
    </div>        
</body>
<html>