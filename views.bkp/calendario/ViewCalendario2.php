<!-- <?PHP
ECHO $anos = date('Y');
ECHO $mess = date('m');
echo $nome = date('M');
?> -->

<!DOCTYPE html>
<html>
<head>
    <title>Calendário de Junho de 2023</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../src/css/style.css">
    <style>
        .calendar {
            margin: 20px;
        }

        th {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<br>
    <div class="container">
        <a class="btn btn-light" href="../../views/home/ViewHome.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg></a>
    </div>
    <div class="container">
        <br>
        <h4 style="color: white;"><a class="btn btn-light" href="#" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdropp"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                    <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                </svg> </a> <a class="btn btn-light" href="#" role="button" data-bs-toggle="modal" data-bs-target="#cadastrar_implantacao"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                </svg></a> <?php echo $nome ." de ".$anos ?></h4>
    </div>
    <br>
    <div class="container">
        <div class="calendar">
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
                                    echo "<td><a href='$dia'>$dia</a></td>";
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
