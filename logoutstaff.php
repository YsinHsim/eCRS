<?php
	session_start();
	unset($_SESSION['sta_id']);
	header("Location: index.php");
?>