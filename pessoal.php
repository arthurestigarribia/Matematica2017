<?php
    session_start();
    if (!isset($_SESSION['logado'])) {
       header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Estaleiro Matemático</title>
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <link rel="stylesheet" href="src/bootstrap-3.3.7-dist/css/bootstrap.min.css" media="screen, projection">
    <link rel="stylesheet" href="src/estilo.css" media="screen, projection">
    <script type="text/javascript" src="src/jquery.js"></script>
    <script type="text/javascript" src="src/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</head>
<body>  
<header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>                           
          </button>
          <a class="navbar-brand" href="home.php">Estaleiro Matemático</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <li><a class="nav-link" href="home.php">Home</a></li>
              <li><a class="nav-link" href="calculadoras.php">Calculadoras</a></li>
              <li><a class="nav-link" href="sobre.php">Sobre</a></a></li>
              <li>
                <?php
                  if (isset($_SESSION['logado'])) {
                      echo "<a href='pessoal.php?id=" . $_SESSION['id'] . "'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> " . $_SESSION['nome'] . "</a>";
                  } else {
                      echo "<a href='login.php'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Entrar</a>";
                  }
                ?>
              </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
    <div class="jumbotron">
        <h1>Atualizar informações pessoais</h1>
        <p>Atualize seu cadastro e veja seu histórico de cálculos.</p>
        <a type="button" class="btn btn-primary" href="sair.php">Sair</a>
    </div>
        <?php
            echo '<main>
                <h4>Excluir conta</h4>
                <p>Exclui e encerra a sua conta. Essa ação não pode ser desfeita.</p>
                <a type="button" class="btn btn-primary" href="excluir.php?id=' . $_GET['id'] . '">Excluir</a>
                <br>
                <h4>Atualizar conta</h4>
                <p>Atualiza seus dados cadastrais da sua conta.</p>
                <a type="button" class="btn btn-primary" href="atualizar.php?id=' . $_GET['id'] . '">Atualizar</a>
                <br>
                <h4>Histórico</h4>
                <p>Confira seu histórico de cálculos.</p>
                <a type="button" class="btn btn-primary" href="historico.php?id=' . $_GET['id'] . '">Histórico</a>
            </main>';
        ?>
        <br>
    <footer class="footer">
      <div class="container">
				<p class="text-muted">Copyright © 2017 Estaleiro Matemático. Todos os direitos reservados.</p>
      </div>
    </footer>
</body>
</html>