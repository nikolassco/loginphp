<?php
  $username = 'root';
  $password = '123456';
  $database = 'loginphp';
  $host = 'localhost';

  $mysqli = new mysqli($host, $username, $password, $database);

  if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
  }
?>
