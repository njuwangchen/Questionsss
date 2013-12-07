<script type="text/javascript">
function check_answer() {
	var answer = document.getElementById("answer").value;
	if (answer.length == 0) {
		document.getElementById("answerspan").innerText="× 回答不能为空(⊙o⊙)哦";
		return;
	}
	var form=document.getElementById("form");
	form.submit();
}
function clearInfo() {
	document.getElementById("answerspan").innerText="";
}
</script>

<div class="container">

<section>

<div class="row">
<div class="span8">
<div class="row">
<div class="span8" style="margin-left:150px;margin-right:150px;margin-top: 10px;">
<div class="row">
<div class="span1">
<ul class="blog-meta meta pull-left" style="margin-top: 20px;">
<li><?php echo $answercount ?> 回答</li><hr>
<li><?php echo $detail[0]->qscore ?> 积分</li><hr>
</ul>
</div>

<div class="span7">
<h3 class="post-title"><?php echo $detail[0]->qtitle ?></h3>
<p><?php echo $detail[0]->qcontent ?></p>
<?php if(strlen($detail[0]->picture)>0):?>
<img src ="<?php echo base_url().'uploads/'.$detail[0]->picture ?>" alt="bug">
<?php endif;?>
<p>
<?php foreach ($tags as $tag_row): ?>
<a href="<?php echo site_url('home/questionlist/2/'.$tag_row->tid.'/1')?>" class = "tags"><?php echo $tag_row->tname ?>
</a>
<?php endforeach; ?>
</p>
<p> </p>
<span class="date" ><?php echo $detail[0]->qdate ?></span>
<span class="username"><a href = "<?php echo site_url('home/about/'.$detail[0]->uid)?>" ><?php echo $detail[0]->uname ?></a></span>
</div>

</div>
<div class="divider-post"></div>
</div>

<?php foreach ($answers as $ans_row): ?>

<div class="span8" id="<?php echo $ans_row->aid?>" style="margin-left:150px;margin-right:150px;">
<div class="row">
<div class="span1">
<ul class="blog-meta meta pull-left">
<li>
<?php if($isLogin):?>
	<?php if($whether[$ans_row->aid]):?>
	<?php echo anchor("detail/delete_favor/".$this->session->userdata('uid')."/$ans_row->aid/".$detail[0]->qid,$favortoanswer[$ans_row->aid]." 赞",'style="color: red;"')?>
	<?php else:?>
	<?php echo anchor("detail/add_favor/".$this->session->userdata('uid')."/$ans_row->aid/".$detail[0]->qid,$favortoanswer[$ans_row->aid]." 赞")?>
	<?php endif;?>
	<?php if(($this->session->userdata('uid') == $detail[0]->uid)&&(!$detail[0]->qda)):?>
	<p>
	<?php echo anchor("detail/determine_ans/".$detail[0]->qid."/$ans_row->aid/".$this->session->userdata('uid')."/".$detail[0]->qscore,"采纳答案")?>
	</p>
	<?php endif;?>
<?php else:?> 
<?php echo $favortoanswer[$ans_row->aid].' '?>赞
<?php endif;?>
<?php if ($detail[0]->qda == $ans_row->aid):?>
<p>已采纳</p>
<?php endif;?>
</li>
<hr>
</ul>
</div>

<div class="span7">
<p><?php echo $ans_row->acontent ?></p>
<?php if(strlen($ans_row->picture)>0):?>
<img src ="<?php echo base_url().'uploads/'.$ans_row->picture ?>" alt="description">
<?php endif;?>

<p>
<span class="date" ><?php echo $ans_row->adate ?></span>
<span class="username">
<a href = "<?php echo site_url('home/about/'.$ans_row->uid)?>" ><?php echo $ans_row->uname ?></a>
</span>
</p>
</div>

</div>
<div class="divider-post"></div>
</div>

<?php endforeach; ?>
<?php if($this->session->userdata('uid')):?>
<?php   $attributes = array('id'=>'form');
		echo form_open_multipart('detail/add_answer/'.$detail[0]->qid,$attributes) ?>
 		<div class="span8" style="margin-left:150px;margin-right:150px;position:relative;">
        <label><strong style="color:#577088;">期待着你的回答...</strong></label>
        <textarea class="span8 req-string" rows="5" id="answer" name="answer" onfocus="clearInfo()"></textarea>
        <span id="answerspan"></span>
        <label><strong style="color:#577088;">上传图片</strong></label>
        <input type="file" name="answerfile" value="answerfile" />
        <input type="button" value="提交答案" class="btn btn-large btn-success" id="submit_button" style="float:right" onclick="check_answer()"></input>
       	</div>
</form>
<?php else: ?>
<div class="span8" style="margin-left:150px;margin-right:150px;position:relative;">
<p>想要回答这个问题？请先进行<?php echo anchor('home/login','登录/注册');?></p>
</div>
<?php endif; ?>

</div>
</section>
<div class="divider"></div>
</div>