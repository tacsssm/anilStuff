<?php $this->load->view('investor/header'); ?>

	
	<div class="main_content2 nopaddingbtm" style="padding-top:43px !important;">
		<div class="container">
			
			<div class="about_container gray_back">
				<div class="bckSolidWht introTxt">
					<div id="hotspot-27" class="hs-wrap hs-loading">
						<img src="<?php echo cdn_url(); ?>images/theredtownshots/header.png">
						<div class="hs-spot-object" data-type="rect" data-x="146" data-y="24" data-width="62" data-height="21" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						This font makes the page look messy and amateurish
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="247" data-y="23" data-width="69" data-height="23" data-popup-position="right" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						This design is too boring
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="442" data-y="13" data-width="183" data-height="34" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Color scheme needs to has less contrast.
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
						<img src="<?php echo cdn_url(); ?>images/theredtownnewshots/header.png" alt="">
					</div>
					<div class="bckPadMD">
						<div class="mrgnLftSM">
							<h3>New Design Features:</h3>
							<ul style="list-style-type:circle; margin-left:25px;">
								<li>Improved font and color scheme</li>
								<li>Brand new navigation design</li>
								<li>Search functionality</li>
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
	$("#hotspot-27").hotspot({ "show_on" : "mouseover" });
});
</script>
</body>
</html>
