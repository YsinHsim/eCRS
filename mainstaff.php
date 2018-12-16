<?php include('startup.php') ?>

<?php
	
	$sta_id = $_SESSION['sta_id'];
	
	//$sql = "SELECT * FROM student JOIN college USING (stu_id) WHERE stu_id = '$stu_id'";
	$sql = "SELECT * FROM staff WHERE sta_id = '$sta_id'";
	$res = $conn -> query($sql);
	$row = $res -> fetch_assoc();

	//$sql2 is for taking table college, need it for making empty room list. :-)
	$sql2 = "SELECT * FROM college";
	$res2 = $conn -> query($sql2);
	$row2 = $res2 -> fetch_assoc();

	//$sql3 is for taking table student, need it for change the student result and drop them
	$sql3 = "SELECT * FROM student";
	$res3 = $conn -> query($sql3);
	$row3 = $res3 -> fetch_assoc();
?>




<html>
	<head>
		<title>
			e-QRS Staff Menu
		</title>

		<meta name="viewport" content="width=device-width, initial-size=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			#jumbotronContainer {
				margin-left: 40px;
				background-color: #a7c2d6;
			}
			#jumbotron {
				background-color: #a7c2d6;
			}
			#status {
				margin-top: 50px;
				margin-bottom: 50px;
			}
			#rejected {
				color: tomato;
				font-weight: bolder;
			}
			body {
				background-color: #b5d6ee;
			}
			#nav {
				background-color: #e3f2fd;
			}
			#input {
				background-color: #cfebff;
				color: black;
			}
			#dropButton {
				background-color: tomato;
				color: white;
			}
			#dropStudent {
				background: transparent;
			}
			#view {
				border: none;
				background: transparent;
				color: black;
			}
			#report {
				padding-bottom: 16px;
			}
			#logo {
				height: 120px;
				width: 120px;
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
						<li><a href="logoutstaff.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div id="jumbotron" class="jumbotron">
			<div class="container" id="jumbotronContainer">
				<div class="col-sm-2">
					<a href="#"><img id ="logo" src="UiTM logo.png"></a>
				</div>
				<div class="col-sm-10">
					<h2>Hi <?php echo $row['sta_name']; ?>.</h2>
					<p>Welcome to e-CRS.</p>
				</div>
			</div>
		</div>

		<div class="row"><div id="status" class="container">
			<div class="col-sm-6"><form action="registerstaff.php" method="post">
				<h2> Staff Register</h2><br>
				<div class="row">
					<div class="col-sm-6">
						<input type="text" name="sta_id" class="form-control" id="input" placeholder="Enter Staff ID" required><br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<input type="text" name="sta_name" class="form-control" id="input" placeholder="Enter Staff Name" required><br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<input type="radio" name="sta_gender" class="form-check-input" id="input" value="Male" required>  Male<br>
						<input type="radio" name="sta_gender" class="form-check-input" id="input" value="Female" required>  Female<br><br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<input type="password" name="sta_pass" class="form-control" id="input" placeholder="Enter Staff Password" required><br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<input type="submit" value="Register" class="form-control" id="input">
					</div>
				</div>
			</form></div>

			<div class="col-sm-6">
				<form action="mainstaff.php" method="post">
					<h2> Drop Student</h2><br>
					<div class="row">
						<div class="col-sm-6">
							<input class="form-control" type="text" name="searchStuId" id="input" placeholder="Enter Student ID" required>
						</div>
						<div class="col-sm-3">
							<input id="input" class="form-control" type="submit" value="Search">
						</div>
					</div>
				</form>

				<div class="row">
					<?php if(!empty($_POST['searchStuId'])) { ?>
						<form action="dropStudent.php" method="post">
							<div class="col-sm-5">
								<?php $stu_id = $_POST['searchStuId']; ?>
								<h4><input id="input" class="form-control" type="text" name="stu_id" value="<?php echo $stu_id; ?>" readonly></h4>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-2">
								<h4><input id="dropButton" class="form-control" type="submit" value="Drop"></h4>
							</div>
						</form>
					<?php } ?>
				</div>
			</div>
		</div></div>

		<div id="roomStatusMenu" class="container">

			<div class="col-sm-10">
				<h2>  Room Status</h2><br>
				<div class="row">
					<div class="col-sm-3">
						<h4>  Room Number </h4>
					</div>
					<div class="col-sm-3">
						<h4>  Status </h4>
					</div>
					<div class="col-sm-3">
						<h4>  Option </h4>
					</div>
				</div><br>

				<?php do { ?>
				<form method="post" action="changeRoomStatus.php">

					<?php if(!strcmp($row2['status'],'Occupied')==0) { ?>
					
					<div class="row">
						<div class="col-sm-2">
							<input type="text" class="form-control" id="view" name="room_num" value="<?php echo $row2['room_num']; ?>" readonly>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="view" name="status" value="<?php echo $row2['status']; ?>" readonly>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-3">
							<select name="changeStatus" class="form-control" id="input" required>
								<option value="Available">Available</option>
								<option value="Not Available">Not Available</option>
								<option value="Reserved">Reserved</option>
							</select>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-2">
							<input type="submit" id="input" class="form-control" value="Change">
						</div>
					</div><br>

					<?php } ?>
					
				</form>
				<?php } while($row2 = $res2 ->fetch_assoc()); ?>
			</div>
		</div><br>
		
		<div class="container">
			<div class="row">
				<h2>   Student Report </h2>
			</div><br>
			<?php do { ?>
				<?php if(!empty($row3['stu_report'])) { ?>
				<div class="col-sm-4" id="report">
					<h4> Student's Name: 
					<?php echo $row3['stu_name']; ?> </h4>
					<h4> Student's ID:
					<?php echo $row3['stu_id']; ?> </h4>
					<h4> Room Number: </h4>
					<p> <?php echo $row3['room_num']; ?> </p>
					<h4> Student Report: </h4>
					<p> <?php echo $row3['stu_report']; ?> </p>
				</div>
				<?php } ?>
			<?php } while($row3 = $res3 -> fetch_assoc()); ?>
		</div>

		<!--<?php// mysqli_data_seek($res3,0); ?> 
		<div id="roomStatusMenu" class="container">

			<div class="col-sm-10">
				<h2>  Student Result Menu</h2><br>
				<div class="row">
					<div class="col-sm-3">
						<h4>  Student ID </h4>
					</div>
					<div class="col-sm-3">
						<h4>  Student Name </h4>
					</div>
					<div class="col-sm-3">
						<h4>  Status </h4>
					</div>
				</div><br>

				<?php// while($row3 = $res3 -> fetch_assoc()) { ?>
						<?php// if(is_null($row3['result'])) { ?>

					<form method="post" action="changeStudentStatus.php">
	
						<div class="row">
							<div class="col-sm-2">
								<input type="text" class="form-control" id="view" name="stuID" value="<?php// echo $row3['stu_id']; ?>" readonly>
							</div>

							<div class="col-sm-1"></div>
							
							<div class="col-sm-2">
								<input type="text" class="form-control" id="view" name="StuName" value="<?php// echo $row3['stu_name']; ?>" readonly>
							</div>

							<div class="col-sm-1"></div>
							
							<div class="col-sm-3">
								<select name="stuResult" class="form-control" id="input" required>
									<option value="Accepted">Accepted</option>
									<option value="Rejected">Rejected</option>
								</select>
							
							</div>
							<div class="col-sm-1"></div>
							
							<div class="col-sm-2">
								<input type="submit" id="input" class="form-control" value="Submit">
							</div>
						</div><br>
				
					</form>

					<?php// } ?>
				<?php// } ?>
			</div>
		</div><br>-->

	</body>
</html>

