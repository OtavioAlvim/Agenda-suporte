<?php

function senha_dia(){
    require '../db/config.php';
    $resultado ="SELECT * FROM config ";
    $resultado = $conexao->prepare($resultado);
    $resultado->execute();
    $r= $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $r;
}

