<?php

$msg = "success";
$status = true;
$udata = array();

if( !isset($_GET['email']) ) {
	$msg = "Email id is blank";
	goto return_with_error;
}

if( !isset($_GET['code']) ) {
	$msg = "Password is blank";
	goto return_with_error;
}

$email = $_GET['email'];
$code = $_GET['code'];

//$conn = mysqli_connect ( "localhost", "root", "", "bitf" );
include_once("dbconn.php");
$msg = "SELECT id, fullname FROM bitf_human_resource WHERE emailid = '$email' and userpwd = '$code'";
$rs = $conn->query ($msg);
if( isset($rs) ) {
	if ($rs instanceof mysqli_result) {
		if (mysqli_num_rows ( $rs ) > 0) {
			//return $rs;
			$row = mysqli_fetch_row ( $rs );
			$id = $row[0];
			$fname = $row[1];
			$udata = array('id'=>$id, 'fullname'=>$fname);
			$conn->close();
			goto return_now;
		}
	}
}

$msg = "Incorrect userid or password";

return_with_error:
$status = false;

return_now:
$result = array('data'=>array('msg'=>$msg,'status'=>$status, 'udata'=>$udata));

echo json_encode($result, true);
