<!-- 
    Screen:         Orders report
    Purpose:        Viewing orders report
    Student Name:   Guanshuo Feng
    Date:           April 2024
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orders Report</title>
	<link rel="icon" type="image/x-icon" href="images/LOGO-no-bg.png">
	<link rel="stylesheet" href="styles/shared.css" />
    <link rel="stylesheet" href="styles/Order-report.css" />
	<script src="JavaScript/Order-report.js" defer></script>
</head>
<body>
	 <nav>
        <!-- Insert icons -->
		<img class="logo" src="images/LOGO-no-bg.png" alt="Logo" />
        <div class="links">
            <div class="menu-container">
                <span>Menu</span>
                <div class="links-container">
                    <div>
                        <a href="menu.html">To Menu</a>
                        <!-- <a href="/">Delete a Room</a> -->
                        <!-- <a href="/">View a Room</a> -->
                    </div>
                </div>
            </div>
            <div class="menu-container">
                <span>Exit</span>
                <div class="links-container">
                    <div>
                        <a href="login.html">To Login page</a>
                    </div>
                </div>
            </div>
            <div class="menu-container">
                <span>Other Pages</span>
                <div class="links-container">
                    <div>
                        <a href="https://c2p-hotel.candept.com/hotel_project/room-report.html.php#">Room</a>
                        <a href="https://c2p-hotel.candept.com/hotel_project/guest-report.html.php">Guest Stays</a>
                        <a href="https://c2p-hotel.candept.com/hotel_project/stock-report.html.php">Stock</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="report">
            <div class="header">
                <h1>Orders Report</h1>
                <!-- Used for printing (to show the sorting criteria) -->
                <span id="print-info">Sorted by Date</span>
                <div>
                    <div class="sort-btns">
                        <span>Sort by</span>
                        <button id="sort-date-btn" onclick="displayData(this)" disabled>
                            Date
                        </button>
                        <button id="sort-supplier-btn" onclick="displayData(this)">
                            Supplier
                        </button>
                        <button id="sort-cost-btn" onclick="displayData(this)">
                            Cost
                        </button>
                    </div>
                    <button class="print-btn" onclick="window.print()">Print</button>
                </div>
            </div>
            <div class="table">
                <div class="table-header row">
                    <span>Order ID</span>
                    <span>Date of Order</span>
                    <span>Supplier Name</span>
                    <span>Total Cost</span>
                </div>
                <div id="table-content">
					<?php
						include 'php/db.inc.php'; // Access database

						$sql = "SELECT Orders.orderId, Orders.orderDate, Orders.cost, Supplier.surName, Supplier.firstName 
								FROM Orders
								INNER JOIN Supplier ON Orders.supplierId = Supplier.supplierId"; // Query data
						$result = mysqli_query($con, $sql); // Excute

						$data = [];

						if ($result && mysqli_num_rows($result) > 0) {
							// Insert data
							while ($row = mysqli_fetch_assoc($result)) {
								$data[] = $row;
							}
				 			$data_json = json_encode($data);
							echo"<script>let data = JSON.stringify($data_json);</script>";
						} else {
						echo "0 results"; // Throw errors
					}
					?>
				</div>
            </div>
        </div>
    </main>
</body>
</html>