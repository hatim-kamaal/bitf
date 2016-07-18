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
	 *
	 */
	public function doImportFile() {
		//global $viewbean , $ssnmgr, $database;
	
		if( isset( $_FILES["txtInputFile"] ) ) {
			$name = $_FILES["txtInputFile"]["name"];
			if( strlen($name) > 0 ) {
				$temp = explode(".", $_FILES["txtInputFile"]["name"]);
				$extension = end($temp);
				$tmpName = $_FILES['txtInputFile']['tmp_name'];
				if( strtolower($extension) === 'csv' ) {
	
					//$viewbean->message = $viewbean->message . "Entered if CSV<br />";
					if(($handle = fopen($tmpName, 'r')) !== FALSE) {
						// necessary if a large csv file
						set_time_limit(0);
	
						$row = -1;
						$flag = false;
	
						$readThisLine = false;
						$row = 1;
						while(($csvdata = fgetcsv($handle, 1000, ',')) !== FALSE) {
							if( $readThisLine ) {
								//Write code to parse the line and insert into db..
								
								
								//$this->CheckFields($csvdata, $row);
							} else {
								$readThisLine = true;
							}
							$row++;
						}
	
						fclose($handle);
					}
				} else if( strtolower($extension) === 'xls' || strtolower($extension) === 'xlsx') {
					//$viewbean->message = $viewbean->message . "Entered else if xls <br />";
	
// 					include 'Classes/PHPExcel/IOFactory.php';
						
// 					$inputFileName = $tmpName;
// 					//$viewbean->message = $viewbean->message . "Filename: ".$inputFileName." <br />";
						
// 					//  Read your Excel workbook
// 					try {
// 						$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
// 						$objReader = PHPExcel_IOFactory::createReader($inputFileType);
// 						$objPHPExcel = $objReader->load($inputFileName);
// 					} catch (Exception $e) {
// 						die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
// 								. '": ' . $e->getMessage());
// 					}
						
// 					//  Get worksheet dimensions
// 					$sheet = $objPHPExcel->getSheet(0);
// 					$highestRow = $sheet->getHighestRow();
// 					$highestColumn = $sheet->getHighestColumn();
						
// 					//  Loop through each row of the worksheet in turn
// 					for ($row = 2; $row<= $highestRow; $row++) {
// 						//  Read a row of data into an array
// 						$xlsdata = $sheet->rangeToArray('A' . $row. ':' . $highestColumn . $row,NULL, TRUE, FALSE);
// 						$this->CheckFields($xlsdata[0],$row);
// 					}
	
				} else {
					$viewbean->message = "Invalid file extension.";
				}
			}else {
				$viewbean->message = "Please select a file.";
			}
		}
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
			<h3 class="panel-title">Upload Transactoin</h3>
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
				<label for="txtInputFile" class="col-sm-3 control-label">Import File</label>
				<div class="col-sm-5">
					<input type="file" name="txtInputFile" id="txtInputFile"
						class="btn btn-default form-control" />
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-12" align="right">
					<button type="submit" name="ACTION_REFERENCE" value="ImportFile"
						class="btn btn-primary form-control input-lg">Import</button>
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
