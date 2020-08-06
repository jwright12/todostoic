<?php

$server = 'localhost';
$username = 'hunter';
$password = 'cs344';
$database = 'HHCS344';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>