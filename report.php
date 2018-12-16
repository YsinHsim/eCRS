<?php include('startup.php');

	$stu_id = $_SESSION['stu_id']; //get the stu_id from session

	$report = $_POST['report']; //get the submitted report from previous page

	$sql = "UPDATE student SET stu_report = '".$report."' WHERE stu_id = '$stu_id'"; //update report in student table

	if($conn -> query($sql)===true){
		echo "<script>alert('Your report has been submitted!');window.location='mainstudent.php';</script>";
	}
	else {
		echo "<script>alert('Failed to submit the report! Please try again.');window.location='mainstudent.php';</script>";
	}

?>