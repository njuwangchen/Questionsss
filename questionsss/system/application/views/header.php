<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?=$page_title?></title>
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<!-- CSS files begin-->
<link href="<?=base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" />
<link href="<?=base_url().'assets/css/bootstrap-responsive.css'?>" rel="stylesheet" />
<link href="<?=base_url().'assets/css/docs.css'?>" rel="stylesheet" />
<link href="<?=base_url().'assets/js/google-code-prettify/prettify.css'?>" rel="stylesheet" />
<link href="<?=base_url().'assets/css/responsiveslides.css'?>" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url().'assets/css/prettyPhoto.css'?>" type="text/css" />
<link rel="stylesheet" href="<?=base_url().'assets/build/mediaelementplayer.min.css'?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url().'assets/css/slide-in.css'?>" />
<link href="<?=base_url().'assets/css/style.css'?>" rel="stylesheet" />
<link href="<?=base_url().'assets/css/font-awesome.css'?>" rel="stylesheet" />
<link href="<?=base_url().'assets/css/bootstrap-using-fa.css'?>" rel="stylesheet" />
<link href="<?=base_url().'assets/css/font-awesome-demo.css'?>" rel="stylesheet" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<header class="header">
  <div class="container">
    <div class="row">
      <div class="span4"> <a href="<?=base_url().'index.php/home/index'?>" class="logo"> <img src="<?=base_url().'assets/img/logo.png'?>" alt=""> </a> </div>
      <div class="span8">
	<?php echo form_open('home/questionlist/3/0/1')?>
	<input type="text" name="searchques" class="span2 req-string" placeholder="搜索问题"  style="float:left; margin-top:50px"/>
	<input type="submit" value="搜索" style="float: left;margin-top: 50px;margin-left: 20px;"/>
	</form>
     <nav>
		<ul class="right">
		<li><?=anchor('home/index','主页')?></li>	
		<li><?=anchor('home/questioning','提问')?></li>	
		<li><?=anchor('home/questionlist/1/0/1/0','问题')?></li>	
		<li><?=anchor('home/users/1','用户')?></li>
		<li><?php 
			if($isLogin) echo anchor('home/about/'.$this->session->userdata('uid'),'个人中心');
			else echo anchor('home/login','登录/注册');?></li>	
		</ul>
		</nav>
      </div>
    </div>
  </div>
</header>

<body>
