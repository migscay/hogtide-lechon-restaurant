<?php
    session_start();
//by default username=root password=''
    define('SITEURL','http://localhost/food-order/');
    define('LOCALHOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','food-order');

    $conn = mysqli_connect(LOCALHOST,DB_USER,DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
?>