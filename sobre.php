<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Estaleiro Matemático</title>
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <link rel="stylesheet" href="src/bootstrap.css" media="screen, projection">
    <link rel="stylesheet" href="src/estilo.css" media="screen, projection">
    <script type="text/javascript" src="src/jquery.js"></script>
    <script type="text/javascript" src="src/bootstrap.js"></script>
</head>
<body>  
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
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
                      echo "<a href='pessoal.php?id='" . $_SESSION['id'] . "'>" . $_SESSION['nome'] . "</a>";
                  } else {
                      echo "<a href='login.php'>Login</a>";
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
        <h1>Sobre o projeto</h1>
        <p>Bem-vindo ao Estaleiro Matemático. Confira mais informações sobre o projeto aqui.</p>
        <a type="button" class="btn btn-primary" href="http://riogrande.ifrs.edu.br/">Saiba mais</a>
    </div>
    
    <main>
        <strong>Orientadora:</strong> Raquel Barbosa<br>
        <strong>Editor e diagramador:</strong> Arthur Aguiar Estigarribia<br>
        <strong>Instituição:</strong> <a href="http://riogrande.ifrs.edu.br/">IFRS RIo Grande</a><br>
        <strong>Endereço:</strong> <address>Rua Alfredo Huch, 475, Salgado Filho, Rio Grande, RS, Brasil</address><br>
        <strong>Telefone:</strong> <tel>(53) 98122 5725</tel>
    </main>
    <br>
		<footer class="footer">
      <div class="container">
        	Copyright © 2017 Estaleiro Matemático. Todos os direitos reservados.
      </div>
    </footer>
</body>
</html>