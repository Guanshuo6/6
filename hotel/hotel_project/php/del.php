<!-- 
     Project        : Hotel webpage
     Page Name      : Login page
     Student ID 1   : C00280203 (Zihan Wang)
     Student ID 2   : C00282942 (Edward Zheng)
     Student ID 3   : C00288344 (Filip Melka)
     Student ID 4   : C00278723 (Guanshuo Feng)
     Date Create    : 14/03/2024
     Date Update    : 14/03/2024
-->

<?php
    $id = $_GET["roomId"];
    include "db.inc.php";
    // Delete SQL
    $sql = "UPDATE Room SET deleteFlag = 1 WHERE roomId = $id";
    // Execute
    $con->query($sql);

    // Back to first page
    header("Location:../room-report.html.php");
?>