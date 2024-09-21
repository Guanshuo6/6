// stock.js

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

function showContent(sectionId) 
{
    // Hide all sections
    var sections = document.querySelectorAll('#content > div');
    sections.forEach(function(section) {
        section.classList.add('hidden');
    });

    // Show the selected section
    var selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        selectedSection.classList.remove('hidden');
    }
}

document.getElementById('applyOrder').addEventListener('click', function() {
    var formData = new FormData(document.getElementById('orderForm'));

    // Send an AJAX request to submit the form data
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_order.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Refresh the table after successful order update
            document.getElementById('stockList').innerHTML = xhr.responseText;
        } else {
            console.error('Error:', xhr.statusText);
        }
    };
    xhr.onerror = function () {
        console.error('Request failed.');
    };
    xhr.send(formData);
});

