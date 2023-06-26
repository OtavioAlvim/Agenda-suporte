<?php
require_once '../login/verifica_login.php';
require_once '../db/config.php';
var_dump($_POST);

$feedback = $_POST['feedback'];
$id_implantacao = $_POST['id_implantacao'];
$data_fechamento = $_POST['data_fechamento'];


$fecha_implantacao = "UPDATE implantacao imp SET imp.`status` = 'FINALIZADO', imp.data_fim =:data_fim,imp.feedback =:feedback WHERE imp.id =:id";
$fecha_implantacao = $conexao->prepare($fecha_implantacao);
$fecha_implantacao->bindValue(':data_fim',$data_fechamento);
$fecha_implantacao->bindValue(':feedback',$feedback);
$fecha_implantacao->bindValue(':id',$id_implantacao);

if($fecha_implantacao->execute() == true){
    $_SESSION['implantacao_finalizada'] = true; 
    header('location: ../implantacao/ViewImplantacao.php');
}