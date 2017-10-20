<?php
$editar = new UsuarioController();
$editar->actualizarUsuarioController();
?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Actualizar Usuario
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post">
            <?php
            $editar->editarUsuarioController();
            ?>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Cambiar Password:</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="txtPasswordEditar" id="password"/>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Actualizar</button>
            </div>
        </form>
        <?php
            if (isset($_GET["r"]))
            {
                if ($_GET["r"] == "ok")
                {
                    echo "Se ha actualizado el usuario";
                }
                else
                {
                    echo "Ha surgido un error";
                }
            }
        ?>
    </div>
</div>