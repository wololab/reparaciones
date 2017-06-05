<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form id="formulario" onsubmit="return comprobarCampos();" action="<?=base_url()?>reparacion/editarReparacionPost" method="post">
                <input type="hidden" value="<?=$reparacion->id?>" name="id"/>
                <br/>
                <i>Los campos marcados con * son obligatorios</i>
                <div class="row">
                    <fieldset>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="fecha">Fecha *</label>
                                <input type="date" id="fecha" name="fecha" value="<?=$reparacion->anyo . '-' . $reparacion->mes . '-' . $reparacion->dia?>" class="form-control" required="required"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="hora">Hora *</label>
                                <input type="text" id="hora" name="hora" value="<?=$reparacion->hora?>" class="form-control" required="required"/>
                            </div>
                        </div>
                    </fieldset>
                </div><!-- End row -->
                <div class="row">
                    <fieldset>
                        <legend>Datos Vehículo</legend>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="marca">Marca *</label>
                                <input value="<?=$reparacion->coche->marca?>" type="text" class="form-control" id="marca" name="marca" required="required"/>
                                <label for="anio">Año *</label>
                                <input value="<?=$reparacion->coche->anyo?>" type="number" class="form-control" id="anio" name="anio" min="1885" max="<?= date('Y') ?>" required="required"/>
                                <label for="bastidor">Bastidor *</label>
                                <input value="<?=$reparacion->coche->bastidor?>" type="text" class="form-control" id="bastidor" name="bastidor" required="required"/>
                                <label for="color">Color</label>
                                <input value="<?=$reparacion->coche->color?>" type="text" class="form-control" id="color" name="color"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="modelo">Modelo *</label>
                                <input value="<?=$reparacion->coche->modelo?>" type="text" class="form-control" id="modelo" name="modelo" required="required"/>
                                <label for="matricula">Matrícula *</label>
                                <input value="<?=$reparacion->coche->matricula?>" type="text" class="form-control" id="matricula" name="matricula" required="required"/>
                                <label for="kms">Kms *</label>
                                <input value="<?=$reparacion->coche->kms?>" type="number" class="form-control" id="kms" name="kms" required="required"/>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row">
                    <fieldset>
                        <legend>Datos Asegurado</legend>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="nombre">Nombre *</label>
                                <input value="<?=$reparacion->cliente->nombre?>" type="text" class="form-control" id="nombre" name="nombre" required="required"/>
                                <label for="ape2">Segundo Apellido *</label>
                                <input value="<?=$reparacion->cliente->segundo_apellido?>" type="text" class="form-control" id="ape2" name="ape2" required="required"/>
                                <label for="cp">Código Postal *</label>
                                <input value="<?=$reparacion->cliente->cp?>" type="number" min="10000" max="99999" class="form-control" id="cp" name="cp" required="required"/>
                                <label for="telefono">Teléfono *</label>
                                <input value="<?=$reparacion->cliente->telefono?>" type="number" class="form-control" min="600000000" max="900000000" id="telefono" name="telefono" required="required"/>
                                <label for="mail">E-mail</label>
                                <input value="<?=$reparacion->cliente->email?>" type="text" class="form-control" id="mail" name="email"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="ape1">Primer Apellido *</label>
                                <input value="<?=$reparacion->cliente->primer_apellido?>" type="text" class="form-control" id="ape1" name="ape1" required="required"/>
                                <label for="direccion">Dirección *</label>
                                <input value="<?=$reparacion->cliente->direccion?>" type="text" class="form-control" id="direccion" name="direccion" required="required"/>
                                <label for="poblacion">Población *</label>
                                <input value="<?=$reparacion->cliente->poblacion?>" type="text" class="form-control" id="poblacion" name="poblacion" required="required"/>
                                <label for="dni">DNI/NIE *</label>
                                <input value="<?=$reparacion->cliente->dni?>" type="text" class="form-control" id="dni" name="dni" required="required"/>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row">
                    <fieldset>
                        <legend>Datos Siniestro</legend>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="nSin">Nº Siniestro</label>
                                <input value="<?=$reparacion->numero_siniestro?>" type="text" class="form-control" id="nSin" name="nSin"/>
                                <label for="fechaSin">Fecha Siniestro</label>
                                <input value="<?=$reparacion->anyo_siniestro . '-' . $reparacion->mes_siniestro . '-' . $reparacion->dia_siniestro?>" type="date" class="form-control" id="fechaSin" name="fechaSin"/>
                                <label for="tipo">Tipo de Siniestro *</label>
                                <input value="<?=$reparacion->tipo?>" type="text" class="form-control" id="tipo" name="tipo" required="required"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="nPol">Nº Póliza *</label>
                                <input value="<?=$reparacion->numero_poliza?>" type="text" class="form-control" id="nPol" name="nPol" required="required"/>
                                <label for="aseguradora">Aseguradora *</label>
                                <input value="<?=$reparacion->aseguradora?>" type="text" class="form-control" id="aseguradora" name="aseguradora" required="required"/>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row">
                    <fieldset>
                        <legend>Persona que acude con el vehículo al taller</legend>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="nombrePer">Nombre *</label>
                                <input value="<?=$reparacion->nombre_ordenante?>" type="text" class="form-control" id="nombrePer" name="nombrePer" required="required"/>
                                <label for="ape2Per">Segundo Apellido *</label>
                                <input value="<?=$reparacion->segundo_apellido_ordenante?>" type="text" class="form-control" id="ape2Per" name="ape2Per" required="required"/>
                                <label for="telefonoPer">Teléfono *</label>
                                <input value="<?=$reparacion->telefono_ordenante?>" type="number" min="600000000" max="900000000" class="form-control" id="telefonoPer" name="telefonoPer" required="required"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="ape1Per">Primer Apellido *</label>
                                <input value="<?=$reparacion->primer_apellido_ordenante?>" type="text" class="form-control" id="ape1Per" name="ape1Per" required="required"/>
                                <label for="dniPer">DNI/NIE *</label>
                                <input value="<?=$reparacion->dni_ordenante?>" type="text" class="form-control" id="dniPer" name="dniPer" required="required"/>
                            </div>
                        </div>
                    </fieldset>
                </div>
                    <br/>
                <input type="submit" value="Siguiente" class="btn btn-primary"/>
            </form>
            <p id="status" style="color: red;"></p>
        </div><!-- end col-xs-12 -->
    </div><!-- end row -->
</div><!-- end container -->


<script>
    function comprobarCampos(){
        var bien = true;
        var status = $('#status');
        status.text("");
        if(!/^\d{2}:\d{2}$/.test($('#hora').val())){
            bien = false;
            status.html(status.html() + 'Formato de hora incorrecto <br/>');
        }
        var email = $('#mail').val();
        if(email != '' && !/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/.test(email)){
            bien = false;
            status.html(status.html() + 'Formato de email incorrecto <br/>');
        }
        var dni = $('#dni').val().toUpperCase();
        if(!/^\d{8}[A-Z]$/.test(dni) && !/^[XYZ][0-9]{7}[A-Z]$/.test(dni)) {
            bien = false;
            status.html(status.html() + 'Formato de DNI/NIE Asegurado incorrecto <br/>');
        }
        var dniPer = $('#dniPer').val().toUpperCase();
        if(!/^\d{8}[A-Z]$/.test(dniPer) && !/^[XYZ][0-9]{7}[A-Z]$/.test(dniPer)) {
            bien = false;
            status.html(status.html() + 'Formato de DNI/NIE de Persona que acude al taller incorrecto <br/>');
        }

       // console.log(bien);
        return bien;
    }

</script>