<?php

abstract class Controller {
    public static function index(){
        $loader = new \Twig\Loader\FilesystemLoader('App/View/');
        $twig = new \Twig\Environment($loader, ['cache' => 'Cache',]);
        $template = $twig->load('home.html');

        $params = array();

       echo $template->render($params);
    }
}