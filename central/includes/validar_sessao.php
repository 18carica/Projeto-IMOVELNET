<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SESSION['nome'] != null){
    $restaSessao = $_SESSION['expire'] - strtotime('now');
    $restaSessao . '<br>'; 
    $_SESSION['expire'] . '<br>';
    strtotime('now');


    if ($restaSessao < 1) {
        session_destroy();
        header('Location: http://localhost/Projeto-IMOVELNET/Sistema/index.php');
        exit;
    }  
}
else{
    header('Location: http://localhost/Projeto-IMOVELNET/Sistema/index.php');
    exit;
}
?>