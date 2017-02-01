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
    {
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
        if($empleadoB == null) echo 'null' ;
        else {
            foreach ($empleadoB as $emple){
                echo $emple->nombre;
            }

        }
//        echo sizeof($empleadoB);
    }

}