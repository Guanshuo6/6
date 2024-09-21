/*
 * Project        : Hotel webpage
 * Page Name      : Main Menu
 * Student ID 1   : C00280203 (Zihan Wang)
 * Student ID 2   : C00282942 (Edward Zheng)
 * Student ID 3   : C00288344 (Filip Melka)
 * Student ID 4   : C00278723 (Guanshuo Feng)
 * Date Create    : 10/02/2024
 * Date Update    : 10/02/2024
 */


function redirectToPage(page) 
{
    var response = confirm('Do you want to go to ' + page + ' page?');
    if (response) 
    {
        location.href = page + ".html";
        return true;
    } 
    else 
    {
        return false;
    }
}

/* 
 * Read functions 
 * Name for each page of function
 */

function toCheckPage() { return redirectToPage("check"); }

function toStockPage() { return redirectToPage("stock"); }

function toExtraPage() { return redirectToPage("extra"); }

function toRoomPage() { return redirectToPage("room"); }

function toOrderPage() { return redirectToPage("order"); }

function toStaffPage() { return redirectToPage("staff"); }