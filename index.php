<?php
//Composer
    require_once "vendor/autoload.php";
//Core
    require_once "App/Core/Core.php";
//Src
    require_once "Assets/Tools/Url.php";
    require_once "Assets/DataBase/Connection.php";
//AutoLoad dos Controllers e Models
    require_once "App/autoload.php";
//Template do site
    $links = file_get_contents("App/Template/links.html");
    $template = file_get_contents("App/Template/template.html");
    $scripts = file_get_contents("App/Template/scripts.html");
//Url
    $url = isset($_GET['url'])?$_GET['url']:"";
//Output Buffer {captura o que e exibido pelo 'Core'}
    ob_start();
        $core = new Core();
        $core->start($url);
        $saida = ob_get_contents();
    ob_end_clean();
//monta a Pagina {}
    $pagina = str_replace('{{links}}',$links,$template);
    $pagina = str_replace('{{area dinamica}}',$saida,$pagina);
    $pagina = str_replace('{{scripts}}',$scripts,$pagina);
//Exibe a pagina
    echo $pagina;

