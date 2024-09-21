<!-- 
     Project        : Hotel webpage
     Page Name      : Login page
     Student ID 1   : C00280203 (Zihan Wang)
     Student ID 2   : C00282942 (Edward Zheng)
     Student ID 3   : C00288344 (Filip Melka)
     Student ID 4   : C00278723 (Guanshuo Feng)
     Date Create    : 10/02/2024
     Date Update    : 10/02/2024
-->

<?php
	// Start the session
	session_start();
    // Capture username and password from html by user entered
    include 'db.inc.php';

    // Get username and password from database
    $sql = "SELECT loginName, password FROM Staff WHERE loginName = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'";
    $result = mysqli_query($con, $sql);

    if($result === false)
    {
        die('Error in the query: ' . mysqli_error($con));
    }

    else
    {
        // Check if any rows were returned
        if(mysqli_num_rows($result) > 0) 
        {
            // User authentication successful
			
			$_SESSION["user"] = "user";
			
			if(isset($_SESSION["redirect"])) {
				$url = $_SESSION["redirect"];
				unset($_SESSION["redirect"]);
				header("Location: $url");
			} else {
				header("Location: https://c2p-hotel.candept.com/hotel_project/menu.html");
			}		
			   
			// header("Location: https://c2p-hotel.candept.com/hotel_project/menu.html");
		
        } 
        else 
        {
            // No matching user found in the database
            
			header("Location: https://c2p-hotel.candept.com/hotel_project/login.html?failed");
        }
    }
?>