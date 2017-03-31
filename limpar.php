<?php
    session_start();

    function errodb($num) {
        echo "<script type='text/javascript'>alert('Não foi possível conectar ao banco de dados. Erro: " . $num . ".');</script>";
    }

    $id = $_GET['id'];

    $c = mysqli_connect('localhost', 'root', '', 'usuarios') or die(errodb(1));
    $q = mysqli_query($c, "DELETE FROM calculos WHERE id_usuario = " . $id . ";");

    if ($q) {
        echo "<div class='alert alert-success' role='alert'>Histórico limpado com sucesso.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Histórico não limpado.</div>";
    }
?>