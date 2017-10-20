<?php

class Usuario
{
    public $rut;
    public $nombre;
    public $apellido;

    public function __construct($rut, $nombre, $apellido)
    {
        $this->rut = $rut;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

}