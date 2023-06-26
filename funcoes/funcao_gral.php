<?php 
    
function carrega_analista(){
    require '../db/config.php';
    $resultado ="SELECT * FROM analistas";
    $resultado = $conexao->prepare($resultado);
    $resultado->execute();
    $analista = $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $analista;
}
function carrega_nivel(){
    require '../db/config.php';
    $resultado ="SELECT * FROM nivel_evento";
    $resultado = $conexao->prepare($resultado);
    $resultado->execute();
    $nivel= $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $nivel;
}
function carrega_tipo_primitivo(){
    require '../db/config.php';
    $resultado ="SELECT t.descricao,n.descricao AS descricao_nivel,n.numero_nivel FROM tipo_primitivo_implantacao t JOIN nivel_evento n ON t.id_nivel_evento = n.id";
    $resultado = $conexao->prepare($resultado);
    $resultado->execute();
    $tipo_primitivo= $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $tipo_primitivo;
}
function carrega_sistema(){
    require '../db/config.php';
    $resultado ="SELECT * FROM sistema";
    $resultado = $conexao->prepare($resultado);
    $resultado->execute();
    $sistema= $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $sistema;
}



function carrega_meses(){
    require '../db/config.php';
    $resultado ="SELECT * FROM meses";
    $resultado = $conexao->prepare($resultado);
    $resultado->execute();
    $meses = $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $meses;
}



?>