<?php

require_once 'userregistration.sql';

#connection is established with phpmyadmin and the database
$conn = mysqli_connect('localhost', 'root', '' );
mysqli_select_db($conn, 'userregistration');

?>