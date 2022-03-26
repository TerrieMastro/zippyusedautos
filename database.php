<?php

$dsn = 'mysql:host=';
$username = '';
$password = '';

try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    $error = $e->getMessage();
    include('../view/error.php');
    exit();
}
?>