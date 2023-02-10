<h1>Nova Tarefa</h1>

<form action="?page=salvar" method="post">
  <input type="hidden" name="acao" value="cadastrar">
      <h2>Insira uma nova tarefa</h2>
      <label>
        Titulo:
        <input type="text" name="titulo" required>
      </label>
      <label>
        Descrição:
        <input type="text" name="descricao" required>
      </label>
      <label>
        Data de Conclusão:
        <input type="date" name="data_conc" required>
      </label>
      <label>
        Tarefa concluída?
        <input type="text" name="concluida" required placeholder="sim ou não">
      </label>
      <button type="submit" class="btn-confirm" style="margin-left: 10px">Cadastrar</button>
    </form>
