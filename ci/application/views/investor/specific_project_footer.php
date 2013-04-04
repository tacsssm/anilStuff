<?php $this->load->view('investor/header'); ?>

	
	<div class="main_content2 nopaddingbtm" style="padding-top:43px !important;">
		<div class="container">
			
			<div class="about_container gray_back">
				<div class="bckSolidWht introTxt">
					<div id="hotspot-777" class="hs-wrap hs-loading">
						<img src="<?php echo cdn_url(); ?>images/theredtownshots/footer.png">
						<div class="hs-spot-object" data-type="rect" data-x="154" data-y="95.1500244140625" data-width="209" data-height="42" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
							Find a better phrase
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="85" data-y="23.1500244140625" data-width="547" data-height="62" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
							Way too clunky and cramped
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="95" data-y="159.1500244140625" data-width="413" data-height="24.8499755859375" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
							These links are not visible because the content above it draws too much attention away
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="643" data-y="14.1500244140625" data-width="56" data-height="96" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
							Too much color contrast. Find a more subtle color scheme
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
						<img src="<?php echo cdn_url(); ?>images/theredtownnewshots/footer.png" alt="">
					</div>
					<div class="bckPadMD">
						<div class="mrgnLftSM">
							<h3>New Design Features:</h3>
							<ul style="list-style-type:circle; margin-left:25px;">
								<li>Improved color scheme</li>
								<li>Less cramped layout</li>
								<li>Better phrase to communicate with audience</li>
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
