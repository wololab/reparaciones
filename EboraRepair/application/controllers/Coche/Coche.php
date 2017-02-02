<?php

/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:23
 */
class Coche extends CI_Controller
{
    public function empaquetaCoche($matricula, $bastidor, $marca, $modelo, $anyo, $color, $kms)
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

    public function guardaCoche(){ // TODO
        $coche = $this->empaquetaCoche('12345xxx', '123123123', 'audi', 'c2 aire', '2015', 'verde', 655);
        $this->load->model('Coche/Coche_model');
        $id = $this->Coche_model->saveCoche($coche);
        session_start();
        $_SESSION['idCoche'] = $id;
        redirect('Reparacion/Reparacion/guardaReparacion4');
    }
}