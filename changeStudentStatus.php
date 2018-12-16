<?php include('startup.php'); //this file called changeRoomStatus.php ?>

<?php

	if(isset($_POST['stuID']) && isset($_POST['StuName'])) {

		$StuID = $_POST['stuID'];
		$result = $_POST['stuResult'];
		$originalResult = "NULL";
		$changeStatus = $_POST['stuResult'];

		echo " change Status : ";
		echo $changeStatus;
		echo "<br>";
		echo " original status : ";
		echo $originalResult;
		echo "<br>";
		echo " student ID : ";
		echo $StuID;
		
		$sql = "UPDATE student SET result = '".$result."' WHERE stu_id = '$StuID'";

		if($conn -> query($sql) === true ) {
			echo "<script>alert('Student status has been changed!');window.location='mainstaff.php'</script>";
		}
		else {
			echo "<script>alert('Failed to change student status! Please try again');window.location='mainstaff.php'</script>";
		}
	}
?>