<div id="answers" class="span8" style="  padding-left:150px; padding-right:150px;margin-bottom:50px;">
<div class="divider-strip block-title"><h4>Answers</h4><span class="strip-block"></span></div>
<?php foreach ($answers as $ans_row): ?>
<p><span><em><?php echo $ans_row->content;?></em></span>
<?php echo anchor("home/detailquestion/$ans_row->questionid#$ans_row->id",'√') ?></p>
<?php endforeach; ?>
<p></p>
<?php echo $this->pagination->create_links(); ?>
</div>
