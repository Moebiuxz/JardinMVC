<?php

class UsuarioController
{
    #LOGIN USUARIO
    #-------------------------------
    public function init()
    {
        include "login.php";
    }

    #MENU ADMINISTRADOR
    #-------------------------------
    public function menu()
    {
        include "menu.php";
    }

    #OBTENER USUARIO LOGIN
    #-------------------------------
    public function isUsuarioController()
    {
        if (isset($_POST['txtRutIngreso'])) {
            $datos = array(
                "rut" => $_POST['txtRutIngreso'],
                "clave" => $_POST['txtClaveIngreso']
            );

            $respuesta = Data::isUsuarioModel($datos);
            if ($respuesta) {
                session_start();
                $_SESSION["user"] = $_POST["txtRutIngreso"];
                header("location: index.php?action=menu");
            } else {
                header("location: index.php?action=error");
            }
        }
    }

    #OBTENER NOMBRE DEL ADMINISTRADOR
    #-------------------------------
    public function getAdminNameController()
    {
        $respuesta = Data::getAdminNameModel($_SESSION["user"]);
        return $nombre = $respuesta[0] . " " . $respuesta[1];
    }

    #OBTENER LISTA DE USUARIOS
    #-------------------------------
    public function getAllUsuariosController()
    {
        $respuesta = Data::getAllUsuariosModel();

        foreach ($respuesta as $usuario) {
            echo "<tr>";
            echo "<td>$usuario[0]</td>";
            echo "<td>$usuario[1]</td>";
            echo "<td>$usuario[2]</td>";
            echo "<td>$usuario[3]</td>";
            echo "<td><a href='index.php?action=editarUsuario&id=$usuario[0]'><i class=\"fa fa-fw fa-pencil-square-o\" aria-hidden=\"true\"></i>Actualizar</a></td>";
            echo "<td><a href='index.php?action=eliminarUsuario&id=$usuario[0]'><i class=\"fa fa-fw fa-times\" aria-hidden=\"true\"></i>Eliminar</a></td>";
            echo "</tr>";
        }
    }

    #REGISTRAR USUARIO
    #-------------------------------
    public function registrarUsuarioController()
    {
        if (isset($_POST["txtRutRegistro"])) {
            $usuario = new Usuario(
                $_POST["txtRutRegistro"],
                $_POST["txtNombreRegistro"],
                $_POST["txtApellidoRegistro"]
            );
            $respuesta = Data::registrarUsuarioModel($usuario);

            if ($respuesta) {
                $cuenta = new Cuenta(
                    0,
                    $_POST["txtRutRegistro"],
                    $_POST["txtPasswordRegistro"],
                    $_POST["cboTipoCuenta"]
                );
                Data::registrarCuentaModel($cuenta);

                $_GET["r"] = "ok";
            } else {
                $_GET["r"] = "error";
            }
        }
    }

    #EDITAR USUARIO
    #-------------------------------
    public function editarUsuarioController()
    {
        $idUsuario = $_GET["id"];
        $resultadoUsuario = Data::getUsuarioByRutModel($idUsuario);
        echo "<div class='form-group'>
                <label for='rut' class='cols-sm-2 control-label'>RUT</label>
                <div class='cols-sm-10'>
                    <div class='input-group'>
                        <span class='input-group-addon'><i class='fa fa-user fa' aria-hidden='true'></i></span>
                        <input type='text' value='$resultadoUsuario[0]' class='form-control' name='txtRutEditar' id='rut' readonly/>
                    </div>
                </div>
            </div>

            <div class='form-group'>
                <label for='nombre' class='cols-sm-2 control-label'>Nombre</label>
                <div class='cols-sm-10'>
                    <div class='input-group'>
                        <span class='input-group-addon'><i class='fa fa-users fa' aria-hidden='true'></i></span>
                        <input type='text' value='$resultadoUsuario[1]' class='form-control' name='txtNombreEditar' id='nombre'/>
                    </div>
                </div>
            </div>

            <div class='form-group'>
                <label for='apellido' class='cols-sm-2 control-label'>Apellido</label>
                <div class='cols-sm-10'>
                    <div class='input-group'>
                        <span class='input-group-addon'><i class='fa fa-users fa' aria-hidden='true'></i></span>
                        <input type='text' value='$resultadoUsuario[2]' class='form-control' name='txtApellidoEditar' id='apellido'/>
                    </div>
                </div>
            </div>";

        $resultadoTipoCuenta = Data::getAlltipoCuenta();
        echo "<div class='form-group'>
                <label for='tipoUsuario' class='cols-sm-2 control-label'>Tipo de Usuario</label>
                <div class='cols-sm-10'>
                    <div class='input-group'>
                        <span class='input-group-addon'><i class='fa fa-users fa' aria-hidden='true'></i></span>
                        <select name='cboTipoCuenta' id='tipoUsuario' class='form-control'>";
        foreach ($resultadoTipoCuenta as $item) {
            if ($item[0] == $resultadoUsuario[3])
            {
                echo "<option selected value='$item[0]'>$item[1]</option>";
            }
            else
            {
                echo "<option value='$item[0]'>$item[1]</option>";
            }
        }
        echo "</select>
                    </div>
                </div>
            </div>";
    }

    #EDITAR USUARIO
    #-------------------------------
    public function actualizarUsuarioController()
    {
        if (isset($_POST["txtRutEditar"]))
        {
            $usuario = new Usuario(
                $_POST["txtRutEditar"],
                $_POST["txtNombreEditar"],
                $_POST["txtApellidoEditar"]
            );

            $cuenta = new Cuenta(
                0,
                $_POST["txtRutEditar"],
                $_POST["txtPasswordEditar"],
                $_POST["cboTipoCuenta"]
            );

            Data::actualizarUsuarioModel($usuario);
            Data::actualizarTipoCuentaModel($cuenta);
            if(isset($_POST["txtPasswordEditar"]) && $_POST["txtPasswordEditar"] != null)
            {
                Data::actualizarPasswordCuentaModel($cuenta);
            }
            $_GET["r"] = "ok";
        }
    }

    #ELIMINAR USUARIO
    #-------------------------------
    public function eliminarUsuarioController()
    {
        if(isset($_POST["btnSi"]))
        {
            Data::actualizarEstadoEliminarCuenta($_GET["id"]);
            Data::actualizarEstadoEliminarUsuario($_GET["id"]);
        }
        $_GET["actualizar"] = "ok";
    }

    #OBTENER CANTIDAD DE USUARIOS
    #-------------------------------
    public function getCantidadUsuarioController()
    {
        $resultado = Data::getCantidadUsuarioModel();
        echo $resultado[0];
    }
}