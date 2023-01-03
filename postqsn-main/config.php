<?php 
session_start();
define('USER', 'root');  //add your username here
define('PASSWORD', 'pranay'); //add your password here
define('HOST', 'localhost');
define('DATABASE', 'web');   //add your schema namehere


$data =mysqli_connect(HOST, USER, PASSWORD, DATABASE,3306) ;


if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}





?>