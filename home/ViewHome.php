<?php
require_once '../login/verifica_login.php';
// require_once 'C:\Users\tavin\OneDrive\htdocs\calendario2\funcoes\carrega_tarefa.php';
require_once '../funcoes/carrega_tarefa.php';
require_once '../funcoes/funcao_gral.php';
// require_once 'C:\Users\tavin\OneDrive\htdocs\calendario2\funcoes\funcao_gral.php';
$responsavell = carrega_analista();
$tipo = carrega_tipo_primitivo();
$dataAtual = date('Y-m-d');
$carrega_evento = carrega_tarefa($dataAtual);
$carregar_meses = carrega_meses();
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../src/css/style.css">
  <script src="../src/js/sweetalert2.js"></script>
  <title>Pagina inicial</title>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">

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
              <a class="nav-link active" aria-current="page" href="../implantacao/ViewImplantacao.php">IMPLANTAÇÕES EM ANDAMENTO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" target="_blank" href="../chat/chat2.php">ATENDIMENTO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../calendario/ViewCalendario2.php">CALENDARIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">CONFIGURACÕES</a>
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
                <li><a class="dropdown-item" target="_blank" data-bs-toggle="modal" data-bs-target="#senhaDia">ATUALIZAR SENHA DO DIA</a></li>
              </ul>

            <li class="nav-item">
              <a class="nav-link active" href="../login/logout.php">SAIR</a>
            </li>
          </ul>
        </div>
      </div>
    </div>


  </nav>

  <br>
  <div class="container">

    <h4 style="color: white;"><br>
      <a class="btn btn-light" href="#" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdropp"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
          <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
        </svg> </a>
      <a class="btn btn-light" href="#" role="button" data-bs-toggle="modal" data-bs-target="#modaltarefa"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
          <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
        </svg></a>
      <!-- <a class="btn btn-light" href="#" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdroppp"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
          <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
          <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
        </svg></a> -->
      TAREFAS DO DIA
    </h4>
  </div>



  <div class="container"><br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">

      <?php
      foreach ($carrega_evento as $evento) {
        // print_r($evento); 
        if ($evento['ticket'] == 0) { ?>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> <?php print_r($evento['id']) ?> <?php print_r($evento['titulos']) ?></h5>
                <p class="card-text"><?php print_r($evento['descricao']) ?></p>
                <p class="card-text">Data <?php print_r($evento['data_inicio']) ?></p>
                <div style="display: flex;">
                  <form action="../processamento/processa_baixa_tarefa.php" method="post">
                    <button type="submit" class="btn btn-primary btn-sm" href="#" role="button" style="margin-right: 8px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                      </svg></button>
                    <input type="hidden" name="id" value="<?php print_r($evento['id']) ?>">
                  </form>
                  <form action="../processamento/processa_exclusao_tarefa.php" method="post">
                    <button type="subit" class="btn btn-danger btn-sm" href="#" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                      </svg></button>
                    <input type="hidden" name="id" value="<?php print_r($evento['id']) ?>">
                  </form>
                </div>
                <!-- <a class="btn btn-secondary btn-sm" href="#" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                  </svg></a> -->
              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> <?php print_r($evento['id']) ?> <?php print_r($evento['titulos']) ?></h5>
                <p class="card-text"><?php print_r($evento['descricao']) ?></p>
                <p class="card-text">Responsavel: <?php print_r($evento['ressponsavel']) ?></p>
                <p class="card-text">Data: <?php print_r($evento['data_inicio']) ?></p>
              </div>
            </div>
          </div>
        <?php }


        ?>


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
          <div class="row g-2">
            <div class="col-md">
              <div class="form-floating">
                <input type="date" class="form-control" id="floatingInputGrid">
                <label for="floatingInputGrid">Periodo Inicial</label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <input type="date" class="form-control" id="floatingInputGrid">
                <label for="floatingInputGrid">Periodo final</label>
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


  <!-- MODAL CALENDARIO -->

  <div class="modal fade" id="staticBackdroppp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="../calendario/ViewCalendario3.php" method="post">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">FILTRAR MES</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <br>


            <div class="row g-2">
              <div class="col-md">
                <div class="form-floating">
                  <select name="mes" class="form-select" id="floatingSelectGrid">
                    <?php
                    foreach ($carregar_meses as $carregar_meses) { ?>
                      <option value="<?php print_r($carregar_meses['id']) ?> - <?php print_r($carregar_meses['mes']) ?> "><?php print_r($carregar_meses['mes']) ?></option>
                    <?php }
                    ?>
                  </select>
                  <label for="floatingSelectGrid">MES</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <select name="ano" class="form-select" id="floatingSelectGrid">
                    <option>2023</option>
                  </select>
                  <label for="floatingSelectGrid">ANO</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-primary">CONFIRMAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- MODAL INSERIR TAREFA-->

  <div class="modal fade" id="modaltarefa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="../processamento/insere_tarefa.php" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">INSERIR TAREFA</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <br>
            <div class="row g-2">
              <div class="col-md">
                <div class="form-floating">
                  <div class="mb-3">
                    <input type="date" name="data_inicio" class="form-control" id="exampleFormControlInput1" required>
                  </div>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <div class="mb-3">
                    <input type="number" name="ticket" class="form-control" id="exampleFormControlInput1" placeholder="ticket">
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
                  <select name="tipo" class="form-select" id="floatingSelectGrid">
                    <?php

                    foreach ($tipo as $nivel) { ?>
                      <option value="<?php print_r($nivel['descricao']) ?>"><?php print_r($nivel['descricao']) ?></option>
                    <?php }
                    ?>
                  </select>
                  <label for="floatingSelectGrid">Tipo</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-primary">CONFIRMAR</button>
          </div>
        </div>
    </div>
    </form>
  </div>


  <div class="modal fade" id="modalNotificacao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Alertas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Estou ciente</button>
        </div>
      </div>
    </div>
  </div>



  <!-- MODAL SENHA DO DIA -->

  <div class="modal fade" id="senhaDia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="../processamento/insere_senha_dia.php" method="post">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">SENHA DO DIA</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <input type="text" class="form-control" name="senha_dia" required>
              <div id="emailHelp" class="form-text">INSIRA A SENHA DO DIA</div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-primary">CONFIRMAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <nav class="navbar fixed-bottom">
    <div class="container-fluid">
      <!-- <a class="nav justify-content-end" href="#">Fixed bottom</a> -->
    </div>
    <div class="position-relative">
      <div class="position-absolute bottom-0 end-0">

        <button type="button" class="btn btn-warning position-relative" data-bs-toggle="modal" data-bs-target="#modalNotificacao"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
          </svg><span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-secondary">+0 <span class="visually-hidden">unread messages</span></span>
        </button>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <!-- Tarefa inserida com sucesso -->

  <?php
  if (isset($_SESSION['valido'])) :


  ?>

    <script>
      Swal.fire({
        icon: 'success',
        title: 'Tarefa inserida com sucesso!',
        showConfirmButton: false,
        timer: 1500
      })
    </script>
  <?php
  endif;
  unset($_SESSION['valido']);

  ?>



  <!-- Exclusão efetuada com sucesso -->

  <?php
  if (isset($_SESSION['exclusao'])) :


  ?>

    <script>
      Swal.fire({
        icon: 'success',
        title: 'Exclusão efetuada com sucesso!',
        showConfirmButton: false,
        timer: 1500
      })
    </script>
  <?php
  endif;
  unset($_SESSION['exclusao']);

  ?>


  <!-- Tarefa finalizada com sucesso -->

  <?php
  if (isset($_SESSION['fechado'])) :


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
  unset($_SESSION['fechado']);

  ?>

  <!-- Tarefa finalizada com sucesso -->

  <?php
  if (isset($_SESSION['senha_dia'])) :


  ?>

    <script>
      Swal.fire({
        icon: 'success',
        title: 'Senha inserida com sucesso!',
        showConfirmButton: false,
        timer: 1500
      })
    </script>
  <?php
  endif;
  unset($_SESSION['senha_dia']);

  ?>

</body>

</html>