// JavaScript Document
function $(idValue){
	return document.getElementById(idValue);
}

/*function toText(){
	$('pdfText').src="html/textArea.html";
    }

function toPDF(){
	$('pdfText').src="php/new_pdfFile.php";
	}*/

//控制公章列表的显示	
//function sealoff(){
//	$('seal').style.display = "none";
//	}
//function sealon(){
//	$('seal').style.display = "block";
//	}

//导入公章预处理
//function importSeal(){
//	$('iframe').src = "php/importSeal.php"
//	}

		

function uploadFile(){
	window.open('uploadPdf.php','上传PDF文件','scrollbars=no,resizable=no,titlebar=no,left=500,top=200,width=300,height=200');
	}


var tid;
var tname; //设置全局变量
//用js获取所选项的name	
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
	tid = targ.id;
}

function sure_deletePdf(){
	if (confirm("确认删除文件：" + tname + "?")){
		return true;
		}
	else{
		return false;
		}
	}
	
function viewPdf(){
	var pdfsrc;
	pdfsrc = "PDFJS/web/viewer_1.html?file=" + tname ;
	$('container').src = pdfsrc;
	//alert(pdfsrc);
	}
	
function changeColor(){
	document.getElementsByClassName("heavy").style.backgroundColor = "#CEEFE1;";
	document.getElementsByClassName("light").style.backgroundColor = "#D3FCEB;";
	tid.style.backgroundColor = "#B5FCDF";
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





