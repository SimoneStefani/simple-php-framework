<?php

require 'Task.php';

try {
  $pdo = new PDO('mysql:host=127.0.0.1;dbname=test_db', 'USER', 'PSW');
} catch (PDOException $e) {
  die($e->getMessage());
}

$statement = $pdo->prepare('SELECT * FROM todos');
$statement->execute();

var_dump($statement->fetchAll(PDO::FETCH_CLASS, 'Task'));