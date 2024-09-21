<?php 

	session_start();

	// remove all session variables
	$_SESSION = [];

	// redirect user to login page
	header("Location: https://c2p-hotel.candept.com/hotel_project/login.html");

?>