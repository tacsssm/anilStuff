<?php $this->load->view('outerpages/header'); ?>
	
	<div class="main_content2 nopaddingbtm">
		<div class="container">
			<div class="span10">
				<h1>Contact Us</h1>
				<p>We'd love to hear from you.</p>
			</div>
			
<!--
1 	Jacob 	Sophia
2 	Mason 	Isabella
3 	William 	Emma
4 	Jayden 	Olivia
5 	Noah 	Ava
6 	Michael 	Emily
-->
			
			<div class="contact_container gray_back">
				<div class="contact_container_content bckSolidWht">
					<div class="contact_container_content2">
						<div class="header">
							<div class="team">
								<div class="staff">
									<div class="employee"></div>
									<p>Sophia</p>
								</div>
								<div class="staff">
									<div class="employee employee2"></div>
									<p>Jacob</p>
								</div>
								<div class="staff">
									<div class="employee employee10"></div>
									<p>Mason</p>
								</div>
								<div class="staff">
									<div class="employee employee3"></div>
									<p>Isabella</p>
								</div>
								<div class="staff">
									<div class="employee employee4"></div>
									<p>Will</p>
								</div>
								<div class="staff">
									<div class="employee employee5"></div>
									<p>Emma</p>
								</div>
								<div class="staff">
									<div class="employee employee6"></div>
									<p>Olivia</p>
								</div>
								<div class="staff">
									<div class="employee employee7"></div>
									<p>Ava</p>
								</div>
								<div class="staff">
									<div class="employee employee8"></div>
									<p>Jay</p>
								</div>
								<div class="staff">
									<div class="employee employee9"></div>
									<p>Emily</p>
								</div>
							</div>
							<h1>Have questions? We’ve got answers.</h1>
							<p>Let our award-winning staff help you. Fill out the form below and we'll get back to you as soon as possible.</p>
						</div>
						
						<div class="contact_form">
							<form accept-charset="UTF-8" action="/index.php/contact" class="new_ticket" enctype="multipart/form-data" id="new_ticket_form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" value="✓" type="hidden"><input name="authenticity_token" value="q+xeKkrJjUkTj7wL0dBwTUKBeBTmX78DfLSaJsxRzfc=" type="hidden"></div>
							<input id="ticket_has_classic_account" name="ticket[has_classic_account]" type="hidden">
							<div class="ticket_form">

							  <div style="" class="question">
								<h3>What do you need help with? <span>—&nbsp;Required</span></h3>
								<p>This helps us make sure you get the right answer as fast as possible.</p>

								<select id="ticket_issue_type" name="ticket[issue_type]"><option value="">Please select one...</option>
							<option value="login">I can't access my account</option>
							<option value="signup">I have a question before I sign up</option>
							<option value="request">I want to request a feature</option>
							<option value="billing">I have a billing question</option>
							<option value="email">I'm not receiving emails</option>
							<option value="confused">I'm confused about how something works</option>
							<option value="broken">I think something is broken</option>
							<option value="other">Other</option></select>
							  </div>

							  <div id="billing_questions" class="if_billing" style="display: none;">
								<h2>Click for instant answers to common billing questions:</h2>
								<ul>
									<li><a href="/billing/questions/318-how-do-i-update-or-change-our-credit-card">How do I update or change our credit card?</a>
									</li><li><a href="/billing/questions/320-where-can-i-find-our-invoices-or-get-a-copy-of-an-invoice">Where can I find our invoices or get a copy of an invoice?</a>
									</li><li><a href="/billing/questions/321-what-is-an-account-owner-how-can-i-change-the-account-owner-on-my-account">What is an account owner? How can I change the account owner on my account?</a>
								</li></ul>
							  </div>

							  <div id="email_questions" class="if_email" style="display: none;">
								<h2><a href="/email">Click here to check on the status of email delivery for your address.</a></h2>
								<br>
							  </div>

							  <div class="question">
								<h3>What’s your question, comment, or issue? <span>—&nbsp;Required</span></h3>
								<p>Give us as much detail as you can. The more we know, the better we can help you.</p>

								<textarea cols="40" id="ticket_details" name="ticket[details]" rows="20"></textarea>
							  </div>

							  <div class="question">
								<h3>Send us a file, screenshot, or document</h3>
								<p>If a picture’s worth 1000 words, sharing a picture of what’s wrong can help us big time.</p>


								<input class="file_upload_input" id="ticket_file" name="ticket[file]" type="file">
							  </div>


							  <div style="" class="question">
								<h3>What’s your email address? <span>—&nbsp;Required</span></h3>
								<p>We need this so we can get back to you. Please double check that it’s right.</p>
								<input id="ticket_email_address" name="ticket[email_address]" placeholder="Enter your email address" size="30" type="text">
							  </div>


							 

							  <input id="ticket_source" name="ticket[source]" type="hidden">

							  <div class="question submit">
								<input value="Submit this support request" style="width: auto;" type="submit" class=".btn .btn-large">&nbsp;and we’ll get back to you as soon as we can.
							  </div>
							</div>

							</form>
							<aside class="stamp"></aside>

						</div>
					</div>
				</div>
			</div>
			
			<div class="clear"></div>
			
			
			
			
			
			<?php $this->load->view('outerpages/footer_nav'); ?>

		</div>
	</div>

</body>
</html>
