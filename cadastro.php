<?php
    session_start();
    if (isset($_SESSION['logado'])) {
       header('Location: home.php');
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
        <h1>Cadastro</h1>
        <p>Cadastre-se gratuitamente para acessar as calculadoras do site.</p>
        <a type="button" class="btn btn-primary" href="http://riogrande.ifrs.edu.br/">Saiba mais</a>
    </div>
    
    <main>
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

                function obtemId($c, $u, $s) {
                    $q = mysqli_query($c, "SELECT id FROM usuarios WHERE email = '$u' AND senha = md5('$s');") or die(errodb(7));
                    $r = mysqli_fetch_assoc($q);

                    return $r["id"];
                }
        
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                if (validaUsuario($c, $email, $senha)) {
                    $insert = mysqli_query($c, "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', md5('$senha'));") or die(errodb(4));

                    $_SESSION['id'] = obtemId($c, $email, $senha);
                    $_SESSION['nome'] = $_POST['nome'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['logado'] = true;

                    header("Location: home.php");
                } else {
                    unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['logado']);

                    session_destroy();

                    echo "<div class='alert alert-danger' role='alert'>Cadastro inválido.</div>";
                }
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