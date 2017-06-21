<?php include ("if_login.php");?>
<?php 
header('Content-Type:text/html;charset=gbk');
?>
<!doctype html>
<html>
<head>
<title>新建PDF文件</title>
<style>
#main{
	width:800px;
	margin:0 auto;
	}
#textContainer{
	width:600px;
	height:500px;
	font-size:20px;
	color:#000;
	}
button{
  	color:#000;
	background-color:#6DCFA6;
	border:0;
    }
button:hover{
  	color:#fff;
    }
input[name="leftMargin"] , input[name="rightMargin"]{
	width:30px;
    }
</style>
<script type="text/javascript" src="../js/newFile.js"></script>

</head>

<body onMouseDown="setsetColor();">
    <div id="main">
      <form action="newPdf.php" method="post">
        <div id="tool">
          <label>文件名</label><input name="pdfName" required="required"/><span id="namespan"></span>
          
          <button type="submit" onClick="getColor();">提交</button>
          
          <br /><br />     
        
          <label>左边距</label><input name="leftMargin" value="10"/>
          <label>右边距</label><input name="rightMargin" value="10"/>
          <!--<label>上边距</label><input name="topMargin"/>  -->  
          
          <label>行距</label>
          <select name="fontHeight">
            <option value="0.25">0.25倍</option>
            <option value="0.5" selected="selected">0.5倍</option>
            <option value="0.75">0.75倍</option>
            <option value="1">1.0倍</option>
            <option value="1.5">1.5倍</option>
            <option value="2">2.0倍</option>
            <option value="2.5">2.5倍</option>
            <option value="3">3.0倍</option>
          </select>
          
          <!--<label></label><input name="linewidth"/>-->
          
          <label>字号</label>
          <select name="fontSize">
            <option value="8" onClick="setFontSize('8px');">8px</option>
            <option value="12" onClick="setFontSize('12px');">12px</option>
            <option value="16" onClick="setFontSize('16px');">16px</option>
            <option value="20" onClick="setFontSize('8px');" selected="selected" >20px</option>
            <option value="24" onClick="setFontSize('24px');">24px</option>
            <option value="28" onClick="setFontSize('28px');">28px</option>
            <option value="32" onClick="setFontSize('32px');">32px</option>
            <option value="34" onClick="setFontSize('34px');">34px</option>
            <option value="36" onClick="setFontSize('36px');">36px</option>
            <option value="38" onClick="setFontSize('38px');">38px</option>
            <option value="40" onClick="setFontSize('40px');">40px</option>
            <option value="42" onClick="setFontSize('42px');">42px</option>
            <option value="44" onClick="setFontSize('44px');">44px</option>
            <option value="46" onClick="setFontSize('46px');">46px</option>
            <option value="48" onClick="setFontSize('48px');">48px</option>
            <option value="60" onClick="setFontSize('60px');">60px</option>
          </select>
          
          <label>字体</label>
          <select name="fontType">
            <option value="" selected="selected">默认</option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
          </select>
          
          <!--<label>颜色</label>
          <select name="setColor" id="setColor">
            <option value="#2c2c2c" selected="selected"><img src="images/color/2c2c2c.png" onClick="setsetColor('#2c2c2c');"/></option>
            <option value="#13227a"><img src="images/color/13227a.png" onClick="setsetColor('#13227a');"/></option>
            <option value="#1296db"><img src="images/color/1296db.png" onClick="setsetColor('#1296db');"/></option>
            <option value="#1afa29"><img src="images/color/1afa29.png" onClick="setsetColor('#1afa29');"/></option>
            <option value="#f4ea2a"><img src="images/color/f4ea2a.png" onClick="setsetColor('#f4ea2a');"/></option>
            <option value="#d4237a" style="background-image:url(images/color/d4237a.png)">234234</option>
            <option value="#d81e06"><img src="images/color/d81e06.png" onClick="setsetColor('#d81e06');"/></option>
            
          </select>-->
          
          <input name="setColor" type="color" id="setColor"/>
          <input name="fontColor" value="" style="display:none"/>
          
          
          
          <br /><br />
          
          <textarea id="textContainer" name="textContainer">
          
          </textarea>
    </form>
    </div>
</body>
</html>