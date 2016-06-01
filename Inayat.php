<?php
$method = $_SERVER ['REQUEST_METHOD'];
if ($method === 'POST') {
	foreach ( $_POST as $key => $val ) {
		echo "$key   =   $val <br />";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>BITF - Inayat request</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
		<h2>Request for education support</h2>
		<form role="form" action="" method="post">
			<div class="form-group">
				<label for="name">Student Name:</label> <input type="text"
					class="form-control" name="name" placeholder="Enter name" required="true">
			</div>
			<div class="form-group">
				<label for="its">Student ITS:</label> <input type="text"
					class="form-control" name="its" placeholder="Enter ITS ID">
			</div>
			<div class="form-group">
				<label for="mohalla">Mohalla:</label> <select class="form-control"
					name="mohalla">
					<option value="Saifee">Saifee</option>
					<option value="Burhani">Burhani</option>
					<option value="Fakhri">Fakhri</option>
					<option value="Mohammedi">Mohammedi</option>
					<option value="Kasarwadi">Kasarwadi</option>
					<option value="Burhani_Colony">Burhani Colony</option>
					<option value="Burhani_Park">Burhani Park</option>
					<option value="Fatema_Nagar">Fatema Nagar</option>
				</select>
			</div>
			<div class="form-group">
				<label for="address">Present Address:</label>
				<textarea rows="10" cols="35" class="form-control" name="address"></textarea>
			</div>
			<div class="form-group">
				<label for="mobile">Mobile:</label> <input type="text"
					class="form-control" name="mobile" placeholder="Enter mobile number">
			</div>
			<div class="form-group">
				<label for="email">Email:</label> <input type="email"
					class="form-control" name="email" placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="school">School:</label> <input type="text"
					class="form-control" name="school" placeholder="Enter school name">
			</div>
			<div class="form-group">
				<label for="standard">Standard:</label> <input type="text"
					class="form-control" name="standard" placeholder="Enter Standard">
			</div>
			<div class="form-group">
				<label for="board">Examination Board:</label> <select
					class="form-control" name="board">
					<option value="SSC">SSC</option>
					<option value="CBSE">CBSE</option>
					<option value="ICSE">ICSE</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div class="form-group">
				<label for="madrasa">Madrasa:</label> <select class="form-control"
					name="madrasa">
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
			</div>
			<div class="form-group">
				<label for="paymentCycle">School Payment cycle:</label> <select class="form-control"
					name="paymentCycle">
					<option value="Monthly">Monthly</option>
					<option value="Quarterly">Quarterly</option>
					<option value="half-yearly">Half-Yearly</option>
					<option value="Yearly">Yearly</option>
				</select>

			</div>
			<div class="form-group">
				<label for="totalRequired">Total School Fees:</label> <input type="text"
					class="form-control" name="totalRequired" placeholder="Required fees">
			</div>
			<div class="form-group">
				<label for="ownPart">Your Contribution:</label> <input type="text"
					class="form-control" name="ownPart" placeholder="Enter your contribution">
			</div>
			<div class="form-group">
				<label for="trustPart">Expected contribution from trust:</label> <input
					type="text" class="form-control" name="trustPart"
					placeholder="Enter expected contribution">
			</div>
			<div class="form-group">
				<label for="fatherOccupation">Father's occupation:</label> <input type="text"
					class="form-control" name="fatherOccupation"
					placeholder="Enter father's occupation">
			</div>
			<div class="form-group">
				<label for="motherOccupation">Mother's occupation:</label> <input type="text"
					class="form-control" name="motherOccupation"
					placeholder="Enter mother's occupation">
			</div>
			<div class="form-group">
				<label for="appliedAnywhere">Have you applied for fees anywhere else?:</label>
				<select class="form-control" name="appliedAnywhere">
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
			</div>
			<div class="form-group">
				<label for="remarks">Remarks:</label>
				<textarea class="form-control" name="remarks"></textarea>
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>

</body>
</html>
