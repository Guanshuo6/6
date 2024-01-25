<!--
 Student name : Feng Guanshuo
 Student Num  : C00278723
 Date         : 25/01/2024
-->
<?php  
$cart = array(  
    "Cereal" => 5.00,  
    "Coffee" => 2.50,  
    "Bananas" => 3.50,  
    "Onions" => 1.00,  
    "Lettuce" => 2.40,  
    "Tomatoes" => 3.50  
);  
  
echo "Items in the cart:" . PHP_EOL;  
foreach ($cart as $item => $price) {  
    echo $item . ": $" . $price . PHP_EOL<br>;  
}  
?>