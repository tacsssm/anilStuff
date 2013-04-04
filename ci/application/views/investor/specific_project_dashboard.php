<?php $this->load->view('investor/header'); ?>

	
	<div class="main_content2 nopaddingbtm" style="padding-top:43px !important;">
		<div class="container">
			
			<div class="about_container gray_back">
				<div class="bckSolidWht introTxt">
					<div id="hotspot-777" class="hs-wrap hs-loading">
						<img src="<?php echo cdn_url(); ?>images/image3.png">
						<div class="hs-spot-object" data-type="rect" data-x="440" data-y="15" data-width="148" data-height="136" data-popup-position="right" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
							Need to find a more effective use for this section.
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="91" data-y="26" data-width="271" data-height="122" data-popup-position="bottom" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
							Need to figure a better design
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="484" data-y="168" data-width="132" data-height="16" data-popup-position="bottom" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
							This menu doesn't go well with the dashboard
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
						<img src="<?php echo cdn_url(); ?>images/theredtownnewshots/dashboard1.png" alt="">
					</div>
					<div class="bckPadMD">
						<div class="mrgnLftSM">
							<h3>New Design Features:</h3>
							<ul style="list-style-type:circle; margin-left:25px;">
								<li>Innovative design</li>
								<li>Brand new layout</li>
								<li>Improved menu design</li>
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
	$("#hotspot-777").hotspot({ "show_on" : "mouseover" });
});
</script>
</body>
</html>
