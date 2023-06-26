<?php

require_once '\htdocs\calendario2\funcoes\carrega_implantacao.php';
require_once '\htdocs\calendario2\funcoes\funcao_gral.php';
$recupera_implantacao = carrega_implantacao();
$responsavell = carrega_analista();
$tipo_primitivo = carrega_tipo_primitivo();
?>

<!doctype html>
<html lang="en">

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
                </svg></a> IMPLANTAÇÕES EM ANDAMENTO</h4>
    </div>
    <br>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            foreach ($recupera_implantacao as $dados) { ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php print_r($dados['titulo']) ?></h5>
                            <p class="card-text">ANALISTA : <?php print_r($dados['responsavel']) ?></p>
                            <p>TICKET: <?php print_r($dados['ticket']) ?></p>
                            <p>DATA: <?php print_r($dados['data_inicio']) ?></p>
                            <ul class="list-group">
                                <?php
                                $estagios = carrega_estagios($dados['ticket']);
                                foreach ($estagios as $estagios) { ?>

                                    <li class="list-group-item">
                                        <label class="form-check-label">
                                            <input class="form-check-input me-1" name="estagios[]" type="checkbox" value="" id="firstCheckboxStretched" value='<?php print_r($estagios['descricao']) ?>'>
                                            <?php print_r($estagios['descricao']) ?>
                                        </label>
                                    </li>



                                <?php }

                                ?>

                            </ul><br>
                            <a class="btn btn-primary btn-sm" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                </svg></a>
                            <a class="btn btn-danger btn-sm" href="#" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                </svg></a>
                            <button type="button" class="btn btn-success btn-sm">FINALIZAR</button>
                        </div>
                    </div>
                </div>
            <?php }
            ?>


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
                    <!-- <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">INICIO</label>
          </div>
          <div class="form-floating">
            <input type="date" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">FIM</label>
          </div> -->

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
    </div>


    <!-- MODAL DE CADASTRO -->

    <div class="modal fade" id="cadastrar_implantacao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="../../processamento/insere_implantacao.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">CADASTRAR IMPLANTAÇÃO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <br>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <div class="mb-3">
                                        <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                                        <input type="date" name="data_inicial" class="form-control" id="exampleFormControlInput1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <div class="mb-3">
                                        <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                                        <input type="number" name="ticket" class="form-control" id="exampleFormControlInput1" placeholder="ticket" value="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <div class="mb-3">
                                        <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                                        <input type="text" name="titulo" class="form-control" id="exampleFormControlInput1" placeholder="Titulo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <div class="mb-3">
                                        <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                                        <input type="text" name="descricao" class="form-control" id="exampleFormControlInput1" placeholder="Descricao" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select name="responsavel" class="form-select" id="floatingSelectGrid">
                                        <?php

                                        foreach ($responsavell as $responsavel) { ?>
                                            <option value="<?php print_r($responsavel['nome']) ?>"><?php print_r($responsavel['nome']) ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <label for="floatingSelectGrid">Responsavel</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select name="status" class="form-select" id="floatingSelectGrid">
                                        <option value="ABERTO">ABERTO</option>
                                        <option value="FECHADO">FECHADO</option>
                                    </select>
                                    <label for="floatingSelectGrid">STATUS</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group">
                        <?php
                        foreach ($tipo_primitivo as $tipo_primitivo) {  ?>

                            <li class="list-group-item">
                                <label class="form-check-label" >
                                    <input class="form-check-input me-1" name="tipo_primitivo[]" type="checkbox" id="firstCheckboxStretched" value='<?php print_r($tipo_primitivo['descricao']) ?>'>
                                    <?php print_r($tipo_primitivo['descricao']) ?>
                                </label>
                            </li>
                        <?php }

                        ?>

                    </ul>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                        <button type="submit" class="btn btn-primary">CONFIRMAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>