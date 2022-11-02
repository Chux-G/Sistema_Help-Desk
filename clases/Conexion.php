<?php
class Conexion{
        public function conectar(){
            $servidor = "localhost"; //Ruta o direccion de servidor
            $usuario = "root";
            /*Clave -> database10*/
            $password = ""; //Clave del servidor
            $db = "helpdesk";
            $conexion = mysqli_connect($servidor, $usuario, $password, $db);

            return $conexion;
        }
    }
?>


