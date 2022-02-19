<?php    
    session_start();
    $dsn = "mysql:host=127.0.0.1;dbname=barbershop;charset=utf8";
    $connect = new PDO($dsn, 'root', 'root');
?>