<?php
require("fpdf.php");
function Value($pdf, $x, $y, $msg) {
	$pdf->SetFont('','U');
	$pdf->SetTextColor(113,200,200);
	$pdf->Text($x,$y, $msg);
	$pdf->SetFont('','');
	$pdf->SetTextColor(0,0,0);
}

$msg = "Invalid reciept id.";
$error = false;
if( !isset($_GET['uid']) ) {
	$error = true;
	goto RESULT;
}

$id = $_GET['uid'];

//$conn = mysqli_connect ( "localhost", "root", "", "bitf" );
include_once("dbconn.php");
$msg = "SELECT a.id, a.incoming_fund, a.outgoing_fund, a.details, a.txndate, a.message, r.fullname FROM bitf_account_activity a, bitf_human_resource r WHERE a.id = $id AND a.userid = r.id";

$rs = $conn->query ($msg);
if( isset($rs) ) {
	if ($rs instanceof mysqli_result) {
		if (mysqli_num_rows ( $rs ) > 0) {
			$row = mysqli_fetch_row ( $rs );
			$id = $row[0];
			$incoming = $row[1];
			$outgoing = $row[2];
			$details = $row[3];
			$txndate = $row[4];
			$message = $row[5];
			$name = $row[6];

			$conn->close();
		} else {
			$error = true;
			$msg = "no record";
			goto RESULT;
		}
	} else {
		$error = true;
		$msg = "no result";
		goto RESULT;
	}
} else {
	$error = true;
	$msg = "no data";
	goto RESULT;
}

RESULT:
if( !$error ) {

	//36
	$hgap = 46;
	//$lgap = 45;


	$pdf = new FPDF();
	$pdf->AddPage();
	
	$pdf->Rect(9,9,191,141);
	$pdf->Rect(10,10,189,139);
	
	$pdf->Line(25,33,180,33);
	
	
	$pdf->SetFont('Arial','B',12);
	$pdf->Image('logo_only.png',59,13,-200);
	//$pdf->Cell(40,10,'Hello World!');
	$pdf->Cell(0,30,'AET- BURHANI IT FRATERNITY',0,1,'C');
	
	//$pdf->Rect(41,11,128,25);
	
	$pdf->SetFont('','');
	$pdf->Cell(0,10,'Receipt No : ',0,1, 'L');

	//Value($pdf, 40,36, $id);
	Value($pdf, 40,$hgap, $id);


	$pdf->Cell(0,10,'Date : ',0,1,'L');

	//Value($pdf, 40,46, $txndate);
	$hgap+=10;
	Value($pdf, 40,$hgap, $txndate);


	$pdf->Cell(0,10,'  ',0,1,'L');

	$pdf->Cell(0,10,'Received with thanks from Mr/s : ',0,1,'L');

	//Value($pdf, 74,66, $name);
	$hgap+=20;
	Value($pdf, 74,$hgap, $name);

	$pdf->Cell(0,10,'the sum of Rupees : ',0,1,'L');

	//Value($pdf, 50,76, $incoming);
	$hgap+=10;
	Value($pdf, 50,$hgap, $incoming);

	$pdf->Cell(0,10,'by online transaction reference : ',0,1,'L');

	//Value($pdf, 72,86, $message);
	$hgap+=10;
	Value($pdf, 72,$hgap, $message);

	$pdf->Cell(0,10,'towards voluntary contribution for child education.',0,1,'L');

	$pdf->Cell(0,30,'Authorized signature.  ',0,1,'R');


	$pdf->Output();

} else {

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->Rect(10,10,190,120);
	$pdf->SetFont('Arial','B',12);
	//$pdf->Cell(40,10,'Hello World!');
	$pdf->Cell(0,20,'ERROR! contact system admin',0,1,'C');

	$pdf->Output();

}









?>
