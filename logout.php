<?php

session_start();
#the session is ended
session_destroy();

#redirected to login.php
header('location:index.php');

?>