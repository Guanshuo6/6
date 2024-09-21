<!-- 
     Project        : Hotel webpage
     Page Name      : Edit Stock
     Student ID 1   : C00280203 (Zihan Wang)
     Student ID 2   : C00282942 (Edward Zheng)
     Student ID 3   : C00288344 (Filip Melka)
     Student ID 4   : C00278723 (Guanshuo Feng)
     Date Create    : 04/03/2024
     Date Update    : 04/03/2024
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stock Edit</title>
        <!-- Link to css -->
		<link rel="icon" type="image/x-icon" href="images/LOGO-no-bg.png">
		<link rel="stylesheet" href="styles/add.css">
    </head>
	<?php
		// Get data
		$ID = $_GET["stockId"];

		include "php/db.inc.php";

		// Query by ID
		$sql = "SELECT * FROM Stock WHERE stockId = $ID";

		$result = $con->query($sql);

		// Get Student information
		$res = $result->fetch_assoc();

	?>
    <body>
        <div class="manage">
			<form action="php/update-stock.php" method="GET" onsubmit="return confirm('Confirm update')">
                <h2>Edit Stock</h2>
                <div class="manage-text">
                    <tr>
                        <td>Stock ID:</td>
                        <td><input name="stock-id" value="<?php echo $res['stockId'];?>" type="number" placeholder="Please enter stock ID"></td>
                    </tr>
                </div>
                <div class="manage-text">
                    <tr>
                        <td>Description:</td>
                        <td><input name="description" value="<?php echo $res['description'];?>" type="text" placeholder="Stock description"></td>
                    </tr>
                </div>
                <div class="manage-text">
                    <tr>
                        <td>Cost:</td>
                        <td><input name="cost" value="<?php echo $res['cost'];?>" type="number" placeholder="Cost price"></td>
                    </tr>
                </div>
                <div class="manage-text">
                    <tr>
                        <td>Retail:</td>
                        <td><input name="retail" value="<?php echo $res['retail'];?>" type="number" placeholder="Retail costs"></td>
                    </tr>
                </div>
                <div class="manage-text">
                    <tr>
                        <td>Reorder:</td>
                        <td><input name="reorder" value="<?php echo $res['reorder'];?>" type="text" placeholder="Reorder level"></td>
                    </tr>
                </div>
                
                <div class="manage-text">
                    <tr>
                        <td>Supplier Code:</td>
                        <td><input name="sup-code" value="<?php echo $res['supCode'];?>" type="text" placeholder="Supplier's stock code"></td>
                    </tr>
                </div>
                <div class="manage-text">
                    <tr>
                        <td>Quantity:</td>
                        <td><input name="quantity" value="<?php echo $res['Qty'];?>" type="text" placeholder="Quantity in stock"></td>
                    </tr>
                </div>
                <div class="manage-text">
                    <tr>
                        <td>Update:</td>
                        <td><input name="update" value="<?php echo $res['update'];?>" type="date" placeholder="Date of last update"></td>
                    </tr>
                </div>
                <div class="manage-button">
                    <tr>
                        <td>
                            <input type="submit" value="Update" id="submit" />
                            <input type="button" onclick="window.location.href='stock-report.html.php'" value="Return" id="reset"/>
                        </td>
                    </tr>
                </div>
            </form>
        </div>
    </body>
</html>