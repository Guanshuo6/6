/*
 * Project        : Hotel webpage
 * Page Name      : Login page
 * Student ID 1   : C00280203 (Zihan Wang)
 * Student ID 2   : C00282942 (Edward Zheng)
 * Student ID 3   : C00288344 (Filip Melka)
 * Student ID 4   : C00278723 (Guanshuo Feng)
 * Date Create    : 09/02/2024
 * Date Update    : 10/02/2024
 */

// Chek user outputs on browser
console.log(111)

// Read only
const url = window.location.href;
const failed = url.includes("failed");
const errorMsg = document.getElementById("error-msg");

// if input wrong username or password, will output warning to user
if(failed){
	errorMsg.className = "";
} else {
	errorMsg.className = "hidden";
}

