<?php $this->load->view('investor/header'); ?>

	
	<div class="main_content2 nopaddingbtm" style="padding-top:43px !important;">
		<div class="container">
			
			<div class="about_container gray_back">
				<div class="bckSolidWht introTxt">
					<div id="hotspot-81" class="hs-wrap hs-loading">
						<img src="<?php echo cdn_url(); ?>images/theredtownshots/parties.png">
						<div class="hs-spot-object" data-type="rect" data-x="110" data-y="49" data-width="121" data-height="202" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Reading the party details is difficult.
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="309" data-y="19" data-width="116" data-height="29" data-popup-position="bottom" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						We'd like a way to post a new party.
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="260" data-y="125" data-width="321" data-height="194" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						We'd like a way to filter through these results
						</div>
					</div>
					<div class="bckPadMD">
						<div class="mrgnLftSM">
							<h3>Original Design</h3>
							<p style="margin-bottom:10px;">Mouseover the red boxes above to see the focus group's feedback.</p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="about_container gray_back mrgnbtm50 mrgntop10">
				<div class="bckSolidWht introTxt">
					<div class="align">
						<img src="<?php echo cdn_url(); ?>images/theredtownnewshots/parties.png" alt="">
					</div>
					<div class="bckPadMD">
						<div class="mrgnLftSM">
							<h3>New Design Features:</h3>
							<ul style="list-style-type:circle; margin-left:25px;">
								<li>User-friendly layout and design</li>
								<li>New party feature</li>
								<li>Improved filters</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			
		
			
			<div class="clear"></div>
			
			
			<?php $this->load->view('outerpages/specific_project_footer_nav'); ?>
			
			
			

		</div>
	</div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?php echo cdn_url(); ?>js/hotspot.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#hotspot-81").hotspot({ "show_on" : "mouseover" });
});
</script>
</body>
</html>
