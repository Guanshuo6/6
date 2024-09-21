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

<html>
    <body>
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
    </body>
</html>