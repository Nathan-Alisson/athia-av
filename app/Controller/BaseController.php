<?php
namespace App\Controller;

abstract class BaseController {
  protected function renderView($view, $data = []) {
    extract($data);

    require_once __DIR__ . "/../view/{$view}.php";
  }
}