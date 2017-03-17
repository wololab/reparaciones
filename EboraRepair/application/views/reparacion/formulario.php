<div class="container">
    <form action="<?=base_url()?>reparacion/reparacion/datosReparacion" method="post"> <!-- Datos reparacion debe guardar en sesion los datos y desplegar para las imagenes DEL-->
        <br/>
        <i>Los campos marcados con * son obligatorios</i>
    <div id="formularioReparacion">
        <ul>
            <li><a href="#datos">Datos de la Reparación</a></li>
            <li><a href="#imagenes">Imágenes</a></li>
        </ul>
        <div id="datos">
            <fieldset>
                <label for="fecha">Fecha *</label>
                <input type="date" id="fecha" name="fecha" value="<?=date('Y-m-d')?>" class="form-control" required="required"/>
                <label for="hora">Hora *</label>
                <input type="text" id="hora" name="hora" value="<?=date('H:i')?>" class="form-control" required="required"/>
            </fieldset>
            <fieldset>
                <legend>Datos Vehículo</legend>
                <label for="marca">Marca *</label>
                <input type="text" class="form-control" id="marca" name="marca" required="required"/>
                <label for="modelo">Modelo *</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required="required"/>
                <label for="anio">Año *</label>
                <input type="number" class="form-control" id="anio" name="anio" min="1885" max="<?= date('Y') ?>" required="required"/>
                <label for="matricula">Matrícula *</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required="required"/>
                <label for="bastidor">Bastidor *</label>
                <input type="text" class="form-control" id="bastidor" name="bastidor" required="required"/>
                <label for="kms">Kms *</label>
                <input type="number" class="form-control" id="kms" name="kms" required="required"/>
                <label for="color">Color</label>
                <input type="text" class="form-control" id="color" name="color"/>
            </fieldset>
            <fieldset>
                <legend>Datos Asegurado</legend>
                <label for="nombre">Nombre *</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required"/>
                <label for="ape1">Primer Apellido *</label>
                <input type="text" class="form-control" id="ape1" name="ape1" required="required"/>
                <label for="ape2">Segundo Apellido *</label>
                <input type="text" class="form-control" id="ape2" name="ape2" required="required"/>
                <label for="direccion">Dirección *</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required="required"/>
                <label for="cp">Código Postal *</label>
                <input type="text" class="form-control" id="cp" name="cp" required="required"/>
                <label for="poblacion">Población *</label>
                <input type="text" class="form-control" id="poblacion" name="poblacion" required="required"/>
                <label for="telefono">Teléfono *</label>
                <input type="number" class="form-control" id="telefono" name="telefono" required="required"/>
                <label for="email">E-mail *</label>
                <input type="text" class="form-control" id="email" name="email" required="required"/>
                <label for="dni">DNI *</label>
                <input type="text" class="form-control" id="dni" name="dni" required="required"/>
            </fieldset>
            <fieldset>
                <legend>Datos Siniestro</legend>
                <label for="nSin">Nº Siniestro *</label>
                <input type="text" class="form-control" id="nSin" name="nSin" required="required"/>
                <label for="nPol">Nº Póliza *</label>
                <input type="text" class="form-control" id="nPol" name="nPol" required="required"/>
                <label for="fechaSin">Fecha Siniestro *</label>
                <input type="date" class="form-control" id="fechaSin" name="fechaSin" required="required"/>
                <label for="aseguradora">Aseguradora *</label>
                <input type="text" class="form-control" id="aseguradora" name="aseguradora" required="required"/>
                <label for="tipo">Tipo de Siniestro *</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required="required"/> <!-- TODO select? -->
            </fieldset>
            <fieldset>
                <legend>Persona que acude con el vehículo al taller</legend>
                <label for="nombrePer">Nombre *</label>
                <input type="text" class="form-control" id="nombrePer" name="nombrePer" required="required"/>
                <label for="ape1Per">Primer Apellido *</label>
                <input type="text" class="form-control" id="ape1Per" name="ape1Per" required="required"/>
                <label for="ape2Per">Segundo Apellido *</label>
                <input type="text" class="form-control" id="ape2Per" name="ape2Per" required="required"/>
                <label for="dniPer">DNI *</label>
                <input type="text" class="form-control" id="dniPer" name="dniPer" required="required"/>
                <label for="telefonoPer">Teléfono *</label>
                <input type="number" class="form-control" id="telefonoPer" name="telefonoPer" required="required"/>
            </fieldset>
            <br/>

        </div>
        <div id="imagenes">
            <fieldset>
                <legend>Matrícula *</legend>
                <label class="btn btn-default btn-file">
                    Browse <input type="file" style="display: none;" onchange="readURL(this, 1)" required="required"/>
                </label>
                <br/>
                <br/>
                <img id="prev1" src="#" alt="Matrícula" class="previewForm" />
            </fieldset>
            <fieldset>
                <legend>Detalle de Luna *</legend>
                <label class="btn btn-default btn-file">
                    Browse <input type="file" style="display: none;" onchange="readURL(this, 2)" required="required"/>
                </label>
                <br/>
                <br/>
                <img id="prev2" src="#" alt="Detalle de Luna" class="previewForm" />
            </fieldset>
            <fieldset>
                <legend>Permiso de Circulación *</legend>
                <label class="btn btn-default btn-file">
                    Browse <input type="file" style="display: none;" onchange="readURL(this, 3)" required="required"/>
                </label>
                <br/>
                <br/>
                <img id="prev3" src="#" alt="Permiso de Circulación" class="previewForm" />
            </fieldset>
            <fieldset>
                <legend>Póliza</legend>
                <label class="btn btn-default btn-file">
                    Browse <input type="file" style="display: none;" onchange="readURL(this, 4)"/>
                </label>
                <br/>
                <br/>
                <img id="prev4" src="#" alt="Póliza" class="previewForm" />
            </fieldset>
            <fieldset>
                <legend>Recibo</legend>
                <label class="btn btn-default btn-file">
                    Browse <input type="file" style="display: none;" onchange="readURL(this, 5)"/>
                </label>
                <br/>
                <br/>
                <img id="prev5" src="#" alt="Recibo" class="previewForm" />
            </fieldset>
            <fieldset>
                <legend>Máquina de Reparar o Luna Quitada *</legend>
                <label class="btn btn-default btn-file">
                    Browse <input type="file" style="display: none;" onchange="readURL(this, 6)" required="required"/>
                </label>
                <br/>
                <br/>
                <img id="prev6" src="#" alt="Máquina de Reparar o Luna Quitada" class="previewForm" />
            </fieldset>
            <fieldset>
                <legend>Orden de Trabajo *</legend>
                <label class="btn btn-default btn-file">
                    Browse <input type="file" style="display: none;" onchange="readURL(this, 7)" required="required"/>
                </label>
                <br/>
                <br/>
                <img id="prev7" src="#" alt="Orden de Trabajo" class="previewForm" />
            </fieldset>
            <fieldset>
                <legend>Impacto Reparado o Luna Montada</legend>
                <label class="btn btn-default btn-file">
                    Browse <input type="file" style="display: none;" onchange="readURL(this, 8)"/>
                </label>
                <br/>
                <br/>
                <img id="prev8" src="#" alt="Impacto Reparado o Luna Montada" class="previewForm" />
            </fieldset>
            <input type="button" value="Comprobar Campos" onclick="comprobarCampos();" class="btn btn-primary"/>
        </div>
    </div>

    </form>
    <p id="status"></p>
</div>
<script>
    $('#formularioReparacion').tabs();
    function comprobarCampos(){
        // TODO todas las expresiones regulares de los campos
    }
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prev' + id).attr('src', e.target.result);
                $('#prev' + id).toggle();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>