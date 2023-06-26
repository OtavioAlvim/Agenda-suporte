<?php
// Definição dos meses e seus respectivos dias
$meses = [
    "Janeiro" => 31,
    "Fevereiro" => 28, // considerando um ano não bissexto
    "Março" => 31,
    "Abril" => 30,
    "Maio" => 31,
    "Junho" => 30,
    "Julho" => 31,
    "Agosto" => 31,
    "Setembro" => 30,
    "Outubro" => 31,
    "Novembro" => 30,
    "Dezembro" => 31
];

// Nome do arquivo de saída
$nomeArquivo = 'dados.csv';

// Abre o arquivo CSV em modo de escrita
$arquivo = fopen($nomeArquivo, 'w');

// Escreve os cabeçalhos no arquivo CSV
$cabecalhos = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "mês", "ano"];
fputcsv($arquivo, $cabecalhos, ';');

// Itera pelos meses e gera os dados
foreach ($meses as $mes => $dias) {
    $linha = [];

    // Preenche os dias do mês
    for ($i = 1; $i <= $dias; $i++) {
        $linha[] = $i;
        
        // Se a linha estiver completa, escreve no arquivo e reinicia a linha
        if (count($linha) === 7) {
            $linha[] = $mes;
            $linha[] = date('Y');
            fputcsv($arquivo, $linha, ';');
            $linha = [];
        }
    }

    // Se sobrarem dias na linha, preenche com valores vazios
    while (count($linha) < 7) {
        $linha[] = ";";
    }

    $linha[] = $mes;
    $linha[] = date('Y');
    fputcsv($arquivo, $linha, ';');
}

// Fecha o arquivo
fclose($arquivo);

echo "Arquivo CSV gerado com sucesso: $nomeArquivo";
?>
