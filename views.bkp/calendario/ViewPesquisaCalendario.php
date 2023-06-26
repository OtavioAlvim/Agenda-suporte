<?php
// var_dump($_POST);
$ano = $_POST['ano'];
$mes = $_POST['mes'];
require_once '\htdocs\calendario2\funcoes\carrega_calendario.php';

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IMPLANTAÇÕES EM ANDAMENTO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../src/css/style.css">
</head>

<body>

    <br>
    <div class="container">
        <a class="btn btn-primary" href="../../views/home/ViewHome.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg></a>
    </div>
    <div class="container">
        <br>
        <h4 style="color: white;"><a class="btn btn-primary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdropp"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                    <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                </svg> </a> <a class="btn btn-primary" href="#" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                </svg></a> CALENDARIO <?php echo strtoupper($mes); ?></h4>
    </div>
    <br>

    <div class="container">
        <!-- <div class="row">
            <div class="col-md-10">
                <h2>Calendário</h2>
            </div>
        </div> -->

        <div class="row">
            <div class="col-md-10">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Dom</th>
                            <th class="text-center">Seg</th>
                            <th class="text-center">Ter</th>
                            <th class="text-center">Qua</th>
                            <th class="text-center">Qui</th>
                            <th class="text-center">Sex</th>
                            <th class="text-center">Sáb</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Preencha as células do calendário com os dados necessários -->

                        <?php
                        $calendario = carrega_calendario($mes, $ano);
                        // print_r($calendario);
                        foreach ($calendario as $mess) { 
                            
                            // print_r($mess['domingo']);
                            ?>
                            <tr>
                                <td class="text-center bg-danger-subtle"><a href="" style="text-decoration: none; color:brown;";> <?php print_r($mess['domingo']) ?></a></td>
                                <td class="text-center "><a href="" style="text-decoration: none;";><strong><?php print_r($mess['segunda']) ?></strong></a></td>
                                <td class="text-center"><a href="" style="text-decoration: none;";><strong><?php print_r($mess['terca']) ?></strong></a></td>
                                <td class="text-center"><a href="" style="text-decoration: none;";><strong><?php print_r($mess['quarta']) ?></strong></a></td>
                                <td class="text-center"><a href="" style="text-decoration: none;";><strong><?php print_r($mess['quinta']) ?></strong></a></td>
                                <td class="text-center"><a href="" style="text-decoration: none;";><strong><?php print_r($mess['sexta']) ?></strong></a></td>
                                <td class="text-center bg-danger-subtle"><a href="" style="text-decoration: none; color:brown;";><?php print_r($mess['sabado']) ?></a></td>
                            </tr>
                        <?php }
                        ?>
                        <!-- ... continuar preenchendo as células do calendário ... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- MODAL DE FILTRO -->

    <div class="modal fade" id="staticBackdropp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">FILTRAR</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInputGrid">
                                <label for="floatingInputGrid">Data Inicial</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInputGrid">
                                <label for="floatingInputGrid">Data final</label>
                            </div>
                        </div>
                    </div><br>


                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid">
                                    <option selected></option>
                                    <option value="1">MARCOS</option>
                                    <option value="2">CAIO</option>
                                    <option value="3">OTAVIO</option>
                                </select>
                                <label for="floatingSelectGrid">Responsavel</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid">
                                    <option selected></option>
                                    <option value="1">FINALIZADO</option>
                                    <option value="2">EM ABERTO</option>
                                    <!-- <option value="3">Three</option> -->
                                </select>
                                <label for="floatingSelectGrid">Status</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                    <button type="button" class="btn btn-primary">CONFIRMAR</button>
                </div>
            </div>
        </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>