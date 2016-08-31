<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>BITF Management</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
	<link href="static/bootstrap.min.css" rel="stylesheet" />
	<!--
		<link rel="stylesheet"
			href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
			-->

</head>
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-collapse">
						<span class="sr-only">Navigation</span> <span class="icon-bar"></span>
						<span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<div class="navbar-brand">
						<a href='home.php'><img src="static/logo.png"/></a>
					</div>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<?php if($loggedInUser["role"] > 0) { ?>
						<li><a href='donationHist.php'>Donation History</a></li>
						<?php } ?>
						<?php if($loggedInUser["role"] > 8) { ?>
						<li><a href='uploadTxn.php'>Transaction Upload</a></li>
						<li><a href='addTicket.php'>Add Ticket</a></li>						
						<?php } ?>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ticket <span class="caret"></span></a>
							<ul class="dropdown-menu">
							  <li><a href="myPage.php">My Page</a></li>
							  <li><a href="createTicket.php">Create</a></li>
							  <li><a href="searchTicket.php">Search</a></li>
							  <li><a href="listTicket.php">List</a></li>
							</ul>
						  </li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if($loggedInUser["auth"]) { ?>
						<li><a href='logout.php'>Sign out</a></li>
						<?php } else { ?>
						<li><a href='login.php'>Login</a></li>
						<li><a href='register.php'>Register</a>
						</li>
						<?php } ?>
					</ul>
				</div>
				
				User: <?php echo $loggedInUser["name"]; ?> | Role : <?php echo getRole($loggedInUser["role"]); ?>
			</div>
		</div>
	</div>
	<div class="container" style="min-height: 300px;">