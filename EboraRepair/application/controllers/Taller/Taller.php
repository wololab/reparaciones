<?php

/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:38
 */
class Taller extends CI_Controller
{
    public function empaquetaTaller($nombre, $ciudad, $tfno, $direccion, $cif)
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

    public function guardaTaller(){ // TODO
        session_start();
        $taller = $this->empaquetaTaller('taller guay', 'madrid', 677889909, 'calle de santa viril 13', 'nosecomoesuncif');
        $this->load->model('Taller/Taller_model');
        $id = $this->Taller_model->saveTaller($taller);
        $_SESSION['idTaller'] = $id;
        redirect('Reparacion/Reparacion/guardaReparacion2');
    }
}