<script type="text/javascript">
function submit_question() {
	var title = document.getElementById("qtitle").value;
	var detail = document.getElementById("qdetail").value;
	var score = document.getElementById("qscore").value;
	if (title.length == 0) {
		document.getElementById("titlespan").innerText="× 请填写问题标题";
		return;
	}
	if (detail.length == 0) {
		document.getElementById("detailspan").innerText="× 请填写问题描述";
		return;
	}
	if (score.length == 0) {
		document.getElementById("qscore").value=0;
	}
	var txt = document.getElementById("scorespan").innerText;
	if (txt.charAt(0)=='√' || txt=="") {
		var form=document.getElementById("form");
		form.submit();
	}
}
function check_score(input) {
	var re=/^[1-9]\d*$/;
	var xmlhttp;
	if (input.length == 0) {
		document.getElementById("scorespan").innerText="";
		return;
	}
	if (!re.test(input)) {
		document.getElementById("scorespan").innerText="× 必须输入整数(⊙o⊙)哦";
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
	   	document.getElementById("scorespan").innerText=xmlhttp.responseText;
	   	}
	  }
	xmlhttp.open("POST","<?=site_url("questioning/check_score")?>",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("score="+input);	
}
function clearTitleInfo() {
	document.getElementById("titlespan").innerText="";
}
function clearDetailInfo() {
	document.getElementById("detailspan").innerText="";
}
</script>
<div class="container">
<header id="pagehead">
<h1>提问 <small>填写问题标题和详细内容，并为其选择相应的标签 </small></h1>
</header>
</div>

<div class="container">
<section>
	<div class="row">
<?php
$attributes = array('id'=>'form');
echo form_open_multipart('questioning/add_question/'.$this->session->userdata('uid'),$attributes);?>
<div class="span8">

<label><strong style="color:#577088;">问题标题</strong></label>
<input type="text" class="span8 req-string" placeholder="title" name="qtitle" id="qtitle" onfocus="clearTitleInfo()"/>
<span id="titlespan"></span>
</div>
<div class="span8" style="position:relative;">
<label><strong style="color:#577088;">问题详情</strong></label>
<textarea class="span8 req-string" rows="5" id="qdetail" placeholder="detail"  name="qdetail" onfocus="clearDetailInfo()"></textarea>
<!--<script type="text/javascript">
var editor = new UE.ui.Editor();
editor.render("qdetail");
</script>-->
<span id="detailspan"></span>
</div>
<div class="span8">
<label><strong style="color:#577088;">问题积分</strong></label>
<input type="text" class="span8 req-string" placeholder="0" name="qscore" id="qscore" onkeyup="check_score(this.value)"/>
<span id="scorespan"></span>
</div>
<div class="span8">
<p id="tagarea"> <strong> </strong></p>
		</div>
		<div class="span8" id="tagsinput">
		</div>
<div class="span8">
<label><strong style="color:#577088;">添加标签</strong></label>
<select id="myList">
<?php foreach ($tags as $tag_row):?>
<option><?php echo $tag_row->name?></option>
		<?php endforeach; ?>
</select>
<a href = "javascript:addTag()">添加</a>
</div>
<div class="span8">
<label><strong style="color:#577088;">上传图片</strong></label>
<P>
<input type="file" name="userfile" size="20" />
</P>
<p>
<input type="button" value="提交问题" onclick="submit_question()" class="btn btn-large btn-success" id="addquestionbutton" style="float:right;"></input>
</p>
</div>
</form>
</div>
</div>
</section>
<div class="divider"></div>
</div>
<script type="text/javascript">
function addTag()
{
var mylist=document.getElementById("myList");
var tag=mylist.options[mylist.selectedIndex].text;
var taglist=document.getElementById("tagarea").innerText;
taglist+=(" "+tag);
document.getElementById("tagarea").innerText=taglist;
var tagsinputdiv=document.getElementById("tagsinput");
tagsinputdiv.innerHTML=
"<input type=\"hidden\" value=\""+taglist+"\" name=\"taglist\" />";
mylist.options.remove(mylist.selectedIndex);
}
</script>