<?php
    session_start();

    function errodb($num) {
        echo "<script type='text/javascript'>alert('Não foi possível conectar ao banco de dados. Erro: " . $num . ".');</script>";
    }

    $id = $_GET['id'];

    $c = mysqli_connect('localhost', 'root', '', 'usuarios') or die(errodb(1));
    $q = mysqli_query($c, "DELETE FROM usuarios WHERE id = " . $id . ";");

    if ($q) {
        session_destroy();

        echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso.</div>";
        mysqli_close($c);

    // header('Location: home.php');
    } else {
        echo "<div class='alert alert-danger' role='alert'>Registro não excluído.</div>";
    }
?>