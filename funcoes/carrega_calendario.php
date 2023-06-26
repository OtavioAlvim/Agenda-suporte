<?php
require_once '../db/config.php';
$mes = '06';
$ano = '2023';
$dia = '06';
    
    $resultado ="SELECT SUM(tar.numero_nivel) AS total_nivel
    FROM tarefas tar 
    WHERE tar.`status` != 'FECHADO' 
    AND tar.cancelado = 'N'
    and SUBSTR(tar.data_inicio,9,2) =:dia -- dia
    AND SUBSTR(tar.data_inicio,6,2) =:mes -- mes 
    AND SUBSTR(tar.data_inicio,1,4) =:ano -- ano
    ";
    $resultado = $conexao->prepare($resultado);
    $resultado->bindValue(':dia',$dia);
    $resultado->bindValue(':mes',$mes);
    $resultado->bindValue(':ano',$ano);
    $resultado->execute();
    $r= $resultado->fetchAll(PDO::FETCH_ASSOC);

    foreach($r as $total){
        print_r($total);
    }

