<?php
	session_start();
	unset($_SESSION['stu_id']);
	session_destroy();
	header("Location: index.php");
?>