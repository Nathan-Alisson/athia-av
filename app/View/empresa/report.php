<h2 class="text-center mb-4">Relatório de Empresas e Setores</h2>

<div class="container">
  <form method="GET" action="/relatorio" class="mb-4">
    <label for="setor" class="form-label">Filtrar por Setor:</label>
    <select name="setor" id="setor" class="form-select">
      <option value="">Todos os setores</option>
      <?php foreach ($setores as $setor): ?>
        <option value="<?= $setor->getId() ?>" <?= ($selectedSetor == $setor->getId()) ? 'selected' : '' ?>>
          <?= $setor->getDescricao() ?>
        </option>
      <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
  </form>

  <table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Razão Social</th>
        <th>Nome Fantasia</th>
        <th>CNPJ</th>
        <th>Setores</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($empresas)): ?>
        <tr>
          <td colspan="5" class="text-center">Nenhuma empresa encontrada.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($empresas as $empresa): ?>
          <tr>
            <td><?= $empresa->id ?></td>
            <td><?= $empresa->razao_social ?></td>
            <td><?= $empresa->nome_fantasia ?></td>
            <td><?= $empresa->cnpj ?></td>
            <td><?= $empresa->setor_descricao ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php
$content = ob_get_clean();
require VIEW_PATH . 'layout.php';
