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
        <h1>MMC e MDC</h1>
        <p>Obtenha o MMC e o MDC entre dois números inteiros.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Saiba mais</button>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Ajuda</h4>
                </div>
                <div class="modal-body">
                    Para usar esta calculadora, digite dois números inteiros.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <main>
        <form name="coeficientes" action="mmc.php" method="post">
            <input type="number" class="form-control" name="termo_a" id="termo_a" placeholder="Número 1" required>
            <input type="number" class="form-control" name="termo_b" id="termo_b" placeholder="Número 2" required>
            <input type="submit" class="btn btn-default" value="Calcular">
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                function arredonda($num) {
                    return round($num, 12);
                }

                $a = $_POST['termo_a'];
                $b = $_POST['termo_b'];

                function mdc($a, $b) {
                    if ($a < 0) $a = -$a;
                    if ($b < 0) $b = -$b;
                    if ($a == 0 || $b == 0) return "Inexistente";
                    
                    $r = 0;
                    
                    while($b != 0){
                        $r = $a % $b;
                        $a = $b;
                        $b = $r;
                    }

                    return $a;
                }

                function mmc($a, $b) {
                    if (mdc($a, $b) == 0) return 0;

                    return ($a * $b) / mdc($a, $b);
                }

                $r = "MMC: " . mmc($a, $b) . " | MDC = " . mdc($a, $b);

                echo $r;
                $id = $_SESSION['id'];
                $con = mysqli_connect('localhost', 'root', '', 'usuarios') or die(mysqli_error('Não foi possível conectar ao banco de dados.'));
			    $q = mysqli_query($con, "INSERT INTO calculos(id_usuario, categoria, dado1, dado2, resultados) VALUES ('$id', 'MMC e MDC', '$a', '$b', '$r');");
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