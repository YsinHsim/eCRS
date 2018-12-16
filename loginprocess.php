<?php include('startup.php') //$conn...?>

<?php 
	if(isset($_POST['user']) and isset($_POST['pass'])) {
		//assigning posted value to variable
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		//remove backslashes
		//escape special characters in a string
		$user = stripslashes($REQUEST['user']);
		$pass = stripslashes($REQUEST['pass']);
		$user = mysqli_real_escape_string($conn,$user);
		$pass = mysqli_real_escape_string($conn,$pass);

		$query = "SELECT * FROM gamer WHERE username = '$user' and password = '$pass'";
		$result = mysqli_query($conn,$query) or die(mysql_error($conn));

		$row = msqli_num_rows($result);

		if($row == 1) {
			$_SESSION['user'] = $user;
			//redirect user to userpage.php
			header("Location: userpage.php");
			die();
		}
		else {
			echo "<script>alert('Username or Password is invalid!');</script>";
		}
	}
?>