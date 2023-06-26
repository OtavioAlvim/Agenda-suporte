<?php
require_once '../login/verifica_login.php';
require_once '../db/config.php';
// var_dump($_POST);


$id = $_POST['id'];

$exclusao = "UPDATE tarefas t SET t.`status` = 'FECHADO' WHERE t.id =:id";
$exclusao = $conexao->prepare($exclusao);
$exclusao->bindValue(':id',$id);


if($exclusao->execute() == true){
    $_SESSION['fechado'] = true; 
    header('location: ../home/ViewHome.php');
}