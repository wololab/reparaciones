<?php
class Administracion extends CI_Controller {

    private function autenticado() {
        $autenticado = false;
        if (session_status () == PHP_SESSION_NONE) {
            session_start ();
        }
        if (isset ( $_SESSION ['nombreUsuario'] )) {
            $autenticado = true;
        }
        return $autenticado;
    }

    private function admin() {
        $admin = false;
        if (session_status () == PHP_SESSION_NONE) {
            session_start ();
        }
        if (isset ( $_SESSION ['perfilUsuario'] ) && $_SESSION ['perfilUsuario'] == 'admin') {
            $admin = true;
        }
        return $admin;
    }

    public function panel() {
        if ($this->autenticado() && $this->admin()) {
            enmarcar($this, 'administracion/panel');
        }else {
            header('Location:'.base_url());
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
}
