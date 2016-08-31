<?php
//Start the sessoin
session_start ();
$loggedInUser = array('auth'=>false,'name'=>'Anonymous','role'=>-1,'userid'=>-1);

$astatus = false;
$lastReq = getSession ( "LAST_REQUEST" );
if (isset ( $lastReq )) {
	$session_life = time () - $lastReq;
	if ($session_life < 3601) {
		setSession ( "LAST_REQUEST", time () );
		//$expired = false;
		$loggedInUser = getSession("USER_DETAILS");
	}
}

/**
* Authentication confirmation function.
*/
function restricted(){
	global $loggedInUser;
	if (!$loggedInUser["auth"]) {
		clearSession ();
		setSession ( "ErrorMessage", "Your session has been expired." );
		redirect ( "login.php" );		
	}	
}

function getRole($roleId) {
	switch($roleId) {
		case -1:
		   return "Anonymous";
		case 9:
			return "Super Admin";
		case 8:
			return "Doner";
	}
}

function redirect($path) {
	header("Location:$path");
}

/**
 *
 * @param unknown $property        	
 * @return mixed
 */
function getSession($property) {
	if (isset ( $_SESSION [$property] )) {
		return unserialize ( $_SESSION [$property] );
	}
}
/**
 *
 */
function setSession($name, $value) {
	$_SESSION [$name] = serialize ( $value );
}

function clearSession() {
	foreach ( $_SESSION as $key => $value ) {
		if (isset ( $_SESSION [$key] )) {
			unset ( $_SESSION [$key] );
		}
	}
}
?>