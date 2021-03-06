<?php
class Register extends AbstractAction {
	
	/**
	 */
	public function isRestricted() {
		return false;
	}
	/**
	 * (non-PHPdoc)
	 *
	 * @see AbstractRequestController::view()
	 */
	public function view() {
	}
	
	/**
	 */
	public function doRegister() {
		
		$code = $this->getSession("code");
		echo "Captch" . $this->vb->captcha . " and  " . $code;
		
		// Captcha matches?
		if (strcmp ( $this->vb->captcha, $code ) != 0) {
			$this->vb->message = "Invalid Captcha input";
			return;
		}
		
		$rs = $this->db->read ( "CHECK_EMAIL_EXIST", $this->vb );
		if (isset ( $rs )) {
			$this->vb->message = "This email id is already registered with us. Try forget password.";
			return;
		}
		
		echo "crossed check email exist.";
		
		$code = rand ( 100000, 9999999 );
		
		if ($this->sendEmailForActivation ( $this->vb, $code )) {
			
			echo "crossed send email.";
			
			$rs = $this->db->update ( "INSERT_REGISTRATION", $this->vb );
			
			echo "crossed insert registration." . $this->db->getErrorMsg();
			
			//$this->db->addUnderRegistrationDetails ( $this->viewbean->Name, $this->viewbean->Email, $code );
			$this->redirect ( $this->path->url_pwdchng );
		} else {
			$this->vb->message = "Sorry! try again.";
		}
	}
	
	/**
	 *
	 * @param unknown $email        	
	 * @param unknown $code        	
	 */
	function sendEmailForActivation($vb, $code) {
		
		$name = $vb->FName;
		$email = $vb->Email;
		
		$msg = 'WhatsApp Service by GoldenHats.com<br><br>
			Hello ' . $name . ',<br><br>
			You have registered this email address with us.<br>
			Please use the below one time password for password change process.<br>
			Password:<h1>' . $code . '</h1><br><br>';
		
		$emailData = new ModelBean ();
		
		$emailData->Subject = "GoldenHats Registration.";
		$emailData->Body = $msg;
		$emailData->Email = $email;
		$emailData->FullName = $name;
		
		//return Util::sendEmail ( $emailData );
		return true;
	}
	public function page() {
		global $fm, $vb, $db;
		?>
<form id="Form1" method="post" action="" id="ctl01" role="form"
	class="form-horizontal minHt">

	<div class="container minHt">
		<div class="form-group">
			<div class="alert alert-success">
				<b>Register with us!</b>
			</div>
		</div>

		<?php if( strlen( $vb->message ) > 0) { ?>
		<div class="form-group">
			<div class="alert alert-warning">
				<?php echo $vb->message; ?>
			</div>
		</div>
		<?php } ?>

		<div class="form-group">
			<div class="alert alert-primary">
				Hello,<br> Provide your valid email address to recieve the
				registration code.
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-3 control-label">Email</label>
			<div class="col-sm-5">
				<input name="email" id="email" type="text"
					value="<?php echo $vb->email; ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-3 control-label">Password</label>
			<div class="col-sm-5">
				<input name="password" id="password" type="password"
					class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="fullname" class="col-sm-3 control-label">Full Name</label>
			<div class="col-sm-5">
				<input name="fullname" id="fullname" type="text"
					value="<?php echo $vb->fullname; ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="itsid" class="col-sm-3 control-label">ITS ID</label>
			<div class="col-sm-5">
				<input name="itsid" id="itsid" type="text"
					value="<?php echo $vb->itsid; ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="mobile" class="col-sm-3 control-label">Mobile Number</label>
			<div class="col-sm-5">
				<input name="mobile" id="mobile" type="text"
					value="<?php echo $vb->mobile; ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="pannumber" class="col-sm-3 control-label">PAN Number</label>
			<div class="col-sm-5">
				<input name="pannumber" id="pannumber" type="text"
					value="<?php echo $vb->pannumber; ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="Captcha" class="col-sm-3 control-label">Captcha </label>
			<div class="col-sm-5">
				<img class="img-responsive"
					src="<?php echo $fm->getUrl("captcha"); ?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="captcha" class="col-sm-3 control-label"> Enter captcha
				code</label>
			<div class="col-sm-5">
				<input name="captcha" id="captcha" type="text" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5" align="right">
				<button type="submit" name="ACTION_REFERENCE" value="Register"
					class="btn btn-primary">Register</button>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
$(function() {
	// Setup form validation on the #register-form element
	$("#Form1").validate(
	{
		// Specify the validation rules
		rules : {
			email : {
				required : true,
				email : true
			},
			password : {
				required : true,
				minlength : 6
			},
			fullname : {
				required : true,
			},
			mobile : {
				required : true,
				number : true,
				minlength : 10,
				maxlength : 10
			},
			itsid : {
				required : true,
				minlength : 8,
				maxlength : 8
			},
			captcha : {
				required : true
			}
		},
		submitHandler : function(form) {
			form.submit();
		}
	});
});


</script>

<?php
	}
}
?>