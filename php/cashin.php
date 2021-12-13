<?php

#require connect.php so that the connection to the databased is established
require_once 'connect.php';
$cashin = $_POST['cash'];
$date1 = $_POST['date1'];

#data is being inserted in the respective tables
$c = "INSERT INTO expense (cashin , date) VALUES ('$cashin', '$date1')";

$result1 = mysqli_query($conn,$c);

#if there is error in querying
if(!$result1){
    echo "Error";
}else{
    header('location:home.php');
}

?>