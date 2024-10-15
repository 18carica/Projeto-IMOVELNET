<?php
    session_start();
    session_destroy();
    header('Location: http://localhost/Projeto-IMOVELNET/Sistema/index.php');
    exit;
?>