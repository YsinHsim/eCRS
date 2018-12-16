<?php include('startup.php'); //this file called changeRoomStatus.php ?>

<?php

	if(isset($_POST['room_num'])) {

		$room_num = $_POST['room_num'];
		$result = "Expelled";
		$originalStatus = $_POST['status'];
		$changeStatus = $_POST['changeStatus'];

		echo " change Status : ";
		echo $changeStatus;
		echo "<br>";
		echo " original status : ";
		echo $originalStatus;
		echo "<br>";
		echo " Room Number : ";
		echo $room_num;
		
		$sql = "UPDATE college SET status = '".$changeStatus."' WHERE room_num = '$room_num'";

		if($conn -> query($sql) === true ) {
			echo "<script>alert('Room status has been changed!');window.location='mainstaff.php'</script>";
		}
		else {
			echo "<script>alert('Failed to change room status! Please try again');window.location='mainstaff.php'</script>";
		}
	}
?>