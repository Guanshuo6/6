
<!DOCTYPE html>  
<html>  
<head>    
    <link rel="stylesheet" type="text/css" href="styles/checkstyles.css">  
</head>  
<body> 
       <div class="sidebar">
            <div class="logo-details">
                <img class="logo" src="images/LOGO-no-bg.png" alt="Logo">
                <span class="logo_name">Room Manage</span>
            </div>
            <ul class="nav-links">
                <div class="icon-link">
                    <p>
                        <a href="#">
                            <img class="icon" src="images/grid.png" alt="Grid Icon">
                            <span class="link_name">Dashboard</span>
                        </a>
                    </p>
                    <div class="dashboard" id="dashboard">
                        <p><a href="#" onclick="redirectToPage('login')">Exit</a></p>
                        <p><a href="#" onclick="showCanvas()">Analyse</a></p>
                    </div>
                </div>
                <div class="icon-link" onclick="toggleSubMenu('category')">
                    <p>
                        <a href="#">
                            <img class="icon" src="images/coll.png" alt="Grid Icon">
                            <span class="link_name">Category</span>
                        </a>
                        <img class="icon-down" src="images/down.png" title="Room Types" alt="Down Icon">
                    </p>
                </div>
                <div class="icon-link" onclick="toggleSubMenu('reserve')">
                    <p>
                        <a href="#">
                            <img class="icon" src="images/reserve.png" alt="Grid Icon">
                            <span class="link_name">Reserve</span>
                        </a>    
                        <img class="icon-down" src="images/down.png" title="Guest, Check in / out" alt="Down Icon">
                    </p>
                </div>
                <div class="sub-link" id="reserve">
                    <ul class="sub-menu">
                        <p><a href="#">Booking ID</a></p>
                        <p><a href="#">Guest ID</a></p>
                        <p><a href="#">Check in</a></p>
                        <p><a href="#">Check out</a></p>
                    </ul>
                </div>
                <div class="icon-link" onclick="showSubMenu('manager')">
                    <p>
                        <a href="#">
                            <img class="icon" src="images/manager.png" alt="Manager Icon">
                            <span class="link_name">Manager</span>
                        </a>
                    </p>
                    <div class="manager" id="manager">
                        <p><a href="#" onclick="toManagerPage()">Manager</a></p>
                    </div>
                </div>
                <div class="icon-link" onclick="showSubMenu('pages')">
                    <p>
                        <a href="#">
                            <img class="icon" src="images/pages.png" alt="Pages Icon">
                            <span class="link_name">To other pages</span>
                        </a>
                    </p>
                    <div class="pages" id="pages">
                        <!-- Other pages -->
                        <p><a href="#" onclick="redirectToPage('menu')">Main Menu</a></p>
                        <p><a href="#" onclick="redirectToPage('check')">Room</p>
                        <p><a href="#" onclick="redirectToPage('extra')">Extras</a></p>
                        <p><a href="#" onclick="redirectToPage('order')">Order Lists</a></p>
                        <p><a href="#" onclick="redirectToPage('stock')">Stock</a></p>
                        <p><a href="#" onclick="redirectToPage('staff')">Staff</a></p>
                    </div>
                </div>
            </ul>
        </div>
        <div id="canvas">
            <canvas id="myCanvas" width="400" height="400"></canvas>
        </div>
 
    <div class="container">  
  
        <?php  
   
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["checkin"])) {  
            $guestName = $_POST["guest_name"];  
            $roomNumber = $_POST["room_number"];  
            $checkinDate = $_POST["checkin_date"];  
  
         
  
            echo "<p>Check-in successful!</p>";  
        }  
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["checkout"])) {  
            $guestName = $_POST["guest_name"];  
            $roomNumber = $_POST["room_number"];  
            $checkoutDate = $_POST["checkout_date"];   
  
            echo "<p>Check-out successful！</p>";  
        }  
        ?>  
 
        <h2>Check-in</h2>  
        <form method="post" action="">  
            <label for="guest_name">客人姓名：</label>  
            <input type="text" name="guest_name" id="guest_name" required><br><br>  
  
            <label for="room_number">房间号：</label>  
            <input type="text" name="room_number" id="room_number" required><br><br>  
  
            <label for="checkin_date">Check-in日期：</label>  
            <input type="date" name="checkin_date" id="checkin_date" required><br><br>  
  
            <input type="submit" name="checkin" value="Check-in">  
        </form>  
		</div>
		<div class="container">
        <h2>Check-out</h2>  
        <form method="post" action="">  
            <label for="guest_name">客人姓名：</label>  
            <input type="text" name="guest_name" id="guest_name" required><br><br>  
  
            <label for="room_number">房间号：</label>  
            <input type="text" name="room_number" id="room_number" required><br><br>  
  
            <label for="checkout_date">Check-out日期：</label>  
            <input type="date" name="checkout_date" id="checkout_date" required><br><br>  
  
            <input type="submit" name="checkout" value="Check-out">  
        </form>  
		</div>
    </div>
  </div>	
</body>  
</html>