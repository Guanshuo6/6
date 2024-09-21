<!-- 
    Screen:         Guest Stay Report
    Purpose:        Viewing guest stay details
    Student ID:     C00288344
    Student Name:   Filip Melka
    Date:           April 2024
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guest Stays Report</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="./css/staff-shared.css" />
    <link rel="stylesheet" href="./css/guest-report.css" />
</head>

<?php
session_start();
include './db.inc.php';

// check that the user is logged in
if (!isset($_SESSION['user'])) {
    $_SESSION["redirect"] = "https://c2p-hotel.candept.com/hotel_project/Filip/guest-report.html.php";
    header("Location: https://c2p-hotel.candept.com/hotel_project/login.html");
}

// SQL query
$sql = "SELECT Booking.checkIn, Booking.checkOut, Room.cost, Guest.surname, Guest.firstName, Guest.address AS county FROM Booking INNER JOIN Guest ON Guest.guestId = Booking.guestId INNER JOIN Room ON Room.roomId = Booking.roomId";

// execute SQL query
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // Get results from database
    while ($row = mysqli_fetch_assoc($result)) {
        // Store in array
        $data[] = $row;
    }
}

// close db connection
mysqli_close($con);

// store data as JSON
$data_json = json_encode($data);

// store the JSON as a string in a JavaScript variable 'data'
echo "<script>let data = JSON.stringify($data_json);</script>";
?>

<body>
    <?php
    include "navbar.php"
    ?>

    <main>
        <div class="report">
            <div class="header">
                <h1>Guest Stays Report</h1>
                <span id="print-info">Sorted by Date</span>
                <div>
                    <!-- Sort buttons -->
                    <div class="sort-btns">
                        <span>Sort by</span>
                        <button id="sort-date-btn" onclick="displayData(this)" disabled>
                            Date
                        </button>
                        <button id="sort-guest-btn" onclick="displayData(this)">
                            Guests
                        </button>
                        <button id="sort-cost-btn" onclick="displayData(this)">
                            Total Cost
                        </button>
                    </div>
                    <button class="print-btn" onclick="window.print()">Print</button>
                </div>
            </div>
            <!-- Table -->
            <div class="table">
                <div class="table-header row">
                    <span>Check-in Date</span>
                    <span>Check-out Date</span>
                    <span>Guest Name</span>
                    <span>County</span>
                    <span>Total Cost</span>
                </div>
                <div id="table-content"></div>
            </div>
            <a href="./reports-menu.html.php" class="btn-primary" style="margin-top: 30px; margin-left: auto; display: block; width: fit-content;">Return</a>
        </div>
    </main>
</body>

<script src="./js/guest-report.js"></script>

</html>