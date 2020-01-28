<?php

abstract class Url {
    public static function getParamsMVC($url){
        $url = explode('/',$url);

        $urlMVC['controller'] = array_shift($url);
        $urlMVC['metodo'] = array_shift($url);
        $urlMVC['parametros'] = $url;

        return $urlMVC;
    }
}