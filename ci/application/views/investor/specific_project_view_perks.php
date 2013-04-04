<?php $this->load->view('investor/header'); ?>

	
	<div class="main_content2 nopaddingbtm" style="padding-top:43px !important;">
		<div class="container">
			
			<div class="about_container gray_back">
				<div class="bckSolidWht introTxt">
					<div id="hotspot-57" class="hs-wrap hs-loading">
						<img src="<?php echo cdn_url(); ?>images/theredtownshots/perks.png">
						<div class="hs-spot-object" data-type="rect" data-x="112" data-y="48" data-width="162" data-height="21" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Make the filters more modern and sleek
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="345" data-y="63" data-width="108" data-height="202" data-popup-position="right" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Looks too similar to the parties. You must differentiate between the two.
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="467" data-y="204" data-width="115" data-height="31" data-popup-position="right" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						We'd like to see the status of our perk
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
						<img src="<?php echo cdn_url(); ?>images/theredtownnewshots/perks.png" alt="">
					</div>
					<div class="bckPadMD">
						<div class="mrgnLftSM">
							<h3>New Design Features:</h3>
							<ul style="list-style-type:circle; margin-left:25px;">
								<li>Improved filter design</li>
								<li>Differentiated</li>
								<li>More room to display data</li>
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
	$("#hotspot-57").hotspot({ "show_on" : "mouseover" });
});
</script>
</body>
</html>
