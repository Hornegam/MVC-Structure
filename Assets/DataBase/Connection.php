<?php

abstract class Connection{

    private static $conn;

    public static function getConn($config = "Lib/DataBase/db.config.json"){
        //pega os dados do arquivo
        $config = file_get_contents($config);
        //decodifica a string em json em um array ou objeto 
        $config = json_decode($config);
        var_dump($config);
        $database = $config->{'database'};
        $host = $config->{'host'};
        $banco = $config->{'dbname'};
        $usuario = $config->{'usuario'};
        $senha = $config->{'senha'};

        //impede de criar varias instancias de conexao
        if(self::$conn == null){
            self::$conn = new PDO($database.': host='.$host.'; dbname='.$banco.';', $usuario, $senha);
        }
        return self::$conn;
    }

}
