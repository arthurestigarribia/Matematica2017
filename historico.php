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
                      echo "<a href='pessoal.php?id=" . $_SESSION['id'] . "'>" . $_SESSION['nome'] . "</a>";
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
        <h1>Histórico de Cálculo</h1>
        <p>Verifique seus últimos cálculos no site.</p>
        <a type="button" class="btn btn-primary" href="calculadoras.php">Calcule</a>
    </div>
        <main>
        <?php
            $connect = mysqli_connect('localhost', 'root', '', 'usuarios') or die(mysqli_error('Não foi possível conectar ao banco de dados.'));

			$dados = mysqli_query($connect, "SELECT * FROM calculos WHERE id_usuario = " . $_GET['id'] . " LIMIT 10");
			$linha = mysqli_fetch_assoc($dados);
			$total = mysqli_num_rows($dados);

			echo $total . " resultado(s).";

			$tabela = "<table class='table table-striped' id='table'><thead><tr><th>Categoria</th><th>Dados</th><th>Resultado</th></tr></thead>";

			if ($total != 0) {
				do {
					$tabela .= "<tr><td>" . $linha['categoria'] . "</td><td>" . $linha['dado1'] . ", " . $linha['dado2'] . ", " . $linha['dado3'] . ", " . $linha['dado4'] . "</td><td>" . $linha['resultados'] . "</td></tr>";
				} while ($linha = mysqli_fetch_assoc($dados));
			}

			$tabela .= "</table>";

			echo $tabela;
        ?>
        </main>
        <br>
		<footer class="footer">
      <div class="container">
        	Copyright © 2017 Estaleiro Matemático. Todos os direitos reservados.
      </div>
    </footer>
    </body>
</html>
