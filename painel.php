<?php
  include('protect.php');

  include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/global.css">
  <title>Painel</title>
</head>
<body>
  <h1>Bem vindo ao Painel, <?php echo $_SESSION['nome']; ?>.</h1>

  <nav>
    <ul>
      <li><a href="?page=cadastrar">Nova Tarefa</a></li>
      <li><a href="?page=listar">Listar Tarefas</a></li>
    </ul>
  </nav>

  <?php
    switch (@$_REQUEST["page"]) {
      case 'cadastrar':
        include("cadastrar-tarefa.php");
        break;

      case 'listar':
        include("listar-tarefas.php");
        break;

      case 'salvar':
        include("salvar-tarefa.php");
        break;
      case 'editar':
        include("editar-tarefa.php");
        break;
      default:
        echo "<h1>Escolha uma ação</h1>";
    }
  ?>

  <?php
    switch (@$_REQUEST["acao"]) {
      case 'editar':

        $id = $mysqli->real_escape_string($_POST['id']);
        $titulo = $mysqli->real_escape_string($_POST['titulo']);
        $descricao = $mysqli->real_escape_string($_POST['descricao']);
        $data_conc = $mysqli->real_escape_string($_POST['data_conc']);

      $sql = "UPDATE tarefas SET id='{$id}', titulo='{$titulo}', descricao='{$descricao}', data_conc='{$data_conc}' WHERE id=".$_REQUEST["id"];
      $res = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);

        break;

      default:
        # code...
        break;
    }
  ?>

  <a href="logout.php">Sair</a>
</body>
</html>
