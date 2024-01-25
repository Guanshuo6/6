<?php  
    if($_SERVER["REQUEST_METHOD"] == "POST" )
	{ 
    $day = $_POST['day'];  
    $month = $_POST['month'];  
    $year = $_POST['year'];  
    $time = mktime(0, 0, 0, $month, $day, $year);

    $dayOfWeek = date("l", $time);  
    echo "<h2>date $day/$month/$year is $dayOfWeek</h2>";  
	}
?>