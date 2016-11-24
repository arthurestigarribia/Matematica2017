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
          <li><a href="sobre.php">Sobre</a></a></li>
      </ul>
    </div>
  </div>
</nav>    
    <div class="jumbotron" style="padding-left: 10px; padding-right: 10px; padding-top: 100px;">
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
        Inversamente proporcional: a/b = c/x ou x = (a · c)/b.
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
            Raízes: <?php
                    function arredonda($numero){
                        return round((float)$numero * 1000000000)/1000000000;
                    }

                    $a = (float)$_POST["termo_a"];
                    $b = (float)$_POST["termo_b"];
                    $c = (float)$_POST["termo_c"];
                    
                    $dir = $_POST["proporcao"];

                    if($dir == "diretamente") {
                        if ($a == 0) echo "O termo a não pode ser nulo.";
                        else echo ($b * $c)/$a;
                    } else {
                        if ($b == 0) echo "O termo b não pode ser nulo.";
                        else echo ($a * $c)/$b;
                    }
            ?>
        </main>
</body>
</html>
