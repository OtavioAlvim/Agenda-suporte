<?php

function busca_implatacao_ativa(){
    require '../db/config.php';
    $resultado ="SELECT * FROM implantacao imp WHERE imp.`STATUS` = 'ATIVO'";
    $resultado = $conexao->prepare($resultado);
    $resultado->execute();
    $r= $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $r;
}