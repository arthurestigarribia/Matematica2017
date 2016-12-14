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
        <h1>Teorema de Pitágoras</h1>
        <p>Determine qualquer lado em qualquer triângulo retângulo.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Saiba mais</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ajuda</h4>
      </div>
      <div class="modal-body">
        Para usar esta calculadora, digite dois números, umn em cada campo (a e b).
        Ao selecionar "Calcular", você obterá logo abaixo a solução da equação. Caso não encontre raízes, é porque a soma dos quadrados é negativa e não existe raiz quadrada de número negativo.
        Fórmula:
        Hipotenusa: x² = a² + b² (x = √(a² + b²)).
        Cateto: a² = x² + b² (x = √(a² - b²)).
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <main style="padding-left: 10px; padding-right: 10px; ">
            <h4>Coeficientes</h4>
            Os coeficientes são relativos à forma a² = x² + b² (cateto) ou x² = a² + b² (hipotenusa).
            <form name="coeficientes" action="pitagoras.php" method="post">
                <input type="number" class="form-control" name="termo_a" id="termo_a" placeholder="a" required>
                <input type="number" class="form-control" name="termo_b" id="termo_b" placeholder="b" required>
                <select class="form-control" name="proporcao" id="proporcao">
                    <option value="diretamente">Ceteto</option>
                    <option value="inversamente">Hipotenusa</option>
                </select>
                <input type="submit" class="form-control" placeholder="Calcular" id="save">
            </form>
            <h4>Resultado</h4>
            Raízes: <?php
            	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    function arredonda($numero){
                        return round((float)$numero * 1000000000)/1000000000;
                    }

                    $a = (float)$_POST["termo_a"];
                    $b = (float)$_POST["termo_b"];
                    
                    $dir = $_POST["proporcao"];

                    if($dir == "diretamente") {
                        if (($a * $a - $b * $b) < 0) echo "Não existem raízes reais.";
                        else echo arredonda(sqrt($a * $a - $b * $b));
                    } else {
                        if (($a * $a + $b * $b) < 0) echo "Não existem raízes reais.";
                        else echo arredonda(sqrt($a * $a + $b * $b));
                    }
                } else {
                	echo "Preencha os campos.";
                }
            ?>
        </main>
</body>
</html>
