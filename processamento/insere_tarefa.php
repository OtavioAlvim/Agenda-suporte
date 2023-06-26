<?php
// var_dump($_POST);
date_default_timezone_set('America/Sao_Paulo');
require_once '../login/verifica_login.php';
// require('C:\Users\tavin\OneDrive\htdocs\calendario2\config\config.php');
require_once '../db/config.php';

$responsavel = $_POST['responsavel'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data_inicial = $_POST['data_inicio'];
$ticket = $_POST['ticket'];
$tipo = $_POST['tipo'];


    
    $resultado ="INSERT INTO `tarefas` (titulo, descricao, ressponsavel, ticket,data_inicio,tipo) VALUES (:titulo,:descricao,:ressponsavel,:ticket,:data_inicio,:tipo)";
    $resultado = $conexao->prepare($resultado);
    $resultado->bindValue(':titulo',$titulo);
    $resultado->bindValue(':descricao',$descricao);
    $resultado->bindValue(':ressponsavel',$responsavel);
    $resultado->bindValue(':ticket',$ticket);
    $resultado->bindValue(':data_inicio',$data_inicial);
    $resultado->bindValue(':tipo',$tipo);
    
if($resultado->execute() == true){
    $_SESSION['valido'] = true; 
    header('location: ../home/ViewHome.php');
    exit();
}

