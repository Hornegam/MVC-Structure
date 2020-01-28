<?php
//Core
    require_once "App/Core/Core.php";
//Lib
    require_once "Lib/Tools/Url.php";
    require_once "Lib/DataBase/Connection.php";
//Controlers
    require_once "App/Controller/Controller.php";
    require_once "App/Controller/ErrorController.php";
    require_once "App/Controller/HomeController.php";
//Template do site
    $template = file_get_contents("App/Template/template.html");
//Url
    $url = isset($_GET['url'])?$_GET['url']:"";
//Output Buffer {captura o que e exibido pelo 'Core'}
    ob_start();
        $core = new Core();
        $core->start($url);
        $saida = ob_get_contents();
    ob_end_clean();
//monta a Pagina {}
    $pagina = str_replace('{{area dinamica}}',$saida,$template);
//Exibe a pagina
    echo $pagina;

