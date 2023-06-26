<?php
session_start();
require_once('../db/config.php');


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];



$resultado ="SELECT * FROM users c WHERE c.email = '{$usuario}' AND c.senha = '{$senha}'";

$resultado = $conexao->prepare($resultado);

$resultado->execute();

$r= $resultado->fetchAll(PDO::FETCH_ASSOC);
foreach($r as $row=> $users){

}

if(isset($users)){
    $_SESSION['username'] = $users['nome'];
    $_SESSION['usergrupo'] = $users['grupo'];
    header('location: ../processamento/permissao.php');
    
}else{
    $_SESSION['dados_invalido'] = true;
    header('location: ../index.php');
}



