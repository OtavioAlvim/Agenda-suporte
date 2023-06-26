<?php
function carrega_implantacao(){
    require '../db/config.php';
    $resultado ="SELECT * FROM implantacao imp  WHERE imp.`status` = 'aberto'";
    $resultado = $conexao->prepare($resultado);
    $resultado->execute();
    $r= $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $r;

};

function carrega_implantacao_analista($responsavel){
    require '../db/config.php';
    $resultado ="SELECT * FROM implantacao imp  WHERE imp.`status` = 'aberto' AND imp.responsavel =:responsavel";
    $resultado = $conexao->prepare($resultado);
    $resultado->bindValue(':responsavel', $responsavel);
    $resultado->execute();
    $r= $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $r;

};


function carrega_estagios($id_implantacao){
    require '../db/config.php';
    // $resultado ="SELECT * FROM estagios_implantacao e WHERE e.id_ticket =:id_implantacao";
    $resultado ="SELECT n.descricao AS descricao_nivel,n.numero_nivel,e.*  FROM estagios_implantacao e JOIN tipo_primitivo_implantacao t ON e.descricao = t.descricao JOIN nivel_evento n ON t.id_nivel_evento = n.id WHERE e.id_ticket =:id_implantacao";
    $resultado = $conexao->prepare($resultado);
    $resultado->bindValue(':id_implantacao',$id_implantacao);
    $resultado->execute();
    $estagios = $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $estagios;

};
?>




