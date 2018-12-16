<?php include('startup.php') ?>

<?php
	$stu_id = $_SESSION['stu_id'];

	//$sql = "SELECT * FROM student JOIN college USING (stu_id) WHERE stu_id = '$stu_id'";
	$sql = "SELECT * FROM student WHERE stu_id = '$stu_id'";
	$res = $conn -> query($sql);
	$row = $res -> fetch_assoc();

	//$sql2 is for taking table college, need it for making empty room list. :-)
	$sql2 = "SELECT * FROM college";
	$res2 = $conn -> query($sql2);
	$row2 = $res2 -> fetch_assoc();

	$sql3 = "SELECT * FROM student JOIN college using (stu_id)";
	$result3 = $conn -> query($sql3);
	$row3 = $result3 -> fetch_assoc();
?>




<html>
	<head>
		<title>
			e-QRS Student Menu
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
			#registered {
				font-weight: bolder;
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
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
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
					<h2>Hi <?php echo $row['stu_name']; ?>.</h2>
					<p>Welcome to e-CRS.</p>
				</div>
			</div>
		</div>

		<div id="status" class="container">
			<h2> Congratulation! You had been accepted. Please pick your room. </h2>
		</div>

		<div class="container">

			<div class="col-sm-6">
				<h2>Pick Room</h2>
				<?php if(!empty($row['room_num'])){ ?>
					<p id="registered">  You have already registered. Submit a report to admin for any change. </p>
					<p id="registered"> Your Room Number is :
						<?php echo $row['room_num'] ?> </p>
				<?php } else { ?>
					<?php do { ?>
						<?php if(is_null($row2['stu_id']) && strcmp($row2['status'],'Available')==0 && is_null($row['room_num'])) { ?>
							<form action="pickRoom.php" method="post">
								<div class="row">
									<h4>
										<div class="col-sm-6">
											<input id="input" class="form-control" type="text" name="room_num" 
											value="<?php echo $row2['room_num']; ?>" readonly>
										</div>
										<div class="col-sm-3">
											<input id="input" class="form-control" type="submit" value="Pick Room">
										</div>
									</h4>
								</div>
							</form>
						<?php } ?>
					<?php } while ($row2 = $res2 -> fetch_assoc()) ?>
				<?php } ?>
			</div>

			<?php mysqli_data_seek($res2,0); ?>
			<div class="col-sm-6">
				<div class="row">
				<h2>Occupied Room List </h2>
				<?php while ($row2 = $res2 -> fetch_assoc()) { ?>
					<?php if(!is_null($row2['stu_id']) && strcmp($row2['status'],"Occupied")==0) { ?>
						<div class="row">
							<div class="col-sm-6">
								<p><b>Room Number :  </b><?php echo $row2['room_num'] ?> </p>
							</div>
							<div class="col-sm-6">
								<?php
								$stuID = $row2['stu_id'];
								$sql4 = "SELECT * FROM student WHERE stu_id = '$stuID'";
								$res4 = $conn -> query($sql);
								$row4 = $res -> fetch_assoc();
								?>
								<p><b>Student's ID :  </b><?php echo $row4['stu_name']; echo $row2['stu_id']; ?> </p>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
				</div>
				<br><br><br>
				<div class="row">
					<form method="post" action="report.php">
					<h2>Submit Report</h2>
					<div class="row">
						<div class="col-sm-10">
							<textarea id="input" class="form-control" name="report" rows="3" placeholder="Submit your report here"></textarea><br>
						</div>
						<!--<div class="col-sm-6"></div>-->
					</div>

					<div class="row">
						<div class="col-sm-6"></div>	
						<div class="col-sm-4">
							<input id="input" type="submit" class="form-control" value="Submit Report!">
						</div>
					</div>
					</form>
				</div>
			</div>

		</div>


			<br>
				
			
 
	</body>
</html>

