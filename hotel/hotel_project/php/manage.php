<!-- 
     Project        : Hotel webpage
     Page Name      : Booking, Room and Guest Manage
     Student ID 1   : C00280203 (Zihan Wang)
     Student ID 2   : C00282942 (Edward Zheng)
     Student ID 3   : C00288344 (Filip Melka)
     Student ID 4   : C00278723 (Guanshuo Feng)
     Date Create    : 20/03/2024
     Date Update    : 20/03/2024
-->

<?php
    include "db.inc.php";

    $ID = $_GET['guestId'];
    $Surname = $_GET['surname'];
    $FistName = $_GET['firstName'];
    $Address = $_GET['address'];
    $Eircode = $_GET['eircode'];
    $Email = $_GET['email'];
    $Date = $_GET['update'];

    $sql = "INSERT INTO Guest (guestId, surname, firstName, address, eircode, email, `update`)
            VALUES ('$ID', '$Surname', '$FistName', '$Address', '$Eircode', '$Email', '$Date')";

    // Execute
    mysqli_query($con, $sql);

    // Close Database
    mysqli_close($con);
    
    // Back to first page
    header("Location:../room-report.html.php");
?>