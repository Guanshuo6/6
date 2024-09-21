/* 
    Screen:         Guest Stays Report
    Purpose:        Viewing guest stays details
    Student ID:     C00288344
    Student Name:   Filip Melka
    Date:           April 2024
*/

// turn JSON string into an array of objects
data = JSON.parse(data).map((row) => {
	return {
		checkIn: new Date(row.checkIn).getTime(),
		checkOut: new Date(row.checkOut).getTime(),
		county: row.county,
		name: row.surname + ', ' + row.firstName,
		totalCost:
			row.cost *
			Math.round(
				(new Date(row.checkOut).getTime() - new Date(row.checkIn).getTime()) /
					(1000 * 3600 * 24)
			),
	}
})

const table = document.getElementById('table-content')
const printInfo = document.getElementById('print-info')
const columns = ['checkIn', 'checkOut', 'name', 'county', 'totalCost']
const btns = [
	document.getElementById('sort-date-btn'),
	document.getElementById('sort-guest-btn'),
	document.getElementById('sort-cost-btn'),
]

function displayData(btn) {
	printInfo.innerHTML = 'Sorted by ' + btn.innerText // will be visible only for printing
	// remove table content
	table.innerHTML = ''
	// enable all sorting buttons
	btns.forEach((btn) => (btn.disabled = false))
	// disable clicked button
	btn.disabled = true

	data
		.sort((a, b) => {
			switch (btn.innerText) {
				// sort by Date
				case 'Date':
					if (a.checkOut === b.checkOut) {
						return a.name.localeCompare(b.name)
					} else {
						return b.checkOut - a.checkOut
					}
				// sort by Guests
				case 'Guests':
					return a.name.localeCompare(b.name)
				// sort by Cost
				case 'Total Cost':
					return b.totalCost - a.totalCost
				default:
					return 0
			}
		})
		// map through the array and turn dates into strings and add '€' to total cost
		.map((data) => {
			return {
				...data,
				checkIn: new Date(data.checkIn).toLocaleDateString(),
				checkOut: new Date(data.checkOut).toLocaleDateString(),
				totalCost: '€ ' + data.totalCost,
			}
		})
		.forEach((data) => {
			// create a new row
			const row = document.createElement('div')
			row.className = 'row'

			columns.forEach((col) => {
				// create a new column
				const column = document.createElement('span')
				column.innerHTML = data[col]
				column.style.marginTop = '10px'
				// append the column to the row
				row.appendChild(column)
			})

			// append the row to the table
			table.appendChild(row)
		})
}

// call the function with 'Sort by Date' button reference
displayData(btns[0])
