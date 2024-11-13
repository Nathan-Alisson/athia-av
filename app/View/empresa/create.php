<h2 class="text-center my-4">Adicionar Nova Empresa</h2>

<div class="container">
  <form action="/empresa/create" method="POST" class="row g-3">

    <div class="col-md-6">
      <label for="razao_social" class="form-label">Razão Social</label>
      <input type="text" name="razao_social" id="razao_social" class="form-control" placeholder="Digite a razão social" required>
    </div>

    <div class="col-md-6">
      <label for="nome_fantasia" class="form-label">Nome Fantasia</label>
      <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" placeholder="Digite o nome fantasia" required>
    </div>

    <div class="col-md-6">
      <label for="cnpj" class="form-label">CNPJ</label>
      <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="Digite o CNPJ" required>
    </div>

    <label for="setores">Selecione os setores:</label>
    <p class="text-muted" style="font-size: 0.9rem;">
      Para selecionar múltiplos setores, mantenha pressionada a tecla <strong>CTRL</strong> enquanto faz suas seleções.
    </p>
    <select name="setores[]" class="mt-0" multiple>
      <?php foreach ($setores as $setor): ?>
        <option value="<?= $setor->getId() ?>"><?= $setor->getDescricao() ?></option>
      <?php endforeach; ?>
    </select>

    <div class="col-12 d-flex justify-content-end">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="/empresa" class="btn btn-secondary ms-2">Voltar</a>
    </div>

  </form>
</div>

<?php
$content = ob_get_clean();
require VIEW_PATH . 'layout.php';
