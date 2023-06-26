<?php 
$migracao = 30;
$instalacao = 0;
$treinamentos = 0;
$acompanhamento;
$não_fiscal;
$arquivo_fiscal;
$feedback;
$resultado = 4;

if($resultado >= 21 && $resultado <= 40){
    echo "vermelho";
}else if($resultado >= 11 && $resultado <= 20){
    echo "amarelo";
}else if($resultado >= 6 && $resultado <= 10){
    echo "azul";
}else if($resultado >= 1 && $resultado <= 5){
    echo "verde";
}else if($resultado == 0){
    echo "cinza";
}else{
    echo "não catalogado!";
}
