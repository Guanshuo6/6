function populate() {
	const values = document.getElementById('staff-listbox').value.split(',')

	let details = ''

	const labels = ['Staff ID:', 'Surname:', 'First Name:', 'Status:']

	labels.forEach((label, index) => {
		details += `
            <div>
                <span>${label}</span>
                <input name=${index === 0 ? 'staffId' : 'info'} value=${
			values[index]
		} disabled/>
            </div>
        `
	})

	document.getElementById('staff-details').innerHTML = details
}

populate()

function confirm() {
	document.getElementsByName('staffId')[0].disabled = false

	return true
}
