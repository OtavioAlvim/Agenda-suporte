<?php
require_once 'C:\Users\tavin\OneDrive\htdocs\calendario2\funcoes\carrega_tarefa.php';
$dia = $_GET['dia'];
$mes = $_GET['mes'];
$ano = $_GET['ano'];
$carrega_evento = carrega_eventos_calendario($dia,$mes,$ano);

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/style.css">
  </head>
  <body>
  <br>
    <div class="container">
        <a class="btn btn-light" href="../calendario/ViewCalendario2.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg></a>
    </div>
    <div class="container">
        <br>
        <h4 style="color: white;"></a>TAREFAS DO DIA</h4>
    </div>
    <br>


    <div class="container"><br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">

      <?php
      foreach ($carrega_evento as $evento) {?>
        <!-- // print_r($evento);  -->

          <div class="col">
            <div class="card">
              <div class="card-body">
                <h7 class="card-title"><strong><?php print_r($evento['id']) ?> <?php print_r($evento['titulo']) ?></strong> </h7>
                <hr>
                <p class="card-text"><strong>Responsavel</strong> <?php print_r($evento['descricao']) ?></p>
                <p class="card-text"> <strong>Responsavel</strong> <?php print_r($evento['ressponsavel']) ?></p>
                <p class="card-text"><strong>Data</strong>  <?php print_r($evento['data_inicio']) ?></p>
                <p class="card-text"> <strong>Nivel</strong>  <?php print_r($evento['descricao_nivel']) ?></p>
              </div>
            </div>
      </div>
      <?php }
      ?>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>