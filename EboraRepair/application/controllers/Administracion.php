<?php
class Administracion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['usuActivo']) || $_SESSION['usuActivo'] == null || $_SESSION['usuActivo']->rol != 'administrador'){
            redirect(base_url());
        }
    }

    public function filtros(){
        enmarcar($this, 'administracion/filtros');
    }

    public function xmlReparaciones(){
        $this->load->model('Reparacion/Reparacion_model');
        $reparaciones = $this->Reparacion_model->getAllReparacions();
        $datos['reparaciones'] = $reparaciones;
        echo $this->load->view('administracion/xmlReparaciones', $datos, true);
    }

    public function detalleReparacion(){
        $id = $_GET['id'];
        $this->load->model('Reparacion/Reparacion_model');
        $reparacion = $this->Reparacion_model->getReparacionById($id);
        $data['reparacion'] = $reparacion;
        enmarcar($this, 'administracion/detalleReparacion', $data);
    }

    public function listaEmpleados(){
        if(isset($_SESSION['pwd'])){
            $data['passTemporal'] = $_SESSION['pwd'];
            unset($_SESSION['pwd']);
            $data['nuevoEmple'] = $_SESSION['nuevoEmple'];
            unset($_SESSION['nuevoEmple']);
        }

        $this->load->model('Empleado/Empleado_model');
        $empleados = $this->Empleado_model->getAllEmpleados();
        $data['empleados'] = $empleados;
        enmarcar($this, 'administracion/listaDeEmpleados', $data);
    }
}
