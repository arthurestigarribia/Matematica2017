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
        <h1>Progressões</h1>
        <p>Determine qualquer termo em qualquer progressão.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Saiba mais</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ajuda</h4>
      </div>
      <div class="modal-body">
        Para usar esta calculadora, digite três números, conforme o indicado. O termo geral calcula, em função do primeiro termo, da posição n e da razão, o enésimo termo da progressão. Já a interpolação insere n termos (meios de interpolação) entre o primeiro e o enésimo termo.
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
            <form name="coeficientes" action="progressoes.php" method="post">
                <input type="number" class="form-control" name="termo_a" id="termo_a" placeholder="Primeiro termo" required>
                <input type="number" class="form-control" name="termo_b" id="termo_b" placeholder="Enésimo termo ou número n" required>
                <input type="number" class="form-control" name="termo_c" id="termo_c" placeholder="Razão ou meios de interpolação" required>
                <select class="form-control" name="tipo" id="tipo">
                    <option value="tg_pa">Termo geral - Progressão Aritmética</option>
                    <option value="tg_pg">Termo geral - Progressão Geométrica</option>
                    <option value="i_pa">Interpolação - Progressão Aritmética</option>
                    <option value="i_pg">Interpolação - Progressão Geométrica</option>
                </select>
                <input type="submit" class="form-control" placeholder="Calcular" id="save">
            </form>
            <h4>Resultado</h4>
            <?php
            	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    function arredonda($num) {
                        return round($num, 12);
                    }

                    $a = (float)$_POST["termo_a"];
                    $b = (float)$_POST["termo_b"];
                    $c = (float)$_POST["termo_c"];
                    
                    $tipo = $_POST["tipo"];

                    $resultado = $a;

                    switch($tipo) {
                        case "tg_pa":
                            for ($i = 1; $i < $b; $i++) {
                                $resultado = arredonda($resultado + $c);
                            }

                            echo $resultado;
                        break;

                        case "tg_pg":
                            for ($i = 1; $i < $b; $i++) {
                                $resultado = arredonda($resultado * $c);
                            }

                            echo $resultado;
                        break;

                        case "i_pa":
                            $termosCentrais = array();
                            $termosCentrais[0] = $a;
                            $termosCentrais[$c] = $b;
                            
                            $razao = arredonda(($b - $a)/($c + 1));

                            for ($i = 1; $i <= $c; $i++) {
                                $termosCentrais[$i] = arredonda($termosCentrais[$i - 1] + $razao);
                            }

                            $resultado = "[";

                            for ($i = 0; $i < count($termosCentrais); $i++) {
                                $resultado = $resultado . "" . $termosCentrais[$i] . ", ";
                            }

                            $resultado = $resultado . "" . $b . "]";

                            echo $resultado;
                        break;

                        case "i_pg":
                            $termosCentrais = array();
                            $termosCentrais[0] = $a;
                            $termosCentrais[$c] = $b;
                            
                            $razao = arredonda(pow(($b/$a), 1/($c + 1)));

                            for ($i = 1; $i <= $c; $i++) {
                                $termosCentrais[$i] = arredonda($termosCentrais[$i - 1] * $razao);
                            }

                            $resultado = "[";

                            for ($i = 0; $i < count($termosCentrais); $i++) {
                                $resultado = $resultado . "" . $termosCentrais[$i] . ", ";
                            }

                            $resultado = $resultado . "" . $b . "]";

                            echo $resultado;
                        break;
                    }

                     echo $r;
                    $id = $_SESSION['id'];
                    $con = mysqli_connect('localhost', 'root', '', 'usuarios') or die(mysqli_error('Não foi possível conectar ao banco de dados.'));
			        $q = mysqli_query($con, "INSERT INTO calculos(id_usuario, categoria, dado1, dado2, dado3, dado4, resultados) VALUES ('$id', 'Progressões', '$a', '$b', '$c', '$tipo', '$r');");
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