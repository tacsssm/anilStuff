<?php
/* validation using php*/
if ($use_username) {
$username = array(
'name'	=> 'username',
'id'	=> 'username',
'value' => set_value('username'),
'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
'size'	=> 30,
'placeholder' => 'Name',
);
}
$email = array(
'name'	=> 'email',
'id'	=> 'email',
'value'	=> set_value('email'),
'maxlength'	=> 80,
'size'	=> 30,
'placeholder' => 'E-mail',
);
$password = array(
'name'	=> 'password',
'id'	=> 'password',
'value' => set_value('password'),
'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
'size'	=> 30,
'placeholder' => 'Password',
);
$confirm_password = array(
'name'	=> 'confirm_password',
'id'	=> 'confirm_password',
'value' => set_value('confirm_password'),
'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
'size'	=> 30,
'placeholder' => 'Retype password',
);
?>

<?php $this->load->view('outerpages/header'); ?>
<link href="<?php echo cdn_url(); ?>css/form-style.css" rel="stylesheet" type="text/css" />
  <!-- CSS code for IE Browser -->
  <!--[if lt IE 10]>
    <link href="<?php echo cdn_url(); ?>css/form-style-ie.css" rel="stylesheet" type="text/css" />  
  <![endif]-->

	
	<div class="main_content">
		<div class="container clearfix">
		
			<div class='form'>
			  <h1>Sign Up</h1>
			  <div class='line'></div>
			  
			  <!-- If you don't want a social buttons, delete all of these code
				<a class='btn-facebook' href='#'>Connect with Facebook</a>
				<a class='btn-twitter' href='#'>Connect with Twitter</a>
			  <!-- Till here -->
			  
				<?php echo form_open('auth/register'); ?>
					<span class='ie-placeholders'>Name:</span><?php echo form_input($username); ?>
					<span class='ie-placeholders'>E-mail:</span><?php echo form_input($email); ?>
					<span class='ie-placeholders'>Password:</span><?php echo form_password($password); ?>
					<span class='ie-placeholders'>Retype Pass:</span><?php echo form_password($confirm_password); ?><br />
					<input type='checkbox' id='tac-checkbox' checked="checked"/><label for='tac-checkbox'>I agree with <a href='<?php echo site_url('welcome/about/terms');?>'>terms and conditions</a></label>
					<input type='submit' class='btn-register btn-orange' value='Register' id="submit_btn"/>
				<?php echo form_close(); ?>
			  
			 	<!-- ERROR STATE -->
				<div class='error-box red' <?php if( form_error($username['name']) || form_error($email['name']) || form_error($password['name']) ||form_error($confirm_password['name']) ||isset($errors[$username['name']])|| isset($errors['email']) || isset($errors['fbid']) || isset($errors['email_extension'])): ?>style="display:block;"<?php endif;?>>
					<span class='error-message' style="margin: 25px 0 0 30px;"><?php echo form_error($username['name']); ?><?php echo form_error($email['name']); ?><?php echo form_error($password['name']); ?><?php echo form_error($confirm_password['name']); ?><?php echo isset($errors['email'])?$errors['email']:''; ?><?php echo isset($errors['fbid'])?$errors['fbid']:''; ?><?php echo isset($errors['email_extension'])?$errors['email_extension']:''; ?></span>
				</div>
				<div class='error-box red' id="term">
					<span class='error-message' style="margin: 25px 0 0 20px;"><b>Please click the terms and conditions</b></span>
				</div>
				<!-- ERROR STATE -->
				<!-- <div class='error-box red'>
				<span class='error-message'><b>The email you entered is not part of TheRedtown Network.</b></span>
				</div>-->
			  
			  <div class='sign-link'>
				Already have an account? <a href='<?php echo site_url('auth');?>'>Sign in</a>
			  </div>
			</div>
			
			<div class="clear">
			</div>
			
		</div>
	</div>
</body>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	// validation using js
	$("#submit_btn").click(function(event) {		
		if(!$('#tac-checkbox:checked').length > 0){
			event.preventDefault();
			$('.error-box').hide();
			$('#term').show();
		}
	});
});
</script>
</html>
