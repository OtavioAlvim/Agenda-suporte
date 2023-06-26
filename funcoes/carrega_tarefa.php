<?php
function carrega_tarefa($data){
    require '../db/config.php';
    $resultado ="SELECT t.titulo as titulos,t.* FROM tarefas t WHERE t.data_inicio <=:datas AND t.`status` != 'FECHADO' AND t.cancelado = 'N' ORDER BY t.ticket desc";
    $resultado = $conexao->prepare($resultado);
    $resultado->bindValue(':datas',$data);
    $resultado->execute();
    $r= $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $r;

};


function carrega_eventos_calendario($dia,$mes,$ano){
    require '../db/config.php';
    $resultado ="SELECT * 
    FROM tarefas t 
    WHERE t.cancelado = 'N' 
    AND t.`status` != 'FECHADO'
    AND SUBSTR(t.data_inicio,1,4) =:ano -- ano,
    AND SUBSTR(t.data_inicio,6,2) =:mes -- mes,
    AND SUBSTR(t.data_inicio,9,2) =:dia -- dia,";
    $resultado = $conexao->prepare($resultado);
    $resultado->bindValue(':ano',$ano);
    $resultado->bindValue(':mes',$mes);
    $resultado->bindValue(':dia',$dia);
    $resultado->execute();
    $r= $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $r;

};
?>




