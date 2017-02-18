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
        <h1>Regra de Três</h1>
        <p>Resolva qualquer regra de três com grandezas diretamente ou inversamente proporcionais.</p>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Saiba mais</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ajuda</h4>
      </div>
      <div class="modal-body">
        Para usar esta calculadora, digite três números, umn em cada campo (a, b e c) e o modo de proporção (diretamente ou ionversamente proporcional).
        Se está no primeiro modo, b não pode ser nulo, porque haveria divisão por zero. Se está no segundo modo, a não pode ser nulo, porque haveria divisão por zero.
        Ao selecionar "Calcular", você obterá logo abaixo a solução da equação.
        Fórmula: 
        Diretamente proporcional: a/b = c/x ou x = (b · c)/a.
        Inversamente proporcional: a/b = x/c ou x = (a · c)/b.
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
            Os coeficientes são relativos à forma a/b = c/x.
            <form name="coeficientes" action="regra_tres.php" method="post">
                <input type="number" class="form-control" name="termo_a" id="termo_a" placeholder="a = Numerador da primeira fração" required>
                <input type="number" class="form-control" name="termo_b" id="termo_b" placeholder="b = Denominador da primeira fração" required>
                <input type="number" class="form-control" name="termo_c" id="termo_c" placeholder="c = Numerador da segunda fração" required>
                <select class="form-control" name="proporcao" id="proporcao">
                    <option value="diretamente">Diretamente proporcional</option>
                    <option value="inversamente">Inversamente proporcional</option>
                </select>
                <input type="submit" class="form-control" placeholder="Calcular" id="save">
            </form>
            <h4>Resultado</h4>
            <?php
            		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    					        function arredonda($numero){
	                        return round((float)$numero * 1000000000)/1000000000;
	                    }

	                    $a = (float)$_POST["termo_a"];
	                    $b = (float)$_POST["termo_b"];
	                    $c = (float)$_POST["termo_c"];
	                    
	                    $dir = $_POST["proporcao"];

	                    if($dir == "diretamente") {
	                        if ($a == 0) echo "O termo a não pode ser nulo.";
	                        else echo "Raízes: " . ($b * $c)/$a;
	                    } else {
	                        if ($b == 0) echo "O termo b não pode ser nulo.";
	                        else echo "Raízes: " . ($a * $c)/$b;
	                    }
					} else {
						echo "Preencha os campos";
					}
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