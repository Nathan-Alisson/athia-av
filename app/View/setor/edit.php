<h2 class="text-center mb-4">Editar Setor</h2>

<div class="container">
  <form action="/setor/edit/<?= $setor->getId() ?>" method="POST" class="row g-3">

    <div class="col-12">
      <label for="descricao" class="form-label">Descrição</label>
      <textarea type="text" name="descricao" id="descricao" class="form-control" placeholder="..." rows="5" required><?= $setor->getDescricao() ?></textarea>
    </div>

    <div class="col-12 d-flex justify-content-end">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="/setor" class="btn btn-secondary ms-2">Voltar</a>
    </div>

  </form>
</div>

<?php
$content = ob_get_clean();
require VIEW_PATH . 'layout.php';
