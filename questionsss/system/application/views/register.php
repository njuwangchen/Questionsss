<script type="text/javascript">
function check_username(str) {
var xmlhttp;
if(str.length==0){
	document.getElementById("namespan").innerText="";
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
   	document.getElementById("namespan").innerText=xmlhttp.responseText;
   	}
  }
xmlhttp.open("POST","<?=site_url("login/register_username_check")?>",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("uname="+str);
}
function check_submit() {
	var username=document.getElementById("rname").value;
	var password=document.getElementById("rpass").value;
	var job=document.getElementById("ujob").value;
	if (username.length == 0) {
		document.getElementById("namespan").innerText="× 用户名不能为空";
		return;
	}
	if (password.length == 0) {
		document.getElementById("passwordspan").innerText="× 密码不能为空";
		return;
	}
	if (job.length == 0) {
		document.getElementById("jobspan").innerText="× 职业不能为空";
		return;
	}
	
	var txt=document.getElementById("namespan").innerText;
	if (txt=="" || txt.charAt(0)=='√') {
		var form = document.getElementById("form");
		form.submit();
	}
}
function clearPasswordInfo() {
	document.getElementById("passwordspan").innerText="";
}
function clearJobInfo() {
	document.getElementById("jobspan").innerText="";
}
</script>
<div class="container">
<header id="pagehead">
<h1>注册 <small>填写您的个人信息以完善资料 </small></h1>
</header>
</div>

<div class="container">
<section>
	<div class="row">
		<?php $attributes = array('id'=>'form');
		echo form_open_multipart('/login/confirm_register', $attributes) ?>
        <div class="span8">        
        <label><strong style="color:#577088;">用户名</strong></label>
        <input type="text" class="span8 req-string" placeholder="username" name="rname" id="rname" value="<?php echo $name?>" onkeyup="check_username(this.value)"/>
        <span id="namespan"></span>
        </div>	
        
        <div class="span8">
        <label><strong style="color:#577088;">密码</strong></label>
        <input type="password" class="span8 req-string" placeholder="password" name="rpass" id="rpass" value="<?php echo $password?>" onfocus="clearPasswordInfo()"/>
        <span id="passwordspan"></span>
        </div>
        
        <div class="span8">
        <label><strong style="color:#577088;">职业</strong></label>
        <input type="text" class="span8 req-string" placeholder="job" name="ujob" id="ujob" onfocus="clearJobInfo()"/>
        <span id="jobspan"></span>
        </div>
        
        <div class="span8">
        <label><strong style="color:#577088;">上传头像</strong></label>
        <input type="file" name="userfile" />
        </div>
        
        <div class="span8">
        <input type="button" value="确定" class="btn btn-large btn-success" id="confirm" onclick="check_submit()" style="float:right;">
        </input>     
		</div>
       	</form>
	 </div>  
</section> 
<div class="divider"></div>
</div>
