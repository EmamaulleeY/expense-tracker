<html>
<head>
        <title>User Login and Registration</title>
        <!--style.css which is found in the css folder will act as the style sheet  -->
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <!--Bootstrap cdn -->
        <link rel="stylesheet" type="text/css" href="<link rel="stylesheet" href="<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script defer src="../js/validation.js"></script>
</head>
<body>
<h1 align= 'center'>Expense Tracker</h1>
<div  class="container">
    <div class= "login-box">
    <div class= "row">
    <div id="error" class = "col-md-6 login-left">
        <h2> Login Here </h2>
        <!--This form is being posted to validation.php -->
        <form id="form" action="../php/validation.php" method="POST">
            <div class= "form-group">
                <label>Username</label>
                <input type="text" name="user1" class="form-control" required>
            </div>
            <div class= "form-group">
                <label>Password</label>
                <input type="password" name="password1" class="form-control" required>
            </div>
            <button type="submit" name="log" class= "btn btn-primary">Login</button>
        </form>
    </div>

    <div id="error1" class = "col-md-6 login-right">
        <h2> Register Here </h2>
        <!--This form is being posted here itself on this page -->
        <form id="form1" action="../php/login.php" method="POST">
            <div class= "form-group">
                <label>Username</label>
                <input type="text" name="user" class="form-control" required>
            </div>
            <div class= "form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class= "btn btn-primary" name="reg">Register</button>
        </form>
    </div>

    </div>
    </div>
</div>

</body>
</html>


<?php

session_start();
#this is done to connect to the database
require_once '../php/connect.php';

#if the submit button for registration is hit
if(isset($_POST['reg'])){
    $name = $_POST['user'];
    $pass = $_POST['password'];

    #cheks if there is matching names in the database
    $s = "SELECT * FROM usertable WHERE name = '$name'";

    #query for the sql code above
    $result = mysqli_query($conn,$s);
    $num = mysqli_num_rows($result);


    #if result is matched
    if($num == 1){
        #This pops up alert message
        echo '<script>alert("Username already taken")</script>';
    }else{
        #else the information is stored in the tables?database
        $reg= "INSERT INTO usertable(name, password) VALUES ('$name' , '$pass')";
        mysqli_query($conn, $reg);
        echo '<script>alert("Registration Successfull")</script>'; 
    }
}

?>