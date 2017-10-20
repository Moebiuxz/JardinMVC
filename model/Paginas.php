<?php

class Paginas
{
    public static function enlacePaginaModel($enlace)
    {
        if ($enlace == "inicio" || $enlace== "menu")
        {
            $module = "tablaUsuario.php";
        }
        else if($enlace == "registroUsuario"){
            $module =  "registroUsuario.php";
        }
        else if($enlace == "tablaRiego"){
            $module =  "tablaRiego.php";
        }
        else if($enlace == "editarUsuario")
        {
            $module = "editarUsuario.php";
        }
        else if($enlace == "eliminarUsuario")
        {
            $module = "confirmarEliminar.php";
        }
        else if ($enlace == "cerrarSesion")
        {
            $module = "cerrarSesion.php";
        }
        else
        {
            $module = "index.php";
        }
        return $module;
    }
}