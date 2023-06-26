<?php
require_once '../login/verifica_login.php';
require_once '../db/config.php';
date_default_timezone_set('America/Sao_Paulo');
// var_dump($_POST);

$status = $_POST['status'];
$id_estagios = $_POST['id_estagios'];
$id_ticket = $_POST['id_ticket'];
$descricao = $_POST['descricao'];
$responsavel = $_POST['responsavel'];
$data_inicio = date('Y-m-d');
$titulo = $_POST['titulo'];
$descricao_nivel = $_POST['descricao_nivel'];
$numero_nivel = $_POST['numero_nivel'];
if($status == 'ANDAMENTO'){

// e vai atualizar o status dele para em andamento

$atualiza_status = "UPDATE estagios_implantacao est SET est.`status` =:status WHERE est.id = :id";
$atualiza_status = $conexao->prepare($atualiza_status );
$atualiza_status ->bindValue(':status',$status);
$atualiza_status ->bindValue(':id',$id_estagios);
$atualiza_status ->execute();

// insere tarefa na agenda


$implantacao = "INSERT INTO tarefas (titulo, descricao, ressponsavel, ticket, status, data_inicio,descricao_nivel,numero_nivel) VALUES (:titulo,:descricao,:responsavel,:ticket,:statuss,:data_inicial,:descricao_nivel,:numero_nivel);
";
$implantacao = $conexao->prepare($implantacao);
$implantacao->bindValue(':titulo',$titulo);
$implantacao->bindValue(':descricao',$descricao);
$implantacao->bindValue(':responsavel',$responsavel);
$implantacao->bindValue(':ticket',$id_ticket);
$implantacao->bindValue(':statuss',$status);
$implantacao->bindValue(':data_inicial',$data_inicio);
$implantacao->bindValue(':descricao_nivel',$descricao_nivel);
$implantacao->bindValue(':numero_nivel',$numero_nivel);

if($implantacao->execute() == true){
    $_SESSION['processo_iniciado'] = true; 
    header('location: ../implantacao/ViewImplantacao.php');
}

}else{
// vai setar como finalizado a tarefa
// e atualizar o status do estagio selecionado para finalizado
// e vai atualizar o status dele para em andamento

$atualiza_status = "UPDATE estagios_implantacao est SET est.`status` =:status WHERE est.id = :id";
$atualiza_status = $conexao->prepare($atualiza_status );
$atualiza_status ->bindValue(':status',$status);
$atualiza_status ->bindValue(':id',$id_estagios);
$atualiza_status ->execute();

// atualiza status para finalizado tarefa


$atualiza_status_tarefa = "UPDATE tarefas t SET t.`status` =:status WHERE t.descricao =:descricao and t.ticket =:ticket";
$atualiza_status_tarefa = $conexao->prepare($atualiza_status_tarefa);
$atualiza_status_tarefa->bindValue(':status',$status);
$atualiza_status_tarefa->bindValue(':descricao',$descricao);
$atualiza_status_tarefa->bindValue(':ticket',$id_ticket);
$atualiza_status_tarefa->execute();


if($atualiza_status_tarefa->execute() == true){
    $_SESSION['processo_finalizado'] = true; 
    header('location: ../implantacao/ViewImplantacao.php');
}
}