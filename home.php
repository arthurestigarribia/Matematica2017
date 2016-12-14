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
    		<li><a href="home.php">Home</a></li>
        	<li><a href="regra_tres.php">Regra de Três</a></li>
        	<li><a href="calc_equacoes.php">Calculadora de Equações</a></li>
	  		<li><a href="pitagoras.php">Teorema de Pitágoras</a></li>
	  		<li><a href="financeira.php">Matemática Financeira</a></li>
        	<li><a href="sobre.php">Sobre</a></a></li>
      </ul>
    </div>
  </div>
</nav>    
    <div class="jumbotron" style="padding-left: 10px; padding-right: 10px; padding-top: 100px;">
        <h1>Home</h1>
        <p>Bem-vindo ao Estaleiro Matemático.</p>
        <a type="button" class="btn btn-primary" href="sobre.php">Saiba mais</a>
    </div>
    
    <main style="padding-left: 10px; padding-right: 10px;">
        <div class="row">
            <div class="col-md-4">
                <h2>Equações</h2>
                Calcule equações do 1º e 2º graus.<br>
                <a type="button" class="btn btn-primary" href="calc_equacoes.php">Calcular</a>
            </div>
            <div class="col-md-4">
                <h2>Regra de Três</h2>
                Calcule regras de três em proporção direta e inversa.<br>
                <a type="button" class="btn btn-primary" href="regra_tres.php">Calcular</a>
            </div>
            <div class="col-md-4">
                <h2>Teorema de Pitágoras</h2>
                Calcule os lados do seu triângulo retângulo.<br>
                <a type="button" class="btn btn-primary" href="pitagoras.php">Calcular</a>
            </div>
        </div>
    </main>
</body>
</html>
