<?php

$msg = "success";
$status = true;
$records = array();


if( !isset($_GET['id']) ) {
	$msg = "Invalid details";
	goto return_with_error;
}

$id = $_GET['id'];

$conn = mysqli_connect ( "localhost", "root", "", "bitf" );
$msg = "SELECT id, incoming_fund, outgoing_fund, details, txndate, message FROM bitf_account_activity WHERE userid = $id";

$rs = $conn->query ($msg);
if( isset($rs) ) {
	if ($rs instanceof mysqli_result) {
		if (mysqli_num_rows ( $rs ) > 0) {
			while($row = mysqli_fetch_row ( $rs )) {
				$id = $row[0];
				$incoming = $row[1];
				$outgoing = $row[2];
				$details = $row[3];
				$txndate = $row[4];
				$message = $row[5];
				
				array_push( $records, array( 'id'=>$id, 'incoming'=>$incoming , 'outgoing'=>$outgoing 
				, 'details'=>$details , 'txndate'=>$txndate , 'message'=>$message ) );
			}
			
			$conn->close();
			goto return_now;
		} else {
			$msg = "no record";
		}
	} else {
		$msg = "no result";
	}
} else {
	$msg = "no data";
}

//$msg = "no data";

return_with_error:
$status = false;

return_now:
$result = array('data'=>array('msg'=>$msg,'status'=>$status, 'details'=>$records));

echo json_encode($result, true);