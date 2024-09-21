<!-- 
     Project        : Hotel webpage
     Page Name      : Update Stock
     Student ID 1   : C00280203 (Zihan Wang)
     Student ID 2   : C00282942 (Edward Zheng)
     Student ID 3   : C00288344 (Filip Melka)
     Student ID 4   : C00278723 (Guanshuo Feng)
     Date Create    : 04/03/2024
     Date Update    : 04/03/2024
-->

<?php
    // Verify for login
    include "db.inc.php";

    // Capture date from html
    $ID = $_GET['stock-id'];
    $description = $_GET['description'];
    $cost = $_GET['cost'];
    $retail = $_GET['retail'];
    $reorder = $_GET['reorder'];
    $supCode = $_GET['sup-code'];
    $qty = $_GET['quantity'];
    $date = date("Y-m-d"); // Assuming MySQL datetime format

    // SQL Insert
    $sql = "UPDATE Stock 
        SET description = '$description', 
            cost = '$cost', 
            retail = '$retail', 
            reorder = '$reorder',
            supCode = '$supCode',
            Qty = '$qty', 
            `update` = '$date' 
        WHERE stockId = $ID";
    
    // Execute
    mysqli_query($con, $sql);

    // Close Database
    mysqli_close($con);
    
    // Back to first page
    header("Location:../stock-report.html.php");
?>