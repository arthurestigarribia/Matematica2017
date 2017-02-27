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
        Para usar esta calculadora, digite dois números, um em cada campo (a e b).
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
    <main>
            <h4>Coeficientes</h4>
            Os coeficientes são relativos à forma a² = x² + b² (cateto) ou x² = a² + b² (hipotenusa).
            <form name="coeficientes" action="pitagoras.php" method="post">
                <input type="number" class="form-control" name="termo_a" id="termo_a" placeholder="a" required>
                <input type="number" class="form-control" name="termo_b" id="termo_b" placeholder="b" required>
                <select class="form-control" name="proporcao" id="proporcao">
                    <option value="diretamente">Cateto</option>
                    <option value="inversamente">Hipotenusa</option>
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
                    
                    $dir = $_POST["proporcao"];
                    $r = "";

                    if($dir == "diretamente") {
                        if (($a * $a - $b * $b) < 0) echo "Não existem raízes reais.";
                        else $r = "Raízes: " . arredonda(sqrt($a * $a - $b * $b));
                    } else {
                        if (($a * $a + $b * $b) < 0) echo "Não existem raízes reais.";
                        else $r = "Raízes: " . arredonda(sqrt($a * $a + $b * $b));
                    }

                    echo $r;
                    $id = $_SESSION['id'];
                    $con = mysqli_connect('localhost', 'root', '', 'usuarios') or die(mysqli_error('Não foi possível conectar ao banco de dados.'));
			              $q = mysqli_query($con, "INSERT INTO calculos(id_usuario, categoria, dado1, dado2, dado3, resultados) VALUES ('$id', 'Pitágoras', '$a', '$b', '$tipo', '$r');");
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