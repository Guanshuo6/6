const extras = [
	{
		area: 'Bar',
		options: ['Whiskey', 'Beer', 'Aperol', 'Vodka'],
	},
	{
		area: 'Restaurant',
		options: ['Hotpot', 'Pizza', 'Hotdog', 'Burger'],
	},
	{
		area: 'Room Service',
		options: ['Wine', 'Champagne', 'Cocktail', 'Massage'],
	},
]

function populateAreaSelect() {
	let options = ''

	extras.forEach((extra) => {
		options += `<option value='${extra.area}'>${extra.area}</option>`
	})

	document.getElementById('area-select').innerHTML = options
}

populateAreaSelect()

function populateExtraSelect() {
	const area = document.getElementById('area-select').value
	const EXTRAS = extras.filter((extra) => extra.area == area)[0].options

	let options = ''

	EXTRAS.forEach((option) => {
		options += `<option value='${option}'>${option}</option>`
	})

	document.getElementById('extra-select').innerHTML = options
}

populateExtraSelect()

function handleSubmit() {
	const res = confirm('Are you sure?')
	if (res) {
		document
			.querySelectorAll('input:disabled')
			.forEach((el) => (el.disabled = false))

		return true
	} else {
		return false
	}
}
