function celsiusToFahrenheit(celsius) {  
  return (celsius * 9/5 + 32);  
}  
  
function fahrenheitToCelsius(fahrenheit) {  
  return (fahrenheit - 32) * 5/9;  
}  
  
function convertTemperature() {  
  var temperatureInput = prompt("Enter the temperature:");  
  var isFahrenheit = false;  
    
  if (temperatureInput === null) {  
    return;  
  }  
    
  temperatureInput = parseFloat(temperatureInput);  
    
  if (isNaN(temperatureInput)) {  
    alert("Invalid input! Please enter a valid number.");  
    convertTemperature();  
    return;  
  }  
    
  var isCelsius = confirm("Do you want to convert to Celsius? (yes/no)");  
    
  if (isCelsius) {  
    alert("The temperature in Celsius is: " + fahrenheitToCelsius(temperatureInput));  
  } else {  
    alert("The temperature in Fahrenheit is: " + celsiusToFahrenheit(temperatureInput));  
  }  
}  
  
convertTemperature();