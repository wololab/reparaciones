<?php
class Aplicacion extends CI_Controller {
    public function formularioReparacion(){
        enmarcar($this, 'reparacion/formularioDatos');
    }
    public function formularioImagenes(){
        enmarcar($this, 'reparacion/formularioImagenes');
    }
}