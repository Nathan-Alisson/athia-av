<?php

use PSpell\Config;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Meu Site' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="<?php echo \App\App::assetCss('app.css'); ?>" rel="stylesheet" />
</head>

<body>
  <div class="d-flex">
    <div class="sidebar p-3">
      <h5 class="text-light">Menu</h5>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a href="/" class="nav-link">Início</a>
        </li>

        <li class="nav-item">
          <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu1" role="button" aria-expanded="false" aria-controls="submenu1">
            <span>Empresas</span>
            <span class="caret"></span>
          </a>
          <div class="collapse submenu" id="submenu1">
            <ul class="nav flex-column ms-3">
              <li class="nav-item"><a href="/empresa" class="nav-link">Lista</a></li>
              <li class="nav-item"><a href="/empresa/create" class="nav-link">Criar</a></li>
              <li class="nav-item"><a href="/empresa/edit" class="nav-link">Editar</a></li>
              <li class="nav-item"><a href="/empresa/delete" class="nav-link">Exluir</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu2" role="button" aria-expanded="false" aria-controls="submenu2">
            <span>Setores</span>
            <span class="caret"></span>
          </a>
          <div class="collapse submenu" id="submenu2">
            <ul class="nav flex-column ms-3">
              <li class="nav-item"><a href="#" class="nav-link">Criar</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Editar</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Excluir</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">Relatórios</a>
        </li>
      </ul>
    </div>

    <main class="content flex-grow-1 p-4" style="margin-left: 250px;">
      <?= $content ?>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>