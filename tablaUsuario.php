<!-- Table Usuarios -->
<!-- Example Tables Card -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Listado de Usuarios
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                <tr>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo de Cuenta</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo de Cuenta</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                </tfoot>
                <tbody>
                <?php
                $usuario = new UsuarioController();
                $usuario->getAllUsuariosController();
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">
        Actualizado hoy a las 15:03
    </div>
</div>