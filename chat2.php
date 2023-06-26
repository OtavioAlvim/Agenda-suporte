<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Atendimento</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html,
        body {
            height: 100%;
        }

        .full-screen {
            width: 100vw;
            height: 91vh;
        }
    </style>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">

    <!-- Example Code -->

    <nav class="navbar bg-body-dark fixed-top">
        <div class="container-fluid"><br>
            <a class="navbar-brand" href="#"><strong>SENHA DO DIA - FE888454</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-menu-up" viewBox="0 0 16 16">
                    <path d="M7.646 15.854a.5.5 0 0 0 .708 0L10.207 14H14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3.793l1.853 1.854zM1 9V6h14v3H1zm14 1v2a1 1 0 0 1-1 1h-3.793a1 1 0 0 0-.707.293l-1.5 1.5-1.5-1.5A1 1 0 0 0 5.793 13H2a1 1 0 0 1-1-1v-2h14zm0-5H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v2zM2 11.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 0-1h-8a.5.5 0 0 0-.5.5zm0-4a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11a.5.5 0 0 0-.5.5zm0-4a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 0-1h-6a.5.5 0 0 0-.5.5z" />
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">CONTROLE DE IMPLANTACAO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">CALENDARIO</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">CHAT AVANTE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#ModalCriare">CHAT CRIARE</a>
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
                            <a class="nav-link active" aria-current="page" href="#">SAIR</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="ratio ratio-16x9" style="height: 900px;">
                <iframe src="https://app.octadesk.com/chat/163ec976-5c28-42bc-87d9-33e25f28afb8/opened?inbox=byAgent" title="YouTube video" allowfullscreen></iframe>
            </div> -->
            <div class="container-fluid p-0 full-screen bg-dark text-light">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://app.octadesk.com/chat/163ec976-5c28-42bc-87d9-33e25f28afb8/opened?inbox=byAgent" allowfullscreen style="width: 100vw; height: 91vh"></iframe>
                </div>
            </div>
        </div>
    </nav>

    <!-- <div class="container-fluid p-0 full-screen bg-dark text-light">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="https://app.octadesk.com/chat/163ec976-5c28-42bc-87d9-33e25f28afb8/opened?inbox=byAgent" allowfullscreen style="width: 100vw; height: 100vh"></iframe>
    </div>
  </div> -->


    <!-- Modal atendimento avante-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">buga-chat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe class="widget-frame md-fade-when-visible has-loaded md-fade-to-visible is-fullscreen" id="md-chat-iframe" src="https://avanteempresas.movidesk.com/ChatWidget/Landing/DF36CF3EA72C41B29D43EACCDBC06FF9" style="height: 440px; width: 470px;"></iframe>
                </div>

            </div>
        </div>
    </div>



    <!-- Modal atendimento criare-->
    <div class="modal fade" id="ModalCriare" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">CHICO ALI-CHAT - FE888454</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="IframeChatNovo" class="IframeChatNovo" src="https://criareinformatica.geiko.com.br/chat/02/index_siteOnFloat.asp?s=2&amp;PsiteOnFloat=s&amp;Pfone=s&amp;Ppro=s&amp;Pcor=0097df&amp;cdE=3655" marginheight="0" frameborder="0" marginwidth="0" border="0" style="height: 500px; width:480px; overflow: hidden;"></iframe>
                </div>

            </div>
        </div>
    </div>
</body>

</html>