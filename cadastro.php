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
        <h1>Cadastro</h1>
        <p>Cadastre-se gratuitamente para obter diversas vantagens no site.</p>
        <a type="button" class="btn btn-primary" href="https://riogrande.ifrs.edu.br/">Saiba mais</a>
    </div>
    
    <main style="padding-left: 10px; padding-right: 10px;">
        <form method="post" action="cadastro.php">
            <div class="form-group">
                <input class="form-control" type="text" name="nome" maxlength="50" placeholder="Nome">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" maxlength="100" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="senha" maxlength="20" placeholder="Senha de 8 a 16 caracteres">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Cadastrar">
            </div>
        </form>
        <br>
        Já tem uma conta? <br><a type="button" class="btn btn-primary" href="login.php">Faça seu login!</a>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                function errodb($num) {
                    echo "<script type='text/javascript'>alert('Não foi possível conectar ao banco de dados. Erro: " . $num . ".');</script>";
                }

                $c = mysqli_connect('localhost', 'root', '', 'usuarios') or die(errodb(1));
                $q = mysqli_query($c, 'CREATE TABLE IF NOT EXISTS usuarios(id SERIAL NOT NULL PRIMARY KEY, nome VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, senha VARCHAR(32) NOT NULL);') or die(errodb(2));

                function validaUsuario($c, $u, $s) {
                    if (strlen($u) == 0 || strlen($u) > 100) return false;
                    if (strlen($s) < 8 || strlen($s) > 16) return false;
                   
                    $q = mysqli_query($c, "SELECT email, senha FROM usuarios WHERE email = '$u' AND senha = md5('$s');") or die(errodb(3));
                    $r = mysqli_fetch_assoc($q);

                    if (empty($r)) return true;
                    return false;
                }
        
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                if (validaUsuario($c, $email, $senha)) {
                    $insert = mysqli_query($c, "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', md5('$senha'));")or die(errodb(4));

                    $_SESSION['nome'] = $_POST['nome'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['logado'] = true;

                    header("Location: home.php");
                } else {
                    unset($_SESSION['nome'], $_SESSION['email'], $_SESSION['logado']);

                    session_destroy();

                    echo "<p class='bg-danger'>Cadastro inválido.</p>";
                }
            }
        ?>
        </main>
    </body>
</html>