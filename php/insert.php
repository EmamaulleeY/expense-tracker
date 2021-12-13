<?php
session_start();
require_once 'connect.php';

$expense = $_POST['expense'];
$details = $_POST['details'];
$date = $_POST['date'];

#values are inserted in the respective table and rows
$b = "INSERT INTO expense (spent, details, date) VALUES ('$expense', '$details', '$date');";

$result = mysqli_query($conn,$b);

#if the result is not inserted correctly
if(!$result){
    echo "Error";
}else{
    header('location:home.php');
}


?>