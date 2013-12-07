<div class="container"> 
  
    <section>
      <div class="span12 promo-slogan">
        <h1>欢迎来到 <span>Questionsss</span></h1>
        <h1>一个<span>有态度的</span>Q&A网络社区</h1>
      </div>
    </section>
	  
  <div class="row">
    <div class="span12"> 
      <div class="row">
        <section>
          
          <div class="container">
          <header id="pagehead">
          <h1>热门问题 <small>这里正在流行... </small></h1>
          </header>
          </div>
           
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
         <a href=<?php echo site_url('home/questionlist/2/'.$ques_tag->tid.'/1'); ?> class = "tags"><?php echo $ques_tag->tname?></a>
         <?php endforeach; ?>
         <p> </p>
         <span class="date"><?php echo $ques_row->qdate?></span>
         <span class="username"><?php echo anchor('home/about/'.$ques_row->uid,$ques_row->uname)?></span>
         </div>
         </div>
         <div class="divider-post"></div>
         </div>
         
         <?php endforeach;?>
         
         </div>
        </section>
        <div class="divider"></div>
      </div>
    </div>
  </div>
</div>
