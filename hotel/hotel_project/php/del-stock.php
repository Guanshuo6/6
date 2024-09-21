<!-- 
     Project        : Hotel webpage
     Page Name      : Delete stock
     Student ID 1   : C00280203 (Zihan Wang)
     Student ID 2   : C00282942 (Edward Zheng)
     Student ID 3   : C00288344 (Filip Melka)
     Student ID 4   : C00278723 (Guanshuo Feng)
     Date Create    : 15/04/2024
     Date Update    : 15/04/2024
-->

<?php
    $id = $_GET["stockid"];
    include "db.inc.php";
    // Delete SQL
    $sql = "UPDATE Stock SET deleteFlag = 1 WHERE stockId = $id ";
    // Execute
    $con->query($sql);

    // Back to first page
    header("Location:../stock-report.html.php");
?>