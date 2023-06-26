<?PHP
// date_default_timezone_set('America/Sao_Paulo');
// require('\htdocs\calendario2\config\config.php');
// $anos = date('Y');
// echo $mess = date('m');

$nome = date('M');
$ano = date('Y');
$mes = date('m');

require '../db/config.php';
require '../login/verifica_login.php';
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
    <title>Calendário de <?php echo $nome . " de " . $ano ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/css/style.css">
    <style>
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
    <!-- <div class="container">
        <a class="btn btn-light" href="../home/ViewHome.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg></a>
    </div> -->

    <div class="container">
        <?php
        if ($_SESSION['usergrupo'] == 'adm') { ?>
            <a class="btn btn-light" href="../home/ViewHome.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg></a>
        <?php } else if($_SESSION['usergrupo'] == 'analista'){ ?>
            <h4 style="color: white;"><a class="btn btn-light" href="../implantacao/ViewImplantacao.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg></a> BEM VINDO <?php echo strtoupper($_SESSION['username']) ?> !</h4>
        <?php }else{?>
            <h4 style="color: white;"><a class="btn btn-light" href="../login/logout.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
  <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg></a> BEM VINDO <?php echo strtoupper($_SESSION['username']) ?> !</h4>
            <?php }

        ?>

    </div>


    <div class="container">
        <br>
        <h4 style="color: white;" class="text-uppercase"> <?php echo $nome . " de " . $ano ?></h4>
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
        <button class="btn btn-secondary">Não Catalogado</button>
        <button class="btn btn-light">Dia livre</button><br><br>
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
    echo '<tr>';

    // Loop para criar as células do calendário
    for ($coluna = 0; $coluna < 7; $coluna++) {
        echo '<td class="table-secondary text-center"';

        // Verificar se o dia atual é válido
        if (($linha == 1 && $coluna >= $primeiroDiaSemana) || ($linha > 1 && $diaAtual <= $totalDias)) {
            // Verificar a condição para alterar a cor da célula
            echo $dias = STR_PAD($diaAtual, 2, '0', STR_PAD_LEFT);
            $resultado = "SELECT COALESCE(SUM(tar.numero_nivel),0) AS total_nivel
            FROM tarefas tar 
            WHERE tar.`status` != 'FECHADO' 
            AND tar.cancelado = 'N'
            and SUBSTR(tar.data_inicio,9,2) =:dia -- dia
            AND SUBSTR(tar.data_inicio,6,2) =:mes -- mes 
            AND SUBSTR(tar.data_inicio,1,4) =:ano -- ano ";
            $resultado = $conexao->prepare($resultado);
            $resultado->bindValue(':dia', $dias);
            $resultado->bindValue(':mes', $mes);
            $resultado->bindValue(':ano', $ano);
            $resultado->execute();
            $r = $resultado->fetchAll(PDO::FETCH_ASSOC);
// print_r($r);
            foreach ($r as $resultados) {
                // print_r($resultados['total_nivel']);
                // }
                if ($resultados['total_nivel'] >= 21 && $resultados['total_nivel'] <= 40) {
                    // echo  $resultados['total_nivel'] . "vermelho";
                    // echo "<td class='p-3 mb-2 bg-danger text-white'><a href='../calendario/Informacao_dia_calendario.php'>$dia</a></td>";
                    echo ' style="background-color: #FF0505;"';
                    // echo '>';
                } else if ($resultados['total_nivel'] >= 11 && $resultados['total_nivel'] <= 20) {
                    // echo "amarelo";
                    // echo "<td class='p-3 mb-2 bg-warning text-white'><a href='../calendario/Informacao_dia_calendario.php'>$dia</a></td>";
                    echo ' style="background-color: #FFDE00;"';
                } else if ($resultados['total_nivel'] >= 6 && $resultados['total_nivel'] <= 10) {
                    // echo "azul";
                    // echo "<td class='p-3 mb-2 bg-primary text-white'><a href='../calendario/Informacao_dia_calendario.php'>$dia</a></td>";
                    echo ' style="background-color: #0057FF;"';
                } else if ($resultados['total_nivel'] >= 1 && $resultados['total_nivel'] <= 5) {
                    // echo "verde";
                    // echo "<td class='p-3 mb-2 bg-success text-white'><a href='../calendario/Informacao_dia_calendario.php'>$dia</a></td>";
                    echo ' style="background-color: #2FC835;"';
                } else if ($resultados['total_nivel'] >= 41) {
                    // echo "cinza";
                    // echo "<td class='p-3 mb-2 bg-secondary text-white'><a href='../calendario/Informacao_dia_calendario.php'>$dia</a></td>";
                    echo ' style="background-color: #949494;"';
                } else {
                    // echo "não catalogado!";
                    // echo "<td class='p-3 mb-2 bg-danger text-white'><a href='../calendario/Informacao_dia_calendario.php'>$dia</a></td>";
                    echo ' style="background-color: #FFFFFF;"';
                }
            }



            // if ($diaAtual % 5 == 0) {
            //     echo ' style="background-color: yellow;"';
            // }

            echo '>';
            // echo '<strong><a href="../calendario/Informacao_dia_calendario.php">' . $diaAtual . '</a></strong>';
            ?>
            <!-- <strong><a href="../calendario/Informacao_dia_calendario.php"><?php echo $diaAtual ?></a></strong> -->
            <strong><a href="../calendario/Informacao_dia_calendario.php?dia=<?php echo $dias ?>&ano=<?php echo $ano ?>&mes=<?php echo $mes ?>"><?php echo $diaAtual ?></a></strong>

            <?php
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