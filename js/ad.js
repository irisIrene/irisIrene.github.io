// JavaScript Document

//改变链接激活时的颜色
function Color(){
	  var link_u=document.getElementById("link_userManage");
	  link_u.style.backgroundColor = "#333";
	  link_u.style.color = "#6DCFA6";
	  link_u.style.borderBottom = "2px solid #333";
}

function changeColor($this){	
      var link_u=document.getElementById("link_userManage");
      var link_s=document.getElementById("link_sealManage");
      var link_a=document.getElementById("link_authorizedSeal");
  
	  link_u.style.backgroundColor = "#6DCFA6";
	  link_u.style.color = "#fff";
	  link_u.style.borderBottom = "0";
	  
	  link_s.style.backgroundColor = "#6DCFA6";
	  link_s.style.color = "#fff";
	  link_s.style.borderBottom = "0";
	  
	  link_a.style.backgroundColor = "#6DCFA6";
	  link_a.style.color = "#fff";
	  link_a.style.borderBottom = "0";
	  
	  $this.style.backgroundColor = "#fff";
	  $this.style.color = "#6DCFA6";
	  $this.style.borderBottom = "2px solid #fff";
}  



//按钮链接
//添加新用户
function addUser(){
	window.open('addUser.php','添加新用户','scrollbars=no,resizable=no,left=500,top=200,width=300,height=220');
	}
	
function addSeal(){
	window.open('addSeal.php','添加公章','scrollbars=no,resizable=no,left=500,top=200,width=400,height=300');
	}
	
//function showWindow(){
//	document.getElementById("hideDiv").style.display = "inline";
//	}
//function hideWindow(){
//	document.getElementById("hideDiv").style.display = "none";
//	}
//function changeSrc(){
//	document.getElementById("hideDiv").src = "";
//	}
function show(){
	window.open('changeAuthority.php','','scrollbars=no,resizable=no,left=500,top=200,width=400,height=300');
	}	


//
//对用户和公章进行编辑
//
var tname; //设置全局变量
//用js获取所选项的name,用于确认框的中输出	
function whichElement(e){
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
}
//确认是否删除用户
function sure_deleteUser(){
	if (confirm("确认删除用户：" + tname + "？")){
		return true;
		}
	else{
		return false;
		}
	}	
//确认是否删除公章	
function sure_deleteSeal(){
	if (confirm("确认删除公章：" + tname + "？")){
		return true;
		}
	else{
		return false;
		}
	}	
//确认退出
function sure_quit(){
	if(confirm("确认退出?")){
		window.location.href="../php/quit.php"
		}
	else{
		return false;
		}
    }
///////////////////
