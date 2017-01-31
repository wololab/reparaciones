<?php
class Home extends CI_Controller {
    public function index() {
        $datos['body']['name'] = 'Eduardo Reneo';
        $datos['body']['date'] = '31/12/2016';

        enmarcar($this, 'home', $datos);
    }
}
?>