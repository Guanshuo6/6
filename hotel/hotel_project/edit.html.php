<!-- 
     Project        : Hotel webpage
     Page Name      : Room Information Edit
     Student ID 1   : C00280203 (Zihan Wang)
     Student ID 2   : C00282942 (Edward Zheng)
     Student ID 3   : C00288344 (Filip Melka)
     Student ID 4   : C00278723 (Guanshuo Feng)
     Date Create    : 14/03/2024
     Date Update    : 14/03/2024
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit</title>
        <!-- Link to css -->
		<link rel="icon" type="image/x-icon" href="images/LOGO-no-bg.png">
		<link rel="stylesheet" href="styles/add.css">
    </head>
    <body>
		<?php
    // Get data
    $ID = $_GET["roomId"];
    
    include "php/db.inc.php";

    // Query by ID
    $sql = "SELECT * FROM Room WHERE roomId = $ID";

    $result = $con->query($sql);

    // Get Student information
    $res = $result->fetch_assoc();
?>
        <div class="edit">
            <form action="php/update.php" method="GET" onsubmit="return confirm('Confirm update')">
                <h2>Edit Room</h2>
                <div class="edit-text">
                    <tr>
                        <td>Room ID:</td>
                        <td><input name="roomId" value="<?php echo $res['roomId'];?>" type="number" placeholder="Please enter Room ID"></td>
                    </tr>
                </div>
                <div class="edit-text">
					<tr>
						<td>Room Type:</td>
						<td>
							<select name="type">
								<option value="Twin">Twin Room</option>
								<option value="Single">Single Room</option>
								<option value="Superior">Superior Room</option>
								<option value="Suite">Suite Room</option>
							</select>
						</td>
					</tr>
				</div>
                <div class="edit-text">
                    <tr>
                        <td>Cost:</td>
                        <td><input name="cost" value="<?php echo $res['cost'];?>" type="number" placeholder="Costs per Night"></td>
                    </tr>
                </div>
                <div class="edit-text">
                    <tr>
                        <td>Phone Num:</td>
                        <td><input name="exTelNum" value="<?php echo $res['exTelNum'];?>" type="text" placeholder="Telephone Extension Number"></td>
                    </tr>
                </div>
                <div class="edit-text">
                    <tr>
                        <td>Note:</td>
                        <td><input name="note" value="<?php echo $res['notes'];?>" type="text" placeholder="Special Notes for Room"></td>
                    </tr>
                </div>
                <div class="edit-text">
                    <tr>
                        <td>Date:</td>
                        <td><input name="update" value="<?php echo $res['update'];?>" type="date" placeholder="Date of last update"></td>
                    </tr>
                </div>
                <div class="edit-button">
                    <tr>
                        <td>
                            <input type="submit" value="Update" id="submit" />
                            <input type="button" onclick="window.location.href='room-report.html.php'" value="Return" id="reset"/>
                        </td>
                    </tr>
                </div>
            </form>
        </div>
    </body>
</html>