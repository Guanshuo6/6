<!-- 
    Screen:         Delete Staff Member
    Purpose:        Displaying a select input with all staff members, who haven't been deleted and aren't managers
    Student ID:     C00288344
    Student Name:   Filip Melka
    Date:           April 2024
 -->
<?php
include "db.inc.php";
date_default_timezone_set("UTC");

/* SQL query */
$sql = "SELECT staffId, surname, firstName, address, eircode, phoneNum, jobTitle FROM staff WHERE deleteFlag = 0 AND status != 'manager'";


if (!$result = mysqli_query($con, $sql)) {
    /* error */
    die("Error in querying the database" . mysqli_error($con));
}

/* no error - display select element */
echo "<br><select name='listbox' id='listbox' onclick='populate()'>";

while ($row = mysqli_fetch_array($result)) {
    $id = $row['staffId'];
    $fname = $row['firstName'];
    $sname = $row['surname'];
    $address = $row['address'];
    $eircode = $row['eircode'];
    $phoneNum = $row['phoneNum'];
    $jobTitle = $row['jobTitle'];
    $allText = "$id,$fname,$sname,$address,$eircode,$phone,$jobTitle";
    echo "<option value='$allText'>$fname $sname</option>";
}

echo "</select>";

/* close db connection */
mysqli_close($con);
