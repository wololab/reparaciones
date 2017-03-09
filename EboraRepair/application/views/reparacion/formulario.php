<div class="container">
    <form action="<?=base_url()?>reparacion/reparacion/datosReparacion" method="post"> <!-- Datos reparacion debe guardar en sesion los datos y desplegar para las imagenes DEL-->
        <br/>
        <i>Los campos marcados con * son obligatorios</i>
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
            <input type="date" class="form-control" id="aseguradora" name="aseguradora" required="required"/>
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
            <label for="fechaPer">Fecha *</label>
            <input type="date" class="form-control" id="fechaPer" name="fechaPer" required="required"/>
            <label for="horaPer">Hora *</label>
            <input type="text" class="form-control" id="horaPer" name="horaPer" required="required"/>
        </fieldset>
        <br/>
        <input type="button" value="Siguiente" onclick="comprobarCampos();" class="btn btn-primary"/>
    </form>
</div>
<script>
    function comprobarCampos(){
        // TODO todas las expresiones regulares de los campos
    }
</script>