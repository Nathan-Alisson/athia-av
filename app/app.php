<?php
namespace App;

use App\Core\Config;

class App {
  public static function assetCss($filename) {
    return Config::CSS_PATH . $filename;
  }

  public static function assetJs($filename) {
    return Config::JS_PATH . $filename;
  }

  public static function basePath() {
    return $_SERVER['DOCUMENT_ROOT'] . Config::BASE_PATH;
  }
}
