<?php
$host = 'localhost';
$banco = 'calendario2';
$usuario = 'root';
$senha = 'AxR256396dd';

try {
  $conexao = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo 'Conexão bem-sucedida!';
} catch(PDOException $e) {
  echo 'Erro na conexão: ' . $e->getMessage();
}
