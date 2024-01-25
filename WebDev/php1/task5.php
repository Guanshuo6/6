<!--
 Student name : Feng Guanshuo
 Student Num  : C00278723
 Date         : 25/01/2024
-->
<?php    
$currentDate = date('Y-m-d');
  

$date1 = date('M d Y', strtotime($currentDate)); 
$date2 = date('D M Y', strtotime($currentDate)); 
$date3 = date('d/m/Y', strtotime($currentDate));  
$date4 = date('d/m/y', strtotime($currentDate));  
$date5 = date('l, F d, Y', strtotime($currentDate)); 
  

echo  $date1 . "\n";  
echo  $date2 . "\n";  
echo  $date3 . "\n";  
echo  $date4 . "\n";  
echo  $date5 . "\n";  
?>