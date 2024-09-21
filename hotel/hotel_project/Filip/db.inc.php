<!-- 
    Purpose:	Database Connection
 -->
<?php
	$hostname = "localhost:3306";   // Name of ip address
	$username = "Hotel";   		 	// Username
	$password = "SeTu123!!";  		// Password
	$dbname = "staycation_";     	// Name for the Database

	$con = mysqli_connect($hostname, $username, $password, $dbname);
	// Connect information as above

	if(!$con)   // if not connect to
	{
		die("Failed to connect to MySQL: " . mysqli_connect_error());   // Tell user connect error
	}
?>