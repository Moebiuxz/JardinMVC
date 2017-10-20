<?php

class Cuenta
{
    public $id;
    public $usuario;
    public $password;
    public $tipoCuenta;

    public function __construct($id, $usuario, $password, $tipoCuenta)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->tipoCuenta = $tipoCuenta;
    }
}