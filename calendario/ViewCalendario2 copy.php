<!-- <?PHP
$anos = date('Y');
$mess = date('m');
$nome = date('M');
?> -->

<!DOCTYPE html>
<html>
<head>
    <title>Calendário de <?php echo $nome ." de ".$anos ?></title>
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
        a{
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
        <h4 style="color: white;" class="text-uppercase"> <?php echo $nome ." de ".$anos ?></h4>
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
                <tbody><a href=""></a>
                    <?php
                        $mes = $mess;
                        $ano = $anos;
                        $primeiroDia = mktime(0, 0, 0, $mes, 1, $ano);
                        $primeiroDiaSemana = date('N', $primeiroDia);
                        $totalDias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
                        $dia = 1;
                        $numCelulas = $totalDias + $primeiroDiaSemana - 1;

                        for ($i = 0; $i < 6; $i++) {
                            echo "<tr class='table-light text-center'>";

                            for ($j = 0; $j < 7; $j++) {
                                if ($i == 0 && $j < $primeiroDiaSemana - 1) {
                                    echo "<td>&nbsp;</td>";
                                } elseif ($dia <= $totalDias) {
                                    if($dia == 06){
                                        echo "<td class='table-primary bg-info'><a href='../calendario/Informacao_dia_calendario.php'>$dia</a></td>";
                                    }else if($dia == 10){
                                        echo "<td class='table-primary bg-warning'><a href='../calendario/Informacao_dia_calendario.php'>$dia</a></td>";
                                    }else if($dia == 17){
                                        echo "<td class='table-primary bg-danger'><a href='../calendario/Informacao_dia_calendario.php'>$dia</a></td>";
                                    }else{
                                        echo "<td class='table-primary bg-secondary'><a href='../calendario/Informacao_dia_calendario.php'>$dia</a></td>";
                                        // echo "<td><a href='$dia'>$dia</a></td>";
                                    }

                                    $dia++;
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }

                            echo "</tr>";

                            if ($dia > $totalDias) {
                                break;
                            }
                        }
                    ?>
                </tbody>
            </table>
        <!-- </div> -->

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

