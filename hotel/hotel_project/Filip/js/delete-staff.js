/* 
    Screen:         Delete a staff member
    Purpose:        Deleting a staff member
    Student ID:     C00288344
    Student Name:   Filip Melka
    Date:           April 2024
*/

const inputIds = [
	'staffId',
	'surname',
	'firstName',
	'address',
	'eircode',
	'phone',
	'jobTitle',
]

/* populates the form */
function populate() {
	const sel = document.getElementById('listbox')
	const result = sel.options[sel.selectedIndex].value
	const personDetails = result.split(',') // store data in an array

	let i = 0

	while (i < inputIds.length) {
		document.getElementById(inputIds[i]).value = personDetails[i]

		i++
	}
}
/* confirms the user really wants to delete the person */
function handleSubmit() {
	let answer

	do {
		answer = prompt('Are you sure you want to delete this staff member [y/n]')
	} while (answer !== 'y' && answer !== 'n')

	if (answer === 'y') {
		/* enable field and allow the form to be submitted */
		document.getElementById('staffId').disabled = false

		return true
	} else {
		/* populate and don't allow the form to be submitted */
		populate()
		return false
	}
}

populate() // call the function
