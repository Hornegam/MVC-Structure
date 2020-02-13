<?php

class Core {
    public function start($url){
        $url = Url::getParamsMVC($url);
//Controller
        if(isset($url['controller']) AND str_word_count($url['controller'])>0){
            $controller = ucfirst($url['controller']."Controller");
        }else{
            $controller = 'HomeController';
        } 
        //error
            if(!class_exists($controller)){
                $controller = 'ErrorController';
            }
//Metodo
        if(isset($url['metodo']) AND str_word_count($url['metodo'])>0){
            $metodo = $url['metodo'];
        }else{
            $metodo = 'index';
        }
        //error
        if(!method_exists($controller,$metodo)){
            $controller = 'ErrorController'; 
            $metodo = 'index';
        }
//Parametros
        if(isset($url['parametros'])){
            $parametros = $url['parametros'];
        }else{
            $parametros = array();
        }
    //Chamando a Classe e a Funcao e enviando um array como parametro
    call_user_func_array(array($controller,$metodo), array($parametros));
    }
}