<?php

$dsn="mysql:dbname=programmation_php;host=localhost;charset=utf8";
$username="root";
$password="";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch(Exception $erreur) {
    echo "<h1>Erreur de connection</h1>";
    exit();
}