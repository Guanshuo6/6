<!-- 
    Screen:         Amend Staff Member
    Purpose:        Amend staff member's details
    Student ID:     C00288344
    Student Name:   Filip Melka
    Date:           April 2024
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend Staff Member</title>
    <link rel="stylesheet" href="./css/staff-shared.css" />
    <link rel="stylesheet" href="./css/delete-staff.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
</head>

<body>

    <?php

    session_start();

    // check that the user is logged in
    if (!isset($_SESSION['user'])) {
        $_SESSION["redirect"] = "https://c2p-hotel.candept.com/hotel_project/Filip/amend-staff-member.html.php";
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
                    buildAmendPage($con);
                }
            }
        } else {
            /* incorrect username or password */
            buildLoginForm($_SESSION["attempt"], true);
        }
    } else if (isset($_POST["staffId"]) && isset($_POST["surname"]) && isset($_POST["firstName"]) && isset($_POST["address"]) && isset($_POST["eircode"]) && isset($_POST["phone"]) && isset($_POST["jobTitle"])) {
        /* set the delete flag to 1 */
        /* SQL query */
        $sql = "UPDATE Staff SET 
            surname = '$_POST[surname]',
            firstName = '$_POST[firstName]',
            Address = '$_POST[address]',
            Eircode = '$_POST[eircode]',
            phoneNum = '$_POST[phone]',
            jobTitle = '$_POST[jobTitle]',
            lastUpdated = CURRENT_TIMESTAMP
        WHERE staffId = '$_POST[staffId]'";

        if (!mysqli_query($con, $sql)) {
            /* error occured */
            buildErrorModal();
        } else {
            /* flag updated */
            buildSuccessModal($_POST['staffId']);
        }
    } else {
        buildErrorModal();
    }

    /* login form for entering manager's details */
    function buildLoginForm($attempt, $isInvalid)
    {
        $opacity = $isInvalid ? 1 : 0;
        echo "
            <form action='./amend-staff-member.html.php' method='post' class='modal protected'>
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

    /* form for deleting a staff member */
    function buildAmendPage($con)
    {
        /* listbox */
        $listbox = "";
        /* SQL query */
        $sql = "SELECT staffId, surname, firstName, address, eircode, phoneNum, jobTitle, loginName,status, lastUpdated FROM Staff WHERE deleteFlag = 0";


        if (!$result = mysqli_query($con, $sql)) {
            /* error */
            buildErrorModal();
        } else {
            /* no error while executing the query */
            if (mysqli_num_rows($result) > 0) {
                /* more than one record */
                $listbox = $listbox . "<select name='listbox' id='listbox' onclick='populate()'>";

                while ($row = mysqli_fetch_array($result)) {
                    $staffId = $row['staffId'];
                    $fname = $row['firstName'];
                    $sname = $row['surname'];
                    $address = $row['address'];
                    $eircode = $row['eircode'];
                    $phoneNum = $row['phoneNum'];
                    $jobTitle = $row['jobTitle'];
                    $username = $row['loginName'];
                    $lastUpdated = $row['lastUpdated'];
                    $status = $row['status'];
                    $allText = "$staffId,$sname,$fname,$address,$eircode,$phoneNum,$jobTitle,$status,$username,$lastUpdated";
                    $listbox = $listbox . "<option value='$allText'>$fname $sname</option>";
                }

                $listbox = $listbox . "</select>";

                echo " 
                    <form action='./amend-staff-member.html.php' method='post' onsubmit='return handleSubmit()' class='modal'>
                        <div class='form-title'>
                            <h2>Amend / View a Staff Member</h2>
                        </div>
                        $listbox
                        <div class='form-inputs'>
                            <div>
                                <label for='staffId'>Staff ID:</label>
                                <input
                                    type='text'
                                    id='staffId'
                                    name='staffId'
                                    value='$staffId'
                                    disabled
                                />
                            </div>
                            <div>
                                <label for='surname'>Surname:</label>
                                <input
                                    type='text'
                                    id='surname'
                                    name='surname'
                                    title='Surname'
                                    maxlength='45'
                                    value='$sname'
                                    disabled
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
                                    value='$fname'
                                    disabled
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
                                    disabled
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
                                    disabled
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
                                    value='$phoneNum'
                                    disabled
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
                                    disabled
                                />
                            </div>
                            <div>
                                <label for='username'>Username:</label>
                                <input
                                    type='text'
                                    id='username'
                                    name='username'
                                    value='$username'
                                    disabled
                                />
                            </div>
                            <div>
                                <label for='lastUpdated'>Date of Last Update:</label>
                                <input
                                    type='text'
                                    id='lastUpdated'
                                    name='lastUpdated'
                                    value='$lastUpdated'
                                    disabled
                                />
                            </div>
                            <div>
                                <label for='managerStatus'>Manager Status:</label>
                                <input
                                    type='text'
                                    id='managerStatus'
                                    name='managerStatus'
                                    value='$status'
                                    disabled
                                />
                            </div>
                        </div>

                        <div class='btns'>
                            <a href='./staff-maintenance-menu.html.php'>Cancel</a>
                            <button class='btn-secondary' id='btn-amend' onclick='toggle()' type='button'>Amend</button>
                            <button class='btn-primary' id='btn-save' type='submit'>Save</button>
                        </div>
                    </form>

                    <script src='./js/amend-staff.js'></script>
                ";
            } else {
                /* no records */
                echo "
                    <div class='modal error-occured'>
                        <p>⚠️ No Records</p>
                        <p>There are no records for deletion.</p>
                        <a href='./staff-maintenance-menu.html.php' class='btn-primary'>Return</a>
                    </div>
                ";
            }
        }
    }

    /* success modal -> displayed after a new staff member has been added */
    function buildSuccessModal($id)
    {
        echo "
            <div class='modal success'>
                <p>Staff member's details have been updated ✔️</p>
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