<?php

/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:40
 */
class Reparacion extends CI_Controller
{

    public function guardaReparacion(){ //TODO
        session_start();
        $this->load->helper('empaquetar');


        /* Fecha y hora */
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $fechaSplit = explode('/', $fecha);
        $dia = $fechaSplit[0];
        $mes = $fechaSplit[1];
        $anio = $fechaSplit[2];

        /* Datos Vehículo */
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $matricula = $_POST['matricula'];
        $bastidor = $_POST['bastidor'];
        $kms = $_POST['kms'];
        $color = isset($_POST['color'])?$_POST['color']:'Color no definido'; /* TODO que habrá por defecto? */

        /* Datos Asegurado */
        $nombre = $_POST['nombre'];
        $ape1 = $_POST['ape1'];
        $ape2= $_POST['ape2'];
        $direccion = $_POST['direccion'];
        $cp = $_POST['cp'];
        $poblacion = $_POST['poblacion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $dni = $_POST['dni'];

        /* Datos Siniestro */
        $numeroSiniestro = $_POST['nSin'];
        $numeroPoliza = $_POST['nPol'];
        $fechaSiniestro = $_POST['fechaSin'];
        $fechaSiniestroSplit = explode('/', $fechaSiniestro);
        $diaSiniestro = $fechaSiniestroSplit[0];
        $mesSiniestro = $fechaSiniestroSplit[1];
        $anioSiniestro = $fechaSiniestroSplit[2];
        $aseguradora = $_POST['aseguradora'];
        $tipo = $_POST['tipo'];

        /* Persona que acude con el vehículo al taller */
        $nombrePersona = $_POST['nombrePer'];
        $ape1Persona = $_POST['ape1Per'];
        $ape2Persona = $_POST['ape2Per'];
        $dniPersona = $_POST['dni'];
        $telefonoPersona = $_POST['telefonoPer'];

        $taller = $this->guardaTaller(); /* DEL a */
        $cliente = $this->guardaCliente($nombre, $ape1, $ape2, $direccion, $cp, $poblacion, $telefono, $email, $dni);
        $coche = $this->guardaCoche($matricula, $bastidor, $marca, $modelo, $anio, $color, $kms);
        $_SESSION['idReparador'] = 1; // Esto será la que esté en usuActivo
        $idEmpleado = $_SESSION['idReparador'];
        $this->load->model('Empleado/Empleado_model');
        $empleado = $this->Empleado_model->getEmpleadoById($idEmpleado);
        $reparacion = empaquetaReparacion($nombrePersona, $ape1Persona, $ape2Persona, $dniPersona, $telefonoPersona, $diaPersona, $mesPersona, $anioPersona, $horaPersona, $tipo,
           $aseguradora, $numeroSiniestro, $numeroPoliza, $diaSiniestro, $mesSiniestro, $anioSiniestro, $taller, $empleado, $cliente, $coche);
        $this->load->model('Reparacion/Reparacion_model');
        $idReparacion = $this->Reparacion_model->saveReparacion($reparacion); /* TODO comprobar si esto guarda a través del formulario después de resolver dudillas */
        $imagenes = $this->guardaImagenes($_FILES, $idReparacion, $_POST);
        $this->Reparacion_model->asociaImagenes($idReparacion, $imagenes); /* TODO comprobar si todo esto funciona */
        echo $idReparacion;
      //  redirect('ImagenReparacion/ImagenReparacion/guardaImagenReparacion'); //TODO que tambien guarde las imagenes
    }

    public function guardaImagenes($FILES, $idReparacion, $POST){
        $matricula = $this->guardaImagen($FILES ['matricula'], 'Matrícula', $idReparacion);
        $detalleLuna = $this->guardaImagen($FILES ['detalleLuna'], 'Detalle de Luna', $idReparacion);
        $permiso = $this->guardaImagen($FILES ['permiso'], 'Permiso de Circulación', $idReparacion);
        $maquinaRepararOLunaQuitada = $this->guardaImagen($FILES ['maquinaOLunaQuitada'], 'Máquina de Reparar o Luna Quitada', $idReparacion);
        $ordenTrabajo = $this->guardaImagen($FILES ['ordenTrabajo'], 'Orden de Trabajo', $idReparacion);
        $poliza = isset($FILES['poliza'])?$this->guardaImagen($FILES['poliza'], 'Póliza', $idReparacion):empaquetaImagenReparacion('','', '');
        $recibo = isset($FILES['recibo'])?$this->guardaImagen($FILES['recibo'], 'Recibo', $idReparacion):empaquetaImagenReparacion('','', '');
        $impactoOLunaMontada = isset($FILES['impactoOLunaMontada'])?$this->guardaImagen($FILES['impactoOLunaMontada'], 'Impacto o Luna Montada', $idReparacion):empaquetaImagenReparacion('','', '');
        $imagenesExtra = [];
        for($i = 0; isset($FILES['img'.$i]); $i += 1){
            array_push($imagenesExtra, $this->guardaImagen($FILES['img'.$i], $POST['nombre'.$i], $idReparacion));
        }
        $imagenes = [
            $matricula,
            $detalleLuna,
            $permiso,
            $maquinaRepararOLunaQuitada,
            $ordenTrabajo,
            $poliza,
            $recibo,
            $impactoOLunaMontada,
            $imagenesExtra
        ];
        return $imagenes;

    }

    public function guardaImagen($imagen, $nombre, $idReparacion){
        $tmp = explode ( ".", $imagen ['name'] );
        $nombreNuevo = $nombre . '.' . end ( $tmp );
        $rutaDestino = './assets/imgs/reparaciones/'. $idReparacion . '/' . $nombreNuevo;
        move_uploaded_file ( $imagen ['tmp_name'], $rutaDestino );
        $imagen = empaquetaImagenReparacion($rutaDestino, $nombre, $nombre);
        return $imagen;
    }

    public function guardaTaller(){
        $this->load->model('Taller/Taller_model');
        $taller = empaquetaTaller('pepe', 'madrid', 676885576, 'calle pepe', 'hhdhd'); //TODO via post, TODO preguntar como recoger esto
        $id = $this->Taller_model->saveTaller($taller);
        $taller = $this->Taller_model->getTallerById($id);
        return $taller;
    }

    public function guardaCliente($nombre, $ape1, $ape2, $direccion, $cp, $poblacion, $telefono, $email, $dni){
        $this->load->model('Cliente/Cliente_model');
        $cliente = empaquetaCliente($nombre, $ape1, $ape2, $direccion, $cp, $poblacion, $telefono, $email, $dni);
        $id = $this->Cliente_model->saveCliente($cliente);
        $cliente = $this->Cliente_model->getClienteById($id);
        return $cliente;
    }

    public function guardaCoche($matricula, $bastidor, $marca, $modelo, $anio, $color, $kms){
        $this->load->model('Coche/Coche_model');
        $coche = empaquetaCoche($matricula, $bastidor, $marca, $modelo, $anio, $color, $kms);
        $id = $this->Coche_model->saveCoche($coche);;
        $coche = $this->Coche_model->getCocheById($id);
        return $coche;
    }

}