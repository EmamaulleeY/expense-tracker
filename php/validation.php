<?php

session_start();

require_once 'connect.php';

$name = $_POST['user1'];
$pass = $_POST['password1'];

#information is selected from the corresponding rows
$s = "SELECT * FROM usertable WHERE name = '$name' && password = '$pass';";

$result = mysqli_query($conn , $s);
$num = mysqli_num_rows($result);

#if the results are right
if($num == 1){
    $_SESSION['username'] = $name;
    header('location: home.php');
}else{
    echo '<script>alert("Incorrect username or password")</script>';

}

?>