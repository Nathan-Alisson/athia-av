<h2>Editar Empresa</h2>
<form action="/empresas/edit/<?= $empresa->id ?>" method="POST">
  <label>Nome:</label>
  <input type="text" name="nome" value="<?= $empresa->nome ?>" required>

  <label>CNPJ:</label>
  <input type="text" name="cnpj" value="<?= $empresa->cnpj ?>" required>

  <label>Endereço:</label>
  <input type="text" name="endereco" value="<?= $empresa->endereco ?>" required>

  <label>Telefone:</label>
  <input type="text" name="telefone" value="<?= $empresa->telefone ?>" required>

  <button type="submit">Salvar</button>
</form>
<a href="/empresas">Voltar</a>