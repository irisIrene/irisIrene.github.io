
function $(idValue){
	return document.getElementById(idValue);
}

function send_pdfText(){ 
		var text = $('pdfText').value; alert(text);
		var XHR;  
		function createXHR(){  
			if(window.ActiveXObject){//IE的低版本系类 
				XHR=new ActiveXObject('Microsoft.XMLHTTP'); 
			    }
			else if(window.XMLHttpRequest){//非IE系列的浏览器，但包括IE7 IE8 
				XHR=new XMLHttpRequest(); 
			    } 
		    } 
		createXHR(); 
		XHR.open("get","../php/new_pdfFile.php?text="+text,true);
		XHR.send(null);
}