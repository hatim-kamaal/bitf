<?php
class History extends AbstractAction {

	/**
	 * (non-PHPdoc)
	 *
	 * @see AbstractRequestController::view()
	 */
	public function view() {
	}

	/**
	 */
	public function doSearch() {
		$result = $this->db->read ( "SIGNIN", $this->vb );
		if (!isset ( $result )) {
			$this->vb->message = "Invalid Username or Password";
			return;
		}

		$row = mysqli_fetch_row ( $result );
		$id = $row[0];
		$userid = $row[1];
		$fname = $row[2];
		$lname = $row[3];
		$status = $row[4];


			
		if( !$status ) {
			$this->vb->message = "Your account is deactivated. Contact the system admin.";
			return;
		}
			
		$userDetails = new ModelBean ();
		$userDetails->UserName = "$fname $lname";
		$userDetails->UserId = $userid;
		$this->setSession("USER_DETAILS" , $userDetails);
		$this->setSession("LAST_REQUEST" , time ());
			
		$this->redirect ( $this->fm->getUrl ( "home" ) );
	}
	public function isRestricted() {
		return false;
	}
	public function page() {
		global $vb, $fm, $db;
		?>

<form id="Form1" method="post" action="" id="ctl01" role="form"
	class="form-horizontal minHt">


	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Input Area</h3>
		</div>
		<div class="panel-body">

			<?php if( strlen( $vb->message ) > 0) { ?>
			<div class="form-group">
				<div class="alert alert-warning">
					<?php echo $vb->message; ?>
				</div>
			</div>
			<?php } ?>

			<div class="form-group">
				<label for="StartDate" class="col-sm-3 control-label">Start Date (MM/YYYY)</label>
				<div class="col-sm-5">
					<input name="StartDate" id="StartDate" type="text"
						value="<?php echo $vb->StartDate; ?>" class="form-control" />
				</div>
			</div>

			<div class="form-group">
				<label for="EndDate" class="col-sm-3 control-label">End Date (MM/YYYY)</label>
				<div class="col-sm-5">
					<input name="EndDate" id="EndDate" type="text"
						value="<?php echo $vb->EndDate; ?>" class="form-control" />
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-12" align="right">
					<button type="submit" name="ACTION_REFERENCE" value="Search"
						class="btn btn-primary form-control input-lg">Search</button>
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
			User : {
				required : true,
				minlength : 2,
			},
			Passcode : {
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
<?php
	}
}
