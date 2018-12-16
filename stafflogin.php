<?php include('startup.php') ?>

<?php

	// If form submitted, insert values into the database.
	if (isset($_POST['staff_id']) and isset($_POST['staff_pass']) ){ 
		//assigning posted values to variables
		$staff_id = $_POST['staff_id'];
		$staff_pass = $_POST['staff_pass'];
	
		// removes backslashes
		$staff_id = stripslashes($_REQUEST['staff_id']);
        //escapes special characters in a string
		$staff_id = mysqli_real_escape_string($conn,$staff_id);
		$staff_pass = stripslashes($_REQUEST['staff_pass']);
		$staff_pass = mysqli_real_escape_string($conn,$staff_pass);
	
		$query = "SELECT * FROM staff WHERE sta_id = '$staff_id' and pass = '$staff_pass'";
		$result = mysqli_query($conn, $query) or die(mysql_error($conn));
		
		$rows = mysqli_num_rows($result);
	
		if($rows == 1) {
			$_SESSION['sta_id'] = $staff_id;
			//redirect user to mainstaff.php
			header("Location: mainstaff.php");
			die();
		}
		else {
			echo "<script>alert('Staff ID or Password is invalid!');</script>";
		}
	}
?>

<html lang="en">
	<head>
		<title>
			e-CRS Staff Login
		</title>
		<meta name="viewport" content="width=device-width, initial-size=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			#form {
			}
			#submit {
				background-color: #cfebff;
			}
			#input {
				background-color: #cfebff;
			}
			#title {
				margin-bottom: 30px;
				text-align: center;
				margin-top: 30px;
			}
			#nav {
				background-color: #e3f2fd;
			}
			body {
				background-color: #b5d6ee;
			}
		</style>
	</head>
	<body>

		<nav id="nav" class="navbar navbar-light">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php"> e - C R S</a>
				</div>
				<div>
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="stafflogin.php"><span class="glyphicon glyphicon-user"></span> Staff Login</a></li>
						<li><a href="studentlogin.php"><span class="glyphicon glyphicon-log-in"></span> Student Login</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div id="title" class="container">
			<h2>Staff Login</h2>
		</div>

		<div class="container">
		<div class="col-sm-5"></div>
		<div class="col-sm-2">
			<form method="post" action="stafflogin.php">
				<div class="row">
					<input id="input" type="text" class="form-control" name="staff_id" placeholder="Enter Staff ID" required><br>
				</div>
				<div class="row">
					<input id="input" type="password" class="form-control" name="staff_pass" placeholder="Enter Staff Password" required><br>
				</div>
				<div class="row"><div class="col-sm-4"></div><div class="col-sm-8">
					<input id="submit" type="submit" class="form-control" value="Login">
				</div></div>
			</form>
		</div>
		<div class="col-sm-5"></div>
	</div>


	</body>
</html>