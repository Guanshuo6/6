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

    if (!isset($_POST['staffId']) || !isset($_POST['roomId'])) {
        echo "error";
    } else {
        $sql = "SELECT available FROM Room WHERE roomId = '$_POST[roomId]'";
        $bookingId = 1;

        if (!$res = mysqli_query($con, $sql)) {
            /* error */
            die("Error in querying the database" . mysqli_error($con));
        }

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $isAvailable = $row['available'];
            if ($isAvailable == 1) {
                header("location: ./extras.html.php?error");
            }
        } else {
            header("location: ./extras.html.php?error");
        }
    }
    ?>

    <form action="extras-processed.html.php" method="post" onsubmit="return handleSubmit()" class="modal">
        <p>Select Area:</p>
        <select name="area" id="area-select" onchange="populateExtraSelect()">
        </select>

        <p>Select Extra:</p>
        <select name="extra" id="extra-select">
        </select>

        <p>Enter Cost:</p>
        <input type="number" name="cost" min="1" required>

        <p>Staff ID:</p>
        <input type="text" disabled value="<?php echo $_POST['staffId'] ?>" name="staffId">

        <p>Booking ID:</p>
        <input type="text" disabled value="<?php echo $bookingId ?>" name="bookingId">

        <div class="btns">
            <a href="./menu.html">Cancel</a>
            <button type="submit" class="btn-primary">Confirm</button>
        </div>
    </form>

    <script src="JavaScript/extras-confirm.js"></script>

</body>

</html>