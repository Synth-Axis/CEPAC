<?php

$db = "db_cepac";
$username = "root";
$password = "";

// $db = "db_cepac";
// $username = "admin_cepac2";
// $password = "Mz326b!l2";


$dsn = 'mysql:dbname=' . $db . ';host=localhost;charset=utf8mb4';

$db = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
