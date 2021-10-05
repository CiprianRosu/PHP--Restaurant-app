<?php
session_start();

    define('SITEURL', 'http://localhost/Final%20Project/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'caffe_luccas');
    
    $connection = mysqli_connect(LOCALHOST , DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); 
    $db_select = mysqli_select_db($connection, DB_NAME) or die(mysqli_error()); 
    ?>