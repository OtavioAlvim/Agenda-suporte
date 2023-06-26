<?php
require_once '\htdocs\calendario2\funcoes\carrega_tarefa.php';
require_once '\htdocs\calendario2\funcoes\funcao_gral.php';
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
  <link rel="stylesheet" href="../../src/css/style.css">
  <title>Pagina inicial</title>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">

  <nav class="navbar  fixed-top">
    <div class="container-fluid">
      <br>
      <!-- <a class="navbar-brand" href="#"><strong style="color: white; margin-top: 20px;font-size: 40px;">CONTROLE DE IMPLANTAÇÃO</strong></a> -->
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
              <a class="nav-link active" aria-current="page" href="../../views/implantacao/ViewImplantacao.php">IMPLANTAÇÕES EM ANDAMENTO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">FINALIZADAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../calendario/ViewCalendario2.php">CALENDARIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">CONFIGURACÕES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../../login/logout.php">SAIR</a>
            </li>
          </ul>
        </div>
      </div>
    </div>


  </nav>

  <div class="container"><a class="navbar-brand" href="#"><strong style="color: white; margin-top: 20px;font-size: 40px;">CONTROLE DE IMPLANTAÇÃO</strong></a><br>
    <div class="container">

      <h4 style="color: white;"><br>
        <a class="btn btn-light" href="#" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdropp"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
          </svg> </a>
        <a class="btn btn-light" href="#" role="button" data-bs-toggle="modal" data-bs-target="#modaltarefa"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
          </svg></a>
        <a class="btn btn-light" href="#" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdroppp"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
          </svg></a> TAREFAS DO DIA
      </h4>
    </div>



    <div class="container"><br>
      <div class="row row-cols-3 row-cols-md-4 g-4">

        <?php
        foreach ($carrega_evento as $evento) { ?>
          <div class="col">
            <div class="card">
              <!-- <img src="..." class="card-img-top" alt="..."> -->
              <div class="card-body">
                <h5 class="card-title"> <?php print_r($evento['id']) ?> <?php print_r($evento['titulos']) ?></h5>
                <p class="card-text"><?php print_r($evento['descricao']) ?></p>
                <p class="card-text">Data <?php print_r($evento['data_inicio']) ?></p>
                <a class="btn btn-primary btn-sm" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                  </svg></a>
                <a class="btn btn-danger btn-sm" href="#" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                  </svg></a>
                <a class="btn btn-secondary btn-sm" href="#" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                  </svg></a>
              </div>
            </div>
          </div>
        <?php }
        ?>
      </div>
    </div>






    <!-- MODAL DESTINADO A CONCLUSÃO -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">FINALIZAR</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>DESEJA FINALIZAR TAREFA?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
            <button type="button" class="btn btn-primary">FINALIZAR</button>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL DE CANCELAMENTO -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">CANCELAR</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>DESEJA CANCELAR TAREFA?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
            <button type="button" class="btn btn-primary">CONFIRMAR</button>
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
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">FILTRAR MES</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <br>


            <div class="row g-2">
              <div class="col-md">
                <div class="form-floating">
                  <select class="form-select" id="floatingSelectGrid">
                    <?php
                    foreach ($carregar_meses as $carregar_meses) { ?>
                      <option value="<?php print_r($carregar_meses['id']) ?>"><?php print_r($carregar_meses['mes']) ?></option>
                    <?php }
                    ?>
                  </select>
                  <label for="floatingSelectGrid">MES</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <select class="form-select" id="floatingSelectGrid">
                    <option value="1">2023</option>
                  </select>
                  <label for="floatingSelectGrid">ANO</label>
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


    <!-- MODAL INSERIR TAREFA-->

    <div class="modal fade" id="modaltarefa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="../../processamento/insere_tarefa.php" method="POST">
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
                      <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                      <input type="date" name="data_inicio" class="form-control" id="exampleFormControlInput1" required>
                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-floating">
                    <div class="mb-3">
                      <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                      <input type="number" name="ticket" class="form-control" id="exampleFormControlInput1" placeholder="ticket" value='0'>
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
                      <option value="MARCOS">MARCOS</option>
                      <option value="CAIO">CAIO</option>
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
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
              <button type="submit" class="btn btn-primary">CONFIRMAR</button>
            </div>
          </div>
      </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>