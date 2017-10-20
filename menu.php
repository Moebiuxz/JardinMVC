<?php
session_start();
if(!isset($_SESSION["user"]))
{
    header("location: index.php");
}
$enlace = new EnlaceController();
$usuario = new UsuarioController();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema de Riego</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

      <!-- Google Fonts -->
      <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

  </head>

  <body class="fixed-nav" id="page-top">
    <?php
    include "navbar.php";
    ?>

    <div class="content-wrapper py-3">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Inicio</a>
          </li>
          <li class="breadcrumb-item active">Mi Inicio</li>
        </ol>

          <!-- Tarjetas -->
        <div class="row">
            <!-- Tarjetas de estadisticas -->
            <?php
                include "tarjetas.php";
            ?>
        </div>

        </div>

        <!-- -----------------------------SECTION------------------------------------------------- -->
        <div class="container-fluid">
            <?php
                $enlace->enlacePaginaController();
            ?>
        </div>
        <!-- -----------------------------SECTION------------------------------------------------- -->
      </div>

    <?php
        include "utils.php";
    ?>
  </body>

</html>
