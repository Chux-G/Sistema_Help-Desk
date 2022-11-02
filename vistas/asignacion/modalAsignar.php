
<!-- Modal -->
<form id ="frmAsignaEquipo" method="POST" onsubmit="return asignarEquipo()">

    <div class="modal fade" id="modalAsignarEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Nombre de persona</label>

                        <?php
                            $sql = "SELECT 
                                        persona.id_persona,
                                        CONCAT(persona.paterno,
                                                ' ',
                                                persona.materno,
                                                ' ',
                                                persona.nombre) AS nombre
                                    FROM
                                        helpdesk.t_persona AS persona
                                            INNER JOIN
                                        helpdesk.t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                                            AND usuario.id_rol = 1
                                    ORDER BY persona.paterno";
                            $respuesta = mysqli_query($conexion, $sql);
                        ?>

                        <select name="idPersona" id="idPersona" class="form-control" required>
                            <option value="">Selecciona una opción</option>
                                <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
                                    <option value="<?php echo $mostrar['id_persona']; ?>"><?php echo $mostrar['nombre'];?></option>
                                <?php }?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Tipo de equipo</label>

                        <?php
                            $sql = "SELECT 
                                        id_equipo,
                                        nombre
                                    FROM
                                    helpdesk.t_cat_equipo ORDER BY nombre";
                            $respuesta = mysqli_query($conexion, $sql);
                        ?>

                        <select name="idEquipo" id="idEquipo" class="form-control" required>
                            <option value="">Selecciona una opción</option>
                                <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
                                    <option value="<?php echo $mostrar['id_equipo']; ?>"><?php echo $mostrar['nombre'];?></option>
                                <?php }?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label for="modelo">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label for="color">Color</label>
                        <input type="text" name="color" id="color" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label for="memoria">Memoria</label>
                        <input type="text" name="memoria" id="memoria" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label for="discoDuro">Disco Duro</label>
                        <input type="text" name="discoDuro" id="discoDuro" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label for="procesador">Procesador</label>
                        <input type="text" name="procesador" id="procesador" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary">Asignar</button>
            </div>
            </div>
        </div>
    </div>

</form>

<!--/* SQL PARA CREAR TABLA DE ASIGNACION DE EQUIPOS:
CREATE TABLE helpdesk.t_cat_equipo (
    id_equipo INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(245) NOT NULL,
    descripcion VARCHAR(245) NULL,
  PRIMARY KEY (id_equipo));
  
  */-->
