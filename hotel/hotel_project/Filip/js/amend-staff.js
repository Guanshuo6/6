/* 
    Screen:         View / Amend a staff member
    Purpose:        Viewing and amending staff member's details 
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
	'managerStatus',
	'username',
	'lastUpdated',
] /* ids of all input fields */

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

	lock()
}
/* confirms the user really wants to delete the person */
function handleSubmit() {
	let answer

	do {
		answer = prompt('Please confirm that the details are correct [y/n]')
	} while (answer !== 'y' && answer !== 'n')

	if (answer === 'y') {
		/* enable fields and allow the form to be submitted */
		inputIds.forEach((id) => {
			document.getElementById(id).disabled = false
		})

		return true
	} else {
		/* populate and don't allow the form to be submitted */
		populate()
		return false
	}
}

const saveBtn = document.getElementById('btn-save')
const amendBtn = document.getElementById('btn-amend')
let isAmendState = true

/* unlock appropriate input fields */
function unlock() {
	inputIds.forEach((id) => {
		if (!['managerStatus', 'username', 'staffId', 'lastUpdated'].includes(id)) {
			document.getElementById(id).disabled = false
		}
	})

	saveBtn.disabled = false
	amendBtn.innerText = 'View'
	isAmendState = !isAmendState
}

/* lock all input fields */
function lock() {
	inputIds.forEach((id) => {
		document.getElementById(id).disabled = true
	})

	saveBtn.disabled = true
	amendBtn.innerText = 'Amend'
	isAmendState = !isAmendState
}

/* toggle between locked and unlocked input fields */
function toggle() {
	if (isAmendState) {
		lock()
	} else {
		unlock()
	}
}

populate() // call the function
