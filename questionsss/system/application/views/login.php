<script type="text/javascript">
function show_username_info(str) {
	var xmlhttp;
	if(str.length==0){
		document.getElementById("usernameInfo").innerText="";
		return;
	}
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	   	document.getElementById("usernameInfo").innerText=xmlhttp.responseText;
	   	}
	  }
	xmlhttp.open("POST","<?=site_url("login/username_check")?>",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("uname="+str);
}
function login_ajax(username, password) {
	var xmlhttp;
	if(username.length==0){
		document.getElementById("usernameInfo").innerText="× 请输入用户名";
		return;
	}
	if(password.length==0){
		document.getElementById("passwordInfo").innerText="× 请输入密码";
		return;
	}
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	 	var txt = xmlhttp.responseText;
	   	if (txt.charAt(0)!='×') {
	   		var Form = document.getElementById("userlogin");
	   		Form.action = "<?php echo base_url().'/index.php/login/user_login'?>";
	   		Form.submit();
	   	} else{
	   	document.getElementById("statusInfo").innerText=txt;
	   	}
	   }
	 }
	 xmlhttp.open("POST","<?=site_url("login/user_login")?>",true);
	 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	 xmlhttp.send("uname="+username+"&upass="+password);	 	
}
function register_check(username, password) {
	if(username.length==0){
		document.getElementById("usernameInfo").innerText="× 请输入用户名";
		return;
	}
	if(password.length==0){
		document.getElementById("passwordInfo").innerText="× 请输入密码";
		return;
	}
	var txt=document.getElementById("usernameInfo").innerText;
	if (txt=="√ 存在的用户名") {
		document.getElementById("statusInfo").innerText="× 已经存在该用户名，请重新起一个名字吧~ =。=";
		return;
	}
	var Form = document.getElementById("userlogin");
	Form.action = "<?php echo base_url().'/index.php/login/user_register'?>";
	Form.submit();
	
}
function clearuserinfo() {
    document.getElementById("statusInfo").innerText="";
}
function clearpassinfo() {
	document.getElementById("passwordInfo").innerText="";
	document.getElementById("statusInfo").innerText="";
}
</script>
<div class="container">
<header id="pagehead">
<h1>登录/注册 <small>填写您的用户名和密码以登录，如果您是新用户，请猛戳注册 </small></h1>
</header>
</div>

<div class="container">
<section>
	<div class="row">
		<form id="userlogin" action="" method="POST">
        <div class="span8">        
        <label><strong style="color:#577088;">用户名</strong></label>
        <input type="text" class="span8 req-string" placeholder="username" name="uname" id="uname" onkeyup="show_username_info(this.value)" onfocus="clearuserinfo()"/>
        <span id="usernameInfo"></span>
        </div>	
        
        <div class="span8">
        <label><strong style="color:#577088;">密码</strong></label>
        <input type="password" class="span8 req-string" placeholder="password" name="upass" id="upass" 
         onfocus="clearpassinfo()"/>
        <span id="passwordInfo"></span>
        </div>
        
        <div class="span8">
        <p>
        <span id="statusInfo"></span>
        </p>
        </div>
        
        <div class="span8">
        <input type="button" value="注册" class="btn btn-large btn-success" id="registerbutton" onclick="register_check(uname.value,upass.value)" style="float:left;">
        </input>
        <input type="button" value="登录" class="btn btn-large btn-success" id="loginbutton" onclick="login_ajax(uname.value,upass.value)" style="float:right;">
        </input>     
		</div>
       	</form>
	 </div>  
</section> 
<div class="divider"></div>
</div>