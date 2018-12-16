<?php include('startup.php') ?>

<?php

	// If form submitted, insert values into the database.
	if (isset($_POST['stu_id']) and isset($_POST['stu_ic']) ){ 
		//assigning posted values to variables
		$stu_id = $_POST['stu_id'];
		$stu_ic = $_POST['stu_ic'];
	
		// removes backslashes
		$stu_id = stripslashes($_REQUEST['stu_id']);
        //escapes special characters in a string
		$stu_id = mysqli_real_escape_string($conn,$stu_id);
		$stu_ic = stripslashes($_REQUEST['stu_ic']);
		$stu_ic = mysqli_real_escape_string($conn,$stu_ic);
	
		$query = "SELECT * FROM student WHERE stu_id = '$stu_id' and stu_ic = '$stu_ic'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		$rows = mysqli_num_rows($result);
	
		if($rows == 1) {
			$_SESSION['stu_id'] = $stu_id;
			session_start();
			//redirect user to mainstudent.php
			header("Location: mainstudent.php");
			die();
		}
		else {
			echo "<script>alert('We are sorry. You are not accepted for college.');</script>";
		}
	}
?>




<html>
	<head>
		<title>
			e-CRS Student Login
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
			<h2>Student Login</h2>
		</div>

		<div class="container">
		<div class="col-sm-5"></div>
		<div class="col-sm-2">	
			<form method="post" action="studentlogin.php">
				<div class="row">
					<input id="input" type="text" class="form-control" name="stu_id" placeholder="Enter Student ID" required><br>
				</div>
				<div class="row">
					<input id="input" type="password" class="form-control" name="stu_ic" placeholder="Enter IC Number" required><br>
				</div>
				<div class="container-fluid">
				<div class="row">
					<input id="submit" type="submit" class="form-control" value="Login">
				</div>
				</div>
			</form>
		</div>
		<div class="col-sm-5"></div>
		</div>

	</body>
</html>
