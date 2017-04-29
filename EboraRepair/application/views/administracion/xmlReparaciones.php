<?php
header('Content-type: text/xml');
?>
<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<reparaciones>
<?php foreach ($reparaciones as $reparacion) : ?>
    <reparacion>
        <id><?=$reparacion->id?></id>
        <nombreOrdenante><?=$reparacion->nombre_ordenante?></nombreOrdenante>
        <primerApellidoOrdenante><?=$reparacion->primer_apellido_ordenante?></primerApellidoOrdenante>
        <segundoApellidoOrdenante><?=$reparacion->segundo_apellido_ordenante?></segundoApellidoOrdenante>
        <dniOrdenante><?=$reparacion->dni_ordenante?></dniOrdenante>
        <telefonoOrdenante><?=$reparacion->telefono_ordenante?></telefonoOrdenante>
        <dia><?=$reparacion->dia?></dia>
        <mes><?=$reparacion->mes?></mes>
        <anyo><?=$reparacion->anyo?></anyo>
        <hora><?=$reparacion->hora?></hora>
        <tipo><?=$reparacion->tipo?></tipo>
        <aseguradora><?=$reparacion->aseguradora?></aseguradora>
        <numeroSiniestro><?=$reparacion->numero_siniestro?></numeroSiniestro>
        <numeroPoliza><?=$reparacion->numero_poliza?></numeroPoliza>
        <diaSiniestro><?=$reparacion->dia_siniestro?></diaSiniestro>
        <mesSiniestro><?=$reparacion->mes_siniestro?></mesSiniestro>
        <anyoSiniestro><?=$reparacion->anyo_siniestro?></anyoSiniestro>
        <facturada><?=$reparacion->facturada?></facturada>
        <cliente>
            <nombre><?=$reparacion->cliente->nombre?> <?=$reparacion->cliente->primer_apellido?> <?=$reparacion->cliente->segundo_apellido?></nombre>
            <direccion><?=$reparacion->cliente->direccion?></direccion>
            <cp><?=$reparacion->cliente->cp?></cp>
            <poblacion><?=$reparacion->cliente->poblacion?></poblacion>
            <telefono><?=$reparacion->cliente->telefono?></telefono>
            <email><?=$reparacion->cliente->email?></email>
        </cliente>
        <coche>
            <matricula><?=$reparacion->coche->matricula?></matricula>
            <bastidor><?=$reparacion->coche->bastidor?></bastidor>
            <marca><?=$reparacion->coche->marca?></marca>
            <modelo><?=$reparacion->coche->modelo?></modelo>
            <anyoCoche><?=$reparacion->coche->anyo?></anyoCoche>
            <color><?=$reparacion->coche->color?></color>
            <kms><?=$reparacion->coche->kms?></kms>
        </coche>
        <empleado>
            <nombreReparador><?=$reparacion->empleado->nombre?> <?=$reparacion->empleado->primer_apellido?> <?=$reparacion->empleado->segundo_apellido?></nombreReparador>
            <dni_o_codTaller><?=$reparacion->empleado->dni_o_cod_taller?></dni_o_codTaller>
            <telefonoReparador><?=$reparacion->empleado->telefono?></telefonoReparador>
            <emailReparador><?=$reparacion->empleado->email?></emailReparador>
            <activo><?=$reparacion->empleado->activo?></activo>
        </empleado>
        <taller>
            <nombreTaller><?=$reparacion->taller->nombre?></nombreTaller>
            <ciudadTaller><?=$reparacion->taller->ciudad?></ciudadTaller>
            <telefonoTaller><?=$reparacion->taller->telefono?></telefonoTaller>
            <direccionTaller><?=$reparacion->taller->direccion?></direccionTaller>
            <cif><?=$reparacion->taller->cif?></cif>
        </taller>
        <?php foreach($reparacion->xownImagenReparacionList as $imagen): ?>
            <imagen>
                <src><?=$imagen->src?></src>
                <alt><?=$imagen->alt?></alt>
                <titulo><?=$imagen->titulo?></titulo>
            </imagen>
        <?php endforeach; ?>
    </reparacion>
<?php endforeach; ?>
</reparaciones>