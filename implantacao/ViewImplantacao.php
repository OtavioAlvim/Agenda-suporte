<?php
require_once '../login/verifica_login.php';
require_once '../funcoes/carrega_implantacao.php';
require_once '../funcoes/funcao_gral.php';
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
    <link rel="stylesheet" href="../src/css/style.css">
    <script src="../src/js/sweetalert2.js"></script>
</head>

<body>
    <br>
    <div class="container">
        <?php
        if ($_SESSION['usergrupo'] == 'adm') { ?>
            <a class="btn btn-light" href="../home/ViewHome.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg></a>

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
                    foreach ($recupera_implantacao as $dados) {  ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title"><?php print_r($dados['titulo']) ?></h6>
                                    <hr>
                                    <p class="card-text">ANALISTA : <?php print_r($dados['responsavel']) ?></p>
                                    <p>TICKET: <?php print_r($dados['ticket']) ?></p>
                                    <p>DATA: <?php print_r($dados['data_inicio']) ?></p>
                                    <hr>
                                    <?php
                                    $estagios = carrega_estagios($dados['ticket']);
                                    foreach ($estagios as $estagios) { ?>
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <div class="mb-3">
                                                        <p class="text-uppercase"><?php print_r($estagios['descricao']) ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">

                                                <div class="form-floating">
                                                    <form action="../processamento/atualiza_status_implantacao.php" method="post">
                                                        <?php
                                                        if ($estagios['status'] == 'ABERTO') { ?>
                                                            <!-- <input type="hidden" name="status" value="<?php print_r($estagios['status']) ?>"> -->
                                                            <input type="hidden" name="status" value="ANDAMENTO">
                                                            <input type="hidden" name="id_estagios" value="<?php print_r($estagios['id']) ?>">
                                                            <input type="hidden" name="id_ticket" value="<?php print_r($estagios['id_ticket']) ?>">
                                                            <input type="hidden" name="descricao" value="<?php print_r($estagios['descricao']) ?>">
                                                            <input type="hidden" name="responsavel" value="<?php print_r($dados['responsavel']) ?>">
                                                            <input type="hidden" name="descricao_nivel" value="<?php print_r($estagios['descricao_nivel']) ?>">
                                                            <input type="hidden" name="numero_nivel" value="<?php print_r($estagios['numero_nivel']) ?>">
                                                            <input type="hidden" name="titulo" value="<?php print_r($dados['titulo']) ?>">
                                                            <button type="submit" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                                INICIAR
                                                            </button>
                                                        <?php

                                                        } else if ($estagios['status'] == 'ANDAMENTO') { ?>
                                                            <input type="hidden" name="status" value="FECHADO">
                                                            <input type="hidden" name="id_estagios" value="<?php print_r($estagios['id']) ?>">
                                                            <input type="hidden" name="id_ticket" value="<?php print_r($estagios['id_ticket']) ?>">
                                                            <input type="hidden" name="descricao" value="<?php print_r($estagios['descricao']) ?>">
                                                            <input type="hidden" name="responsavel" value="<?php print_r($dados['responsavel']) ?>">
                                                            <input type="hidden" name="titulo" value="<?php print_r($dados['titulo']) ?>">
                                                            <button type="submit" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                                FINALIZAR
                                                            </button>
                                                        <?php
                                                        } else { ?>
                                                            <p><strong>Concluido</strong></p>
                                                        <?php }
                                                        ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }

                                    ?>
                                    <hr>
                                    <form action="../processamento/processa_baixa_implantacao.php" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label" >Feedback</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="feedback" required></textarea>
                                        </div>
                                        <!-- <input type="text" name="" id="" placeholder="Feedback" required> -->
                                        <input type="hidden" name="id_implantacao" value="<?php print_r($dados['id'])?>">
                                        <input type="hidden" name="data_fechamento" value=" <?php echo date('Y-m-d')?>">
                                        <button type="submit" class="btn btn-success btn-sm">FINALIZAR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>


                </div>
            </div>

        <?php } else { ?>

            <nav class="navbar  fixed-top">
                <div class="container-fluid">
                    <br>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" target="_blank" href="../chat/chat2.php">ATENDIMENTO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="../calendario/ViewCalendario2.php">CALENDARIO</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        SISTEMAS
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" target="_blank" href="https://gestor.inoveh.com.br/sistema/">GESTOR</a></li>
                                        <li><a class="dropdown-item" target="_blank" href="https://food.inoveh.com.br/sistema/">GESTOR FOOD</a></li>
                                        <li><a class="dropdown-item" target="_blank" href="https://salao.inoveh.com.br/sistema/#/">GESTOR SALÃO</a></li>
                                        <li><a class="dropdown-item" target="_blank" href="https://agro.inoveh.com.br/sistema/">GESTOR AGRO</a></li>
                                        <li><a class="dropdown-item" target="_blank" href="https://pet.inoveh.com.br/sistema/#/">GESTOR PET</a></li>
                                    </ul>

                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        UTILITARIOS
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" target="_blank" href="http://criaresuporte1.no-ip.info:9080/">HISTORICO DE VERSÕES</a></li>
                                        <li><a class="dropdown-item" target="_blank" href="https://www.criaresupportcenter.com/">SUPORTE CENTER</a></li>
                                        <li><a class="dropdown-item" target="_blank" href="https://servidorseguro.mysuite.com.br/client/login.php?sl=cnf">CONSULTA TICKET CRIARE</a></li>
                                        <li><a class="dropdown-item" target="_blank" href="https://app.octadesk.com/chat">OCTADESK</a></li>
                                        <li><a class="dropdown-item" target="_blank" href="https://avanteempresas.movidesk.com/">CHAT AVANTE</a></li>
                                    </ul>

                                <li class="nav-item">
                                    <a class="nav-link active" href="../login/logout.php">SAIR</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </nav>
            <br><br>

            <h4 style="color: white;"><a class="btn btn-light" href="../login/logout.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg></a> BEM VINDO <?php echo strtoupper($_SESSION['username']) ?> !</h4>

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
                    $carrega_implantacao_analista = carrega_implantacao_analista($_SESSION['username']);
                    foreach ($carrega_implantacao_analista as $dados) { ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title"><?php print_r($dados['titulo']) ?></h6>
                                    <hr>
                                    <p class="card-text">ANALISTA : <?php print_r($dados['responsavel']) ?></p>
                                    <p>TICKET: <?php print_r($dados['ticket']) ?></p>
                                    <p>DATA: <?php print_r($dados['data_inicio']) ?></p>
                                    <hr>
                                    <?php
                                    $estagios = carrega_estagios($dados['ticket']);
                                    foreach ($estagios as $estagios) { ?>
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <div class="mb-3">
                                                        <p class="text-uppercase"><?php print_r($estagios['descricao']) ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">

                                                <div class="form-floating">
                                                    <form action="../processamento/atualiza_status_implantacao.php" method="post">
                                                        <?php
                                                        if ($estagios['status'] == 'ABERTO') { ?>
                                                            <!-- <input type="hidden" name="status" value="<?php print_r($estagios['status']) ?>"> -->
                                                            <input type="hidden" name="status" value="ANDAMENTO">
                                                            <input type="hidden" name="id_estagios" value="<?php print_r($estagios['id']) ?>">
                                                            <input type="hidden" name="id_ticket" value="<?php print_r($estagios['id_ticket']) ?>">
                                                            <input type="hidden" name="descricao" value="<?php print_r($estagios['descricao']) ?>">
                                                            <input type="hidden" name="responsavel" value="<?php print_r($dados['responsavel']) ?>">
                                                            <input type="hidden" name="descricao_nivel" value="<?php print_r($estagios['descricao_nivel']) ?>">
                                                            <input type="hidden" name="numero_nivel" value="<?php print_r($estagios['numero_nivel']) ?>">
                                                            <input type="hidden" name="titulo" value="<?php print_r($dados['titulo']) ?>">
                                                            <button type="submit" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                                INICIAR
                                                            </button>
                                                        <?php

                                                        } else if ($estagios['status'] == 'ANDAMENTO') { ?>
                                                            <input type="hidden" name="status" value="FECHADO">
                                                            <input type="hidden" name="id_estagios" value="<?php print_r($estagios['id']) ?>">
                                                            <input type="hidden" name="id_ticket" value="<?php print_r($estagios['id_ticket']) ?>">
                                                            <input type="hidden" name="descricao" value="<?php print_r($estagios['descricao']) ?>">
                                                            <input type="hidden" name="responsavel" value="<?php print_r($dados['responsavel']) ?>">
                                                            <input type="hidden" name="titulo" value="<?php print_r($dados['titulo']) ?>">
                                                            <button type="submit" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                                FINALIZAR
                                                            </button>
                                                        <?php
                                                        } else { ?>
                                                            <p><strong>Concluido</strong></p>
                                                        <?php }
                                                        ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>


                </div>
            </div>
        <?php }

        ?>

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
    </div>


    <!-- MODAL DE CADASTRO -->

    <div class="modal fade" id="cadastrar_implantacao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="../processamento/insere_implantacao.php" method="post">
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
                                        <input type="number" name="ticket" class="form-control" id="exampleFormControlInput1" placeholder="ticket" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <div class="mb-3">
                                        <input type="text" name="titulo" class="form-control" id="exampleFormControlInput1" placeholder="Titulo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <div class="mb-3">
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
                        foreach ($tipo_primitivo as $tipo_primitivo) { ?>
                            <li class="list-group-item">
                                <label class="form-check-label">
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

    <!-- Tarefa iniciada! -->

    <?php
    if (isset($_SESSION['processo_iniciado'])) :


    ?>

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Tarefa iniciada!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
    endif;
    unset($_SESSION['processo_iniciado']);

    ?>

    <!-- Tarefa finalizada -->

    <?php
    if (isset($_SESSION['processo_finalizado'])) :


    ?>

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Tarefa finalizada!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
    endif;
    unset($_SESSION['processo_finalizado']);

    ?>

    <!-- implantacao inserida -->

    <?php
    if (isset($_SESSION['implantacao_inserida'])) :


    ?>

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Implantacao inserida!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
    endif;
    unset($_SESSION['implantacao_inserida']);

    ?>



    <!-- sem grupo -->

    <?php
    if (isset($_SESSION['sem_grupo'])) :


    ?>

        <script>
            Swal.fire({
                icon: 'error',
                title: 'Implantação sem grupos definidos!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
    endif;
    unset($_SESSION['sem_grupo']);

    ?>


    <!-- implantacao inserida -->

    <?php
    if (isset($_SESSION['implantacao_finalizada'])) :


    ?>

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Implantacao Finalizada com sucesso!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
    endif;
    unset($_SESSION['implantacao_finalizada']);

    ?>
</body>

</html>