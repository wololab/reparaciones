<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form id="formulario" onsubmit="return comprobarCampos();" action="<?=base_url()?>reparacion/datosReparacion" method="post">
                <br/>
                <i>Los campos marcados con * son obligatorios</i>
                <div class="row">
                    <fieldset>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="fecha">Fecha *</label>
                                <input type="date" id="fecha" name="fecha" value="<?=date('Y-m-d')?>" class="form-control" required="required"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="hora">Hora *</label>
                                <input type="text" id="hora" name="hora" value="<?=date('H:i')?>" class="form-control" required="required"/>
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
                                <input type="text" class="form-control" id="marca" name="marca" required="required"/>
                                <label for="anio">Año *</label>
                                <input type="number" class="form-control" id="anio" name="anio" min="1885" max="<?= date('Y') ?>" required="required"/>
                                <label for="bastidor">Bastidor *</label>
                                <input type="text" class="form-control" id="bastidor" name="bastidor" required="required"/>
                                <label for="color">Color</label>
                                <input type="text" class="form-control" id="color" name="color"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="modelo">Modelo *</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" required="required"/>
                                <label for="matricula">Matrícula *</label>
                                <input type="text" class="form-control" id="matricula" name="matricula" required="required"/>
                                <label for="kms">Kms *</label>
                                <input type="number" class="form-control" id="kms" name="kms" required="required"/>
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
                                <input type="text" class="form-control" id="nombre" name="nombre" required="required"/>
                                <label for="ape2">Segundo Apellido *</label>
                                <input type="text" class="form-control" id="ape2" name="ape2" required="required"/>
                                <label for="cp">Código Postal *</label>
                                <input type="number" min="10000" max="99999" class="form-control" id="cp" name="cp" required="required"/>
                                <label for="telefono">Teléfono *</label>
                                <input type="number" class="form-control" min="600000000" max="900000000" id="telefono" name="telefono" required="required"/>
                                <label for="mail">E-mail *</label>
                                <input type="text" class="form-control" id="mail" name="email" required="required"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="ape1">Primer Apellido *</label>
                                <input type="text" class="form-control" id="ape1" name="ape1" required="required"/>
                                <label for="direccion">Dirección *</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required="required"/>
                                <label for="poblacion">Población *</label>
                                <input type="text" class="form-control" id="poblacion" name="poblacion" required="required"/>
                                <label for="dni">DNI *</label>
                                <input type="text" class="form-control" id="dni" name="dni" required="required"/>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row">
                    <fieldset>
                        <legend>Datos Siniestro</legend>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="nSin">Nº Siniestro *</label>
                                <input type="text" class="form-control" id="nSin" name="nSin" required="required"/>
                                <label for="fechaSin">Fecha Siniestro *</label>
                                <input type="date" class="form-control" id="fechaSin" name="fechaSin" required="required"/>
                                <label for="tipo">Tipo de Siniestro *</label>
                                <input type="text" class="form-control" id="tipo" name="tipo" required="required"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="nPol">Nº Póliza *</label>
                                <input type="text" class="form-control" id="nPol" name="nPol" required="required"/>
                                <label for="aseguradora">Aseguradora *</label>
                                <input type="text" class="form-control" id="aseguradora" name="aseguradora" required="required"/>
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
                                <input type="text" class="form-control" id="nombrePer" name="nombrePer" required="required"/>
                                <label for="ape2Per">Segundo Apellido *</label>
                                <input type="text" class="form-control" id="ape2Per" name="ape2Per" required="required"/>
                                <label for="telefonoPer">Teléfono *</label>
                                <input type="number" min="600000000" max="900000000" class="form-control" id="telefonoPer" name="telefonoPer" required="required"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="ape1Per">Primer Apellido *</label>
                                <input type="text" class="form-control" id="ape1Per" name="ape1Per" required="required"/>
                                <label for="dniPer">DNI *</label>
                                <input type="text" class="form-control" id="dniPer" name="dniPer" required="required"/>
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
        if(!/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/.test($('#mail').val())){
            bien = false;
            status.html(status.html() + 'Formato de email incorrecto <br/>');
        }
        if(!/^\d{8}[a-zA-Z]$/.test($('#dni').val())) {
            bien = false;
            status.html(status.html() + 'Formato de DNI Asegurado incorrecto <br/>');
        }
        if(!/^\d{8}[a-zA-Z]$/.test($('#dniPer').val())) {
            bien = false;
            status.html(status.html() + 'Formato de DNI de Persona que acude al taller incorrecto <br/>');
        }

       // console.log(bien);
        return bien;
    }

</script>