<?php

require_once '../login/verifica_login.php';
require_once '../db/config.php';
// echo "<pre>";
date_default_timezone_set('America/Sao_Paulo');
// var_dump($_POST);
$data_inicial = $_POST['data_inicial'];
$ticket = $_POST['ticket'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$responsavel = $_POST['responsavel'];
$status = $_POST['status'];
$tipo_primitivo = $_POST['tipo_primitivo'];
if(empty($tipo_primitivo)){
    $_SESSION['sem_grupo'] = true; 
    header('location:../implantacao/ViewImplantacao.php');
}else{
    $implantacao = "INSERT INTO implantacao (titulo, descricao, responsavel,ticket, data_inicio) VALUES (:titulo,:descricao,:responsavel,:ticket,:data_inicial);";
    $implantacao = $conexao->prepare($implantacao);
    $implantacao->bindValue(':titulo',$titulo);
    $implantacao->bindValue(':descricao',$descricao);
    $implantacao->bindValue(':responsavel',$responsavel);
    $implantacao->bindValue(':ticket',$ticket);
    $implantacao->bindValue(':data_inicial',$data_inicial);
    $implantacao->execute();
    
    foreach($tipo_primitivo as $tipo_primitivo){
        $estagios_implantacao = "INSERT INTO estagios_implantacao (descricao,id_ticket) VALUES (:descricao,:id_ticket);";
        $estagios_implantacao = $conexao->prepare($estagios_implantacao);
        $estagios_implantacao->bindValue(':descricao',$tipo_primitivo);
        $estagios_implantacao->bindValue(':id_ticket',$ticket);
        $estagios_implantacao->execute();
    }
    
    
    $_SESSION['implantacao_inserida'] = true; 
    header('location:../implantacao/ViewImplantacao.php');
}







