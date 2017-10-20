<!-- Table Riego -->
<!-- Example Tables Card -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Listado de Riegos
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Temperatura</th>
                    <th>Humedad</th>
                    <th>Tipo</th>
                    <th>Usuario</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Temperatura</th>
                    <th>Humedad</th>
                    <th>Tipo</th>
                    <th>Usuario</th>
                </tr>
                </tfoot>
                <tbody>
                <?php
                $usuario = new RiegoController();
                $usuario->getAllRiegosController();
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">
        Actualizado hoy a las 15:03
    </div>
</div>