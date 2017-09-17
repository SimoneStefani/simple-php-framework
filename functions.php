<?php

function connectToDb()
{
  try {
    return new PDO('mysql:host=127.0.0.1;dbname=test_db', 'USER', 'PSW');
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

function fetchAllTasks($pdo)
{
  $statement = $pdo->prepare('SELECT * FROM todos');
  $statement->execute();
  return $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
}