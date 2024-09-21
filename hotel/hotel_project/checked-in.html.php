<!-- 
    Screen:         Check In
    Purpose:        Checking In
    Student Name:   Guanshuo Feng
    Date:           April 2024
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checked In</title>
    <link rel="stylesheet" href="styles/check-in.css">
</head>

<body>

    <?php
    session_start();

    include "php/db.inc.php";
	include "php/navbar.php";

    /* error modal */
    function buildErrorModal()
    {
        echo "
            <div class='modal error-occured'>
                <p>⚠️ Error occured</p>
                <p>Something went wrong while processing your request.</p>
                <a href='./menu.html' class='btn-primary'>Return</a>
            </div>
        ";
    }

    /* success modal */
    function buildSuccessModal($id)
    {
        echo "
            <div class='modal success'>
                <p>A new booking has been added ✔️</p>
                <p>
                    Booking Id:
                    <span>$id</span>
                </p>
                <a href='./menu.html' class='btn-primary'>Return</a>
            </div>
        ";
    }

    if (isset($_POST['roomId']) && isset($_POST['guestId']) && isset($_POST['noInGroup'])) {
        $sql = "SELECT MAX(bookingId) as bookingId from Booking";

        if (!$res = mysqli_query($con, $sql)) {
            buildErrorModal();
            die();
        }

        $newId = 0;

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $newId = $row['bookingId'] + 1;
        }

        $sql = "INSERT INTO Booking (bookingId, guestId, checkIn, roomId, numberInGroup) VALUES ('$newId','$_POST[guestId]',CURRENT_DATE,'$_POST[roomId]', '$_POST[noInGroup]')";

        if (!$res = mysqli_query($con, $sql)) {
            echo ("Error description: " . mysqli_error($con));
            buildErrorModal();
            die();
        }

        $sql = "UPDATE Room SET available = 0 WHERE roomId = '$_POST[roomId]'";

        if (!$res = mysqli_query($con, $sql)) {
            buildErrorModal();
            die();
        }

        buildSuccessModal($newId);
    } else {
        buildErrorModal();
    }
    ?>

</body>

</html>l