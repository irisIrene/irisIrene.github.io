function $(idValue){
	return document.getElementById(idValue);
}

var cname="";
function chklogin(){
	if (cname=='yes'){
		$('submit_reg').disabled = false;
		}
	else{
		$('submit_reg').disabled = true;
		}
	}	
	
function chk_username(){ 
		var name = $('username').value;
		var XHR;  
		function createXHR(){ //得创建一个XMLHttpRequest对象 
			if(window.ActiveXObject){//IE的低版本系类 
				XHR=new ActiveXObject('Microsoft.XMLHTTP'); 
			    }
			else if(window.XMLHttpRequest){//非IE系列的浏览器，但包括IE7 IE8 
				XHR=new XMLHttpRequest(); 
			    } 
		    } 
			
		createXHR(); 
		XHR.open("get","../php/chkname.php?name="+name,true);
		XHR.send(null);
		XHR.onreadystatechange = function(){
			if((XHR.readyState == 4) && (XHR.status == 200)){
				var msg = XHR.responseText; 
				if(msg==1){
					$('namespan').innerHTML = "<img src='images/icon_right.png' />";
					cname="yes";
					}
				else if(msg==0){
					$('namespan').innerHTML = "<font color=red>不存在</font>"+"<img src='images/icon_wrong.png' />";
					}
				else{
					$('namespan').innerHTML = "<font color=red>"+msg+"</font>";
					}
				} 
			} 
		chklogin();	
}