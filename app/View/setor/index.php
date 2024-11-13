<?php
$title = "Setores";

?>

<div class="container my-4">
  <h2 class="text-center mb-4"><?= $title ?></h2>

  <div class="d-flex justify-content-end mb-3">
    <a href="/setor/create" class="btn btn-primary">Adicionar novo Setor</a>
  </div>

  <table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($setors as $setor): ?>
        <tr>
          <td><?= $setor->getId() ?></td>
          <td><?= $setor->getDescricao() ?></td>
          <td>
            <a href="/setor/edit/<?= $setor->getId() ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="/setor/delete/<?= $setor->getId() ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
$content = ob_get_clean();
require VIEW_PATH . 'layout.php';
