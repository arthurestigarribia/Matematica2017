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
                      echo "<a href='sair.php'>" . $_SESSION['nome'] . "</a>";
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
        <h1>Calculadoras</h1>
        <p>Bem-vindo ao Estaleiro Matemático! Aqui você confere calculadoras incríveis!</p>
        <a type="button" class="btn btn-primary" href="sobre.php">Saiba mais sobre o projeto</a>
    </div>
    <main>
        <h1>Todas as calculadoras</h1>
        <table class="table">
            <thead>
                <td>Calculadora</td>
                <td>Descrição</td>
                <td>Visitar</td>
            </thead>
            <tr>
                <td>Equações</td>
                <td>Calcule equações do 1º e 2º graus.</td>
                <td><a type="button" class="btn btn-primary" href="equacoes.php">Calcular</a></td>
            </tr>
            <tr>
                <td>Matemática Financeira</td>
                <td>Calcule o quanto você terá que pagar de juros.</td>
                <td><a type="button" class="btn btn-primary" href="financeira.php">Calcular</a></td>
            </tr>
            <tr>
                <td>Teorema de Pitágoras</td>
                <td>Calcule qualquer lado no triângulo retângulo.</td>
                <td><a type="button" class="btn btn-primary" href="pitagoras.php">Calcular</a></td>
            </tr>
            <tr>
                <td>Regra de Três</td>
                <td>Calcule qualquer proporção.</td>
                <td><a type="button" class="btn btn-primary" href="regra_tres.php">Calcular</a></td>
            </tr>
            <tr>
                <td>Progressões</td>
                <td>Calcule qualquer termo geral ou interpole em qualquer progressão.</td>
                <td><a type="button" class="btn btn-primary" href="progressoes.php">Calcular</a></td>
            </tr>
            <tr>
                <td>MMC e MDC</td>
                <td>Calcule qualquer MMC e MDC de dois números inteiros.</td>
                <td><a type="button" class="btn btn-primary" href="mmc.php">Calcular</a></td>
            </tr>
            <tr>
                <td>Conversor de Unidades</td>
                <td>Converta valores em uma unidade para outra.</td>
                <td><a type="button" class="btn btn-primary" href="conversor.php">Calcular</a></td>
            </tr>
        </table>
    </main>
    <br>
		<footer class="footer">
      <div class="container">
        	Copyright © 2017 Estaleiro Matemático. Todos os direitos reservados.
      </div>
    </footer>
</body>
</html>