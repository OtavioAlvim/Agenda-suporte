<?php
require_once '../login/verifica_login.php';
require_once '../db/config.php';
// var_dump($_POST);
$senha_dia = $_POST['senha_dia'];

$atualiza_senha = "UPDATE config c set c.senha_dia =:senha";
$atualiza_senha = $conexao->prepare($atualiza_senha);
$atualiza_senha ->bindValue(':senha',$senha_dia);
$atualiza_senha ->execute();


if($atualiza_senha->execute() == true){
    $_SESSION['senha_dia'] = true; 
    header('location: ../home/ViewHome.php');
    exit();
}