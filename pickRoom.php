<?php include('startup.php'); //$conn... //this file called pickRoom.php ?>

<?php 
	if(isset($_POST['room_num'])) {
		$roomNum = $_POST['room_num'];
		$stu_id = $_SESSION['stu_id'];
		$roomStatus = "Occupied";

		$sql = "UPDATE college SET stu_id ='".$stu_id."', status ='".$roomStatus."' WHERE room_num = '$roomNum'";

		$sql2 = "UPDATE student SET room_num ='".$roomNum."' WHERE stu_id = '$stu_id'";

		if($conn -> query($sql) === true && $conn -> query($sql2) === true){
			echo "<script>alert('Registration Complete!');window.location='mainstudent.php'</script>";
		}
		else {
			echo "<script>alert('Registration Failed! Please try again.');window.location='mainstudent.php'</script>";
		}
	}
?>