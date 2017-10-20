<?php

class EnlaceController
{
    #ENLACES
    #-------------------------------------
    public function enlacePaginaController()
    {
        if(isset($_GET['action']))
        {
            $enlace = $_GET['action'];
        }
        else
        {
            $enlace = "index";
        }
        $respuesta = Paginas::enlacePaginaModel($enlace);

        include $respuesta;
    }
}