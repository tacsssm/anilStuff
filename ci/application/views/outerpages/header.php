<!doctype html>
<!--[if lt IE 7]> <html lang="en-us" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html lang="en-us" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html lang="en-us" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-us" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=1366px">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>TheRedtown | Keep Calm and Party On</title>

<!--  <link href="<?php //echo $file_root;?>css/homepage-new.css" media="screen, projection" rel="stylesheet"/>-->
  <link href="<?php echo cdn_url(); ?>css/homepage-new.css" media="screen, projection" rel="stylesheet"/>
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="/favicon5.ico" rel="icon" type="image/x-icon" />
</head>
<body>

	<div id="header">
		<div class="container clearfix">
			<div class="logo"><a href="/">TheRedtown</a></div>
			<nav class="span9">
			  <a href="<?php echo site_url('welcome/about/homepage');?>">Home</a>
			  <a href="<?php echo site_url('welcome/about/features');?>">Features</a>
			  <a href="<?php echo site_url('welcome/about/redscue');?>"><span style="color: #a33029;">Red</span>scue</a>
			  <span class="seperator">|</span>
				<a href="<?php echo site_url('auth');?>" id="signin">Log In</a>
				<a href="<?php echo site_url('auth/register');?>" class="register">register</a>
			</nav>
		</div>
	</div>