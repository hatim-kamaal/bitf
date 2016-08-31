<?php
include_once "framework.php";

$msg = getSession ( "ErrorMessage");

if( isset( $_POST['ACTION_REFERENCE'] ) ) {
	$uid = $_POST['email'];
	$pwd = $_POST['passcode'];	
	if( "hatim"==$uid && "hatim"== $pwd) {
		$userDetails = array('auth'=>true,'name'=>'Hatim','role'=>9,'userid'=>1);
		setSession("USER_DETAILS" , $userDetails);
		setSession("LAST_REQUEST" , time ());
		
		header("Location: home.php");
	} else if( "kamaal"==$uid && "kamaal"== $pwd) {
		$userDetails = array('auth'=>true,'name'=>'Kamaal','role'=>8,'userid'=>2);
		setSession("USER_DETAILS" , $userDetails);
		setSession("LAST_REQUEST" , time ());
		
		header("Location: home.php");
	} else {
		$msg = "Invalid user name or password";
	}
}

include_once "global.header.php";
?>
<h1>Sign In</h1>
<form id="Form1" method="post" action="" role="form"
	class="form-horizontal minHt">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Login Area</h3>
		</div>
		<div class="panel-body">

			<?php if( strlen( $msg ) > 0) { ?>
			<div class="form-group">
				<div class="alert alert-warning">
					<?php echo $msg; ?>
				</div>
			</div>
			<?php } ?>


			<div class="form-group">
				<div class="col-sm-12">
					<input name="email" type="text"
						placeholder="Email" class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<input name="passcode" id="passcode" type="password"
						placeholder="Password"
						class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12" align="right">
					<button type="submit" name="ACTION_REFERENCE" value="Login"
						class="btn btn-primary form-control input-lg">Sign in</button>
				</div>
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
				minlength : 2,
			},
			passcode : {
				required : true,
				minlength : 2,
			}
		},
		submitHandler : function(form) {
			form.submit();
		}
	});
});
</script>
<?php include_once "global.footer.php"; ?>