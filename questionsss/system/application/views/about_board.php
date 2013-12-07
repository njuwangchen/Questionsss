<script type="text/javascript">
function check_message() {
	var message = document.getElementById("message").value;
	if (message.length == 0) {
		document.getElementById("messagespan").innerText="× 留言不能为空(⊙o⊙)哦";
		return;
	}
	var form=document.getElementById("form");
	form.submit();
}
function clearInfo() {
	document.getElementById("messagespan").innerText="";
}
</script>

<div id="board" class="span8" style="padding-left:150px; padding-right:150px;margin-bottom:50px;">
<div class="divider-strip block-title"><h4>留言板</h4><span class="strip-block"></span></div>
<?php foreach ($messages as $row):?>
<p><?php echo anchor("home/about/$row->fromid","$row->name");?>
<em><?php echo $row->content?></em>
</p>
<span class="date"><?php echo $row->date?></span>
<hr class="message">
<?php endforeach; ?>
<p></p>
<?php echo $this->pagination->create_links();?>
</div>
</div>
<?php if($this->session->userdata('uid')&&($user_id!=$this->session->userdata('uid'))):?>
<?php $fromid=$this->session->userdata('uid');?>
<?php   $attributes = array('id'=>'form');
		echo form_open("message/submit_message/$fromid/$user_id", $attributes) ?>
 		<div class="span8" style="margin-left:150px;margin-right:150px;position:relative;">
        <label><strong style="color:#577088;">欢迎来我的主页，留个言呗...</strong></label>
        <textarea class="span8 req-string" rows="5" id="message" name="message" onfocus="clearInfo()"></textarea>
        <span id="messagespan"></span>
        <input type="button" value="提交留言" class="btn btn-large btn-success" id="submitmessage" style="float:right" onclick="check_message()"></input>
       	</div>
</form>
<?php endif;?>  
</div>
</div>
</section>

<div class="divider"></div>
</div>