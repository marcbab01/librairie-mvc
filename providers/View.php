<?php
namespace App\Provides;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class View {
    static function render($template, $data = []) {
        $loader = new FilesystemLoader('views');
        $twig = new Environment($loader);
        $twig->addGlobal('asset', ASSET);
        $twig->addGlobal('base', BASE);
        echo $twig->render($template.'.php', $data);
    }
    static public function redirect($url) {
        header('location:'.BASE.'/'.$url);
    }
}