<?php
require_once "Conexion.php";

class Data extends Conexion
{
    #OBTENER USUARIO LOGIN
    #-------------------------------
    public static function isUsuarioModel($datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT * FROM cuenta WHERE fk_usuario_rut = :rut AND cuenta_clave = sha2(:clave, 256) AND fk_cuenta_tipo = 1 AND eliminar_estado = 0"
        );

        $stmt->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
        $stmt->bindParam(":clave", $datos["clave"], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }

    #OBTENER NOMBRE DEL ADMINISTRADOR
    #-------------------------------
    public static function getAdminNameModel($rut)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT usuario_nombre, usuario_apellido FROM usuario WHERE usuario_rut = :rut AND eliminar_estado = 0;"
        );

        $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }

    #OBTENER LISTA DE USUARIOS
    #-------------------------------
    public static function getAllUsuariosModel()
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT usuario_rut, usuario_nombre, usuario_apellido, tipo_descripcion FROM usuario
                        INNER JOIN cuenta ON usuario.usuario_rut = cuenta.fk_usuario_rut
                        INNER JOIN tipo_cuenta ON cuenta.fk_cuenta_tipo = tipo_cuenta.tipo_id 
                        WHERE usuario.eliminar_estado = 0"
        );

        $stmt->execute();

        return $stmt->fetchAll();
    }

    #OBTENER DATOS DE USUARIO
    #-------------------------------
    public static function getUsuarioByRutModel($rut)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT usuario_rut, usuario_nombre, usuario_apellido, tipo_id FROM usuario
            INNER JOIN cuenta ON usuario.usuario_rut = cuenta.fk_usuario_rut
            INNER JOIN tipo_cuenta ON cuenta.fk_cuenta_tipo = tipo_cuenta.tipo_id
            WHERE usuario_rut = :rut AND  usuario.eliminar_estado = 0;"
        );

        $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }

    #OBTENER LOS TIPOS DE CUENTA
    #-------------------------------
    public static function getAlltipoCuenta()
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT tipo_id, tipo_descripcion from tipo_cuenta WHERE eliminar_estado = 0"
        );

        $stmt->execute();

        return $stmt->fetchAll();
    }

    #REGISTRO DE USUARIO
    #-------------------------------
    public static function registrarUsuarioModel($usuario)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO usuario (usuario_rut, usuario_nombre, usuario_apellido) VALUES (:rut, :nombre, :apellido)"
        );

        $stmt->bindParam(":rut", $usuario->rut, PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $usuario->nombre, PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $usuario->apellido, PDO::PARAM_STR);

        return $stmt->execute();
    }

    #REGISTRO DE CUENTA
    #-------------------------------
    public static function registrarCuentaModel($cuenta)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO cuenta (fk_usuario_rut, cuenta_clave, fk_cuenta_tipo) VALUES (:rut, sha2(:clave, 256), :tipoCuenta)"
        );

        $stmt->bindParam(":rut", $cuenta->usuario, PDO::PARAM_STR);
        $stmt->bindParam(":clave", $cuenta->password, PDO::PARAM_STR);
        $stmt->bindParam(":tipoCuenta", $cuenta->tipoCuenta, PDO::PARAM_INT);
        $stmt->execute();
    }

    #ACTUALIZAR USUARIO
    #-------------------------------
    public static function actualizarUsuarioModel($usuario)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE usuario SET usuario_nombre = :nombre, usuario_apellido = :apellido WHERE usuario_rut = :rut;"
        );

        $stmt->bindParam(":rut", $usuario->rut, PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $usuario->nombre, PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $usuario->apellido, PDO::PARAM_STR);

        $stmt->execute();
    }

    #ACTUALIZAR TIPO CUENTA
    #-------------------------------
    public static function actualizarTipoCuentaModel($cuenta)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE cuenta SET fk_cuenta_tipo = :tipoCuenta WHERE fk_usuario_rut = :usuario"
        );

        $stmt->bindParam(":usuario", $cuenta->usuario, PDO::PARAM_STR);
        $stmt->bindParam(":tipoCuenta", $cuenta->tipoCuenta, PDO::PARAM_INT);

        $stmt->execute();
    }

    #ACTUALIZAR PASSWORD CUENTA
    #-------------------------------
    public static function actualizarPasswordCuentaModel($cuenta)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE cuenta SET cuenta_clave = sha2(:clave, 256) WHERE fk_usuario_rut = :usuario"
        );

        $stmt->bindParam(":usuario", $cuenta->usuario, PDO::PARAM_STR);
        $stmt->bindParam(":clave", $cuenta->password, PDO::PARAM_STR);

        $stmt->execute();
    }

    #ACTUALIZAR ELIMINAR ESTADO DE CUENTA
    #-------------------------------
    public static function actualizarEstadoEliminarCuenta($rut)
    {
        $stmt = Conexion::conectar()->prepare(
            "DELETE FROM cuenta WHERE fk_usuario_rut = :rut"
        );

        $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
        $stmt->execute();
    }

    #ACTUALIZAR ELIMINAR ESTADO DE USUARIO
    #-------------------------------
    public static function actualizarEstadoEliminarUsuario($rut)
    {
        $stmt = Conexion::conectar()->prepare(
            "DELETE FROM usuario WHERE usuario_rut = :rut"
        );

        $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
        $stmt->execute();
    }

    #ACTIVAR ESTADO DE CUENTA
    #-------------------------------
    public static function activarEstadoCuentaModel($rut)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE cuenta SET eliminar_estado = 0 WHERE fk_usuario_rut = :rut"
        );

        $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
        $stmt->execute();
    }

    #ACTIVAR ESTADO DE USUARIO
    #-------------------------------
    public static function activarEstadoUsuarioModel($rut)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE usuario SET eliminar_estado = 0 WHERE usuario_rut = :rut"
        );

        $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
        $stmt->execute();
    }

    #OBTENER CANTIDAD DE USUARIOS
    #-------------------------------
    public static function getCantidadUsuarioModel()
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT count(*) FROM usuario WHERE eliminar_estado = 0"
        );
        $stmt->execute();
        return $stmt->fetch();
    }

    #OBTENER CANTIDAD DE RIEGOS
    #-------------------------------
    public static function getCantidadRiegoModel()
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT count(*) FROM riego"
        );
        $stmt->execute();
        return $stmt->fetch();
    }

    #OBTENER LISTAR DE RIEGOS
    #-------------------------------
    public static function getAllRiegosModel()
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT riego_id, riego_fecha, riego_temperatura, ruego_humedad, tipo_descripcion, usuario_nombre, usuario_apellido FROM riego
            INNER JOIN tipo_riego ON riego.fk_riego_tipo = tipo_riego.tipo_id
            INNER JOIN usuario ON riego.fk_riego_usuario = usuario.usuario_rut;"
        );

        $stmt -> execute();
        return $stmt -> fetchAll();
    }
}