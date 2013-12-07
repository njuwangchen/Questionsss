<div id="questions" class="span8" style="  padding-left:150px; padding-right:150px;margin-bottom:50px;">
<div class="divider-strip block-title"><h4>Questions</h4><span class="strip-block"></span></div>
<?php foreach ($questions as $ques_row): ?>
<p><span><em><?php echo $ques_row->title;?></em></span>
<?php echo anchor("home/detailquestion/$ques_row->id",'√') ?></p>
<?php endforeach; ?>
<p></p>
<?php echo $this->pagination->create_links(); ?>
</div>
