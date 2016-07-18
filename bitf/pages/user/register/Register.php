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
		echo "Captch" . $this->vb->Captcha . " and  " . $code;
		
		// Captcha matches?
		if (strcmp ( $this->vb->Captcha, $code ) != 0) {
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
			
			echo "crossed insert registration." . $rs;
			
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
			<label for="Email" class="col-sm-3 control-label">E-mail ID</label>
			<div class="col-sm-5">
				<input name="Email" id="Email" type="text"
					value="<?php echo $vb->Email; ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="Pwd" class="col-sm-3 control-label">Password</label>
			<div class="col-sm-5">
				<input name="Pwd" id="Pwd" type="password"
					value="<?php echo $vb->Pwd; ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="FName" class="col-sm-3 control-label">First Name</label>
			<div class="col-sm-5">
				<input name="FName" id="FName" type="text"
					value="<?php echo $vb->FName; ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="LName" class="col-sm-3 control-label">Last Name</label>
			<div class="col-sm-5">
				<input name="LName" id="LName" type="text"
					value="<?php echo $vb->LName; ?>" class="form-control" />
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
			<label for="Captcha" class="col-sm-3 control-label"> Enter captcha
				code</label>
			<div class="col-sm-5">
				<input name="Captcha" id="Captcha" type="text" class="form-control" />
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5" align="right">
				<button type="submit" name="ACTION_REFERENCE" value="Register"
					class="btn btn-primary">Proceed</button>
				&nbsp;&nbsp;&nbsp;&nbsp; <a href="register"></a>
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
			FName : {
				required : true,
				minlength : 2,
			},
			LName : {
				required : true,
				minlength : 3,
			},
			Email : {
				required : true,
				email : true
			},
			Captcha : {
				required : true,
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