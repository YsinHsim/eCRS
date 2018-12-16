<?php include('startup.php'); //$conn... ?>

<?php
	if(isset($_POST['sta_id'])) {
		$id = $_POST['sta_id'];
		$sta_name = $_POST['sta_name'];
		$sta_gender = $_POST['sta_gender'];
		$sta_pass = $_POST['sta_pass'];
		
		//check for duplicate id!
		$sqlid = "SELECT * FROM staff WHERE sta_id = '$id'";
		$queryid = $conn -> query($sqlid);
		$numid = $queryid -> num_rows;
		
		if($numid == 0) {
			$sql = "INSERT INTO staff (sta_id,sta_name,sta_gender,pass) VALUES
			('$id','$sta_name','$sta_gender','$sta_pass')";
			
			if($conn->query($sql)==true) {
				//session_start();
				//spawn an alert box and direct user to mainstaff.php
				echo"<script>alert('Registration Complete!');window.location='mainstaff.php'</script>";
			}
			else {
				echo"<script>alert('Do it Again!');</script>";
			}
		}
		else {
			echo"<script>alert('This staff has already been registered!');</script>";
		}
	}
?>