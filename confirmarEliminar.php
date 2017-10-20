
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Confirmar Eliminación de Usuario
    </div>
    <div class="card-body">
        <?php
        if(isset($_POST["btnSi"]))
        {
            echo "<div class='alert alert-success' role='alert'>
                El usuario ha sido eliminado!
            </div>";
        }
        else
        {?>
            <div class="alert alert-warning" role="alert">
                ¿Está seguro que desea eliminar el usuario con el rut <?php echo $_GET['id'];?>?
            </div>
            <form method="post">
                <a href="index.php?action=eliminarUsuario&id=<?php echo $_GET['id'];?>">
                    <input type="submit" value="Sí" name="btnSi">
                </a>
                <a href="index.php?action=menu">
                    <input type="button" value="No" name="btnNo">
                </a>
            </form>
            <?php
        }
        ?>
    </div>
</div>

<?php
    $eliminar = new UsuarioController();
    $eliminar->eliminarUsuarioController();

?>