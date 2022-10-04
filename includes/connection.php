<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'zoomlion';

    $con = mysqli_connect($host, $username, $password, $dbName) or die('cant connect');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>