<!-- 
    Screen:         Delete Staff Member
    Purpose:        Delete a staff member
    Student ID:     C00288344
    Student Name:   Filip Melka
    Date:           April 2024
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Staff Member</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="./css/staff-shared.css" />
    <link rel="stylesheet" href="./css/delete-staff.css">
</head>

<body>

    <?php

    session_start();

    // check that the user is logged in
    if (!isset($_SESSION['user'])) {
        $_SESSION["redirect"] = "https://c2p-hotel.candept.com/hotel_project/Filip/delete-staff-member.html.php";
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
                    buildDeletePage($con);
                }
            }
        } else {
            /* incorrect username or password */
            buildLoginForm($_SESSION["attempt"], true);
        }
    } else if (isset($_POST["staffId"])) {
        /* set the delete flag to 1 */
        /* SQL query */
        $sql = "UPDATE Staff SET deleteFlag = 1 WHERE staffId = '$_POST[staffId]'";

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
            <form action='./delete-staff-member.html.php' method='post' class='modal protected'>
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
    function buildDeletePage($con)
    {
        /* listbox */
        $listbox = "";
        /* SQL query */
        $sql = "SELECT staffId, surname, firstName, address, eircode, phoneNum, jobTitle FROM Staff WHERE deleteFlag = 0 AND status != 'manager'";


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
                    $allText = "$staffId,$fname,$sname,$address,$eircode,$phoneNum,$jobTitle";
                    $listbox = $listbox . "<option value='$allText'>$fname $sname</option>";
                }

                $listbox = $listbox . "</select>";

                echo " 
                    <form action='./delete-staff-member.html.php' method='post' onsubmit='return handleSubmit()' class='modal'>
                        <div class='form-title'>
                            <h2>Delete a Staff Member</h2>
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
                                    value='$jobTitle'
                                    disabled
                                />
                            </div>
                        </div>

                        <div class='btns'>
                            <a href='./staff-maintenance-menu.html.php'>Cancel</a>
                            <button class='btn-primary btn-delete' type='submit'>Delete</button>
                        </div>
                    </form>

                    <script src='./js/delete-staff.js'></script>
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
                <p>A staff member has been deleted ✔️</p>
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