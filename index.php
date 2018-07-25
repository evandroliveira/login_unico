<?php
session_start();
require 'config.php';

if(empty($_SESSION['lg'])) {
    header("Location: login.php");
    exit;
} else {
    $id = $_SESSION['lg'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $sql = "SELECT * FROM usuarios WHERE id = :id AND ip = :ip";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->bindValue(":ip", $ip);
    $sql->execute();

    if($sql->rowCount() == 0) {
        header("Location: login.php");
        exit;
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acompanhamento</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/site.css">

    <link rel="stylesheet" href="css/progress-tracker.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cutive+Mono|Lato:300,400">
</head>

<body>

<!-- <header class="header">
</header> -->
<div class="demo" style="text-align: center;">
    <h3>Acompanhamento do processo</h3>

    <ul class="progress-tracker progress-tracker--text progress-tracker--center">
        <li class="progress-step is-complete">
            <span class="progress-marker"><i class="fa fa-hourglass-end"></i></span>
            <span class="progress-text">
              <h4 class="progress-title">Fase 1</h4>
              Aguardando documentos
            </span>
        </li>

        <li class="progress-step is-complete">
            <span class="progress-marker"><i class="fa fa-file"></i></span>
            <span class="progress-text">
              <h4 class="progress-title">Fase 2</h4>
              Documentos Recebidos / Documentos incompletos
            </span>
        </li>

        <li class="progress-step is-complete">
            <span class="progress-marker"><i class="fa fa-file-text"></i></span>
            <span class="progress-text">
              <h4 class="progress-title">Fase 3</h4>
              Elaboração de minuta
            </span>
        </li>

        <li class="progress-step is-active">
            <span class="progress-marker"><i class="fa fa-registered"></i></span>
            <span class="progress-text">
              <h4 class="progress-title">Fase 4</h4>
              Entrada no cartório
            </span>
        </li>

        <li class="progress-step">
            <span class="progress-marker"><i class="fa fa-check-circle"></i></span>
            <span class="progress-text">
              <h4 class="progress-title">Fase 5</h4>
              Emitida certidão lavratura de divórcio
            </span>
        </li>

        <li class="progress-step">
            <span class="progress-marker"><i class="fa fa-truck"></i></span>
            <span class="progress-text">
              <h4 class="progress-title">Fase 6</h4>
              Postada certidão nos correios
            </span>
        </li>
    </ul>
</div>
<a href="sair.php">Sair</a>
<!-- <footer class="footer">

</footer> -->

</body>
</html>
