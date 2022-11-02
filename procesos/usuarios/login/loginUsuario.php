<?php //Inicio de sesion del usuario
    session_start();
    $usuario = $_POST['login'];
    $password = sha1($_POST['password']); //Algoritmo de encriptacion

    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();

    echo $Usuarios -> loginUsuario($usuario, $password);
?>