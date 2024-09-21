/*
 * Project        : Hotel webpage
 * Page Name      : Room and Guest Manage
 * Student ID 1   : C00280203 (Zihan Wang)
 * Student ID 2   : C00282942 (Edward Zheng)
 * Student ID 3   : C00288344 (Filip Melka)
 * Student ID 4   : C00278723 (Guanshuo Feng)
 * Date Create    : 12/02/2024
 * Date Update    : 12/02/2024
 */

function toggleSubMenu(id) 
{
    var menu = document.getElementById(id);
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
}

function redirectToPage(page) 
{
	if(page == 'menu' || page == 'login')
	{
		var response = confirm('Do you want to go to ' + page + ' page?');
		if (response) 
		{
			location.href = page + ".html";
		}
	}
    else
    {
        var response = confirm('Do you want to go to ' + page + ' page?');
		if (response) 
		{
			location.href = page + ".html.php";
		}
    }
	
}

// Get canvas
var canvas = document.getElementById("myCanvas");
// Size of rectangle
var ctx = canvas.getContext("2d");
canvas.width = 800;
canvas.height = 600;
data = JSON.parse(data);
ctx.font = "20px times-newroman";
ctx.fillStyle = "black";
ctx.textAlign = "center";
ctx.fillText("This is the record of customers for each month", canvas.width / 2, 30);

ctx.font = "13px sans-serif";
ctx.fillText("Customers", 85, 75);
ctx.fillText("Months", 760, 525);
ctx.fillStyle = "gray";
ctx.textAlign = "right";

function showCanvas() 
{
	document.getElementById("table-container").style.display = "none";
    document.getElementById("hide").style.display = "block";
    
    for(var i = 0; i <= 10; i ++)
    {
        ctx.moveTo(100, i * 40 + 100);
        ctx.lineTo(700, i * 40 + 100);
        // Y line
        ctx.fillText((10 - i) * 3, 90, i * 40 + 107);
    }
    var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    for(var i = 0; i < 12; i ++)
    {
		
        ctx.moveTo(i * (600 / 11) + 100, 100);
        ctx.lineTo(i * (600 / 11) + 100, 500);
        // X line
        ctx.fillText(month[i], i * (600 / 11) + 115, 525);
    }

	ctx.lineWidth = 2;
	ctx.stroke();
	
	draw();
}

function draw()
{
	ctx.beginPath();
	ctx.lineWidth = 4;
    ctx.strokeStyle = "green";
		
	ctx.moveTo((data[0].month - 1) * (600 / 11) + 100, 500 - (data[0].total_guests * 13.3));
	
	for(let i=1; i<data.length; i++)
	{
		ctx.lineTo((data[i].month - 1) * (600 / 11) + 100, 500 - (data[i].total_guests * 13.3))
	}
	
    ctx.stroke();
}
