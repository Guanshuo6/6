

function checkAge(element){
  const today = new Date();
  const selectedDate = new Date(element.value)

  if (today.getFullYear() - selectedDate.getFullYear() < 17) 
  {
    element.setCustomValidity('The student must be at least 17 years old.');
  } else {
    element.setCustomValidity('');
  }
}

function checkStartDate(element){
  const today = new Date();
  const selectedDate = new Date(element.value)

  if (today.valueOf() > selectedDate.valueOf()) 
  {
    element.setCustomValidity('Starting date must not be before today.');
  } else {
    element.setCustomValidity('');
  }
}
function confirmemail(element){
  const email = document.getElementById("email").value
  const confirmEmail = element.value 

  if(email == confirmEmail){
    element.setCustomValidity('');
  } else {
    element.setCustomValidity("Please confirm the email")
  }
}