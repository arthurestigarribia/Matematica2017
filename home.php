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
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="bin/estaleiro.png" style="width: 100%; height: 500px; object-fit: cover; object-position: center; overflow:hidden;" alt="Estaleiro">
					<div class="carousel-caption">
						<h3>Estaleiro Matemático</h3>
						<p>Seja bem-vindo!</p>
						<a type="button" class="btn btn-primary" href="sobre.php">Conheça o projeto</a>
					</div>
				</div>
				<div class="item">
					<img src="bin/math.png" style="width: 100%; height: 500px; object-fit: cover; object-position: center; overflow:hidden;" alt="Matemática">
					<div class="carousel-caption">
						<h3>Calculadora de Equações</h3>
						<p>Resolva as principais equações do 1º e 2º graus.</p>
						<a type="button" class="btn btn-primary" href="equacoes.php">Calcular</a>
					</div>
				</div>
				<div class="item">
					<img src="bin/money.png" style="width: 100%; height: 500px; object-fit: cover; object-position: center; overflow:hidden;" alt="Dinheiro">
					<div class="carousel-caption">
						<h3>Calculadora de Matemática Financeira</h3>
						<p>Calcule o quanto você terá que pagar de juros.</p>
						<a type="button" class="btn btn-primary" href="financeira.php">Calcular</a>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	<div class="jumbotron" style="padding-left: 10px; padding-right: 10px; padding-top: 100px;">
        <h1>Bem-vindo</h1>
        <p>Bem-vindo ao Estaleiro Matemático!</p>
        <a type="button" class="btn btn-primary" href="sobre.php">Saiba mais</a>
	</div>
    <main style="padding-left: 10px; padding-right: 10px;">
    	<div class="row">
    		<div class="col-xs-6 col-md-4">
				<img class="img-rounded" src="bin/math.png" alt="Equações"  style="width: 400px; height: 400px; object-fit: cover; object-position: center; overflow:hidden;" >
			</div>
			<div class="col-xs-12 col-sm-6 col-md-8">
				<h1>Calculadoras</h1>
	    		<p>Confira as nossas diversas calculadoras!</p>
	    		<a type="button" class="btn btn-primary" href="calculadoras.php">Confira</a>
			</div>
		</div>
    </main>
</body>
</html>