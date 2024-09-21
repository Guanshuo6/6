<!-- 
    Screen:         Extras
    Purpose:        Managing Extras
    Student Name:   Guanshuo Feng
    Date:           April 2024
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extras</title>
    <link rel="stylesheet" href="styles/extras.css">
</head>

<body>

    <?php
    include "php/db.inc.php";
    include "php/navbar.php";

    if (!isset($_POST['staffId']) || !isset($_POST['bookingId']) || !isset($_POST['area']) || !isset($_POST['extra']) || !isset($_POST['cost'])) {
        echo "error";
    } else {
        $sql = "INSERT INTO Extras (staffId, bookingId, area, extra, cost, date) VALUES ('$_POST[staffId]', '$_POST[bookingId]', '$_POST[area]', '$_POST[extra]', '$_POST[cost]', CURRENT_DATE)";

        if (!$res = mysqli_query($con, $sql)) {
            /* error */
            die("Error in querying the database" . mysqli_error($con));
        }
    }
    ?>

    <div class='modal success'>
        <p>A new record has been added to the Extras Table ✔️</p>

        <a href='./menu.html' class='btn-primary'>Return</a>
    </div>

</body>

</html>