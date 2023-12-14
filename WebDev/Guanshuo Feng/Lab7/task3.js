function checkDate() {  
    var datePicker = document.getElementById('datePicker').value;  
    var today = new Date();  
    today.setHours(0, 0, 0, 0); // 将今天的日期设定为午夜开始的时间，确保一致性。  
    var message = document.getElementById('message');  
    if (datePicker > today) {  
        message.innerHTML = "This date is in the Future.";  
        alert("The selected date is in the future.");  
    } else if (datePicker == today) {  
        message.innerHTML = "This date is today.";  
        alert("The selected date is today.");  
    } else {  
        message.innerHTML = "This date is in the past.";  
        alert("The selected date is in the past.");  
    }  
}