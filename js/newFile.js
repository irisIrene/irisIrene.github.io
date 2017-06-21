// JavaScript Document
function $(idValue){
	return document.getElementById(idValue);
}

var cname="";
function chk(){
	if (cname=='yes'){
		$('submit').disabled = false;
		}
	else{
		$('submit').disabled = true;
		}
	}	
	
function chkpdfName(){ 
		var pdfname = $('pdfName').value;
		var XHR;  
		function createXHR(){
			if(window.ActiveXObject){ 
				XHR=new ActiveXObject('Microsoft.XMLHTTP'); 
			    }
			else if(window.XMLHttpRequest){//非IE系列的浏览器，但包括IE7 IE8 
				XHR=new XMLHttpRequest(); 
			    } 
		    } 
			
		createXHR(); 
		XHR.open("get","php/chkpdfName.php?pdfName="+pdfName,true);
		XHR.send(null);
		XHR.onreadystatechange = function(){
			if((XHR.readyState == 4) && (XHR.status == 200)){
				var msg = XHR.responseText; 
				if(msg==0){
					$('namespan').innerHTML = "<img src='images/icon_right.png' />";
					cname="yes";
					}
				else if(msg==1){
					$('namespan').innerHTML = "<font color=red>该文件已存在</font>"+"<img src='images/icon_wrong.png' />";
					}
				else{
					$('namespan').innerHTML = "<font color=red>"+msg+"</font>";
					}
				} 
			} 
		chk();	
}


//设置字号
function setFontSize(value){
	document.getElementById("textContainer").style.fontSize = value;
	}
//设置字体颜色
function setsetColor(){
	document.getElementById("textContainer").style.color = document.getElementById("setColor").value;
	}

//颜色转换
function getColor(){
	var sRgbColor = document.getElementById("setColor").value;
	var sRgbColor = sHex.colorRgb();
	document.getElementById("fontColor").value = sRgbColor;
	}

/*16进制颜色转为RGB格式*/  
String.prototype.colorRgb = function(){  
    var sColor = this.toLowerCase();  
    if(sColor && reg.test(sColor)){  
        if(sColor.length === 4){  
            var sColorNew = "#";  
            for(var i=1; i<4; i+=1){  
                sColorNew += sColor.slice(i,i+1).concat(sColor.slice(i,i+1));     
            }  
            sColor = sColorNew;  
        }  
        //处理六位的颜色值  
        var sColorChange = [];  
        for(var i=1; i<7; i+=2){  
            sColorChange.push(parseInt("0x"+sColor.slice(i,i+2)));    
        }  
        return "RGB(" + sColorChange.join(",") + ")";  
    }else{  
        return sColor;    
    }  
};  










