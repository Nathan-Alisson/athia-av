<h2 class="text-center mb-4">Editar Empresa</h2>

<div class="container">
  <form action="/empresa/edit/<?= $empresa->getId() ?>" method="POST" class="row g-3">

    <div class="col-md-6">
      <label for="razao_social" class="form-label">Razão Social</label>
      <input type="text" name="razao_social" id="razao_social" value="<?= $empresa->getRazaoSocial() ?>" class="form-control" placeholder="Digite a razão social" required>
    </div>

    <div class="col-md-6">
      <label for="nome_fantasia" class="form-label">Nome Fantasia</label>
      <input type="text" name="nome_fantasia" id="nome_fantasia" value="<?= $empresa->getNomeFantasia() ?>" class="form-control" placeholder="Digite o nome fantasia" required>
    </div>

    <div class="col-md-6">
      <label for="cnpj" class="form-label">CNPJ</label>
      <input type="text" name="cnpj" id="cnpj" value="<?= $empresa->getCnpj() ?>" class="form-control" placeholder="Digite o CNPJ" required>
    </div>

    <div class="col-12 d-flex justify-content-end">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="/empresas" class="btn btn-secondary ms-2">Voltar</a>
    </div>

  </form>
</div>

<?php
$content = ob_get_clean();
require VIEW_PATH . 'layout.php';
