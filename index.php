<?php
  include('connection.php');

  if(isset($_POST['email']) || isset($_POST['senha'])) {
    if(strlen($_POST['email']) == 0) {
      echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
      echo "Preencha sua senha";
    } else {

      $email = $mysqli->real_escape_string($_POST['email']);
      $senhaInserida = $mysqli->real_escape_string($_POST['senha']);
      $senhaCript = md5($senhaInserida);

      $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senhaCript'";
      $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

      $qtd = $sql_query->num_rows;

      if($qtd == 1) {

        $usuario = $sql_query->fetch_assoc();

        if(!isset($_SESSION)) {
          session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header("Location: /login/painel.php");


      } else {
        echo "Falha ao logar! E-mail ou senha incorretos";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/index.css">
  <title>Login</title>
</head>
<body>
  <div class="main">
    <h1>Entre na sua conta</h1>
    <form action="" method="post" class="form-login">
      <label>E-mail:
        <input type="email" name="email" required>
      </label>
      <label>Senha:
        <input type="password" name="senha" required>
      </label>
      <button type="submit" class="btn-confirm">Entrar</button>
    </form>
  </div>
</body>
</html>
