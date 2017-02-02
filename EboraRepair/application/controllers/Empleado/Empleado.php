<?php

/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 01/02/2017
 * Time: 13:24
 */
class Empleado extends CI_Controller
{
    public function index()
    { //DEL
        $empleado = ['nick' => 'prueba',
            'password' => 123,
            'nombre' => 'pepe',
            'primer_apellido' => 'gómez',
            'segundo_apellido' => 'pérez',
            'dni_o_cod_taller' => '51538831v',
            'telefono' => 666666666,
            'email' => 'pepe@pepe.pe',
            'rol' => 'reparador',
            'activo' => true
        ];
        $this->load->model('Empleado/Empleado_model');
        $this->Empleado_model->saveEmpleado($empleado);
        $empleadoB = $this->Empleado_model->getEmpleado($empleado);
        if ($empleadoB == null) echo 'null';
        else {
            foreach ($empleadoB as $emple) {
                echo $emple->nombre;
            }

        }
//        echo sizeof($empleadoB);
    }

    public function empaquetaEmpleado($nick, $password, $nombre, $primerAp, $segundoAp, $dni, $tfno, $email, $rol)
    {
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
            'activo' => true
        ];
        return $empleado;
    }

    public function empaquetaTallerEmpleado($nick, $password, $codTaller, $tfno, $email, $rol)
    {
        $empleado = [
            'nick' => $nick,
            'password' => $password,
            'nombre' => null, // TODO nombre del taller = null?
            'primer_apellido' => null,
            'segundo_apellido' => null,
            'dni_o_cod_taller' => $codTaller,
            'telefono' => $tfno,
            'email' => $email,
            'rol' => $rol,
            'activo' => true
        ];
        return $empleado;
    }

    public function guardaEmpleado(){ // TODO
        $empleado = $this->empaquetaEmpleado('pepe2', '123', 'Pepe', 'González', 'Zaragoza', '51523345V', 676889998, 'pepe2@pepepi.pi', 'empleado');
        $this->load->model('Empleado/Empleado_model');
        $id = $this->Empleado_model->saveEmpleado($empleado);

    }
    public function recuperaEmpleado($id){ //TODO Guardar en sesion el id del usuario activo seria una buena idea

    }
}