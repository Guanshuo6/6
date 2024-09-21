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

    $opacity = isset($_GET['error']) ? 1 : 0;
    ?>

    <form action="extras-confirm.html.php" onsubmit="return confirm()" method="post" class="modal">
        <p>Select Staff:</p>
        <?php
        $sql = "SELECT staffId, surname, firstName, status FROM Staff WHERE deleteFlag = 0";

        if (!$result = mysqli_query($con, $sql)) {
            /* error */
            die("Error in querying the database" . mysqli_error($con));
        }

        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
            echo "<select onchange='populate()' id='staff-listbox'>";

            while ($row = mysqli_fetch_array($result)) {
                $staffId = $row['staffId'];
                $surname = $row['surname'];
                $firstName = $row['firstName'];
                $status = $row['status'];
                $val = $staffId . "," . $surname . "," . $firstName . "," . $status;

                echo "<option value='$val'>$firstName $surname</option>";
            }

            echo "</select>";
        }
        ?>
        <div id="staff-details" class="details">

        </div>
        <p>Room ID:</p>
        <input type="number" name="roomId" required />
        <p class="error" style="opacity: <?php echo $opacity; ?>;">This room doesn't exist or is not occupied</p>

        <div class="btns">
            <a href="menu.html">Cancel</a>
            <button type="submit" class="btn-primary">Confirm</button>
        </div>
    </form>

    <script src="JavaScript/extras.js"></script>

</body>

</html>