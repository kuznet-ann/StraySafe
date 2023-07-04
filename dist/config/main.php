<?php
    ini_set('display_errors', 'Off'); 

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'stray-safe';

    $connection = mysqli_connect($host, $user, $password, $db_name);
?>