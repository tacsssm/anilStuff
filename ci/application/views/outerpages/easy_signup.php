<div class="signup-section clearfix">
		<div class="container">
			<?php echo form_open('auth/register'); ?>
				<h2>Sign up for free now.</h2>
				<p> No credit card required, just enter your email to get started.</p>
				<div class="signup-button-wrapper">
					<input id="home-signup-email-bottom" name="user[email]" placeholder="your email address" size="30" type="text">
					<button type="submit" class="btn btn-large btn-default"><span class="button-arrow">GO</span></button>
				</div>
				<div class="accept_terms_checkbox_container">
					<input name="user[terms]" value="0" type="hidden">
					<label class="checkbox">
						<input id="terms" name="user[terms]" value="1" type="checkbox"> I have read and agree to the <a href="<?php echo site_url('welcome/about/terms');?>" target="_blank">terms</a> and <a href="<?php echo site_url('welcome/about/privacy');?>" target="_blank">privacy policy</a>
					</label>
				</div>
			</form>            
		</div>
    </div>