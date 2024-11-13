<?php

namespace App\Controller;


class HomeController extends BaseController
{

  public function __construct() {
    
  }

  public function index() {
    $this->renderView('home');
  }
}
