<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Estaleiro Matemático</title>
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>  
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">Estaleiro Matemático</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
    	<li class="dropdown">
			<li><a href="home.php">Home</a></li>
	  		<li><a href="calculadoras.php">Calculadoras</a></li>
        	<li><a href="sobre.php">Sobre</a></a></li>
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
    <div class="jumbotron" style="padding-left: 10px; padding-right: 10px; padding-top: 100px;">
        <h1>Calculadoras</h1>
        <p>Bem-vindo ao Estaleiro Matemático! Aqui você confere calculadoras incríveis!</p>
        <a type="button" class="btn btn-primary" href="sobre.php">Saiba mais sobre o projeto</a>
    </div>
    
    <main style="padding-left: 10px; padding-right: 10px;">
        <h1>Todas as calculadoras</h1>
        <table class="table table-striped">
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
        </table>
    </main>
</body>
</html>