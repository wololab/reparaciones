<?php

/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:40
 */
class Reparacion extends CI_Controller
{
    public function empaquetaReparacion($nombreOrdenante, $primerApOrdenante, $segundoApOrdenante, $dniOrdenante,
                                        $tfnoOrdenante, $dia, $mes, $anyo, $hora, $tipo, $aseguradora,
                                        $numeroSiniestro, $numeroPoliza, $diaSiniestro, $mesSiniestro,
                                        $anyoSiniestro, $idTaller, $idEmpleado, $idCliente, $idCoche)
    {
        $this->load->model('Taller/Taller_model');
        $taller = $idTaller==null?null:$this->Taller_model->getTallerById($idTaller);
        $this->load->model('Empleado/Empleado_model');
        $empleado = $this->Empleado_model->getEmpleadoById($idEmpleado);
        $this->load->model('Cliente/Cliente_model');
        $cliente = $this->Cliente_model->getClienteById($idCliente);
        $this->load->model('Coche/Coche_model');
        $coche = $this->Coche_model->getCocheById($idCoche);

        $reparacion = [
            'nombre_ordenante' => $nombreOrdenante,
            'primer_apellido_ordenante' => $primerApOrdenante,
            'segundo_apellido_ordenante' => $segundoApOrdenante,
            'dni_ordenante' => $dniOrdenante,
            'telefono_ordenante' => $tfnoOrdenante,
            'dia' => $dia,
            'mes' => $mes,
            'anyo' => $anyo,
            'hora' => $hora,
            'tipo' => $tipo,
            'aseguradora' => $aseguradora,
            'numero_siniestro' => $numeroSiniestro,
            'numero_poliza' => $numeroPoliza,
            'dia_siniestro' => $diaSiniestro,
            'mes_siniestro' => $mesSiniestro,
            'anyo_siniestro' => $anyoSiniestro,
            'taller' => $taller,
            'empleado' => $empleado,
            'cliente' => $cliente,
            'coche' => $coche
        ];

        return $reparacion;
    }

    public function guardaReparacion(){ //DEL
        redirect('Taller/Taller/guardaTaller');

    }
    public function guardaReparacion2()
    { //DEL
        redirect('Cliente/Cliente/guardaCliente');
    }
    public function guardaReparacion3(){ //DEL
        redirect('Coche/Coche/guardaCoche');
    }
    public function guardaReparacion4(){ //DEL
        session_start();
        $idTaller = $_SESSION['idTaller'];
        $idCliente = $_SESSION['idCliente'];
        $idCoche = $_SESSION['idCoche'];
        $_SESSION['idReparador'] = 65;
        $idEmpleado = $_SESSION['idReparador'];
        $reparacion = $this->empaquetaReparacion('juanito', 'diaz', 'lopez', '54546677C', 655778898, 13, 6, 2017, '13:45', 'parabrisas',
            'mafre', 123423, 123121, 23, 4, 2017, $idTaller, $idEmpleado, $idCliente, $idCoche);
        $this->load->model('Reparacion/Reparacion_model');
        $_SESSION['idReparacion'] = $this->Reparacion_model->saveReparacion($reparacion);
//        echo $id;
        redirect('ImagenReparacion/ImagenReparacion/guardaImagenReparacion');
    }
}