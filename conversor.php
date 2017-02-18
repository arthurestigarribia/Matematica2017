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
<div class="jumbotron" style="padding-left: 5%; padding-right: 5%; padding-top: 100px;">
        <h1>Conversor de Unidades</h1>
        <p>Converta qualquer unidade em outras.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Saiba mais</button>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Ajuda</h4>
                </div>
                <div class="modal-body">
                    Para usar esta calculadora, digite um número e selecione as unidades para conversão.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <main>
        <h4>Comprimento</h4>
				<form>
					<input type="text" class="form-control" id="comprimento" default="0" required>
					<select class="form-control" id="unidade_de_comprimento">
						<option value="u1">Metro</option>
						<option value="u2">Quilômetro</option>
						<option value="u3">Centímetro</option>
						<option value="u4">Milímetro</option>
						<option value="u5">Milha</option>
						<option value="u6">Jarda</option>
						<option value="u7">Pé</option>
						<option value="u8">Polegada</option>
					</select>
					<select class="form-control" id="unidade_para_comprimento">
						<option value="u1">Metro</option>
						<option value="u2">Quilômetro</option>
						<option value="u3">Centímetro</option>
						<option value="u4">Milímetro</option>
						<option value="u5">Milha</option>
						<option value="u6">Jarda</option>
						<option value="u7">Pé</option>
						<option value="u8">Polegada</option>
					</select>
				</form>
				<button class="btn btn-primary" onclick="comprimento()">Calcular</button>
                <div id="resultado1"></div>

        <h4>Área</h4>
	        	<form>
				    <input type="text" class="form-control" id="area" default="0" required>
					<select class="form-control" id="unidade_de_area">
						<option value="u1">Metro quadrado</option>
						<option value="u2">Quilômetro quadrado</option>
						<option value="u3">Centímetro quadrado</option>
						<option value="u4">Milímetro quadrado</option>
						<option value="u5">Milha quadrada</option>
						<option value="u6">Jarda quadrada</option>
						<option value="u7">Pé quadrado</option>
						<option value="u8">Polegada quadrada</option>
						<option value="u9">Hectare</option>
					</select>
					<select class="form-control" id="unidade_para_area">
						<option value="u1">Metro quadrado</option>
						<option value="u2">Quilômetro quadrado</option>
						<option value="u3">Centímetro quadrado</option>
						<option value="u4">Milímetro quadrado</option>
						<option value="u5">Milha quadrada</option>
						<option value="u6">Jarda quadrada</option>
						<option value="u7">Pé quadrado</option>
						<option value="u8">Polegada quadrada</option>
						<option value="u9">Hectare</option>
					</select>
				</form>
				<button class="btn btn-primary" onclick="area()">Calcular</button>
	        <div id="resultado2"></div>

            <h4>Volume</h4>
	        	<form>
				    <input type="text" class="form-control" id="volume" default="0" required>
					<select class="form-control" id="unidade_de_volume">
						<option value="u1">Metro cúbico</option>
						<option value="u2">Quilômetro cúbico</option>
						<option value="u3">Centímetro cúbico</option>
						<option value="u4">Milímetro cúbico</option>
						<option value="u5">Milha cúbica</option>
						<option value="u6">Jarda cúbica</option>
						<option value="u7">Pé cúbico</option>
						<option value="u8">Polegada cúbica</option>
						<option value="u9">Litro</option>
						<option value="u10">Mililitro</option>
						<option value="u11">Galão</option>
					</select>
					<select class="form-control" id="unidade_para_volume">
						<option value="u1">Metro cúbico</option>
						<option value="u2">Quilômetro cúbico</option>
						<option value="u3">Centímetro cúbico</option>
						<option value="u4">Milímetro cúbico</option>
						<option value="u5">Milha cúbica</option>
						<option value="u6">Jarda cúbica</option>
						<option value="u7">Pé cúbico</option>
						<option value="u8">Polegada cúbica</option>
						<option value="u9">Litro</option>
						<option value="u10">Mililitro</option>
						<option value="u11">Galão</option>
					</select>
				</form>
				<button class="btn btn-primary" onclick="volume()">Calcular</button>
	        <div id="resultado3"></div>

            <h4>Temperatura</h4>
	        	<form>
					<input type="text" class="form-control" id="temperatura" default="0" required>
					<select class="form-control" id="unidade_de_temperatura">
						<option value="u1">Celsius</option>
						<option value="u2">Fahrenheit</option>
						<option value="u3">Kelvin</option>
					</select>
					<select class="form-control" id="unidade_para_temperatura">
						<option value="u1">Celsius</option>
						<option value="u2">Fahrenheit</option>
						<option value="u3">Kelvin</option>
					</select>
				</form>
				<button class="btn btn-primary" onclick="temperatura()">Calcular</button>
	        <div id="resultado4"></div>

            <h4>Massa</h4>
	        	<form>
					<input type="text" class="form-control" id="massa" default="0" required>
					<select class="form-control" id="unidade_de_massa">
						<option value="u1">Tonelada</option>
						<option value="u2">Quilograma</option>
						<option value="u3">Grama</option>
						<option value="u4">Miligrama</option>
						<option value="u5">Onça</option>
						<option value="u6">Libra</option>
						<option value="u7">Pedra</option>
						<option value="u8">Quilate</option>
					</select>
					<select class="form-control" id="unidade_para_massa">
						<option value="u1">Tonelada</option>
						<option value="u2">Quilograma</option>
						<option value="u3">Grama</option>
						<option value="u4">Miligrama</option>
						<option value="u5">Onça</option>
						<option value="u6">Libra</option>
						<option value="u7">Pedra</option>
						<option value="u8">Quilate</option>
					</select>
				</form>
				<button class="btn btn-primary" onclick="massa()">Calcular</button>
	        <div id="resultado5"></div>

            <h4>Velocidade</h4>
	        	<form>
					<input type="text" class="form-control" id="velocidade" default="0" required>
					<select class="form-control" id="unidade_de_velocidade">
						<option value="u1">Quilômetro por hora</option>
						<option value="u2">Metro por segundo</option>
						<option value="u3">Centímetro por segundo</option>
						<option value="u4">Milha por hora</option>
						<option value="u5">Pé por segundo</option>
					</select>
					<select class="form-control" id="unidade_para_velocidade">
						<option value="u1">Quilômetro por hora</option>
						<option value="u2">Metro por segundo</option>
						<option value="u3">Centímetro por segundo</option>
						<option value="u4">Milha por hora</option>
						<option value="u5">Pé por segundo</option>
					</select>
				</form>
				<button class="btn btn-primary" onclick="velocidade()">Calcular</button>
	        <div id="resultado6"></div>

            <h4>Tempo</h4>
	        	<form>
					<input type="text" class="form-control" id="tempo" default="0" required>
					<select class="form-control" id="unidade_de_tempo">
						<option value="u1">Semana</option>
						<option value="u2">Dia</option>
						<option value="u3">Hora</option>
						<option value="u4">Minuto</option>
						<option value="u5">Segundo</option>
					</select>
					<select class="form-control" id="unidade_para_tempo">
						<option value="u1">Semana</option>
						<option value="u2">Dia</option>
						<option value="u3">Hora</option>
						<option value="u4">Minuto</option>
						<option value="u5">Segundo</option>
					</select>
				</form>
				<button class="btn btn-primary" onclick="tempo()">Calcular</button>
	        <div id="resultado7"></div>

            <script type="text/javascript">
                function arredonda(numero) {
                    return parseFloat(parseFloat(numero).toFixed(10));
                }

                function comprimento() {
                    var numero = document.getElementById("comprimento").value;
                    var u1 = document.getElementById("unidade_de_comprimento").value;
                    var u2 = document.getElementById("unidade_para_comprimento").value;

                    var numero2 = function() {
                        switch (u1) {
                            case "u1": return arredonda(numero); break;
                            case "u2": return arredonda(numero * 1000); break;
                            case "u3": return arredonda(numero * 0.01); break;
                            case "u4": return arredonda(numero * 0.001); break;
                            case "u5": return arredonda(numero * 1609.344); break;
                            case "u6": return arredonda(numero * 91.44); break;
                            case "u7": return arredonda(numero * 30.48); break;
                            case "u8": return arredonda(numero * 2.54); break;
                        }
                    };

                    var numero3 = function(){
                        switch (u2) {
                            case "u1": return arredonda(numero2()); break;
                            case "u2": return arredonda(numero2() / 1000); break;
                            case "u3": return arredonda(numero2() / 0.01); break;
                            case "u4": return arredonda(numero2() / 0.001); break;
                            case "u5": return arredonda(numero2() / 1609.344); break;
                            case "u6": return arredonda(numero2() / 91.44); break;
                            case "u7": return arredonda(numero2() / 30.48); break;
                            case "u8": return arredonda(numero2() / 2.54); break;
                        }
                    };

                    document.getElementById("resultado1").innerHTML = "<h4>Resultado</h4><p>" + arredonda(numero3()) + "</p>";
                }

                function area() {
                    var numero = document.getElementById("area").value;
                    var u1 = document.getElementById("unidade_de_area").value;
                    var u2 = document.getElementById("unidade_para_area").value;

                    var numero2 = function() {
                        switch (u1) {
                            case "u1": return arredonda(numero); break;
                            case "u2": return arredonda(numero * 1000 * 1000); break;
                            case "u3": return arredonda(numero * 0.01 * 0.01); break;
                            case "u4": return arredonda(numero * 0.001 * 0.001); break;
                            case "u5": return arredonda(numero * 1609.344 * 1609.344); break;
                            case "u6": return arredonda(numero * 91.44 * 91.44); break;
                            case "u7": return arredonda(numero * 30.48 * 30.48); break;
                            case "u8": return arredonda(numero * 2.54 * 2.54); break;
                        }
                    };

                    var numero3 = function(){
                        switch (u2) {
                            case "u1": return arredonda(numero2()); break;
                            case "u2": return arredonda(numero2()/1000/1000); break;
                            case "u3": return arredonda(numero2()/0.01/0.01); break;
                            case "u4": return arredonda(numero2()/0.001/0.001); break;
                            case "u5": return arredonda(numero2()/1609.344/1609.344); break;
                            case "u6": return arredonda(numero2()/91.44/91.44); break;
                            case "u7": return arredonda(numero2()/30.48/30.48); break;
                            case "u8": return arredonda(numero2()/2.54/2.54); break;
                        }
                    };

                    document.getElementById("resultado2").innerHTML = "<h4>Resultado</h4><p>" + arredonda(numero3()) + "</p>";
                }

                function volume() {
                    var numero = document.getElementById("volume").value;
                    var u1 = document.getElementById("unidade_de_volume").value;
                    var u2 = document.getElementById("unidade_para_volume").value;

                    var numero2 = function() {
                        switch (u1) {
                            case "u1": return arredonda(numero); break;
                            case "u2": return arredonda(numero * 1000 * 1000 * 1000); break;
                            case "u3": return arredonda(numero * 0.01 * 0.01 * 0.01); break;
                            case "u4": return arredonda(numero * 0.001 * 0.001 * 0.001); break;
                            case "u5": return arredonda(numero * 1609.344 * 1609.344 * 1609.344); break;
                            case "u6": return arredonda(numero * 91.44 * 91.44 * 91.44); break;
                            case "u7": return arredonda(numero * 30.48 * 30.48 * 30.48); break;
                            case "u8": return arredonda(numero * 2.54 * 2.54 * 2.54); break;
                            case "u9": return arredonda(numero * 0.001); break;
                            case "u10": return arredonda(numero * 0.000001); break;
                            case "u11": return arredonda(numero * 0.003785); break;
                        }
                    };

                    var numero3 = function(){
                        switch (u2) {
                            case "u1": return arredonda(numero2()); break;
                            case "u2": return arredonda(numero2()/1000/1000/1000); break;
                            case "u3": return arredonda(numero2()/0.01/0.01/0.01); break;
                            case "u4": return arredonda(numero2()/0.001/0.001/0.001); break;
                            case "u5": return arredonda(numero2()/1609.344/1609.344/1609.344); break;
                            case "u6": return arredonda(numero2()/91.44/91.44/91.44); break;
                            case "u7": return arredonda(numero2()/30.48/30.48/30.48); break;
                            case "u8": return arredonda(numero2()/2.54/2.54/2.54); break;
                            case "u9": return arredonda(numero2()/0.001); break;
                            case "u10": return arredonda(numero2()/0.000001); break;
                            case "u11": return arredonda(numero2()/0.003785); break;
                        }
                    };

                    document.getElementById("resultado3").innerHTML = "<h4>Resultado</h4><p>" + arredonda(numero3()) + "</p>";
                }

                function temperatura() {
                    var numero = document.getElementById("temperatura").value;
                    var u1 = document.getElementById("unidade_de_temperatura").value;
                    var u2 = document.getElementById("unidade_para_temperatura").value;

                    var numero2 = function() {
                        switch (u1) {
                            case "u1": return arredonda(numero); break;
                            case "u2": return arredonda(5/9 * (numero - 32)); break;
                            case "u3": return arredonda(numero - 273); break;
                        }
                    };

                    var numero3 = function(){
                        switch (u2) {
                            case "u1": return arredonda(numero2()); break;
                            case "u2": return arredonda((numero2() * 9/5) + 32); break;
                            case "u3": return arredonda(numero2() + 273); break;
                        }
                    };

                    document.getElementById("resultado4").innerHTML = "<h4>Resultado</h4><p>" + arredonda(numero3()) + "</p>";
                }

                function massa() {
                    var numero = document.getElementById("massa").value;
                    var u1 = document.getElementById("unidade_de_massa").value;
                    var u2 = document.getElementById("unidade_para_massa").value;

                    var numero2 = function() {
                        switch (u1) {
                            case "u1": return arredonda(numero); break;
                            case "u2": return arredonda(numero/1000); break;
                            case "u3": return arredonda(numero/1000000); break;
                            case "u4": return arredonda(numero/1000000000); break;
                            case "u5": return arredonda(numero/35273.96); break;
                            case "u6": return arredonda(numero/2204.623); break;
                            case "u7": return arredonda(numero/157.473); break;
                            case "u8": return arredonda(numero/5000000); break;	
                        }
                    };

                    var numero3 = function(){
                        switch (u2) {
                            case "u1": return arredonda(numero2()); break;
                            case "u2": return arredonda(numero2()*1000); break;
                            case "u3": return arredonda(numero2()*1000000); break;
                            case "u4": return arredonda(numero2()*1000000000); break;
                            case "u5": return arredonda(numero2()*35273.96); break;
                            case "u6": return arredonda(numero2()*2204.623); break;
                            case "u7": return arredonda(numero2()*157.473); break;
                            case "u8": return arredonda(numero2()*5000000); break;
                        }
                    };

                    document.getElementById("resultado5").innerHTML = "<h4>Resultado</h4><p>" + arredonda(numero3()) + "</p>";
                }

                function velocidade() {
                    var numero = document.getElementById("velocidade").value;
                    var u1 = document.getElementById("unidade_de_velocidade").value;
                    var u2 = document.getElementById("unidade_para_velocidade").value;

                    var numero2 = function() {
                        switch (u1) {
                            case "u1": return arredonda(numero2()); break;
                            case "u2": return arredonda(numero2() / 3.6); break;
                            case "u3": return arredonda(numero2() / 3600); break;
                            case "u4": return arredonda(numero2() / 0.621427); break;
                            case "u5": return arredonda(numero2() / 0.911344); break;
                        }
                    };

                    var numero3 = function(){
                        switch (u2) {
                            case "u1": return arredonda(numero); break;
                            case "u2": return arredonda(numero * 3.6); break;
                            case "u3": return arredonda(numero * 3600); break;
                            case "u4": return arredonda(numero * 0.621427); break;
                            case "u5": return arredonda(numero * 0.911344); break;
                        }
                    };

                    document.getElementById("resultado6").innerHTML = "<h4>Resultado</h4><p>" + arredonda(numero3()) + "</p>";
                }

                function tempo() {
                    var numero = document.getElementById("tempo").value;
                    var u1 = document.getElementById("unidade_de_tempo").value;
                    var u2 = document.getElementById("unidade_para_tempo").value;

                    var numero2 = function() {
                        switch (u1) {
                            case "u1": return arredonda(numero); break;
                            case "u2": return arredonda(numero / 7); break;
                            case "u3": return arredonda(numero / 168); break;
                            case "u4": return arredonda(numero / 10080); break;
                            case "u5": return arredonda(numero / 604800); break;
                        }
                    };

                    var numero3 = function(){
                        switch (u2) {
                            case "u1": return arredonda(numero2()); break;
                            case "u2": return arredonda(numero2() * 7); break;
                            case "u3": return arredonda(numero2() * 168); break;
                            case "u4": return arredonda(numero2() * 10080); break;
                            case "u5": return arredonda(numero2() * 604800); break;
                        }
                    };

                    document.getElementById("resultado7").innerHTML = "<h4>Resultado</h4><p>" + arredonda(numero3()) + "</p>";
                }
            </script>
    </main>
    <br>
		<footer class="footer">
      <div class="container">
        	Copyright © 2017 Estaleiro Matemático. Todos os direitos reservados.
      </div>
    </footer>
</body>
</html>