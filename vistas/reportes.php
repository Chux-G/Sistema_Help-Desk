
<?php 
    include "header.php"; //Validacion segun el rol de usuario admin/cliente
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2){
?>


<!-- Contenido de la Pagina -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="fw-light">Gestionar reportes de usuarios</h1>
                <p class="lead">
                    <hr>
                    <div id="tablaReporteAdminLoad"></div>
                </p>
            </div>
        </div>
    </div>

<?php 
    include "reportesAdmin/modalAgregarSolucion.php";
    include "footer.php"; 
?>
    <script src="../public/js/reportesAdmin/reportesAdmin.js"></script>
<?php
    }else{
        header("location:../index.html");
    }
?>       