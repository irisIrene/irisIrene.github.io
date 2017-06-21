// JavaScript Document

function nextPage(){
	document.getElementById('pageNum').value = parseInt(document.getElementById('pageNum').value) + 1 ;
	if(document.getElementById('pageNum').value > document.getElementById('pageCount').value){
		document.getElementById('pageNum').value = document.getElementById('pageCount').value;
		}
	}
	
function previousPage(){
	document.getElementById('pageNum').value = parseInt(document.getElementById('pageNum').value) - 1 ;
	if((document.getElementById('pageNum').value)<1){
		document.getElementById('pageNum').value  = 1;
		}
	}
	
function pageCoolie(){
	document.cookie = "page=" + document.getElementById('pageNum').value;
	}
	


				