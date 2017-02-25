<?php
class Aplicacion extends CI_Controller {
    public function formularioReparacion(){
//        echo date('Y/m/d');
        enmarcar($this, 'reparacion/formulario');
    }
}