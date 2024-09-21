<!-- 
     Project        : Hotel webpage
     Page Name      : Room and Guest Manage
     Student ID 1   : C00280203 (Zihan Wang)
     Student ID 2   : C00282942 (Edward Zheng)
     Student ID 3   : C00288344 (Filip Melka)
     Student ID 4   : C00278723 (Guanshuo Feng)
     Date Create    : 04/03/2024
     Date Update    : 04/03/2024
-->

<?php
    // Verify for login
    include "db.inc.php";

    // Capture date from html
    $ID = $_GET['roomId'];
    $type = $_GET['type'];
    $cost = $_GET['cost'];
    $phoneNum = $_GET['exTelNum'];
    $note = $_GET['note'];
    $date = date("Y-m-d H:i:s"); // Assuming MySQL datetime format

    // SQL Insert
    $sql = "UPDATE Room 
        SET type = '$type', 
            cost = '$cost', 
            exTelNum = '$phoneNum', 
            notes = '$note', 
            `update` = '$date' 
        WHERE roomId = $ID";
    
    // Execute
    mysqli_query($con, $sql);

    // Close Database
    mysqli_close($con);
    
    // Back to first page
    header("Location:../room-report.html.php");
?>