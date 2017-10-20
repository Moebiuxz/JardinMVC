<?php
$registro = new UsuarioController();
$registro->registrarUsuarioController();
?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Registro de Usuario
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post">

            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">RUT</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="txtRutRegistro" id="name"  placeholder="Ingresa el RUT"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Nombre</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="txtNombreRegistro" id="username"  placeholder="Ingresa el nombre"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Apellido</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="txtApellidoRegistro" id="username"  placeholder="Ingresa el apellido"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="tipoUsuario" class="cols-sm-2 control-label">Tipo de Usuario</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        <select name="cboTipoCuenta" id="tipoUsuario" class="form-control">
                            <option value="1">ADMINISTRADOR</option>
                            <option value="2">NORMAL</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="txtPasswordRegistro" id="password"  placeholder="Ingresa la contraseña"/>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Registrar</button>
            </div>
        </form>
        <div>
            <?php
                if (isset($_GET["r"]))
                {
                    if($_GET["r"] == "ok")
                    {
                        echo "<div class='alert alert-success' role='alert'>";
                        echo "Usuario registrado!!";
                        echo "</div>";
                    }
                    else
                    {
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo "Error al registrar!!";
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </div>
</div>



