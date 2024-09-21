<!-- 
     Project        : Hotel webpage
     Page Name      : Login page
     Student ID 1   : C00280203 (Zihan Wang)
     Student ID 2   : C00282942 (Edward Zheng)
     Student ID 3   : C00288344 (Filip Melka)
     Student ID 4   : C00278723 (Guanshuo Feng)
     Date Create    : 12/02/2024
     Date Update    : --/02/2024
-->
<!--
    color thyem RGB 12,34,56
-->
<!DOCTYPE html>
<html lang="en">

    <head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Stock Maintenance</title>
		<!-- Link to css -->
        <link rel="icon" type="image/x-icon" href="images/LOGO-no-bg.png">
        <link rel="stylesheet" href="styles/stock.css" />
		
        <script src="JavaScript/stock.js" defer></script>
		<script>
			const urlParams = new URLSearchParams(window.location.search);
			const successParam = urlParams.get('success');

			// If success is true, show a popup message
			if (successParam === 'true') {
				alert('Form submitted successfully!');
			}
		</script>
	</head>
	<?php
		session_start();
		// Capture username and password from html by user entered
		include 'php/db.inc.php';

		if(!isset($_SESSION['user']))
		{
			header("Location: https://c2p-hotel.candept.com/hotel_project/login.html");
		}
	?>
    <body>
        <!------------ SIDEBAR ------------------------------------------------------>
        <div class="sidebar">
            <div class="logo-details">
                <img class="logo" src="images/LOGO-no-bg.png" alt="Logo">
                <span class="logo_name">Stock Maintenance</span>
            </div>
            <ul class="nav-links">

                <!------------ ADD STOCK ------------------------------------------------------>
                <div class="icon-link"  onclick="showContent('AddStock')">
                    <p>
                        <a href="#">
                            <img class="icon" src="images/addition.png" alt="Grid Icon">
                            <span class="link_name">Add Stock</span>
                        </a>
                    </p>
                    
                </div>

                <!------------ DELETE STOCK ------------------------------------------------------>
                <div class="icon-link" onclick="showContent('DeleStock')">
                    <p>
                        <a href="#">
                            <img class="icon" src="images/remove.png" alt="Grid Icon">
                            <span class="Delete_Stock">Delete Stock</span>
                        </a>
                    </p>
                </div>
        
                <!------------ VIEW STOCK ------------------------------------------------------>
                <div class="icon-link" onclick="showContent('ViewStock')">
                    <p>
                        <a href="#">
                            <img class="icon" src="images/file.png" alt="Grid Icon">
                            <span class="link_name">View Stock</span>
                        </a>    
                    </p>
                </div>

                <!------------ STOCK REPORT ------------------------------------------------------>
                <div class="icon-link">
                    <p>
                        <a onclick="return confirm('To Manage Page')" href="https://c2p-hotel.candept.com/hotel_project/Filip/staff-maintenance-menu.html.php">
                            <img class="icon" src="images/manager.png" alt="Manager Icon">
                            <span class="link_name">Manage</span>
                        </a>
                    </p>
                </div>

                <!------------ TO OTHER PAGES ------------------------------------------------------>
                <div class="icon-link" onclick="toggleSubMenu('category')">
                    <p>
                        <a href="#">
                            <img class="icon" src="images/pages.png" alt="Grid Icon">
                            <span class="link_name">To other</span>
							<img class="icon-down" src="images/down.png" title="Room Types" alt="Down Icon">
                        </a>
                    </p>
                </div>
                <div class="sub-link" id="category" style="display:none;">
                    <ul class="sub-menu">
						<!-- Other pages -->
						<p><a onclick="redirectToPage('menu')">Main Menu</a></p>
                        <p><a onclick="redirectToPage('Filip/guest-report')">Guest Stay</a></p>
                        <p><a onclick="redirectToPage('order-report')">Order Lists</a></p>
                        <p><a onclick="redirectToPage('room-report')">Room manage</a></p>
                    </ul>
                </div>
            </ul>
        </div>

