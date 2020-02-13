<?php

spl_autoload_register(
    function($classe){
        $pasta = '';
    //Faz importacoes das Classes Controller
        if(!strpos('Controller',$classe)){
            $pasta = 'App/Controller/';
        }
    //Faz importacoes das Classes Model
        elseif(!strpos('Model',$classe)){
            $pasta = 'App/Model/';
        }
    //Variavel que guarda o caminho inteiro do arquivo
        $arquivo = $pasta.''.$classe.'.php';
    //Testa se o aquivo existe
        if(file_exists($arquivo)){
            //Se existir far a importação
            require $arquivo;
        }
    }
);