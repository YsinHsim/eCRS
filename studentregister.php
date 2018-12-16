<?php include('startup.php'); //$conn... ?>

<?php
	if(isset($_POST['stu_id'])) {
		$id = $_POST['stu_id'];
		$stu_name = $_POST['stu_name'];
		$stu_gender = $_POST['stu_gender'];
		$program = $_POST['program'];
		$semester = $_POST['semester'];
		$detail = $_POST['detail'];
		$stu_pass = $_POST['stu_pass'];
		
		//check for duplicate id!
		$sqlid = "SELECT * FROM student WHERE stu_id = '$id'";
		$queryid = $conn -> query($sqlid);
		$numid = $queryid -> num_rows;
		
		if($numid == 0) {
			$sql = "INSERT INTO student (stu_id,stu_name,stu_gender,program,semester,detail,stu_pass) VALUES
			('$id','$stu_name','$stu_gender','$program','$semester','$detail','$stu_pass')";
			
			if($conn->query($sql)==true) {
				$_SESSION['stu_id'] = $id;
				//session_start();
				//spawn an alert box and direct user to mainstudent.php
				echo"<script>alert('Registration Complete!');window.location='mainstudent.php'</script>";
			}
			else {
				echo"<script>alert('Do it Again!');</script>";
			}
		}
		else {
			echo"<script>alert('This student has already been registered!');</script>";
		}
	}
?>


<html lang="en">
	<head>
		<title>
			e-CRS Registration
		</title>

		<meta name="viewport" content="width=device-width, initial-size=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<style>
			#form {
				margin-left: 540px;
			}
			#submit {
				margin-left: 98px;
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
						<li><a href="studentregister.php"><span class="glyphicon glyphicon-briefcase"></span> Register Student</a></li>
						<li><a href="studentlogin.php"><span class="glyphicon glyphicon-log-in"></span> Student Login</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div id="title" class="container">
			<h2>Register Student</h2>
		</div>

		<div id="form" class="container">
			<form method="post" action="studentregister.php">
				<div class="row"><div class="col-sm-3">
					<input id="input" type="text" class="form-control" name="stu_id" placeholder="Enter Student ID" required><br>
				</div></div>
				<div class="row"><div class="col-sm-3">
					<input id="input" type="password" class="form-control" name="stu_pass" placeholder="Enter Student Password" required><br>
				</div></div>
				<div class="row"><div class="col-sm-3">
					<input id="input" type="text" class="form-control" name="stu_name" placeholder="Enter Student Name" required><br>
				</div></div>
				<div class="row"><div class="col-sm-3">
					<input id="input" type="radio" class="form-check-input" name="stu_gender" value="Male" required>
					Male<br>
					<input id="input" type="radio" class="form-check-input" name="stu_gender" value="Female" required>
					Female<br><br>
				</div></div>
				<div class="row"><div class="col-sm-3">
					Program<br>
					<select id="input" type="text" class="form-control" name="program" required>Program Code:<br>
						<option value="CS110">CS110</option>
						<option value="AM220">AM220</option>
						<option value="AS330">AS330</option>
						<option value="OM440">OM440</option>
					</select><br>
				</div></div>
				<div class="row"><div class="col-sm-3">
					Semester<br>
					<select id="input" type="text" class="form-control" name="semester" required>Semester:<br>
						<option value="1" selected="selected">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="7">8</option>
					</select><br>
				</div></div>
				<div class="row"><div class="col-sm-3">
					<textarea id="input" class="form-control" name="detail" rows="3" placeholder="Student Detail( not necessary)"></textarea><br>
				</div></div>
				<div class="row"><div class="col-sm-2">
					<input id="submit" type="submit" class="form-control" value="Register">
				</div></div>
			</form>
		</div>
	
	</body>
</html>