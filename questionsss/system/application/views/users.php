<body>
<div class="top-bar">

<div class="top_inner">

<div class="container-fluid" style="padding:0;">
<div class="row-fluid">

</div>
</div>
</div> 
</div>


<div class="slider-cont">

<div class="container">

<header id="pagehead">
<h1>用户 <small>这里是所有用户的信息 </small></h1>

<?php echo form_open('home/users/2')?>
<input type="submit" value="搜索" style="float: right;"/>
<input type="text" name="search_user" class="span2 req-string" placeholder="搜索用户"  style="float:right;"/>
</form>
</header>
</div>
</div>

<div class="container"> 

 <section>
 
<div class="row">


<div class="span8">
<div class="row">

<div class="span10"  style="margin-bottom:20px;padding-left:150px;padding-right:150px;">
<div class="divider-strip block-title"><h4>Users</h4></div>
<p></p>


<!-- Users
================================================== -->
<?php foreach ($users as $user): ?>
<div class="span2 item-block">
<?php if(strlen($user->picture)>0) $path = 'uploads/profile/'.$user->picture;
	  else $path = 'assets/img/user.jpg'; ?>
<a href="<?=site_url('home/about/'.$user->id)?>">
<img src="<?=base_url().$path ?>" width="140px" height="140px" alt="example-item" />
</a>
<div class="desc clearfix center">
<h2><?php echo anchor('home/about/'.$user->id,$user->name); ?></h2>
<p>积分:<?php echo $user->score?></p>
<p>回答问题数：<?php echo $user->anscount?></p>
<p>提出问题数：<?php echo $user->quescount?></p>
</div>
</div>
<?php endforeach; ?>
</div>

<?php echo $this->pagination->create_links(); ?>

</div>
</div>
</section>
<div class="divider"></div>
</div>