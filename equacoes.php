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
        <h1>Calculadora de Equações</h1>
        <p>Resolva as principais equações do 1º e 2º graus.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Saiba mais</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ajuda</h4>
      </div>
      <div class="modal-body">
        Para usar esta calculadora, digite três números, umn em cada campo (a, b e c), sendo que a e b não podem ser nulos ao mesmo tempo.
        Ao selecionar "Calcular", você obterá logo abaixo a solução da equação.
        Fórmula: 
        Se a = 0: equação do 1º grau (bx + c = 0): x = -c/b.
        Caso contrário: equação do 2º grau (ax² + bx + c = 0): 2ax = -b ± √(b² - 4ac).
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
            Os coeficientes são relativos à forma ax² + bx + c = 0.
            <form name="coeficientes" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="number" class="form-control" name="termo_a" id="termo_a" placeholder="a = Coeficiente do 2º grau" required>
                <input type="number" class="form-control" name="termo_b" id="termo_b" placeholder="b = Coeficiente do 1º grau" required>
                <input type="number" class="form-control" name="termo_c" id="termo_c" placeholder="c = Coeficiente independente" required>
                <input type="submit" class="form-control" placeholder="Calcular" value="Calcular" id="save">
            </form>
            <h4>Resultado</h4>
            <?php
           		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    function arredonda($numero){
                        return round((float)$numero * 1000000000)/1000000000;
                    }

                    $a = 0;
                    $b = 0;
                    $c = 0;

                    $a = isset($_POST["termo_a"]) ? (float)$_POST["termo_a"] : 0.0;
                    $b = isset($_POST["termo_b"]) ? (float)$_POST["termo_b"] : 0.0;
                    $c = isset($_POST["termo_c"]) ? (float)$_POST["termo_c"] : 0.0;

                    $str = "";

                    if ($a > 0) {
                      if ($a == 1) $str .= "x²";
                      else $str .= $a . "x²";
                    } elseif ($a < 0) {
                      if ($a == 1) $str .= "- x²";
                      else $str .= "-" . -$a . "x²";
                    } else {

                    }

                    if ($b > 0) {
                      if ($b == 1) $str .= " + x";
                      else $str .= " + " . $b . "x";
                    } elseif ($b < 0) {
                      if ($b == 1) $str .= " - x";
                      else $str .= " - " . -$b . "x";
                    } else {
                      
                    }

                    if ($c > 0) {
                      $str .= " + " . $c . "";
                    } elseif ($c < 0) {
                      $str .= " - " . -$c . "";
                    } else {
                      
                    }

                    $str .= " = 0";

                    echo $str . "<br>";
                

                    $r = "";

                    if($a == 0) {
                            if ($b == 0) {
                                    $r = "Erro: o termo de primeiro e segundo grau não podem ser nulos simultaneamente.";
                            } else {
                                    $r = "Raízes: " . arredonda(-$c/$b);
                            }
                    } else {
                            $delta = $b * $b - 4 * $a * $c;

                            if ($delta < 0) {
                                   $r = "Não existem raízes reais.";
                            } else {
                                    $x1 = (-$b + sqrt($delta))/(2 * $a);
                                    $x2 = (-$b - sqrt($delta))/(2 * $a);

                                    $r = "Raízes: " . arredonda($x1) . " e " . arredonda($x2);
                            }
                    }

                    echo $r;
                    $id = $_SESSION['id'];
                    $con = mysqli_connect('localhost', 'root', '', 'usuarios') or die(mysqli_error('Não foi possível conectar ao banco de dados.'));
			              $q = mysqli_query($con, "INSERT INTO calculos(id_usuario, categoria, dado1, dado2, dado3, resultados) VALUES (" . $id . ", 'Equações', '" . $a . "', '" . $b . "', '" . $c . "', '" . $r . "');");
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