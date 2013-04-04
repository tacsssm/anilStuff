<!doctype html>
<!--[if lt IE 7]> <html lang="en-us" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html lang="en-us" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html lang="en-us" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-us" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=1366px;">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>TheRedtown | Keep Calm and Party On</title>

  <link href="<?php echo cdn_url(); ?>css/homepage-new.css" media="screen, projection" rel="stylesheet"/>
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="<?php echo cdn_url(); ?>css/hotspot.css" type="text/css" />
  <link href="/favicon5.ico" rel="icon" type="image/x-icon" />
<style type="text/css">
/* header */
.wrap { width:980px; margin:0 auto; }
#header_investor {}

	#header_investor .top {
		height:25px;
		background-color:#373737;
		text-align:right;
	}
	
		#header_investor .top a {
			font-size:13px;
			font-weight:bold;
			color:#bbbbbb;
			margin:0 0 0 10px;
			line-height:25px;
		}
		
		#header_investor .top a:hover,#header_investor .top a.active {
			color:#d2363a;
			text-decoration:none;
		}
	
	#header_investor .bottom {
		min-height:80px;
	}
	
		#header_investor .logo2 {
			float:left;
			margin:8px 0 0 0;
		}
			#header_investor .logo2 a {
				display:block;
				width:100px;
				height:64px;
				background:transparent url(/images/logo2.png) 0 0 no-repeat;
				text-indent:-9999px;
			}
		

	
		#header_investor .links {
			float:left;
			margin:48px 0 0 10px;
		}
		
			#header_investor .links span {
				border-right:1px solid #c2c2c2;
				padding:0 8px 0 0;
				margin:0 8px 0 0;
			}
			
			#header_investor .links a {
				color:#bfbcbc;
				font-size:11px;
				line-height:22px;
				padding:4px 0 4px 25px;
				background:transparent url(/images/icons.png) 0 0 no-repeat;
			}
			
			#header_investor .links span+span a { background-position:0 -50px; }
			#header_investor .links span+span+a { background-position:0 -100px; }
			
			#header_investor .links a:hover ,
			#header_investor .links a.active {
				color:#000;
				text-decoration:none;
			}
		
		#header_investor .search {
			float:left;
			width:280px;
			background-color:#d7d7d7;
			margin:48px 0 0 30px;
			padding:1px;
		}
		
			#header_investor .search input[type="text"] {
				border:0;
				width:240px;
				height:20px;
				background-color:#fff;
				padding:0 5px;
				float:left;
			}
			
			*+html #header_investor .search input[type="text"] { margin-left:-30px; }
			
			#header_investor .search input[type="button"] {
				width:25px;
				height:20px;
				border:0;
				background:transparent url(/images/icons.png) 0 -147px no-repeat;
				float:right;
				cursor:pointer;
			}
		
		#header_investor .user-box {
			float:right;
			width:310px;
			min-height:55px;
			border:1px solid #d2d3d0;
			margin:8px 0 0 0;
			background-color:#f0f0f0;
			padding:5px;
		}
		
			#header_investor .user-box .img {
				float:left;
				width:60px;
				padding:3px;
			}
			
				#header_investor .user-box .img img {
					border:1px solid #fff;
				}
			
			#header_investor .user-box .cont {
				float:left;
				width:240px;
				color:#999999;
				font-size:13px;
			}
			
				#header_investor .user-box .cont h3 {
					margin:5px 5px 10px 0;
					font-size:13px;
				}
				
					#header_investor .user-box .cont h3 a {
						float:left;
						font-weight:bold;
						color:#999999;
					}
					
					#header_investor .user-box .cont h3 a+a {
						float:right;
						color:#d2363a;
						font-weight:normal;
					}
				
				#header_investor .user-box .cont .text {
					margin:10px 5px 3px 0;
				}
				
					#header_investor .user-box .cont .text span { float:left; }
					#header_investor .user-box .cont .text span+span { float:right; }
			
			.progress-bar {
				height:3px;
				background-color:#dddddd;
				font-size:0%;
				position:relative;
				border-radius:1px;
				behavior:url(/css/PIE.htc);
			}
			
				.progress-bar .progress {
					height:3px;
					background-color:#878e96;
					position:relative;
					border-radius:1px;
					behavior:url(/css/PIE.htc);
				}
				
				.w90per { width:90%; }
/* /header */
</style>
</head>
<body>
<!-- header -->
<div id="header_investor">
	<div class="top">
    	<div class="wrap">
        	<a href="<?php echo site_url('welcome/investor/specific_project_dashboard');?>" id="messages">Messages</a>
            <a href="<?php echo site_url('welcome/investor/specific_project_view_party');?>">Invitations</a>
            <a href="<?php echo site_url('welcome/investor/specific_project_header');?>">Customize</a>
            <a href="<?php echo site_url('welcome/investor/specific_project_footer');?>">Help</a>
            <a href="<?php echo site_url('auth/logout');?>">Logout</a>
        </div>
    </div>
    <div class="bottom">
    	<div class="wrap">
        	<div class="logo2"><a href="<?php echo site_url('welcome/investor/news_and_events');?>">Redtown Network LLC</a></div>
            <div class="links">
            	<span><a href="<?php echo site_url('welcome/investor/specific_project_fridgedoor');?>">Home</a></span>
                <span><a href="<?php echo site_url('welcome/investor/specific_project_parties');?>">Parties</a></span>
                <a href="<?php echo site_url('welcome/investor/specific_project_view_perks');?>">Perks</a>
            </div>
          
            <div class="user-box">
            	<div class="img"><a href="#"><?php if($username != 'Kiko Dy'):?><img src="<?php echo cdn_url(); ?>images/thumb-1.gif" alt="" /><?php else: ?><img src="<?php echo cdn_url(); ?>images/thumb-2.gif" alt="" /><?php endif;?></a></div>
                <div class="cont">
                	<h3 class="clearfix">
                    	<a href="#"><?php echo $username;?></a>
                    	<a href="/members_area.php">Members Area</a>
                    </h3>
                    <div class="text clearfix">
                    	<span><?php if($username == 'Kiko Dy') echo 'Dashing Debonaire'; else echo 'Party God';?></span>
                        <span>???</span>
                    </div>
                    <div class="progress-bar"><div class="progress w90per"></div></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- /header -->
