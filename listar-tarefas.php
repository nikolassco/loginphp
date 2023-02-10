<h1>Listar Tarefas</h1>
<?php
  $sql = "SELECT * FROM tarefas";
  $res = $mysqli->query($sql);

  $quantidade = $res->num_rows;

  if($quantidade > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>TITULO</th>";
    echo "<th>DESCRICÃO</th>";
    echo "<th>DATA DE CONCLUSÃO</th>";
    echo "<th>CONCLUIDA</th>";
    echo "<th>AÇÕES</th>";
    echo "<tr>";
    while($row = $res->fetch_object()) {
      echo "<tr>";
      echo "<td>". $row->id. "</td>";
      echo "<td>". $row->titulo. "</td>";
      echo "<td>". $row->descricao. "</td>";
      echo "<td>". $row->data_conc. "</td>";
      echo "<td>". $row->concluida. "</td>";
      echo "<td>
      <button onclick=\"location.href='?page=editar&id=".$row->id."';\">Editar</button>

      <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\">Excluir</button>
      </td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "<p>Você não tem tarefas, cadastre uma!</p>";
  }
?>
