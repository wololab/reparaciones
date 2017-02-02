<?php

/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:21
 */
class Cliente extends CI_Controller
{
    public function empaquetaCliente($nombre, $primerAp, $segundoAp, $direccion, $cp, $poblacion, $tfno, $email)
    {
        $cliente = [
            'nombre' => $nombre,
            'primer_apellido' => $primerAp,
            'segundo_apellido' => $segundoAp,
            'direccion' => $direccion,
            'cp' => $cp,
            'poblacion' => $poblacion,
            'telefono' => $tfno,
            'email' => $email
        ];
        return $cliente;
    }

    public function guardaCliente(){ // TODO
        $cliente = $this->empaquetaCliente('pepe', 'gómez', 'pérez', 'calle juan pepe 12 2ºb', '28099', 'madrid', 655667777, 'pepe@pepe.pe');
        $this->load->model('Cliente/Cliente_model');
        $id = $this->Cliente_model->saveCliente($cliente);
        session_start();
        $_SESSION['idCliente'] = $id;
        redirect('Reparacion/Reparacion/guardaReparacion3');
    }
}