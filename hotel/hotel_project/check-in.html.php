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
    <title>Check In</title>
    <link rel="stylesheet" href="styles/check-in.css">
</head>

<body>

    <?php
    session_start();

    /* include navbar */
    include "php/navbar.php";

    include "php/db.inc.php";

    ?>

    <form action="./checked-in.html.php" onsubmit="return confirm('Are the details correct?')" method="post" class="modal">
        <h2>Check In</h2>

        <p>Select Room:</p>
        <?php
        /* SQL query */
        $sql = "SELECT roomId, type FROM Room WHERE available=1";

        if (!$result = mysqli_query($con, $sql)) {
            /* error */
            die("Error in querying the database" . mysqli_error($con));
        }

        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
            /* there are rooms available */
            echo "<select name='roomId'>";

            while ($row = mysqli_fetch_array($result)) {
                $roomId = $row['roomId'];
                $type = $row['type'];

                echo "<option value='$roomId'>$type ($roomId)</option>";
            }

            echo "</select>";
        } else {
            /* no rooms available */
            header("Location: ./menu.html");
        }
        ?>

        <p>Select Guest:</p>
        <?php
        /* SQL query */
        $sql = "SELECT guestId, surname, firstName FROM Guest";

        if (!$result = mysqli_query($con, $sql)) {
            /* error */
            die("Error in querying the database" . mysqli_error($con));
        }

        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
            /* there are guests */
            echo "<select name='guestId'>";

            while ($row = mysqli_fetch_array($result)) {
                $guestId = $row['guestId'];
                $surname = $row['surname'];
                $firstName = $row['firstName'];

                echo "<option value='$guestId'>$firstName $surname</option>";
            }

            echo "</select>";
        } else {
            /* no guest */
            header("Location: ./menu.html");
        }
        ?>
        <a href="manage.html" class="btn-secondary link" class="info">Or add a new guest</a>
        <label for="noInGroup">Number in Group</label>
        <input type="number" name="noInGroup" id="noInGroup" min="1" max="10" value="1" required="required">

        <div class="btns">
            <a href="./menu.html">Cancel</a>
            <button type="submit" class="btn-primary">Check In</button>
        </div>
    </form>

</body>

</html>