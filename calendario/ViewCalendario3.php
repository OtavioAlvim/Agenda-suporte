<?php
date_default_timezone_set('America/Sao_Paulo');
$mes = $_POST['mes'];
$mes_numero = explode("-",$mes);
$anos = $_POST['ano'];
$nome = 'teste';
?>
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
        <h2 style="color: white;" class="text-uppercase"><?php echo $mes_numero[1] ." de ".$anos ?></h2>
    </div>
    <br>
    <div class="container">
            <h2></h2>
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
                        $mes = $mes_numero[0];
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
                                    if($dia == 5){
                                        echo "<td class='table-primary bg-primary'><a href='$dia'>$dia</a></td>";
                                    }else{
                                        echo "<td><a href='$dia'>$dia</a></td>";
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
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Calendário de Junho de 2023</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .calendar {
            margin: 20px;
            text-align: center;
        }

        th {
            background-color: #f8f9fa;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="calendar">
            <h2>Junho de 2023</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" data-toggle="modal" data-target="#dayModal">Dom</th>
                        <th scope="col" data-toggle="modal" data-target="#dayModal">Seg</th>
                        <th scope="col" data-toggle="modal" data-target="#dayModal">Ter</th>
                        <th scope="col" data-toggle="modal" data-target="#dayModal">Qua</th>
                        <th scope="col" data-toggle="modal" data-target="#dayModal">Qui</th>
                        <th scope="col" data-toggle="modal" data-target="#dayModal">Sex</th>
                        <th scope="col" data-toggle="modal" data-target="#dayModal">Sáb</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $mes = 6;
                        $ano = 2023;
                        $primeiroDia = mktime(0, 0, 0, $mes, 1, $ano);
                        $primeiroDiaSemana = date('N', $primeiroDia);
                        $totalDias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
                        $dia = 1;
                        $numCelulas = $totalDias + $primeiroDiaSemana - 1;

                        for ($i = 0; $i < 6; $i++) {
                            echo "<tr>";

                            for ($j = 0; $j < 7; $j++) {
                                if ($i == 0 && $j < $primeiroDiaSemana - 1) {
                                    echo "<td>&nbsp;</td>";
                                } elseif ($dia <= $totalDias) {
                                    echo "<td data-day=\"$dia\" data-toggle=\"modal\" data-target=\"#dayModal\">$dia</td>";
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
        </div>
    </div>

    <div class="modal fade" id="dayModal" tabindex="-1" role="dialog" aria-labelledby="dayModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dayModalLabel">Dia Selecionado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="selectedDay"></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dayModal').on('show.bs.modal', function(event) {
                var day = $(event.relatedTarget).data('day');
                $('#selectedDay').text(day);
            });
        });
    </script>
</body>
</html> -->
