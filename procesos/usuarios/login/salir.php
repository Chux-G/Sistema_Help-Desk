<?php //Opcion Salir (Barra de Menu Principal) Quitar Sesion de Usuario
   session_start();
   session_destroy();
   
   header("location:../../../index.html");