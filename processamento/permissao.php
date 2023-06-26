<?php 
require_once '../login/verifica_login.php';

if($_SESSION['usergrupo'] == 'adm'){
    header('location: ../home/ViewHome.php');
}else if($_SESSION['usergrupo'] == 'analista'){
    header('location: ../implantacao/ViewImplantacao.php');
}else if ($_SESSION['usergrupo'] == 'comercial'){
    header('location: ../calendario/ViewCalendario2.php');
}else if($_SESSION['usergrupo'] == 'suporte'){
    header('location: ../chat/chat2.php');
}else {
    echo "usuario sem grupo definido!";
}
