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
    <main>
        <h4>Coeficientes</h4>
        <form name="coeficientes" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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

              echo $r;
              $id = $_SESSION['id'];
              $con = mysqli_connect('localhost', 'root', '', 'usuarios') or die(mysqli_error('Não foi possível conectar ao banco de dados.'));
			        $q = mysqli_query($con, "INSERT INTO calculos(id_usuario, categoria, dado1, dado2, dado3, dado4, resultados) VALUES ('$id', 'Financeira', '$a', '$b', '$c', '$dir', '$r');");
	        } else {
	        	echo "Preencha os campos.";
	        }
        ?>
    </main>
    <br>
    <footer class="footer">
      <div class="container">
				<p class="text-muted">Copyright © 2017 Estaleiro Matemático. Todos os direitos reservados.</p>
      </div>
    </footer>
</body>
</html>