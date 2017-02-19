<?php

/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:29
 */
class ImagenReparacion extends CI_Controller
{

    public function guardaImagenReparacion(){ //TODO
        session_start();
        $imagen = $this->empaquetaImagenReparacion('http://ejjee', 'foto', 'limpiaparabrisas', $_SESSION['idReparacion']);
        $this->load->model('ImagenReparacion/ImagenReparacion_model');
        $id = $this->ImagenReparacion_model->saveImagenReparacion($imagen);
        echo $id;
    }
}