<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Extra</title>  
    <link rel="stylesheet" href="styles/Extrastyles.css">  
</head>  
<body>  
       <div class="sidebar">
            <div class="logo-details">
                <img class="logo" src="images/LOGO-no-bg.png" alt="Logo">
                <span class="logo_name">Room Manage</span>
            </div>
            <ul class="nav-links">
                <div class="icon-link">
                <!-- <div class="icon-link" onclick="showSubMenu('dashboard')"> -->
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
                <div class="sub-link" id="category">
                    <ul class="sub-menu">
                        <p><a href="#">Twin Room</a></p>
                        <p><a href="#">Single Room</a></p>
                        <p><a href="#">Superior Room</a></p>
                        <p><a href="#">Suite Room</a></p>
                    </ul>
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
                        <p><a href="#" onclick="redirectToPage('check')">Check in / out</a></p>
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
        <h1>Extra</h1>  
  
        <h2>小酒吧消费</h2>  
        <table class="consumption-table">  
            <tr>  
                <th>房间号</th>  
                <th>消费金额</th>  
            </tr>  
 
        </table>  
  
        <h2>餐厅消费</h2>  
        <table class="consumption-table">  
            <tr>  
				<th>房间号</th>
                <th>用餐日期</th>  
                <th>消费金额</th>  
            </tr>  

        </table>  
  
        <h2>房间消费</h2>  
        <table class="consumption-table">  
            <tr>  
                <th>Room Number</th> 
                <th>Consumption amount</th>  
            </tr>  
     
        </table>  
    </div>  
</body>  
</html>