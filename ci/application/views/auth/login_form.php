<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'placeholder' => 'Email',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'placeholder' => 'Password',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);

$submitbuttondetails = array(
	'name'	=> 'submit_btn',
	'id'	=> 'submit_btn',
	'value'	=> 'Let me in',
	'class'	=> 'btn-sign-in btn-orange',
	'type' => 'submit',
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
			  <h1><?php if(isset($message)): echo $message;?><?php else: echo 'Sign In'; endif;?></h1>
			  <div class='line'></div>
			  
			  <!-- If you don't want a social buttons, delete all of these code -->
				<a class='btn-facebook' href="#" onclick='login(); return false;'>Connect with Facebook</a>
			  <!-- Till here -->
			  
			  <div class="clear"></div>
			  
			  <!-- Span class ie-placeholder is there for IE browser. IE doesn't support placeholder attribute -->
			<?php echo form_open('auth/login'); ?>
				<span class='ie-placeholders'>Login:</span><?php echo form_input($login); ?>
				<div class="clear"></div>
				<span class='ie-placeholders'>Password:</span><?php echo form_password($password); ?>
				
				 <div class="clear"></div>
<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>


		<div id="recaptcha_image" style="margin-top:20px;"></div>
		<span class='ie-placeholders'>Email:</span><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" placeholder="Enter phrase above"/>

		<?php echo $recaptcha_html; ?>

	<?php } ?>
	<?php } ?>				
				
				
				
				<a class='forgotten-password-link' href='#' id="forgot_password">Forgotten password</a>
				<?php echo form_submit($submitbuttondetails); ?>
			<?php echo form_close(); ?>
			  
			  <!-- FORGOTTEN PASSWORD -->
			  <div class='forgotten-password-box'>
				<?php echo form_open('auth/forgot_password'); ?>
				  <span class='ie-placeholders'>Email:</span><?php echo form_input($login); ?>
				  <input type='submit' class='btn-orange' value='Send' id="forgot_password_submit"/><br /><br />
				  We'll send you an e-mail with password reset.
				<?php echo form_close(); ?>
			  </div>
			  
			  <!-- ERROR STATE -->
			  <div class='error-box red' id="error-box1" <?php if (form_error($login['name']) || form_error('recaptcha_response_field') || form_error($password['name']) ||isset($errors[$login['name']]) || isset($errors[$password['name']])): ?>style="display:block;"<?php endif;?>>
				<span class='error-message'><?php echo form_error($login['name']); ?><?php echo form_error($password['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?> <?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?><?php echo form_error('recaptcha_response_field'); ?></span>
			  </div>
				   
			  <div class='sign-link'>
				Don't have an account? <a href="<?php echo site_url('auth/register');?>">Sign up</a>
			  </div> 
			</div>
			<div class="clear">
			</div>
			
		</div>
	</div>
	
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		$("#forgot_password").click(function(event) {
			event.preventDefault();
			$('.error-box').hide();
			$('.forgotten-password-box').show();
		});	
 });
</script>
<div id="fb-root"></div>
<script src="//connect.facebook.net/en_US/all.js"></script>
<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '492115230801361', // App ID from the App Dashboard
      status     : true, // check the login status upon init?
      cookie     : true, // set sessions cookies to allow your server to access the session?
      xfbml      : true  // parse XFBML tags on this page?
    });

    // Additional initialization code such as adding Event Listeners goes here
  };
  
  function login() {
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
				loginFacebookID(response.authResponse.signedRequest);
			} else{
				FB.login(function(response) {
					if (response.authResponse) {
						loginFacebookID(response.authResponse.signedRequest);
					}
					else{
						location.reload(); 
					}
				}, {scope: 'email'});
			}
		});
	}

	function loginFacebookID(signedRequest) {
		var href="<?php echo base_url();?>index.php/auth/facebook_login/";
		href = href+signedRequest;
		var encoded_url = encodeURI(href);
		window.location.replace(encoded_url);
	}

  // Load the SDK's source Asynchronously
  // Note that the debug version is being actively developed and might 
  // contain some type checks that are overly strict. 
  // Please report such bugs using the bugs tool.
  (function(d, debug){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
     ref.parentNode.insertBefore(js, ref);
   }(document, /*debug*/ false));
</script>
</body>
</html>
