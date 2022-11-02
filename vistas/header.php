<?php //Usar sesiones de usuario
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/plantilla.css">
    <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">
    <title>
        Asistencia Técnica
    </title>
</head>
<body>
    
    <!-- Barra de Navegacion de la Pagina-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                Soporte Técnico
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="inicio.php">
                    <span class="fas fa-home"></span> Inicio
                    </a>
                </li>
            <?php if($_SESSION['usuario']['rol'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="misDispositivos.php" style="black">
                    <span class="fas fa-microchip"></span> Mis dispositivos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="misReportes.php">
                    <span class="fas fa-file-alt"></span> Reportes de Soporte
                    </a>
                </li>
            <?php } else if($_SESSION['usuario']['rol'] == 2) { ?>
                <!--De aqui en adelante, son las vistas del administrador en la pagina-->
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">
                    <span class="fas fa-users-cog"></span> Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="asignacion.php">
                    <span class="fas fa-address-book"></span> Asignación
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reportes.php">
                    <span class="fas fa-file-alt"></span> Reportes
                    </a>
                </li>
            <?php } ?>
                <li class="nav-item dropdown">
                    <a style="color:blue" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                        role="button" data-toggle="dropdown" aria-expanded="false">
                        <!--Tipo de Usuario (admin / cliente)-->
                        <span class="fas fa-user-tie"></span> Usuario: <?php echo $_SESSION['usuario']['nombre'];?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Editar Datos</a></li>
                        <!--<li><hr class="dropdown-divider"></li>-->
                        <li><a class="dropdown-item" href="../procesos/usuarios/login/salir.php">Salir</a></li>
                    </ul>
            </li>
            </ul>
            </div>
        </div>
    </nav>