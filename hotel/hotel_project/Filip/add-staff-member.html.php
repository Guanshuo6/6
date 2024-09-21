<!-- 
    Screen:         Add Staff Member
    Purpose:        Add a new staff member
    Student ID:     C00288344
    Student Name:   Filip Melka
    Date:           April 2024
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff Member</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="./css/staff-shared.css" />
    <link rel="stylesheet" href="./css/add-staff.css">
</head>

<body>

    <?php

    session_start();

    // check that the user is logged in
    if (!isset($_SESSION['user'])) {
        $_SESSION["redirect"] = "https://c2p-hotel.candept.com/hotel_project/Filip/add-staff-member.html.php";
        header("Location: https://c2p-hotel.candept.com/hotel_project/login.html");
    }

    /* include navbar */
    include "navbar.php";

    include "db.inc.php";

    if (!isset($_SESSION["attempt"]) || $_SESSION["attempt"] == 0) {
        /* user opens this page for the first time */
        $_SESSION["attempt"] = 1;

        buildLoginForm($_SESSION["attempt"], false);
    } else if ($_SESSION["attempt"] >= 3) {
        /* user exceeded 3 attempts and will be redirected to staff maintenance menu */
        header("Location: ./staff-maintenance-menu.html.php");
        die();
    } else if (isset($_POST["username"]) && isset($_POST["password"])) {
        $_SESSION["attempt"] = $_SESSION["attempt"] + 1;

        /* SQL query */
        $sql = "SELECT status FROM Staff WHERE loginName = '$_POST[username]' AND password = '$_POST[password]'";

        /* execute query */
        $res = mysqli_query($con, $sql);

        if ($res && mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_array($res)) {
                if ($row['status'] != "manager") {
                    /* user doesn't have a status of 'manager' and will be redirected to staff maintenance menu*/
                    header("Location: ./staff-maintenance-menu.html.php");
                    die();
                } else {
                    /* user is a manager */
                    buildAddForm(false, "", "", "", "", "", "", "", "", "", "");
                }
            }
        } else {
            /* incorrect username or password */
            buildLoginForm($_SESSION["attempt"], true);
        }
    } else if (isset($_POST["surname"]) && isset($_POST["firstName"]) && isset($_POST["address"]) && isset($_POST["eircode"]) && isset($_POST["phone"]) && isset($_POST["jobTitle"]) && isset($_POST["isManager"]) && isset($_POST["username"])) {
        /* check whether the username is available */
        /* SQL query */
        $sql = "SELECT loginName FROM Staff WHERE loginName = '$_POST[username]'";

        /* execute query */
        $res = mysqli_query($con, $sql);

        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                /* username is taken */
                buildAddForm(true, $_POST["surname"], $_POST["firstName"], $_POST["address"], $_POST["eircode"], $_POST["phone"], $_POST["jobTitle"], $_POST["isManager"]);
            } else {
                /* username is available - add the new record to the 'staff' table */

                /* get current highest ID */
                /* SQL query */
                $sql = "SELECT MAX(staffId) as staffId FROM Staff";

                if (!$res = mysqli_query($con, $sql)) {
                    buildErrorModal();
                    die();
                }

                $newId = 0;

                if (mysqli_num_rows($res) > 0) {
                    $row = mysqli_fetch_assoc($res);
                    $newId = $row['staffId'] + 1;
                }


                $status = $_POST["isManager"] == "yes" ? "manager" : "staff";
                $sql = "INSERT INTO Staff (staffId, surname, firstName, Address, Eircode, phoneNum, jobTitle, status, loginName, password, lastUpdated) VALUES ('$newId','$_POST[surname]','$_POST[firstName]','$_POST[address]','$_POST[eircode]','$_POST[phone]','$_POST[jobTitle]','$status','$_POST[username]','staff',CURRENT_TIMESTAMP)";

                /* execute query */
                if ($res = mysqli_query($con, $sql)) {
                    /* get the staff member id */
                    /* SQL query */
                    $sql = "SELECT staffId FROM Staff WHERE loginName = '$_POST[username]'";

                    /* execute query */
                    $res = mysqli_query($con, $sql);

                    if ($res && mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_array($res)) {
                            buildSuccessModal($row["staffId"]);
                        }
                    } else {
                        buildErrorModal();
                    }
                } else {
                    echo ("Error description: " . mysqli_error($con));
                }
            }
        } else {
            buildErrorModal();
        }
    } else {
        buildErrorModal();
    }

    /* login form for entering manager's details */
    function buildLoginForm($attempt, $isInvalid)
    {
        $opacity = $isInvalid ? 1 : 0;
        echo "
            <form action='./add-staff-member.html.php' method='post' class='modal protected'>
                <div class='protected-title'>
                    <div>
                        <span>🔒</span>
                        <p>Enter Manager Details</p>
                    </div>
                    <span>(Atempt $attempt/3)</span>
                </div>
                <div class='inputs'>
                    <label for='username'>Username:</label>
                    <input autofocus type='text' name='username' id='username' required>
                    <label for='password'>Password:</label>
                    <input type='password' name='password' id='password' required>
                </div>
                <p class='error' style='opacity: $opacity'>Username or password is incorrect</p>
                <div class='btns'>
                    <a href='./staff-maintenance-menu.html.php'>Return</a>
                    <button class='btn-primary' type='submit'>Submit</button>
                </div>
            </form>
        ";
    }

    /* form for adding a new staff member */
    function buildAddForm($isUsernameTaken, $surname, $firstName, $address, $eircode, $phone, $jobTitle, $isManager)
    {
        $opacity = $isUsernameTaken ? 1 : 0;
        $isManagerYes = $isManager == "yes" ? "checked" : "";
        $isManagerNo = $isManager == "no" || $isManager == "" ? "checked" : "";

        echo " 
            <form action='./add-staff-member.html.php' method='post' onsubmit='return handleSubmit()' class='modal'>
                <div class='form-title'>
                    <h2>Add a New Staff Member</h2>
                </div>
                <div class='form-inputs'>
                    <div>
                        <label for='surname'>Surname:</label>
                        <input
                            type='text'
                            id='surname'
                            name='surname'
                            title='Surname'
                            maxlength='45'
                            value='$surname'
                            required
                        />
                    </div>
                    <div>
                        <label for='firstName'>First Name:</label>
                        <input
                            type='text'
                            id='firstName'
                            name='firstName'
                            title='First Name'
                            maxlength='45'
                            value='$firstName'
                            required
                        />
                    </div>
                    <div>
                        <label for='address'>Address:</label>
                        <input
                            type='text'
                            id='address'
                            name='address'
                            title='Address'
                            maxlength='60'
                            value='$address'
                            required
                        />
                    </div>
                    <div>
                        <label for='eircode'>Eircode:</label>
                        <input
                            type='text'
                            id='eircode'
                            name='eircode'
                            title='Eircode consists of one capital letter followed by two digits followed by 4 alphanumeric  (capital) characters'
                            maxlength='10'
                            pattern='[A-Z]\d{2}[A-Z0-9]{4}'
                            value='$eircode'
                            required
                        />
                    </div>
                    <div>
                        <label for='phone'>Phone Number:</label>
                        <input
                            type='text'
                            id='phone'
                            name='phone'
                            title='Phone Number consists of digits, brackets, and spaces'
                            maxlength='20'
                            pattern='[0-9 \(\)]+'
                            value='$phone'
                            required
                        />
                    </div>
                    <div>
                        <label for='jobTitle'>Job Title:</label>
                        <input
                            type='text'
                            id='jobTitle'
                            name='jobTitle'
                            title='Job Title'
                            maxlength='20'
                            value='$jobTitle'
                            required
                        />
                    </div>
                </div>
                <div class='radio'>
                    <span>Is a manager:</span>
                    <input
                        type='radio'
                        id='notManager'
                        name='isManager'
                        value='no'
                        $isManagerNo
                    />
                    <label for='notManager'>No</label>
                    <input type='radio' id='isManager' name='isManager' value='yes' $isManagerYes/>
                    <label for='isManager'>Yes</label>
                </div>
                <div class='username'>
                    <label for='username'>Username:</label>
                    <input
                        type='text'
                        id='username'
                        name='username'
                        title='Username'
                        maxlength='20'
                        required
                    />
                </div>
                <p class='error' style='opacity: $opacity'>This username is already taken</p>

                <div class='btns'>
                    <a href='./staff-maintenance-menu.html.php'>Cancel</a>
                    <button type='reset'>Clear</button>
                    <button class='btn-primary' type='submit'>Submit</button>
                </div>
            </form>

            <script src='./js/add-staff.js'></script>
        ";
    }

    /* success modal -> displayed after a new staff member has been added */
    function buildSuccessModal($id)
    {
        echo "
            <div class='modal success'>
                <p>A new staff member has been added ✔️</p>
                <p>
                    Staff Member Id:
                    <span>$id</span>
                </p>
                <a href='./staff-maintenance-menu.html.php' class='btn-primary'>Return</a>
            </div>
        ";
    }

    /* error modal */
    function buildErrorModal()
    {
        echo "
            <div class='modal error-occured'>
                <p>⚠️ Error occured</p>
                <p>Something went wrong while processing your request.</p>
                <a href='./staff-maintenance-menu.html.php' class='btn-primary'>Return</a>
            </div>
        ";
    }

    ?>
</body>

</html>