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
        <h1>Matemática Financeira</h1>
        <p>Evite dívidas! Descubra o quanto você tem que pagar de juros.</p>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Saiba mais</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ajuda</h4>
      </div>
      <div class="modal-body">
        Para usar esta calculadora, digite três números positivos (capital, taxa e tempo).

        Fórmula:
        Juros simples: M = C(1 + it)
        Juros compostos: M = C(1 + i)^t
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
        <form name="coeficientes" action="financeira.php" method="post">
            <input type="number" class="form-control" name="termo_a" id="termo_a" placeholder="Capital" min="0" required>
            <input type="number" class="form-control" name="termo_b" id="termo_b" placeholder="Taxa percentual" min="0" required>
            <input type="number" class="form-control" name="termo_c" id="termo_c" placeholder="Tempo" min="0" required>
            <select class="form-control" name="proporcao" id="proporcao">
                <option value="diretamente">Juros simples</option>
                <option value="inversamente">Juros compostos</option>
            </select>
            <input type="submit" class="form-control" placeholder="Calcular" id="save">
        </form>
        <h4>Resultado</h4>
        <?php
        	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	            function arredonda($numero){
	                return round((float)$numero * 100)/100;
	            }

	            $a = isset($_POST["termo_a"]) ? (float)$_POST["termo_a"] : 0.0;
	            $b = isset($_POST["termo_b"]) ? (float)$_POST["termo_b"] : 0.0;
	            $c = isset($_POST["termo_c"]) ? (float)$_POST["termo_c"] : 0.0;
	                    
	            $dir = isset($_POST["proporcao"]) ? $_POST["proporcao"] : "diretamente";

	            if($dir == "diretamente") {
	                echo "Raízes: " . arredonda($a * (1 + $b/100 * $c));
	            } else {
	                echo "Raízes: " . arredonda($a * (1 + $b/100) ** $c);
	            }
	        } else {
	        	echo "Preencha os campos.";
	        }
        ?>
    </main>
</body>
</html>