<?php
  $sql = "SELECT * FROM tarefas WHERE id=".$_REQUEST["id"];
  $res = $mysqli->query($sql);
  $row = $res->fetch_object();

?>
<h1>Editar Tarefa</h1>

<form action="?page=salvar" method="post">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="id" value="<?php echo $row->id; ?>">
      <h2>Insira uma nova tarefa</h2>
      <label>
        Titulo:
        <input type="text" name="titulo" value="<?php echo $row->titulo; ?>" required>
      </label>
      <label>
        Descrição:
        <input type="text" name="descricao" value="<?php echo $row->descricao; ?>" required>
      </label>
      <label>
        Data de Conclusão:
        <input type="date" name="data_conc" value="<?php echo $row->data_conc; ?>" required>
      </label>
      <label>
        Tarefa concluída?
        <input type="text" name="concluida" value="<?php echo $row->concluida; ?>" required placeholder="sim ou não">
      </label>
      <button type="submit" class="btn-confirm" style="margin-left: 10px">Editar</button>
    </form>
