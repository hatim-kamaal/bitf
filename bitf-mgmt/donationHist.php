<?php
//This is Donation History Page.
include_once "framework.php";
restricted();

$conn = mysqli_connect ( "localhost", "root", "", "bitf" );
$msg = "SELECT id, incoming_fund, outgoing_fund, details, txndate, message 
FROM bitf_account_activity WHERE userid = 1 LIMIT 100";

$data = "<table>";

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
				
				$data .= "<tr><td>$message</td></tr>";
				/*
				array_push( $records, array( 'id'=>$id, 'incoming'=>$incoming , 'outgoing'=>$outgoing 
				, 'details'=>$details , 'txndate'=>$txndate , 'message'=>$message ) );
				*/
			}
			
			$conn->close();
			//goto return_now;
		} else {
			$msg = "no record";
		}
	} else {
		$msg = "no result";
	}
} else {
	$msg = "no data";
}
$data .= "</table>";


include_once "global.header.php";
echo $data;
include_once "global.footer.php"; ?>