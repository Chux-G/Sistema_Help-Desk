$(document).ready(function(){
    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
});

//Validacion del Modulo Agregar Usuarios
function agregarNuevoUsuario(){
    alert("Esta funcionando");
    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success:function(respuesta){
            //console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#frmAgregarUsuario')[0].reset();
                Swal.fire(":D","Agregado exitosamente!","success");
            } else{
                Swal.fire(":(","Error al agregar!"+respuesta,"error");
            }
        }
    });

    return false;
}

function obtenerDatosUsuario(idUsuario) {
    ajax({
        type: "POST",
        data: "idUsuario="+ idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
            $('#paternou').val(respuesta['paterno']);
            $('#maternou').val(respuesta['materno']);
            $('#nombreu').val(respuesta['nombrePersona']);
            $('#fechaNacimientou').val(respuesta['fechaNacimiento']);
            $('#sexou').val(respuesta['sexo']);
            $('#telefonou').val(respuesta['telefono']);
            $('#correou').val(respuesta['correo']);
            $('#usuariou').val(respuesta['usuario']);
            $('#idRolu').val(respuesta['idRol']);
            $('#ubicacionu').val(respuesta['ubicacion']);
        }
    });
}

function actualizarDatos() {
    $.ajax({
        type:"POST",
        data:$('#frmActualizarUsuario').serialize(),
        url:"../procesos/crud/actualizarUsuario.php",
        success:function(respuesta){
            //console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#modalActualizarUsuarios').modal('hide')
                Swal.fire(":D","Actualizado exitosamente!","success");
            } else{
                Swal.fire(":(","Error al actualizar!"+respuesta,"error");
            }
        }
    });

    return false;
}

function agregarIdUsuarioReset(idUsuario) {
    $('#idUsuarioReset').val(idUsuario);
}

function resetPassword() {
    $.ajax({
        type:"POST",
        data:$('#frmActualizarPassword').serialize(),
        url:"../procesos/usuarios/extras/resetPassword.php",
        success:function(respuesta) {
            //console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#modalResetPassword').modal('hide')
                Swal.fire(":D","Cambio de password con exito!","success");
            } else{
                Swal.fire(":(","Error al actualizar el password!"+respuesta,"error");
            }
        }
    });

    return false;
}

function cambioEstatusUsuario(idUsuario, estatus) {
    $.ajax({
        type:"POST",
        data:"idUsuario=" + idUsuario + "&estatus=" + estatus,
        url:"../procesos/usuarios/extras/cambioEstatus.php",
        success:function(respuesta) {
            //console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                Swal.fire(":D","Cambio de estatus con exito!","success");
            } else{
                Swal.fire(":(","Error al cambiar el estatus!"+respuesta,"error");
            }
        }
    });
}

function eliminarUsuario(idUsuario, idPersona) {
    Swal.fire({
        title: 'Estas seguro de eliminar este reporte?',
        text: "Una vez eliminado no podra ser recuperado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:"POST",
                data: "idUsuario=" + idUsuario + "&idPersona=" + idPersona,
                url:"../procesos/usuarios/crud/eliminarUsuario.php",
                success:function(respuesta) {
                    //console.log(respuesta);
                    respuesta = respuesta.trim();
                    if(respuesta == 1){
                        $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                        Swal.fire(":D","Usuario eliminado con exito!","warning");
                    } else{
                        Swal.fire(":(","Error al eliminar usuario!"+respuesta,"error");
                    }
                }
            });
        }
      })

      return false;
}