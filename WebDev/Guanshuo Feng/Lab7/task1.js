function isPositive(number) {  
    return number > 0;  
}  
  
function getValidInput() {  
    let input;  
    while (true) {  
        input = prompt("Please enter an integer (or press Enter to exit):");  
        if (input === null) {  
            break;  
        } else if (isNaN(input)) {  
            alert("Invalid input: Please enter an integer.");  
        } else if (input === "") {  
            alert("Invalid input: Please enter a non-empty value.");  
            continue; // 重新开始循环，提示用户重新输入一个整数  
        } else {  
            return parseInt(input);  
        }  
    }  
    return null;  
}  
  
let userInput;  
while ((userInput = getValidInput()) !== null) {  
    if (isPositive(userInput)) {  
        alert("The number is positive.");  
    } else {  
        alert("The number is not positive.");  
    }  
}