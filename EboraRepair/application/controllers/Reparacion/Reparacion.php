<?php

/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:40
 */
class Reparacion extends CI_Controller
{

    public function guardaReparacion(){ //TODO
        session_start();
        $this->load->helper('empaquetar');

        $taller = $this->guardaTaller();
        $cliente = $this->guardaCliente();
        $coche = $this->guardaCoche();
        $_SESSION['idReparador'] = 1; // Esto será la que esté en usuActivo
        $idEmpleado = $_SESSION['idReparador'];
        $this->load->model('Empleado/Empleado_model');
        $empleado = $this->Empleado_model->getEmpleadoById($idEmpleado);
        $reparacion = empaquetaReparacion('juanito', 'diaz', 'lopez', '54546677C', 655778898, 13, 6, 2017, '13:45', 'parabrisas',
            'mafre', 123423, 123121, 23, 4, 2017, $taller, $empleado, $cliente, $coche); //TODO via post
        $this->load->model('Reparacion/Reparacion_model');
        $_SESSION['idReparacion'] = $this->Reparacion_model->saveReparacion($reparacion);
        echo $_SESSION['idReparacion'];
      //  redirect('ImagenReparacion/ImagenReparacion/guardaImagenReparacion'); //TODO que tambien guarde las imagenes
    }

    public function guardaTaller(){
        $this->load->model('Taller/Taller_model');
        $taller = empaquetaTaller('pepe', 'madrid', 676885576, 'calle pepe', 'hhdhd'); //TODO via post
        $id = $this->Taller_model->saveTaller($taller);
        $taller = $this->Taller_model->getTallerById($id);
        return $taller;
    }

    public function guardaCliente(){
        $this->load->model('Cliente/Cliente_model');
        $cliente = empaquetaCliente('juan', 'gomez', 'perez', 'calle pepito', '28888', 'madrid', 913446577, 'pepe@pepe.pe'); //TODO via post
        $id = $this->Cliente_model->saveCliente($cliente);
        $cliente = $this->Cliente_model->getClienteById($id);
        return $cliente;
    }

    public function guardaCoche(){
        $this->load->model('Coche/Coche_model');
        $coche = empaquetaCoche('xxx444', 'dsdd', 'audi', 'a5', 2015, 'rojo', 456); //TODO via post
        $id = $this->Coche_model->saveCoche($coche);;
        $coche = $this->Coche_model->getCocheById($id);
        return $coche;
    }

}