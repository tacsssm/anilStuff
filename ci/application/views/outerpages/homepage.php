<?php $this->load->view('outerpages/header'); ?>

<link href="<?php echo cdn_url(); ?>css/the-tooltip.css" rel="stylesheet" />
<script type="text/javascript" src="//cdn.sublimevideo.net/js/27c2npop.js"></script>
	
	<div class="main_content">
		<div class="container clearfix">
			<div class="span10">
				<h1>Bigger, better parties just got a whole lot easier.</h1>
				<p>TheRedtown takes the pain out of planning and organizing, so <br/>you can focus on partying instead.</p>
			</div>
			
			<div class="span8">
				<video id="video1" class="sublime" width="640" height="360" data-player-kit="1" data-uid="" preload="none" poster="<?php echo cdn_url(); ?>images/explainer_video2.png">
					<source src="//d2yyag8bo5dha2.cloudfront.net/homepage-video/lowres1/lowres1.mp4" data-quality="hd" />
					<source src="//d2yyag8bo5dha2.cloudfront.net/homepage-video/lowres2/lowres1.mp4" />
					<source src="//d2yyag8bo5dha2.cloudfront.net/homepage-video/lowres2/lowres1.mp4" />
					<source src="//d2yyag8bo5dha2.cloudfront.net/homepage-video/lowres1/lowres1.webm" data-quality="hd" />
					<source src="//d2yyag8bo5dha2.cloudfront.net/homepage-video/lowres2/lowres1.webm" />
				</video>
			</div>

			<div class="span12">
			  <a href="<?php echo site_url('livedemo');?>" class="btn btn-large btn-default the-tooltip top center full-width black" title="" style="padding:15px 25px;">try an interactive demo<span>For those that just want to see how TheRedtown works.</span></a> 
			  <span style="color:#b6c0cc;">|</span> 
			  <a href="<?php echo site_url('auth/register');?>" class="btn btn-large btn-default the-tooltip top center full-width black" title="" style="padding:15px 25px;">register your account<span>For those with a party they want to use TheRedtown on.</span></a>
			</div>
			
			<div class="box_1">
				<div class="box_2">
				
				
				
				
					<div class="testimonials">
						<div class="testimonial_nav">
							<strong>Reviews</strong> 
							<span class="arrow_left"> <a class="tickerNavPrev"><img src="<?php echo cdn_url(); ?>images/arrow-circle-left-on.gif" alt=""></a> </span> 
							<span class="arrow_left arrow_right"> <a class="tickerNavNext"><img src="<?php echo cdn_url(); ?>images/arrow-circle-right-on.gif" alt=""></a> </span> 
						</div>
						<div class="testimonial_container">
							<ul id="testimonial_content" class="testimonial_content">
								<li class="">
									<a href="#">Love the site. I can't ask for anything more.</a>
								</li>
								<li>
									<a href="#">If you like to party. Then this is the site for you.</a>
								</li>
								<li>
									<a href="#">To all you crazy folks at TheRedtown. Thank you!</a>
								</li>
								<li>
									<a href="#">Something that every party should use, PERIOD.</a>
								</li>
								<li>
									<a href="#">TheRedtown never fails to amaze me.</a>
								</li>
								<li>
									<a href="#">This is nuts and I #@$*ing love it!</a>
								</li>
								<li>
									<a href="#">Wow! That's all I can say.</a>
								</li>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="featured_in">
						<strong>Powered by</strong>
						
						<img src="<?php echo cdn_url(); ?>images/amazon.jpg" alt="Amazon" height="16" width="16" title="TechCrunch">
						<img src="<?php echo cdn_url(); ?>images/apple.jpg" alt="Apple" height="16" width="16" title="Huffington Post">	
						<img src="<?php echo cdn_url(); ?>images/twitter.jpg" alt="Twitter" height="16" width="16" title="Smashing">
						
						<img src="<?php echo cdn_url(); ?>images/google.jpg" alt="Google" height="16" width="16" title="Time">
						<img src="<?php echo cdn_url(); ?>images/facebook.jpg" alt="Facebook" height="16" width="16" title="CNN">
						<img src="<?php echo cdn_url(); ?>images/cloudflare.jpg" alt="Cloudflare" height="16" width="16" title="Huffington Post">	
						<img src="<?php echo cdn_url(); ?>images/github.jpg" alt="Github" height="16" width="16" title="Huffington Post">	
					</div>

					<div class="clear"></div>

				</div>
			</div>
			
			<?php $this->load->view('outerpages/footer_nav'); ?>
			<div class="clearfix" style="margin:0 auto; width:746px;">
				<p class="footer_saying" style="float:left;">Actually we don’t remember putting this together, it must have happened during one of our blackouts.</p>
				<div style="float:right;">
					<script data-cfbadgetype="f" data-cfbadgeskin="icon" type="text/javascript">
					//<![CDATA[
					try{window.CloudFlare||function(){var a=window.document,b=a.createElement("script"),a=a.getElementsByTagName("script")[0];window.CloudFlare=[];b.type="text/javascript";b.async=!0;b.src="//ajax.cloudflare.com/cdn-cgi/nexp/cloudflare.js";a.parentNode.insertBefore(b,a)}(),CloudFlare.push(function(a){a(["cloudflare/badge"])})}catch(e$$5){try{console.error("CloudFlare badge code could not be loaded. "+e$$5.message)}catch(e$$6){}};
					//]]>
					</script>
				</div>
				<div class="clear"></div>
			</div>
		</div>

	</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script defer src="<?php echo cdn_url(); ?>js/the-tooltip.min.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script defer src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.4-min.js"></script>
<script defer src="<?php echo cdn_url(); ?>js/selectivizr-min.js"></script>
<![endif]-->

<script src="<?php echo cdn_url(); ?>js/jquery.ticker.js" type="text/javascript"></script>
<script type="text/javascript">
function rollTicker(b){
var a=$("ul#testimonial_content li.testimonial_active");
if(a.length===0){a=$("ul#testimonial_content li:last")}
var c=null;
if(b){c=a.prev().length?a.prev():$("ul#testimonial_content li:last")}
else{c=a.next().length?a.next():$("ul#testimonial_content li:first")}
a.addClass("tickerLastActive");
c.css({opacity:0}).addClass("testimonial_active").animate({opacity:1},800,function(){a.removeClass("testimonial_active tickerLastActive");a.dequeue()})}

var tickerTimeObject=null;

function startTicker(){tickerTimeObject=setInterval("rollTicker()",5000)}

function stopTicker(){
if(tickerTimeObject){clearInterval(tickerTimeObject)}
}

function initTickerRoll(){
$("ul#testimonial_content").hover(function(){stopTicker()},function(){startTicker()});
$(".tickerNavPrev").click(function(){stopTicker();rollTicker(true);startTicker()});
$(".tickerNavNext").click(function(){stopTicker();rollTicker();startTicker()});
startTicker()};

$(document).ready(function(){initTickerRoll();});
</script>

</body>
</html>
