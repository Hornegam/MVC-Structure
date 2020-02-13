<?php
//Core
    require_once "App/Core/Core.php";
//Src
    require_once "Src/Tools/Url.php";
    require_once "Src/DataBase/Connection.php";
//AutoLoad dos Controllers e Models
    require_once "App/autoload.php";
//Controlers
    // require_once "App/Controller/Controller.php";
    // require_once "App/Controller/ErrorController.php";
    // require_once "App/Controller/HomeController.php";
//Models
    // require_once "App/Model/Model.php";
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

