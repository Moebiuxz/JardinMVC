<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Administración Sistema de Control de Riego</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav">
            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Inicio">
                <a class="nav-link" href="index.php?action=menu">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">
                Inicio</span>
                </a>
            </li>

            <!-- Nav del usuario -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents">
                    <i class="fa fa-fw fa-user-circle-o"></i>
                    <span class="nav-link-text">
                Usuarios</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="index.php?action=registroUsuario">Registro</a>
                    </li>
                    <li>
                        <a href="index.php?action=menu">Listado</a>
                    </li>
                </ul>
                <!-- /Nav del Usuario -->
            </li>

            <!-- Nav de Riego -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti">
                    <i class="fa fa-fw fa-sitemap"></i>
                    <span class="nav-link-text">
                Riegos</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti">
                    <li>
                        <a href="index.php?action=tablaRiego">Listar</a>
                    </li>
                    <li>
                        <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Reportes</a>
                        <ul class="sidenav-third-level collapse" id="collapseMulti2">
                            <li>
                                <a href="#">Reporte por fecha</a>
                            </li>
                            <li>
                                <a href="#">Reporte por usuario</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- /Nav de Riego -->
        </ul>

        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <!-- Notificaciones -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Notificaciones
                <span class="badge badge-pill badge-warning">2 Nuevos</span>
              </span>
                    <span class="new-indicator text-warning d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">2</span>
              </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Nuevas notifiaciones:</h6>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Inicio de Riego Automático</strong>
                </span>
                        <span class="small float-right text-muted">15:11</span>
                        <div class="dropdown-message small">Se ha iniciado el riego automático (17-08-2017).</div>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-long-arrow-down"></i>
                    Fin de Riego Automático</strong>
                </span>
                        <span class="small float-right text-muted">15:21</span>
                        <div class="dropdown-message small">Ha finalizado el riego automático (17-08-2017).</div>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">
                        Ver todas las notificaciones
                    </a>
                </div>
            </li>
            <!-- /Notificaciones -->

            <!-- Datos usuario -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-address-card"></i>
                    <?php echo $usuario->getAdminNameController()?></a>
            </li>
            <!-- /Datos usuario -->

            <li class="nav-item">
                <a href="cerrarSesion.php" class="nav-link">
                    <i class="fa fa-fw fa-sign-out"></i>
                    Cerrar Sesión</a>
            </li>
        </ul>
    </div>
</nav>
