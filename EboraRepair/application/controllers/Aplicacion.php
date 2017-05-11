<?php
class Aplicacion extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['usuActivo']) || $_SESSION['usuActivo'] == null){
            redirect(base_url());
        }
    }

    public function formularioReparacion(){
        enmarcar($this, 'reparacion/formularioDatos');
    }
    public function formularioImagenes(){
        enmarcar($this, 'reparacion/formularioImagenes');
    }
}