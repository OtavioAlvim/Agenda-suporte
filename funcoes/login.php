<?php

function verificaUsuario($cnpjUsuaruio,$senhaUsuario){
  require('../config/config.php');

    $resultado ="SELECT COUNT(*) AS total,c.* FROM users c WHERE c.email =:usuario AND c.senha =:senha ";
    $resultado = $conexao->prepare($resultado);
    $resultado->bindValue(':usuario',$cnpjUsuaruio);
    $resultado->bindValue(':senha',$senhaUsuario);
    $resultado->execute();
    $r= $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $r;

};

