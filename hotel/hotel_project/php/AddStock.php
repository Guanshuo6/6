<?php
    include 'db.inc.php'; 
    
	$description = $_POST['Description'];
    $cost = $_POST['CostPrice'];
    $retail = $_POST['RetailPrice'];
    $supplierID = $_POST['SupplierID'];

    $quantity = $_POST['Quantity'];
    $reorderLevel = $_POST['ReorderLevel'];
    $supplierStockCode = $_POST['SupplierStockCode'];
    $date = $_POST['Date'];

    $sql = "INSERT INTO Stock (description, cost, retail, supplier, reorder, supCode, Qty, `update`) VALUES ('$description', $cost, $retail, $supplierID, '$reorderLevel', '$supplierStockCode', '$quantity', '$date')";

	if (!mysqli_query ($con, $sql))
    {
        die ("An Error in the SQL Query: " . mysqli_error($con) );
    }
    
    mysqli_close($con);

	header("Location: https://c2p-hotel.candept.com/hotel_project/stock-report.html.php#?success=true");
	exit();
?>