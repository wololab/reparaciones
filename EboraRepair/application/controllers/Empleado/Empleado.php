<?php

/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 01/02/2017
 * Time: 13:24
 */
class Empleado extends CI_Controller
{

    public function guardaEmpleado(){ // TODO
        $this->load->helper('empaquetar');
        $empleado = empaquetaEmpleado('pepe2', '123', 'Pepe', 'González', 'Zaragoza', '51523345V', 676889998, 'pepe2@pepepi.pi', 'empleado');
        $this->load->model('Empleado/Empleado_model');
        $id = $this->Empleado_model->saveEmpleado($empleado);

    }
}