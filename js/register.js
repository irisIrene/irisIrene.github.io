// JavaScript Document
	
//通用函数，用来避免重复输入 document.getElementById('...')
		function $(idValue){
			return document.getElementById(idValue);
		}
		
		var cname1="", cname2="", cpwd1="", cpwd2="", cemail="yes";
		function chkreg(){
			if ((cname1=='yes') && (cname2=='yes') && (cpwd1=='yes') && (cpwd2=='yes') && (cemail=='yes')){
				$('submit_reg').disabled = false;
				}
			else{
				$('submit_reg').disabled = true;
				}
			}	
						
		//验证用户名
		function chk_username_1(){
			cname1="";
			name = $('username_reg').value;
			if( ((name.match(/\w+^[a-zA-Z\d]\w{3,11}[a-zA-Z\d]$/)=='') && (name.match(/[\u4E00-\u9FA5\uF900-\uFA2D]/)==''))  || (name.length<2)){
				$('namespan_reg').innerHTML = '<font color=red>格式错误</font>'+'<img src="images/icon_wrong.png" />';
				}
			else{
				$('namespan_reg').innerHTML = '<img src="images/icon_right.png" />';
				cname1="yes";
				}
			chkreg();
			}
			
		//当用户文本框失去焦点时，系统调用处理页面查看是否存在该用户
		/*function chk_username_2(){
			name = $('username_reg').value;
			xmlhttp.open('get','../php/chkname.php?name='+name,true);//创建新请求
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					var msg = xmlhttp.responseText;//获取响应页内容
					if(msg=='0'){
						$('namespan_reg').innerHTML = '<img src="images/icon_right.png" />';
						cname2="yes";
						}
					else if(msg=='1'){
						$('namespan_reg').innerHTML = '<font color=red>用户已存在</font>'+'<img src="images/icon_wrong.png" />';
						}
					else{
						$('namespan_reg').innerHTML = '<font color=red>"+msg+"</font>';
						}
					}
				}
				alert(msg);
				xmlhttp.send(null);
				chkreg();
			}*/
			
			
		// JavaScript Document 
		
		
		
		
		
		
		
		function chk_username_2(){ 
		    cname2="";
		    if(cname1=='yes'){
				var name = $('username_reg').value;
				var XHR;  
				function createXHR(){ //创建一个XMLHttpRequest对象 
					if(window.ActiveXObject){//IE的低版本系类 
						XHR=new ActiveXObject('Microsoft.XMLHTTP'); 
					}
					else if(window.XMLHttpRequest){//非IE系列的浏览器，但包括IE7 IE8 
						XHR=new XMLHttpRequest(); 
					} 
				} 
				createXHR(); 
				XHR.open("get","../php/chkname.php?name="+name,true);//true:表示异步传输，而不等send()方法返回结果
				XHR.send(null);
				XHR.onreadystatechange = function(){
					if((XHR.readyState == 4) && (XHR.status == 200)){
						var msg = XHR.responseText; 
						//var msg = xmlhttp.responseText;	
						if(msg==0){
							$('namespan_reg').innerHTML = "<img src='images/icon_right.png' />";
							cname2="yes";
							}
						else if(msg==1){
							$('namespan_reg').innerHTML = "<font color=red>用户存在</font>"+"<img src='images/icon_wrong.png' />";
							}
						else{
							$('namespan_reg').innerHTML = "<font color=red>"+msg+"</font>";
							}
						} 
					} 
				//XHR.send(null);
				chkreg();
			}
			
		}
		
		/*
		function XHR() {
			var xhr;
			try {xhr = new XMLHttpRequest();}
			catch(e){
				var IEXHRVers =["Msxml3.XMLHTTP","Msxml2.XMLHTTP","Microsoft.XMLHTTP"];
				for (var i=0,len=IEXHRVers.length;i< len;i++) {
					try {xhr = new ActiveXObject(IEXHRVers[i]);}
					catch(e) {continue;}
				}
			}
			return xhr;
	    }
		
		var xhr =XHR();
	//alert(xhr.readyState);//0
	xhr.open("get","test.htm",true);
	//alert(xhr.readyState);//1
	xhr.send(null);
	//alert(xhr.readyState);//IE下会是4,而FF下会是2
	//可以通过readystatechange事件监听
	//xhr = XHR();
	xhr.onreadystatechange = function () {
		alert(xhr.readyState);//FF下会依次是1,2,3,4但最后还会再来个1
		//IE下则是1,1,3,4
	};
	xhr.open("get","test.txt",true);
	xhr.send(null);
		} */
		
		//验证email
		/*function chk_email(){
			emailreg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
			$('email_reg').value.match(emailreg);
			if($('emial_reg').value.match(emailreg)==null){
				$('emailspan_reg').innerHTML = '<font color=red>错误的email格式</font>';
				}
			else{
				$('emailspan_reg').innerHTML = '<font color=green>格式正确</font>';
				}
			}
			*/
			
		/*function chk_email(){
			var email = $('email_reg').value;
		    var rxEmail = /^\w(\.?[\w-])*@\w(\.?[\w-])*\.[a-z]{2,6}(\.[a-z]{2})?$/i;
		    if(!rxEmail.test(email)){
				$('emailspan_reg').innerHTML = '<font color=red>错误的email格式</font>';
				document.frmCompetition.email_reg.focus();
			    }
			else{
				$('emailspan_reg').innerHTML = '<font color=green>格式正确</font>';
				}
			*/
			
		//验证密码
		function chk_password_1(){
			cpwd1=="";
			if(cname2="yes"){
			pwd = $('pwd1_reg').value;
			if(pwd.length<6){
				$('pwd1span_reg').innerHTML = '<font color=red>至少6位</font>'+'<img src="images/icon_wrong.png" />';
				}
			else if(pwd.length>=6 && pwd.length<12){
				$('pwd1span_reg').innerHTML = '<font color=green>强度:弱</font>'+'<img src="images/icon_right.png" />';
				cpwd1='yes';
				}
			else if((pwd.match(/^[0-9]*$/)!=null) || (pwd.match(/^[a-zA-Z]*$/)!=null)){
				$('pwd1span_reg').innerHTML = '<font color=green>强度:中</font>'+'<img src="images/icon_right.png" />';
				cpwd1='yes';
				}
			else{
				$('pwd1span_reg').innerHTML = '<font color=green>强度:高</font>'+'<img src="images/icon_right.png" />';
				cpwd1='yes';
				}
			chkreg();
			}
		}
			
		function chk_password_2(){
			if(cpwd1=='yes'){
				pwd = $('pwd1_reg').value;
				pwd2 = $('pwd2_reg').value;
				if(pwd2!='' && pwd!=pwd2){
					$('pwd2span_reg').innerHTML = '<img src="images/icon_wrong.png" />';
					}
				else if(pwd2!='' && pwd==pwd2){
					$('pwd2span_reg').innerHTML = '<img src="images/icon_right.png" />';
					cpwd2='yes'
					}
				chkreg();
				}
		    }
		
			
		//注册
		/*
		function chk_reg(){
			url = 'php\register_chk.php?name=' + $('username_reg').value + '&pwd=' + $('pwd1_reg').value + '&email=' + $('email_reg').value 
				  + '&selId_reg=' + $('selId_reg').value;
			xmlhttp.open('post',url,true);
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState==4&&xmlhttp.status==200){
						msg = xmlhttp.responseText;
						if(msg=='1'){
							alert('注册成功');
							location.replace('../ad.php');
							}
						else if(msg=='-1'){
							alert('注册失败！');
							}
						else{
							alert(msg);
							}
						}
					}
				xmlhttp.send(null);
			}*/