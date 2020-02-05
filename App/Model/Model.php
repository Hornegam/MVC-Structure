<?php

class Model {
    function sqlQuery(){
        $con = Connection::getConn();
        $sql = "";
        $sql = $con->prepare($sql);
        $sql->bindValue("","");
        $sql->execute();
    }
}