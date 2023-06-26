<?php
$ano = 2023;
$mes = 6;

// Configurar o timezone para o Brasil
date_default_timezone_set('America/Sao_Paulo');

// Obter o primeiro dia do mês
$primeiroDia = strtotime("{$ano}-{$mes}-01");
$primeiroDiaSemana = date('w', $primeiroDia);

// Obter o número total de dias no mês
$totalDias = date('t', $primeiroDia);

// Início do HTML
?>
<!DOCTYPE html>
<html>

<head>
    <title>Calendário de <?php echo $nome . " de " . $anos ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/style.css">
    <style>
        h4{
            background-color: red;
            align-items: center;
            border-radius: 100px;
        }
        .calendar {
            margin: 20px;
        }

        th {
            background-color: #f8f9fa;
            font-size: x-large;
        }

        a {
            color: black;
            font-size: x-large;
        }
    </style>
</head>

<body>
    <br>
    <div class="container">
        <a class="btn btn-light" href="../home/ViewHome.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg></a>
    </div>
    <div class="container">
        <br>
        <!-- <h4 style="color: white;" class="text-uppercase"> <?php echo $nome . " de " . $anos ?></h4> -->
    </div>
    <br>
    <!-- <a href="../calendario/Informacao_dia_calendario.php">dsdsasd</a> -->
    <div class="container">
        <!-- <div class="calendar"> -->
        <h2></h2>
        <button class="btn btn-danger">Lotação maxima</button>
        <button class="btn btn-warning">media lotaçao</button>
        <button class="btn btn-primary">Tarefa baixa</button>
        <button class="btn btn-success">Tarefa Rapida</button>
        <button class="btn btn-secondary">Dia livre</button><br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="table-primary text-center">Dom</th>
                    <th scope="col" class="table-primary text-center">Seg</th>
                    <th scope="col" class="table-primary text-center">Ter</th>
                    <th scope="col" class="table-primary text-center">Qua</th>
                    <th scope="col" class="table-primary text-center">Qui</th>
                    <th scope="col" class="table-primary text-center">Sex</th>
                    <th scope="col" class="table-primary text-center">Sáb</th>
                </tr>
            </thead>
            <tbody>

<?php

// Variável para controlar o dia atual
$diaAtual = 1;

// Loop para criar as linhas do calendário
for ($linha = 1; $linha <= 6; $linha++) {
    
    echo '<tr class="text-center">';

    // Loop para criar as células do calendário
    for ($coluna = 0; $coluna < 7; $coluna++) {
        // echo $diaAtual;
        echo '<td>';

        // Verificar se o dia atual é válido
        if (($linha == 1 && $coluna >= $primeiroDiaSemana) || ($linha > 1 && $diaAtual <= $totalDias)) {
            echo '<h4>' . $diaAtual .'</h4>';
            $diaAtual++;
        }

        echo '</td>';
    }

    echo '</tr>';

    // Verificar se todos os dias foram exibidos
    if ($diaAtual > $totalDias) {
        break;
    }
}

// Fim do HTML
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</body>';
echo '</html>';
