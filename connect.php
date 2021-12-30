<?php

#connection is established with phpmyadmin and the database
$conn = mysqli_connect('localhost/127.0.0.1', 'root', '' );
mysqli_select_db($conn, 'userregistration');

?>