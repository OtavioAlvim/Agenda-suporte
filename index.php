<?php
session_start();
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/style.css">
    <script src="./src/js/sweetalert2.js"></script>
</head>

<body>


    <!-- <div class="d-flex justify-content-center"><h1>Agenda Suporte</h1> 

</div> -->


    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card text-center">
            <div class="card-body">
                <form action="./processamento/processa_login.php" method="post">
                    <div class="mb-3">
                        <h3>Login</h3>
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">senha</label>
                        <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <nav class="navbar fixed-bottom">
        <div class="container-fluid">
            <!-- <p style="color:  white;">&copy; 2023 Otavio, Inc. Todos os direitos reservados.</p> -->
            <p style="color:  white;">&copy; 2023 <img src="./src/img/poco.png" alt="" style="width: 50px;"> pocoto tecnology, Inc. Todos os direitos reservados.</p>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>



    <!-- FINALIZAÇÃO CONCLUIDA COM SUCESSO -->

    <?php
    if (isset($_SESSION['venda_finalizada_com_sucesso'])) :


    ?>

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Pedido finalizado com sucesso!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
    endif;
    unset($_SESSION['venda_finalizada_com_sucesso']);

    ?>

    <!-- ERRO AO FINALIZAR FINALIZAÇÃO, POIS NÃO EXISTE ITENS NA GRID -->
    <!-- <?php
            // if (isset($_SESSION['dados_invalido'])) :
            ?>

        <script>
            Swal.fire({
                icon: 'error',
                title: 'ERRO...',
                text: 'Dados de Login incorretos!',
                //   footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    <?php
            // endif;
            // unset($_SESSION['dados_invalido']);
    ?> -->


    <!-- Dados de Login incorretos! -->
    <?php
    if (isset($_SESSION['dados_invalido'])) :
    ?>

        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: 'Dados de Login incorretos!'
            })
        </script>
    <?php
    endif;
    unset($_SESSION['dados_invalido']);
    ?>

</body>


</html>