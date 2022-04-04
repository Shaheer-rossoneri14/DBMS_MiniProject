<?php
    session_start();
    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/dbms-mp/');
    define('LOCALHOST', 'localhost');//server in which the code will run
    define('DB_USERNAME', 'root');// username is root by default
    define('DB_PASSWORD', '');
    define('DB_NAME', 'dbms-mp');//food-order is the database that is created in phpMyAdmin

    $conn= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//connects to mysql database
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());

?>
