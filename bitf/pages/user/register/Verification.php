<?php
class Verification extends AbstractAction {
	
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
		$data = $this->vb->rest_url_part;
		$this->vb->verification = $data[0];
		$result = $this->db->read ( "CODE_VERIFICATION", $this->vb );
		if( !isset($result) ) {
			$this->vb->message = "Invalid varification code.";
			return;
		}
		
		$row = mysqli_fetch_row ( $result );
		$this->vb->id = $row[0];
		
		$this->db->update ( "ACCOUNT_ACTIVATION", $this->vb );
		$errorMessage = $this->db->getErrorMsg();
		if( strlen( $errorMessage ) > 0 ) {
			$this->vb->message = $errorMessage;
			$this->vb->verified = false;
		} else {
			$this->vb->verified = true;
		}
	}
	
	public function page() {
		global $fm, $vb, $db;
		
		?>
<form id="Form1" method="post" action="" id="ctl01" role="form"
	class="form-horizontal minHt">
	<div class="container minHt">
		<?php if( strlen( $vb->message ) > 0) { ?>
		<div class="form-group">
			<div class="alert alert-warning">
				<?php echo $vb->message; ?>
			</div>
		</div>
		<?php } ?>
		<?php if( $vb->verified ) { ?>
		<div class="form-group">
			<div class="alert alert-success">
				Your account has been verified.
			</div>
		</div>
		<?php } else { ?>
		
		<?php } ?>
		
	</div>
</form>
<?php
	}
}
?>