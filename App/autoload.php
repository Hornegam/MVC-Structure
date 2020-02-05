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
        require $pasta.''.$classe.'.php';
    }
);