<!--______________________ ********MAIN CONTENT FUNCTION******* ____________________________________________________________________________________________________-->

        <div id="content" class="content">
            <!--___________________________ ADD STOCK ____________________________________________________________________________________________________-->
            <div id="AddStock" class="hidden">
                <form class="formbox" action="php/AddStock.php" method="POST">
                    <h2>Add Stock</h2>
                    <div class="inputbox">
                        <label class="Add_box_lasbel" for="Description">Description:</label>
                        <textarea class="InBut" type="text" name="Description" id="Description"></textarea>
                    </div><!-- <br><br><br> -->
                    <div class="inputbox">
                        <label class="Add_box_lasbel" for="CostPrice">Cost Price:</label>
                        <input class="InBut" type="number" name="CostPrice" id="CostPrice" required/>
                    </div><!-- <br><br> -->
                    <div class="inputbox">
                        <label class="Add_box_lasbel" for="RetailPrice">Retail Price:</label>
                        <input class="InBut" type="number" name="RetailPrice" id="RetailPrice" required/>
                    </div><!-- <br><br> -->
                    <div class="dropdown">
                        <label class="Add_box_lasbel" for="SupplierID">Supplier:</label>
                        <select class="InBut" name="SupplierID" required>
                        <option value="0"></option>
                        <option value="1">Fairy Dishwashe</option>
                        <option value="2">Guinness</option>
                        <option value="3">McDonalds</option>
                        <option value="4">NASA</option>
                        </select>
                    </div><!-- <br><br> -->
                    <div class="inputbox">
                        <label class="Add_box_lasbel" for="Quantity">Quantity to be added:</label>
                        <input class="InBut" type="number" name="Quantity" id="Quantity" required/>
                    </div><!-- <br><br> -->
                    <div class="inputbox">
                        <label class="Add_box_lasbel" for="ReorderLevel">Reorder Level:</label>
                        <input class="InBut" type="text" name="ReorderLevel" id="ReorderLevel" required/>
                    </div><!-- <br><br> -->
                    <div class="inputbox">
                        <label class="Add_box_lasbel" for="SupplierStockCode">Supplier's Stock Code:</label>
                        <input class="InBut" type="text" name="SupplierStockCode" id="SupplierStockCode" required/>
                    </div><!-- <br><br> -->
                    <div class="inputbox">
                        <label class="Add_box_lasbel" for="Date">Date of Update:</label>
                        <input class="InBut" type="date" name="Date" id="Date" required/>
                    </div><!-- <br><br><br><br> -->
                    <div class="myButton">
                        <input class="But" type="submit" value="Send Form" name="submit" onclick="return confirm('Confirm Add')"/>
                        <input class="But" type="reset" value="Clear Form" name="reset"/>
                    </div>
                    <br>
                </form>
            </div>
            
<!--___________________________ DELETE STOCK ____________________________________________________________________________________________________-->
            <div id="DeleStock" class="hidden">
                <form class="formbox" action="delete_stock.php" method="post">
					<h2>Delete Stock</h2>
				</form>

				<?php
					include 'php/db.inc.php';

					$order = isset($_POST['order']) ? $_POST['order'] : 'stockid';
					$direction = isset($_POST['direction']) ? $_POST['direction'] : 'ASC';

					// Fetch stock items based on user's selection
					$sql = "SELECT stockid, description, Qty, supplier FROM Stock WHERE deleteFlag = 0 ORDER BY $order $direction";
					$result = mysqli_query($con, $sql);

					echo '<table>';
					echo '<tr>
					<th>Stock ID</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Supplier ID</th>
					<th>Action</th>
					</tr>';

				
					while ($row = mysqli_fetch_assoc($result)) {
					?>	
					
					<tr>
						<td><?php echo $row["stockid"]?></td>
						<td><?php echo $row["description"]?></td>
						<td><?php echo $row["Qty"]?></td>
						<td><?php echo $row["supplier"]?></td>
						<td><a href="php/del-stock.php?stockid=<?php echo $row['stockid'];?>" onclick="return confirm('Confirm Delete')"style="margin-right:5px; color: red;"> Delete </a></td>
					</tr>
				<?php
					}
					
					echo '</table>';

					mysqli_close($con);
				?>
            </div>
            
<!--___________________________ VIEW STOCK ____________________________________________________________________________________________________-->
            <div id="ViewStock" class="hidden">
				<form class="formbox" action="delete_stock.php" method="post">
					<h2>View</h2>
				</form>
				<?php
					include 'php/db.inc.php';

					// Fetch stock items based on user's selection
					$sql = "SELECT * FROM Stock WHERE deleteFlag = 0";
					$result = mysqli_query($con, $sql);

					echo '<table>';
					echo '<tr>
						<th>Stock ID</th>						
						<th>Description</th>
						<th>Cost</th>
						<th>Retail</th>
						<th>Supplier ID</th>
						<th>Recorder</th>
						<th>Stock Code</th>						
						<th>Quatity</th>
						<th>Update</th>
						<th>Operate</th>
					</tr>';

					while ($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo $row["stockId"]?></td>
						<td><?php echo $row["description"]?></td>
						<td><?php echo $row["cost"]?></td>
						<td><?php echo $row["retail"]?></td>
						<td><?php echo $row["supplier"]?></td>
						<td><?php echo $row["reorder"]?></td>
						<td><?php echo $row["supCode"]?></td>
						<td><?php echo $row["Qty"]?></td>
						<td><?php echo $row["update"]?></td>
						<td><a href="edit-stock.html.php?stockId=<?php echo $row['stockId'];?>" style="margin-right:5px; color: blue;"> Update </a></td>
					</tr>
				<?php
					}

					echo '</table>';

					mysqli_close($con);
				?>
            </div>

			
<!--___________________________ STOCK REPORT ____________________________________________________________________________________________________-->
            <!--<div id="StockRep" class="hidden">
                <h2>Section 3</h2>
                <p>This is the content for section 3.</p>
            </div>-->
        </div>

    </body>

</html>
