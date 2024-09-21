<!-- 
     Project        : Make a new booking
     Page Name      : Room and Guest Manage
     Student ID 1   : C00280203 (Zihan Wang)
     Student ID 2   : C00282942 (Edward Zheng)
     Student ID 3   : C00288344 (Filip Melka)
     Student ID 4   : C00278723 (Guanshuo Feng)
     Date Create    : 13/04/2024
     Date Update    : 13/04/2024
-->

<?php
    // Verify for login
    include "db.inc.php";

    // Capture date from html
    $bookingid = $_GET['booking-id'];
    $guestid = $_GET['guest-id'];
    $checkin = $_GET['check-in'];
    $checkout = $_GET['check-out'];
    $roomid = $_GET['room-id'];

    // SQL Insert
    $sql = "INSERT INTO Booking (bookingId, guestId, checkIn, checkOut, roomId)
    VALUES ('$bookingid', '$guestid', '$checkin', '$checkout', '$roomid')";
    
    // Execute
    mysqli_query($con, $sql);

    // Close Database
    mysqli_close($con);
    
    // Back to first page
    header("Location:../room-report.html.php");
?>