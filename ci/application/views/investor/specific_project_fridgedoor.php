<?php $this->load->view('investor/header'); ?>

	
	<div class="main_content2 nopaddingbtm" style="padding-top:43px !important;">
		<div class="container">
			
			<div class="about_container gray_back">
				<div class="bckSolidWht introTxt">
					<div id="hotspot-777" class="hs-wrap hs-loading">
						<img src="<?php echo cdn_url(); ?>images/theredtownshots/fridgedoor.png">
						<div class="hs-spot-object" data-type="rect" data-x="109" data-y="53" data-width="163" data-height="16" data-popup-position="bottom" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						The filters look and feel amateur
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="456" data-y="67" data-width="121" data-height="81" data-popup-position="bottom" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						The background image makes reading the content difficult
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="137" data-y="151" data-width="96" data-height="41" data-popup-position="bottom" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						This font makes the page look messy
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="380" data-y="207" data-width="78" data-height="18" data-popup-position="bottom" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Provide a means for users to interact with each item (Vote, Vetor, Comment)
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
						<img src="<?php echo cdn_url(); ?>images/theredtownnewshots/fridgedoor.png" alt="">
					</div>
					<div class="bckPadMD">
						<div class="mrgnLftSM">
							<h3>New Design Features:</h3>
							<ul style="list-style-type:circle; margin-left:25px;">
								<li>Improved color scheme</li>
								<li>Improved readability</li>
								<li>Brand new filter design</li>
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
