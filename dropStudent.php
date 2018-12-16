<?php include('startup.php'); //$conn...  //called dropStudent.php ?>

<?php

	if(isset($_POST['stu_id'])) {

		$stu_id = $_POST['stu_id'];
		$result = "Expelled";
		$status = "Available";
		
		$sql = "DELETE FROM student WHERE stu_id ='".$stu_id."'";
		
		$sql2 = "UPDATE college SET stu_id = NULL , status ='".$status."' WHERE stu_id='".$stu_id."'";

		if($conn -> query($sql) === true && $conn -> query($sql2) === true) {
			echo "<script>alert('Student has been dropped from college!');window.location='mainstaff.php'</script>";
		}
		else {
			echo "<script>alert('Drop process failed! Please try again.');window.location='mainstaff.php'</script>";
		}
	}
?>