<?php

    function empaquetaEmpleado($nick, $password, $nombre, $primerAp, $segundoAp, $dni, $tfno, $email, $rol){
        $empleado = [
            'nick' => $nick,
            'password' => $password,
            'nombre' => $nombre,
            'primer_apellido' => $primerAp,
            'segundo_apellido' => $segundoAp,
            'dni_o_cod_taller' => $dni,
            'telefono' => $tfno,
            'email' => $email,
            'rol' => $rol,
            'activo' => true,
            'primeraVez' => true
        ];
        return $empleado;
    }

function empaquetaTallerEmpleado($nick, $password, $codTaller, $tfno, $email, $rol)
{
    $empleado = [
        'nick' => $nick,
        'password' => $password,
        'nombre' => null,
        'primer_apellido' => null,
        'segundo_apellido' => null,
        'dni_o_cod_taller' => $codTaller,
        'telefono' => $tfno,
        'email' => $email,
        'rol' => $rol,
        'activo' => true,
        'primeraVez' => true
    ];
    return $empleado;
}
function empaquetaImagenReparacion($src, $alt, $titulo)
{
    $imagenReparacion = [
        'src' => $src,
        'alt' => $alt,
        'titulo' => $titulo,
    ];
    return $imagenReparacion;
}
function empaquetaTaller($nombre, $ciudad, $tfno, $direccion, $cif)
{
    $taller = [
        'nombre' => $nombre,
        'ciudad' => $ciudad,
        'telefono' => $tfno,
        'direccion' => $direccion,
        'cif' => $cif
    ];
    return $taller;
}
function empaquetaReparacion($nombreOrdenante, $primerApOrdenante, $segundoApOrdenante, $dniOrdenante,
                                    $tfnoOrdenante, $dia, $mes, $anyo, $hora, $tipo, $aseguradora,
                                    $numeroSiniestro, $numeroPoliza, $diaSiniestro, $mesSiniestro,
                                    $anyoSiniestro, $empleado, $cliente, $coche)
{

    $reparacion = [
        'nombre_ordenante' => $nombreOrdenante,
        'primer_apellido_ordenante' => $primerApOrdenante,
        'segundo_apellido_ordenante' => $segundoApOrdenante,
        'dni_ordenante' => $dniOrdenante,
        'telefono_ordenante' => $tfnoOrdenante,
        'dia' => $dia,
        'mes' => $mes,
        'anyo' => $anyo,
        'hora' => $hora,
        'tipo' => $tipo,
        'aseguradora' => $aseguradora,
        'numero_siniestro' => $numeroSiniestro,
        'numero_poliza' => $numeroPoliza,
        'dia_siniestro' => $diaSiniestro,
        'mes_siniestro' => $mesSiniestro,
        'anyo_siniestro' => $anyoSiniestro,
        'taller' => null,
        'empleado' => $empleado,
        'cliente' => $cliente,
        'coche' => $coche,
        'facturada' => false,
    ];

    return $reparacion;
}

function empaquetaCliente($nombre, $primerAp, $segundoAp, $direccion, $cp, $poblacion, $tfno, $email, $dni)
{
    $cliente = [
        'nombre' => $nombre,
        'primer_apellido' => $primerAp,
        'segundo_apellido' => $segundoAp,
        'direccion' => $direccion,
        'cp' => $cp,
        'poblacion' => $poblacion,
        'telefono' => $tfno,
        'email' => $email,
        'dni' => $dni
    ];
    return $cliente;
}
function empaquetaCoche($matricula, $bastidor, $marca, $modelo, $anyo, $color, $kms)
{
    $coche = [
        'matricula' => $matricula,
        'bastidor' => $bastidor,
        'marca' => $marca,
        'modelo' => $modelo,
        'anyo' => $anyo,
        'color' => $color,
        'kms' => $kms
    ];
    return $coche;
}
