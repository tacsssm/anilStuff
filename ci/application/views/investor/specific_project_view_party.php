<?php $this->load->view('investor/header'); ?>

	
	<div class="main_content2 nopaddingbtm" style="padding-top:43px !important;">
		<div class="container">
			
			<div class="about_container gray_back">
				<div class="bckSolidWht introTxt">
					<div id="hotspot-75" class="hs-wrap hs-loading">
						<img src="<?php echo cdn_url(); ?>images/theredtownshots/view_party.png">
						<div class="hs-spot-object" data-type="rect" data-x="270" data-y="125.5" data-width="49" data-height="62" data-popup-position="right" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						New Member button is too clunky. Make it more subtle and sleek
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="487" data-y="121.5" data-width="109" data-height="62" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Not user-friendly enough
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="115" data-y="187.5" data-width="138" data-height="19" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Lacks modern feel
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="270" data-y="232.5" data-width="111" data-height="57" data-popup-position="bottom" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Too much. User doesn't need to see this, he can look over votes in the bottom section.
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="424" data-y="227.5" data-width="155" data-height="49" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Improve the execution
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="264" data-y="66.5" data-width="187" data-height="36" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						This dashboard too clunky and takes over too much of the page. Find a more subtle and sleek way to incorporate it.
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="111" data-y="386.5" data-width="476" data-height="32" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Crams the section with too much info. Find a way to incorporate this progress bar without taking too much real estate.
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="533" data-y="427.5" data-width="111" data-height="140" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Should be included in the party dashboard.
						</div>
						<div class="hs-spot-object" data-type="rect" data-x="113" data-y="492.5" data-width="130" data-height="198" data-popup-position="left" data-visible="visible" data-tooltip-width="200" data-tooltip-auto-width="true">
						Designs too clunky. Find a design that will allow you to fit more boxes in the screen.
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
						<img src="<?php echo cdn_url(); ?>images/theredtownnewshots/view_party.png" alt="">
					</div>
					<div class="bckPadMD">
						<div class="mrgnLftSM">
							<h3>New Design Features:</h3>
							<ul style="list-style-type:circle; margin-left:25px;">
								<li>Improved layout</li>
								<li>More intuitive and user-friendly</li>
								<li>Discussions section</li>
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
	$("#hotspot-75").hotspot({ "show_on" : "mouseover" });
});
</script>
</body>
</html>
