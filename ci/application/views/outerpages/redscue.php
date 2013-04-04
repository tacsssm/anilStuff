<?php $this->load->view('outerpages/header'); ?>
	
	<div class="main_content2  clearfix">
		<div class="container">
			<div class="span10">
				<h1><span style="color: #a33029;">RED</span>SCUE</h1>
				<p>Changing the world. One party at a time.</p>
			</div>
		</div>
	</div>
	
	<div class="white_background  clearfix">
		<div class="content brdrBtm" style="padding-bottom:55px;">
			<h2 class="strong">How It Works</h2>

			<ol class="hiw_nav">
				<li class="hiw_nav_start">START</li>
				<li><a class="current" href="#" id="nav-1">1</a></li>
				<li><a class="" href="#" id="nav-2">2</a></li>
				<li><a class="" href="#" id="nav-3">3</a></li>
				<li><a class="" href="#" id="nav-4">4</a></li>
				<li class="hiw_nav_finish">FINISH</li>

			</ol>
			
			<div class="clear"></div>
			
			<ol class="slides">
					<li style="display:none;" class="slide-1 current">
						<div class="inside">
							<h2>START YOUR PARTY</h2>
							<p>Create your own party page and invite your friends to contribute. They can do pretty much 
							anything -- suggest a new location for the party, vote on the party's drinks, add new songs to the playlist, or volunteer to bring cups! It takes less than a minute to <a href="/index.php/auth/" class="d-caption">SET UP YOUR PARTY</a></p>
						</div>
					</li>
					<li style="display:none;" class="slide-2">
						<div class="inside">
							<h2>RESCUE THE WORLD</h2>
							<p>For every contribution that your friends make to your party, we will fund a charitable project for people in need. More projects mean more than resources to women and children in developing nations; it means time, freedom and lasting change in communities. </p>
						</div>
					</li>
					
					<li style="display:none;" class="slide-3">
						<div class="inside">
							<h2>100% FUNDS PROJECTS</h2>
							<p>Private donors fund the operating costs of the charities we support so you don’t have to. Their investment pays for the staff’s salaries, flights to the field, office rent and other operating expenses so 100% of everything we contribute can fund project costs.</p>
						</div>
					</li>
					
					<li style="display:none;" class="slide-4">
						<div class="inside">
							<h2>SEE THE PROOF</h2>
							<p>It takes about 18 months to build and report back on your project. You’ll get two progress reports along the way, and a completion report when the work is finished. You and everyone who contributed to your party will see the exact community you helped.</p>
						</div>
					</li>
					
			</ol>
		</div>
		
		<div class="clear"></div>
		
		<div class="content">
			<h2 class="strong">THE PROGRESS OF REDSCUE</h2>	
			<div class="inside2">
				<div class="nos-container">
					<div class="nos no-1">
						<div class="no">$12,866</div>
						Pledged for projects
					</div>
					<div class="nos no-2">
						<div class="no">10,324</div>
						PEOPLE WILL GET CLEAN WATER
						</div>
					<div class="nos no-3" style="margin-right:0 !important;">
						<div class="no">2,542</div>
						STUDENTS WILL GET PENCILS
					</div>
					
					<div class="clear"></div>
					
					
				</div>	
				<p class="small">This amount reflects only what’s pledged by TheRedtown.com this quarter. <br>Actual donations will be made at the end of the quarter and the above numbers are reset.</p>
			</div>
			
			<div class="clear"></div>
		</div>
		
		
		
		
	</div>
	
	<?php $this->load->view('outerpages/easy_signup'); ?>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
(function(){
"use strict";
/*-----------------------------------
HOW IT WORKS
------------------------------------*/
$('.hiw_nav li a').click(function () {
if (!$(this).hasClass('current')) {
showSlide(this);

}
return false;
});

// Show the proper slide
var showSlide = function (slide) {

var name = $(slide).attr('id').replace('nav', 'slide');
$('ol.hiw_nav .current').removeClass('current');
$(slide).addClass('current');
$('.slides li').hide();
$('.slides li').removeClass('current');
$('.' + name).fadeIn(300).addClass('current');
};
})();
</script> 
</body>
</html>

