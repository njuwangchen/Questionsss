

<div class="container">

<header id="pagehead">
<h1>个人中心<small>显示用户的详细信息 </small></h1>

</header>
</div>

<div class="container"> 
<section>
<div class="row">
<div class="span8">
<div class="row">
<div class="span2 item-block" >
<?php if(strlen($user_info->picture)>0) $path = 'uploads/profile/'.$user_info->picture;
	  else $path = 'assets/img/user.jpg'; ?>
<img src="<?=base_url().$path ?>" width="140px" height="140px" alt="example-item" />
<div class="desc clearfix center">
<h2><?php echo $user_info->name ?></h2>
<p><?php echo $user_info->job ?></p>
</div>
</div>

<div class="span6">
<p><span>用户名: </span><?php echo $user_info->name ?></p>
<p><span>加入时间: </span><?php echo $user_info->registerdate ?></p>
<p><span>积分: </span><span><?php echo $user_info->score ?></span></p>
<?php if($user_info->id == $this->session->userdata('uid')): ?>
<p><?php echo anchor('login/user_logout','退出登录'); ?></p>
<?php endif; ?>
</div>