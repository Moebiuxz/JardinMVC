<?php

class Conexion
{
    public static function conectar ()
    {
        $link = new PDO("mysql:host=localhost;dbname=arduin_bd", "root", "");
        //var_dump($link);
        return $link;
    }


}