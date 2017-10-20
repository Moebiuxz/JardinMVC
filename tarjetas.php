<?php
    $cantidad = new UsuarioController();
    $cantidadRiego = new RiegoController();
?>
<!-- Tarjeta de Riegos -->
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
            </div>
            <div class="mr-5">
                <?php $cantidadRiego->getCantidadRiegosController() ?> riegos registrados en el sistema!
            </div>
        </div>
        <a href="index.php?action=tablaRiego" class="card-footer text-white clearfix small z-1">
            <span class="float-left">Ver detalles</span>
            <span class="float-right">
                          <i class="fa fa-angle-right"></i>
                        </span>
        </a>
    </div>
</div>
<!-- /Tarjetas de Riegos -->

<!-- Tarjetas de Usuarios -->
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
            </div>
            <div class="mr-5">
                <?php $cantidad->getCantidadUsuarioController(); ?> Usuarios registrados!
            </div>
        </div>
        <a href="index.php?action=menu" class="card-footer text-white clearfix small z-1">
            <span class="float-left">Ver detalles</span>
            <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
        </a>
    </div>
</div>
<!-- /Tarjetas de Usuarios -->