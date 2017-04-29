<?php
class Empleado extends CI_Controller
{

    public function guardaEmpleado(){ // TODO
        $this->load->helper('empaquetar');
        $empleado = empaquetaEmpleado('juan', '123', 'Juan', 'Pérez', 'Sánchez', '51523345V', 676889998, 'pepe2@pepepi.pi', 'empleado');
        $this->load->model('Empleado/Empleado_model');
        $id = $this->Empleado_model->saveEmpleado($empleado);
        echo 'done';
    }
}