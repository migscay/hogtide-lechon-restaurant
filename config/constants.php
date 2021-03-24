<?php
    session_start();
//by default username=root password=''
    define('SITEURL','http://localhost/food-order/');
    define('LOCALHOST','freedb.tech');
    define('DB_USER','freedbtech_migscay');
    define('DB_PASSWORD','MKikay1966');
    define('DB_NAME','freedbtech_hogtidelechon');

    $conn = mysqli_connect(LOCALHOST,DB_USER,DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
?>