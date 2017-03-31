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
        <h1>Conversor de Unidades</h1>
        <p>Descubra quanto vale cada unidade.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Saiba mais</button>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Ajuda</h4>
                    </div>
                    <div class="modal-body">
                        Para usar esta calculadora, digite um número e selecione a grandeza e as unidades de e para.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main>
        <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <select class="form-control" id="grandeza" name="grandeza">
                    <option value="a0">Selecione...</option>
                    <option value="a1">Comprimento</option>
                    <option value="a2">Área</option>
                    <option value="a3">Volume</option>
                    <option value="a4">Temperatura</option>
                    <option value="a5">Velocidade</option>
                    <option value="a6">Massa</option>
                    <option value="a7">Tempo</option>
                    <option value="a8">Ângulo</option>
                </select>
                <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor">
                <select class="form-control" id="unidadeDe" name="unidadeDe">
                </select>
                <script type="text/javascript">
                $('#grandeza').click(function(){
                    function removeAll(combo) {
                        while (combo.length) {
                            combo.remove(0);
                        }
                    }

                    function criaOpcao (combo, text){
                        var opt = document.createElement("option");
                        opt.value = text;
                        opt.text = text;
                        combo.add(opt, combo.options[combo.length]);
                    }
                    
                    var combo = document.getElementById("unidadeDe");

                    switch ($('#grandeza').val()) {
                        case 'a1':
                            removeAll(combo);

                            criaOpcao(combo, 'metro');
                            criaOpcao(combo, 'quilômetro');
                            criaOpcao(combo, 'centímetro');
                            criaOpcao(combo, 'milímetro');
                            criaOpcao(combo, 'milha');                           
                            criaOpcao(combo, 'jarda');
                            criaOpcao(combo, 'pé');
                            criaOpcao(combo, 'polegada');
                        break;

                        case 'a2':
                            removeAll(combo);

                            criaOpcao(combo, 'metro quadrado');
                            criaOpcao(combo, 'quilômetro quadrado');
                            criaOpcao(combo, 'centímetro quadrado');
                            criaOpcao(combo, 'milímetro quadrado');
                            criaOpcao(combo, 'milha quadrada');                           
                            criaOpcao(combo, 'jarda quadrada');
                            criaOpcao(combo, 'pé quadrado');
                            criaOpcao(combo, 'polegada quadrada');
                            criaOpcao(combo, 'hectare');
                        break;

                        case 'a3':
                            removeAll(combo);
                            
                            criaOpcao(combo, 'metro cúbico');
                            criaOpcao(combo, 'quilômetro cúbico');
                            criaOpcao(combo, 'centímetro cúbico');
                            criaOpcao(combo, 'milímetro cúbico');
                            criaOpcao(combo, 'milha cúbica');                           
                            criaOpcao(combo, 'jarda cúbica');
                            criaOpcao(combo, 'pé cúbico');
                            criaOpcao(combo, 'polegada cúbica');
                            criaOpcao(combo, 'litro');
                            criaOpcao(combo, 'mililitro');
                            criaOpcao(combo, 'galão');
                        break;

                        case 'a4':
                            removeAll(combo);

                            criaOpcao(combo, 'celsius');
                            criaOpcao(combo, 'fahrenheit');
                            criaOpcao(combo, 'kelvin');
                        break;

                        case 'a5':
                            removeAll(combo);

                            criaOpcao(combo, 'quilômetro por hora');
                            criaOpcao(combo, 'metro por segundo');
                            criaOpcao(combo, 'centímetro por segundo');
                            criaOpcao(combo, 'milha por hora');          
                            criaOpcao(combo, 'pé por segundo');
                        break;

                        case 'a6':
                            removeAll(combo);

                            criaOpcao(combo, 'tonelada');     
                            criaOpcao(combo, 'quilograma');
                            criaOpcao(combo, 'grama');
                            criaOpcao(combo, 'miligrama');     
                            criaOpcao(combo, 'onça');
                            criaOpcao(combo, 'libra');
                            criaOpcao(combo, 'pedra');
                            criaOpcao(combo, 'quilate');                            
                        break;

                        case 'a7':
                            removeAll(combo);

                            criaOpcao(combo, 'semana');
                            criaOpcao(combo, 'dia');
                            criaOpcao(combo, 'hora');
                            criaOpcao(combo, 'minuto');          
                            criaOpcao(combo, 'segundo');                         
                        break;

                        case 'a8':
                            removeAll(combo);

                            criaOpcao(combo, 'grau');
                            criaOpcao(combo, 'grado');
                            criaOpcao(combo, 'radiano');                       
                        break;
                    }
                });
                </script>
                <select class="form-control" id="unidadePara" name="unidadePara">
                </select>
                <script type="text/javascript">
                $('#grandeza').click(function(){
                    function removeAll(combo) {
                        while (combo.length) {
                            combo.remove(0);
                        }
                    }

                    function criaOpcao (combo, text){
                        var opt = document.createElement("option");
                        opt.value = text;
                        opt.text = text;
                        combo.add(opt, combo.options[combo.length]);
                    }
                    
                    var combo = document.getElementById("unidadePara");

                    switch ($('#grandeza').val()) {
                        case 'a1':
                            removeAll(combo);

                            criaOpcao(combo, 'metro');
                            criaOpcao(combo, 'quilômetro');
                            criaOpcao(combo, 'centímetro');
                            criaOpcao(combo, 'milímetro');
                            criaOpcao(combo, 'milha');                           
                            criaOpcao(combo, 'jarda');
                            criaOpcao(combo, 'pé');
                            criaOpcao(combo, 'polegada');
                        break;

                        case 'a2':
                            removeAll(combo);

                            criaOpcao(combo, 'metro quadrado');
                            criaOpcao(combo, 'quilômetro quadrado');
                            criaOpcao(combo, 'centímetro quadrado');
                            criaOpcao(combo, 'milímetro quadrado');
                            criaOpcao(combo, 'milha quadrada');                           
                            criaOpcao(combo, 'jarda quadrada');
                            criaOpcao(combo, 'pé quadrado');
                            criaOpcao(combo, 'polegada quadrada');
                            criaOpcao(combo, 'hectare');
                        break;

                        case 'a3':
                            removeAll(combo);
                            
                            criaOpcao(combo, 'metro cúbico');
                            criaOpcao(combo, 'quilômetro cúbico');
                            criaOpcao(combo, 'centímetro cúbico');
                            criaOpcao(combo, 'milímetro cúbico');
                            criaOpcao(combo, 'milha cúbica');                           
                            criaOpcao(combo, 'jarda cúbica');
                            criaOpcao(combo, 'pé cúbico');
                            criaOpcao(combo, 'polegada cúbica');
                            criaOpcao(combo, 'litro');
                            criaOpcao(combo, 'mililitro');
                            criaOpcao(combo, 'galão');
                        break;

                        case 'a4':
                            removeAll(combo);

                            criaOpcao(combo, 'celsius');
                            criaOpcao(combo, 'fahrenheit');
                            criaOpcao(combo, 'kelvin');
                        break;

                        case 'a5':
                            removeAll(combo);

                            criaOpcao(combo, 'quilômetro por hora');
                            criaOpcao(combo, 'metro por segundo');
                            criaOpcao(combo, 'centímetro por segundo');
                            criaOpcao(combo, 'milha por hora');          
                            criaOpcao(combo, 'pé por segundo');
                        break;

                        case 'a6':
                            removeAll(combo);

                            criaOpcao(combo, 'tonelada');     
                            criaOpcao(combo, 'quilograma');
                            criaOpcao(combo, 'grama');
                            criaOpcao(combo, 'miligrama');     
                            criaOpcao(combo, 'onça');
                            criaOpcao(combo, 'libra');
                            criaOpcao(combo, 'pedra');
                            criaOpcao(combo, 'quilate');                            
                        break;

                        case 'a7':
                            removeAll(combo);

                            criaOpcao(combo, 'semana');
                            criaOpcao(combo, 'dia');
                            criaOpcao(combo, 'hora');
                            criaOpcao(combo, 'minuto');          
                            criaOpcao(combo, 'segundo');                         
                        break;

                        case 'a8':
                            removeAll(combo);

                            criaOpcao(combo, 'grau');
                            criaOpcao(combo, 'grado');
                            criaOpcao(combo, 'radiano');                       
                        break;
                    }
                });
                </script>
                <input type="submit" class="btn btn-primary" value="Converter">
            </div>
        </form>
        <h3>Resultado</h3>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	            function arredonda($numero){
	                return round((float)$numero * 10000000000)/10000000000;
	            }

                function comprimento($v, $de, $para) {
                    $v1 = 0.0;

                    switch ($de) {
                        case "metro": $v1 = arredonda($v); break;
                        case "quilômetro": $v1 = arredonda($v * 1000); break;
                        case "centímetro": $v1 = arredonda($v * 0.01); break;
                        case "milímetro": $v1 = arredonda($v * 0.001); break;
                        case "milha": $v1 = arredonda($v * 1609.344); break;
                        case "jarda": $v1 = arredonda($v * 0.9144); break;
                        case "pé": $v1 = arredonda($v * 0.3048); break;
                        case "polegada": $v1 = arredonda($v * 0.0254); break;
                    }

                    switch ($para) {
                        case "metro": return arredonda($v1); break;
                        case "quilômetro": return arredonda($v1 / 1000); break;
                        case "centímetro": return arredonda($v1 / 0.01); break;
                        case "milímetro": return arredonda($v1 / 0.001); break;
                        case "milha": return arredonda($v1 / 1609.344); break;
                        case "jarda": return arredonda($v1 / 0.9144); break;
                        case "pé": return arredonda($v1 / 0.3048); break;
                        case "polegada": return arredonda($v1 / 0.0254); break;
                    }

                    return $v1;
                }
                
                function area($v, $de, $para) {
                    $v1 = 0.0;

                    switch ($de) {
                        case "metro quadrado": $v1 = arredonda($v); break;
                        case "quilômetro quadrado": $v1 = arredonda($v * 1000 * 1000); break;
                        case "centímetro quadrado": $v1 = arredonda($v * 0.01 * 0.01); break;
                        case "milímetro quadrado": $v1 = arredonda($v * 0.001 * 0.001); break;
                        case "milha quadrada": $v1 = arredonda($v * 1609.344 * 1609.344); break;
                        case "jarda quadrada": $v1 = arredonda($v * 0.9144 * 0.9144); break;
                        case "pé quadrado": $v1 = arredonda($v * 0.3048 * 0.3048); break;
                        case "polegada quadrada": $v1 = arredonda($v * 0.0254 * 0.0254); break;
                        case "hectare": $v1 = arredonda($v * 10000); break;
                    }

                    switch ($para) {
                        case "metro quadrado": return arredonda($v1); break;
                        case "quilômetro quadrado": return arredonda($v1 / 1000 / 1000); break;
                        case "centímetro quadrado": return arredonda($v1 / 0.01 / 0.01); break;
                        case "milímetro quadrado": return arredonda($v1 / 0.001 / 0.001); break;
                        case "milha quadrada": return arredonda($v1 / 1609.344 / 1609.344); break;
                        case "jarda quadrada": return arredonda($v1 / 0.9144 / 0.9144); break;
                        case "pé quadrado": return arredonda($v1 / 0.3048 / 0.3048); break;
                        case "polegada quadrada": return arredonda($v1 / 0.0254 / 0.0254); break;
                        case "hectare": return arredonda($v1 / 10000); break;
                    }

                    return $v1;
                }

                function volume($v, $de, $para) {
                    $v1 = 0.0;

                    switch ($de) {
                        case "metro cúbico": $v1 = arredonda($v); break;
                        case "quilômetro cúbico": $v1 = arredonda($v * 1000 * 1000 * 1000); break;
                        case "centímetro cúbico": $v1 = arredonda($v * 0.01 * 0.01 * 0.01); break;
                        case "milímetro cúbico": $v1 = arredonda($v * 0.001 * 0.001 * 0.001); break;
                        case "milha cúbica": $v1 = arredonda($v * 1609.344 * 1609.344 * 1609.344); break;
                        case "jarda cúbica": $v1 = arredonda($v * 0.9144 * 0.9144 * 0.9144); break;
                        case "pé cúbico": $v1 = arredonda($v * 0.3048 * 0.3048 * 0.3048); break;
                        case "polegada cúbica": $v1 = arredonda($v * 0.0254 * 0.0254 * 0.0254); break;
                        case "litro": $v1 = arredonda($v * 0.001); break;
                        case "mililitro": $v1 = arredonda($v * 0.000001); break;
                        case "galão": $v1 = arredonda($v * 0.003785); break;
                    }

                    switch ($para) {
                        case "metro cúbico": return arredonda($v1); break;
                        case "quilômetro cúbico": return arredonda($v1 / 1000 / 1000 / 1000); break;
                        case "centímetro cúbico": return arredonda($v1 / 0.01 / 0.01 / 0.01); break;
                        case "milímetro cúbico": return arredonda($v1 / 0.001 / 0.001 / 0.001); break;
                        case "milha cúbica": return arredonda($v1 / 1609.344 / 1609.344 / 1609.344); break;
                        case "jarda cúbica": return arredonda($v1 / 91.44 / 91.44 / 91.44); break;
                        case "pé cúbico": return arredonda($v1 / 30.48 / 30.48 / 30.48); break;
                        case "polegada cúbica": return arredonda($v1 / 2.54 / 2.54 / 2.54); break;
                        case "litro": return arredonda($v1 / 0.001); break;
                        case "mililitro": return arredonda($v1 / 0.000001); break;
                        case "galão": return arredonda($v1 / 0.003785); break;
                    }

                    return $v1;
                }

                function temperatura($v, $de, $para) {
                    $v1 = 0.0;

                    switch ($de) {
                        case "celsius": $v1 = arredonda($v); break;
                        case "fahrenheit": $v1 = arredonda($v * 5/9 - 32); break;
                        case "kelvin": $v1 = arredonda($v - 273); break;
                    }

                    switch ($para) {
                        case "celsius": return arredonda($v1); break;
                        case "fahrenheit": return arredonda($v1 * 9/5 + 32); break;
                        case "kelvin": return arredonda($v1 + 273); break;
                    }

                    return $v1;
                }

                function velocidade($v, $de, $para) {
                    $v1 = 0.0;

                    switch ($de) {
                        case "quilômetro por hora": $v1 = arredonda($v); break;
                        case "metro por segundo": $v1 = arredonda($v / 3.6); break;
                        case "centímetro por segundo": $v1 = arredonda($v / 3600); break;
                        case "milha por hora": $v1 = arredonda($v / 0.621427); break;
                        case "pé por segundo": $v1 = arredonda($v / 0.911344); break;
                    }

                    switch ($para) {
                        case "quilômetro por hora": return arredonda($v1); break;
                        case "metro por segundo": return arredonda($v1 * 3.6); break;
                        case "centímetro por segundo": return arredonda($v1 * 3600); break;
                        case "milha por hora": return arredonda($v1 * 0.621427); break;
                        case "pé por segundo": return arredonda($v1 * 0.911344); break;
                    }

                    return $v1;
                }

                function massa($v, $de, $para) {
                    $v1 = 0.0;

                    switch ($de) {
                        case "tonelada": $v1 = arredonda($v); break;
                        case "quilograma": $v1 = arredonda($v / 1000); break;
                        case "grama": $v1 = arredonda($v / 1000000); break;
                        case "miligrama": $v1 = arredonda($v / 1000000000); break;
                        case "onça": $v1 = arredonda($v / 35273.96); break;
                        case "libra": $v1 = arredonda($v / 2204.623); break;
                        case "pedra": $v1 = arredonda($v / 157.473); break;
                        case "quilate": $v1 = arredonda($v / 5000000); break;
                    }

                    switch ($para) {
                        case "tonelada": return arredonda($v1); break;
                        case "quilograma": return arredonda($v1 * 1000); break;
                        case "grama": return arredonda($v1 * 1000000); break;
                        case "miligrama": return arredonda($v1 * 1000000000); break;
                        case "onça": return arredonda($v1 * 35273.96); break;
                        case "libra": return arredonda($v1 * 2204.623); break;
                        case "pedra": return arredonda($v1 * 157.473); break;
                        case "quilate": return arredonda($v1 * 5000000); break;
                    }

                    return $v1;
                }

                function tempo($v, $de, $para) {
                    $v1 = 0.0;

                    switch ($de) {
                        case "semana": $v1 = arredonda($v); break;
                        case "dia": $v1 = arredonda($v / 7); break;
                        case "hora": $v1 = arredonda($v / 168); break;
                        case "minuto": $v1 = arredonda($v / 10080); break;
                        case "segundo": $v1 = arredonda($v / 604800); break;
                    }

                    switch ($para) {
                        case "semana": return arredonda($v1); break;
                        case "dia": return arredonda($v1 * 7); break;
                        case "hora": return arredonda($v1 * 168); break;
                        case "minuto": return arredonda($v1 * 10080); break;
                        case "segundo": return arredonda($v1 * 604800); break;
                    }

                    return $v1;
                }

                function angulo($v, $de, $para) {
                    $v1 = 0.0;

                    switch ($de) {
                        case "grau": $v1 = arredonda($v); break;
                        case "grado": $v1 = arredonda($v / 10/9); break;
                        case "radiano": $v1 = arredonda($v / 0.017453); break;
                    }

                    switch ($para) {
                        case "grau": return arredonda($v1); break;
                        case "grado": return arredonda($v1 * 10/9); break;
                        case "radiano": return arredonda($v1 * 0.017453); break;
                    }

                    return $v1;
                }

                $grandeza = isset($_POST['grandeza']) ? $_POST['grandeza'] : null;

	            $v = isset($_POST["valor"]) ? (float)$_POST["valor"] : 0.0;
	            $ud = isset($_POST["unidadeDe"]) ? $_POST["unidadeDe"] : "";
	            $up = isset($_POST["unidadePara"]) ? $_POST["unidadePara"] : "";
                
                $r = 0.0;

                switch ($grandeza) {
                    case 'a1':
                        $r = comprimento($v, $ud, $up);
                    break;

                    case 'a2':
                        $r = area($v, $ud, $up);
                    break;

                    case 'a3':
                        $r = volume($v, $ud, $up);
                    break;

                    case 'a4':
                        $r = temperatura($v, $ud, $up);
                    break;

                    case 'a5':
                        $r = velocidade($v, $ud, $up);
                    break;

                    case 'a6':
                        $r = massa($v, $ud, $up);
                    break;

                    case 'a7':
                        $r = tempo($v, $ud, $up);
                    break;

                    case 'a8':
                        $r = angulo($v, $ud, $up);
                    break;
                }

                echo 'Resultado da conversão: ' . $r . ' ' . $up . '(s)';
                $id = $_SESSION['id'];
                $con = mysqli_connect('localhost', 'root', '', 'usuarios') or die(mysqli_error('Não foi possível conectar ao banco de dados.'));
			    $q = mysqli_query($con, "INSERT INTO calculos(id_usuario, categoria, dado1, dado2, dado3, resultados) VALUES ('$id', 'Conversão', '$v', '$ud', '$up', '$r');");
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