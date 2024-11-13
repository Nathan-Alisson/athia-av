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
          <a href="/" class="nav-link">Relatórios</a>
        </li>

        <li class="nav-item">
          <a href="/empresa" class="nav-link">Empresas</a>
        </li>

        <li class="nav-item">
          <a href="/setor" class="nav-link">Setores</a>
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