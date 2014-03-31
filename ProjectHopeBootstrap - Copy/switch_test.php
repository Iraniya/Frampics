<?php
$year = 2014;
$day = 21;
$month= 01;
$monthname = "March";
switch($monthname){
case "January": 
	$month = 01;
	break;
case "February": 
	$month = 02;
	break;
case "March": 
	$month = 03;
	break;
case "April": 
	$month = 04;
	break;
case "May": 
	$month = 05;
	break;
case "June": 
	$month = 06;
	break;
case "July": 
	$month = 07;
	break;
case "August": 
	$month = 08;
	break;
case "September": 
	$month = 09;
	break;
case "October": 
	$month = 10;
	break;
case "November": 
	$month = 11;
	break;
case "December": 
	$month = 12;
	break;

}
$birthday = $year."-".$month."-".$day;
echo $birthday;
?>