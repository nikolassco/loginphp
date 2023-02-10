<?php
  switch ($_REQUEST["acao"]) {
    case 'cadastrar':
          $titulo = $mysqli->real_escape_string($_POST['titulo']);
          $descricao = $mysqli->real_escape_string($_POST['descricao']);
          $data_conc = $mysqli->real_escape_string($_POST['data_conc']);
          $concluida = $mysqli->real_escape_string($_POST['concluida']);

          $sql_code = "INSERT INTO tarefas (titulo, descricao, data_conc, concluida) VALUES ('{$titulo}', '{$descricao}', '{$data_conc}', '{$concluida}')";
          $sql_query = $mysqli->query($sql_code);

          if($sql_query==true) {
            echo "<script>alert('Tarefa cadastrada com sucesso');</script>";
            echo "<script>location.href='?page=listar';</script>";
          } else {
            echo "<script>alert('Erro ao cadastrar tarefa');</script>";
            echo "<script>location.href='?page=listar';</script>";
          }
      break;

    case 'editar':
          $titulo = $mysqli->real_escape_string($_POST['titulo']);
          $descricao = $mysqli->real_escape_string($_POST['descricao']);
          $data_conc = $mysqli->real_escape_string($_POST['data_conc']);
          $concluida = $mysqli->real_escape_string($_POST['concluida']);


          $sql_code = "UPDATE tarefas SET
                        titulo='{$titulo}',
                        descricao='{$descricao}',
                        data_conc='{$data_conc}',
                        concluida='{$concluida}'
                      WHERE
                        id=".$_REQUEST["id"];
          $sql_query = $mysqli->query($sql_code);

          if($sql_query==true) {
            echo "<script>alert('Tarefa editada com sucesso');</script>";
            echo "<script>location.href='?page=listar';</script>";
          } else {
            echo "<script>alert('Erro ao editar tarefa');</script>";
            echo "<script>location.href='?page=listar';</script>";
          }


      break;

    case 'excluir':
      $sql_code = "DELETE FROM tarefas WHERE id=".$_REQUEST["id"];

      $sql_query = $mysqli->query($sql_code);

          if($sql_query==true) {
            echo "<script>alert('Tarefa excluida com sucesso');</script>";
            echo "<script>location.href='?page=listar';</script>";
          } else {
            echo "<script>alert('Erro ao excluir tarefa');</script>";
            echo "<script>location.href='?page=listar';</script>";
          }
      break;

    default:
      # code...
      break;
  }
?>
