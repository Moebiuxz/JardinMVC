<?php
require_once "model/db/Data.php";
require_once "controller/UsuarioController.php";
require_once "controller/EnlaceController.php";
require_once "controller/RiegoController.php";
require_once "model/Usuario.php";
require_once "model/Paginas.php";
require_once "model/Cuenta.php";
require_once "model/TipoCuenta.php";

$mvc = new UsuarioController();

if (isset($_GET["action"]))
{
    if ($_GET["action"] == "error")
    {
        $mvc -> init();
    }
    else
    {
        $mvc -> menu();
    }
}
else
{
    $mvc -> init();
}
