function calculateAge() {  
    // Get the selected date of birth  
    var birthdate = new Date(document.getElementById("birthdate").value);  
  
    // Get the current date  
    var today = new Date();  
  
    // Calculate the difference in milliseconds between the birthdate and today  
    var diff = today - birthdate;  
  
    // Convert the difference to years, taking into account the number of days in a year, and the number of months in a year  
    var age = Math.floor(diff / (1000 * 60 * 60 * 24 * 365.25));  
  
    // Display the age to the user  
    document.getElementById("age").innerHTML = "Your age is: " + age + " years.";  
}