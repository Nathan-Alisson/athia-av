<?php
$title = "Empresas";
?>

<div class="container my-4">
  <h2 class="text-center mb-4"><?= $title ?></h2>

  <div class="d-flex justify-content-end mb-3">
    <a href="/empresa/create" class="btn btn-primary">Adicionar nova Empresa</a>
  </div>

  <table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Razão Social</th>
        <th>Nome Fantasia</th>
        <th>CNPJ</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($empresas as $empresa): ?>
        <tr>
          <td><?= $empresa->getId() ?></td>
          <td><?= $empresa->getRazaoSocial() ?></td>
          <td><?= $empresa->getNomeFantasia() ?></td>
          <td><?= $empresa->getCnpj() ?></td>
          <td>
            <a href="/empresa/edit/<?= $empresa->getId() ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="/empresa/delete/<?= $empresa->getId() ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
$content = ob_get_clean();
require VIEW_PATH . 'layout.php';
