<h2>Empresas</h2>
<a href="/empresas/create">Adicionar Nova Empresa</a>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CNPJ</th>
      <th>Endereço</th>
      <th>Telefone</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($empresas as $empresa): ?>
      <tr>
        <td><?= $empresa->id ?></td>
        <td><?= $empresa->nome ?></td>
        <td><?= $empresa->cnpj ?></td>
        <td><?= $empresa->endereco ?></td>
        <td><?= $empresa->telefone ?></td>
        <td>
          <a href="/empresas/edit/<?= $empresa->id ?>">Editar</a>
          <a href="/empresas/delete/<?= $empresa->id ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>