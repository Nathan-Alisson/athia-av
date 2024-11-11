<h2>Adicionar Nova Empresa</h2>
<form action="/empresas/create" method="POST">
  <label>Nome:</label>
  <input type="text" name="nome" required>

  <label>CNPJ:</label>
  <input type="text" name="cnpj" required>

  <label>Endereço:</label>
  <input type="text" name="endereco" required>

  <label>Telefone:</label>
  <input type="text" name="telefone" required>

  <button type="submit">Salvar</button>
</form>
<a href="/empresas">Voltar</a>