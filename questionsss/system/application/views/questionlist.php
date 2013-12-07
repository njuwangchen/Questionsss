<div class="container">

<header id="pagehead">
<div class="row"><div class="span6"><h1>问题列表<small>点击标签可以查看该标签下的问题</small></h1></div>
<div class="span6">
<ul class="filter-data" data-option-key="filter" style="margin-bottom:0; margin-top:5px;">
<?php $pattern = $this->uri->segment(3);
	  $value = $this->uri->segment(4);?>
<li> <?php echo anchor("home/questionlist/$pattern/$value/1","Newest") ?></li>
<li> <?php echo anchor("home/questionlist/$pattern/$value/2","Most Answers") ?></li>
<li> <?php echo anchor("home/questionlist/$pattern/$value/3","Unanswered") ?></li>
<ul>
</header>
</div>

<div class="container">

<section>

<div class="row">

<div class="span8">
<div class="row">

<?php
foreach ($questions as $ques_row):?>

<div class="span8">
<div class="row">
<div class="span1">
<ul class="blog-meta meta pull-left">
<li><?php echo anchor('home/detailquestion/'.$ques_row->qid,$ques_row->answercount.' 回答');?></li><hr>
<li><?php echo $ques_row->qscore.' 积分'?></li><hr>
</ul>
</div>

<div class="span7">
<h3 class="post-title"><?php echo anchor('home/detailquestion/'.$ques_row->qid,$ques_row->qtitle);?></h3>
<p><?php echo $ques_row->qcontent?></p>
<?php foreach ($tagtoquestion[$ques_row->qid] as $ques_tag):?>
<a href=<?php echo site_url('home/questionlist/2/'.$ques_tag->tid.'/1'); ?> class = "<?php echo $ques_tag->tid == $value?'tagsSelected':'tags' ?>"><?php echo $ques_tag->tname?></a>
<?php endforeach; ?>
<p> </p>
<span class="date"><?php echo $ques_row->qdate?></span>
<span class="username"><?php echo anchor('home/about/'.$ques_row->uid,$ques_row->uname)?></span>
</div>
</div>
<div class="divider-post"></div>
</div>

<?php endforeach;?>
<?php echo $this->pagination->create_links(); ?>
</div>
</div>

<div class="row"> <div class="span4" style="float: right;">
<?php foreach ($tags as $tag_row) : ?>
<a href=<?php echo site_url('home/questionlist/2/'.$tag_row->id.'/1');?> class="<?php echo $tag_row->id == $value?'bigtagsSelected':'bigtags' ?>"><?php echo $tag_row->name ?></a>
<?php endforeach; ?>
</div>

</div>
</div>
</section>
<div class="divider"></div>

</div>