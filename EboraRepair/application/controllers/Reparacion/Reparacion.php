<?php
class Reparacion extends CI_Controller
{

    public function datosReparacion()
    {
        session_start();



        /* Fecha y hora */
        $fecha = $_POST['fecha'];
        $_SESSION['hora'] = $_POST['hora'];
        $fechaSplit = explode('-', $fecha);
        $_SESSION['dia'] = $fechaSplit[2];
        $_SESSION['mes'] = $fechaSplit[1];
        $_SESSION['anio'] = $fechaSplit[0];

        /* Datos Vehículo */
        $_SESSION['marca'] = $_POST['marca'];
        $_SESSION['modelo'] = $_POST['modelo'];
        $_SESSION['anioCoche'] = $_POST['anio'];
        $_SESSION['matricula'] = $_POST['matricula'];
        $_SESSION['bastidor'] = $_POST['bastidor'];
        $_SESSION['kms'] = $_POST['kms'];
        $_SESSION['color'] = isset($_POST['color']) ? $_POST['color'] : 'Color no definido'; /* TODO que habrá por defecto? */

        /* Datos Asegurado */
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['ape1'] = $_POST['ape1'];
        $_SESSION['ape2'] = $_POST['ape2'];
        $_SESSION['direccion'] = $_POST['direccion'];
        $_SESSION['cp'] = $_POST['cp'];
        $_SESSION['poblacion'] = $_POST['poblacion'];
        $_SESSION['telefono'] = $_POST['telefono'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['dni'] = $_POST['dni'];

        /* Datos Siniestro */
        $_SESSION['numeroSiniestro'] = $_POST['nSin'];
        $_SESSION['numeroPoliza'] = $_POST['nPol'];
        $fechaSiniestro = $_POST['fechaSin'];
        $fechaSiniestroSplit = explode('-', $fechaSiniestro);
        $_SESSION['diaSiniestro'] = $fechaSiniestroSplit[2];
        $_SESSION['mesSiniestro'] = $fechaSiniestroSplit[1];
        $_SESSION['anioSiniestro'] = $fechaSiniestroSplit[0];
        $_SESSION['aseguradora'] = $_POST['aseguradora'];
        $_SESSION['tipo'] = $_POST['tipo'];

        /* Persona que acude con el vehículo al taller */
        $_SESSION['nombrePersona'] = $_POST['nombrePer'];
        $_SESSION['ape1Persona'] = $_POST['ape1Per'];
        $_SESSION['ape2Persona'] = $_POST['ape2Per'];
        $_SESSION['dniPersona'] = $_POST['dni'];
        $_SESSION['telefonoPersona'] = $_POST['telefonoPer'];

        redirect('aplicacion/formularioImagenes');

    }

    public function registrarReparacion()
    {
        session_start();
        $this->load->helper('empaquetar');
        $taller = $this->guardaTaller(); /* DEL  */
        $cliente = $this->guardaCliente($_SESSION['nombre'], $_SESSION['ape1'], $_SESSION['ape2'],
            $_SESSION['direccion'], $_SESSION['cp'], $_SESSION['poblacion'], $_SESSION['telefono'], $_SESSION['email'],
            $_SESSION['dni']);
        $coche = $this->guardaCoche($_SESSION['matricula'], $_SESSION['bastidor'], $_SESSION['marca'],
            $_SESSION['modelo'], $_SESSION['anioCoche'], $_SESSION['color'], $_SESSION['kms']);
        $_SESSION['idReparador'] = 1; // DEL Esto será la que esté en usuActivo
        $idEmpleado = $_SESSION['idReparador'];
        $this->load->model('Empleado/Empleado_model');
        $empleado = $this->Empleado_model->getEmpleadoById($idEmpleado);
        $reparacion = empaquetaReparacion($_SESSION['nombrePersona'], $_SESSION['ape1Persona'], $_SESSION['ape2Persona'],
            $_SESSION['dniPersona'], $_SESSION['telefonoPersona'], $_SESSION['dia'], $_SESSION['mes'],
            $_SESSION['anio'], $_SESSION['hora'], $_SESSION['tipo'], $_SESSION['aseguradora'],
            $_SESSION['numeroSiniestro'], $_SESSION['numeroPoliza'], $_SESSION['diaSiniestro'], $_SESSION['mesSiniestro'],
            $_SESSION['anioSiniestro'], $taller, $empleado, $cliente, $coche);
        $this->load->model('Reparacion/Reparacion_model');
        $idReparacion = $this->Reparacion_model->saveReparacion($reparacion); /* TODO comprobar si esto guarda a través del formulario */
        $this->guardaImagenes($_FILES, $idReparacion, $_POST);
        echo 'Guardada reparación de: ' . $_SESSION['marca'] . ' ' . $_SESSION['modelo'];
    }

    public function guardaImagenes($FILES, $idReparacion, $POST)
    {
        $this->load->model('ImagenReparacion/ImagenReparacion_model');
        $this->guardaImagen($FILES ['matricula'], 'Matrícula', 'matricula', $idReparacion);
        $this->guardaImagen($FILES ['detalleLuna'], 'Detalle de Luna', 'detalleLuna', $idReparacion);
        $this->guardaImagen($FILES ['permiso'], 'Permiso de Circulación', 'permisoCirculacion', $idReparacion);
        $this->guardaImagen($FILES ['maquinaOLunaQuitada'], 'Máquina de Reparar o Luna Quitada',
            'maquinaRepararOLunaQuitada', $idReparacion);
        $this->guardaImagen($FILES ['ordenTrabajo'], 'Orden de Trabajo', 'ordenTrabajo', $idReparacion);
        file_exists($FILES['poliza']['tmp_name']) ||
        is_uploaded_file($FILES['poliza']['tmp_name']) ? $this->guardaImagen($FILES['poliza'], 'Póliza', 'poliza',
            $idReparacion) : $this->guardaImagen('', 'Póliza', 'poliza', $idReparacion);
        file_exists($FILES['recibo']['tmp_name']) ||
        is_uploaded_file($FILES['recibo']['tmp_name']) ? $this->guardaImagen($FILES['recibo'], 'Recibo', 'recibo',
            $idReparacion) : $this->guardaImagen('', 'Recibo', 'recibo', $idReparacion);
        file_exists($FILES['impactoOLunaMontada']['tmp_name']) ||
        is_uploaded_file($FILES['impactoOLunaMontada']['tmp_name']) ? $this->guardaImagen($FILES['impactoOLunaMontada'],
            'Impacto o Luna Montada', 'imactoOLunaMontada', $idReparacion) : $this->guardaImagen('',
            'Impacto o Luna Montada', 'impactoOLunaMontada', $idReparacion);
        for ($i = 1; true; $i += 1) {
            if(!isset($FILES['img'.$i])){
                break;
            }
            $this->guardaImagen($FILES['img'.$i], $POST['titulo'.$i], 'imagenExtra'.$i, $idReparacion);
        }
    }

    public function guardaImagen($imagen, $titulo, $nombre, $idReparacion)
    {

        if($imagen != '') {
            $tmp = explode('.', $imagen ['name']);
            $nombreNuevo = $nombre . '.' . end($tmp);
            $rutaDestino = './assets/img/reparaciones/' . $idReparacion . '/' . $nombreNuevo;
            if (!file_exists('./assets/img/reparaciones/' . $idReparacion . '/')) {
                mkdir('./assets/img/reparaciones/' . $idReparacion . '/');
            }
            move_uploaded_file($imagen ['tmp_name'], $rutaDestino);

        } else {
            $rutaDestino = './assets/img/reparaciones/noimage.png';
        }
        $imagen = empaquetaImagenReparacion($rutaDestino, $nombre, $titulo);
        $this->load->model('ImagenReparacion/ImagenReparacion_model');
        $idImagenBean = $this->ImagenReparacion_model->saveImagenReparacion($imagen);
        $imagenBean = $this->ImagenReparacion_model->getImagenReparacionById($idImagenBean);
        $this->load->model('Reparacion_model');
        $this->Reparacion_model->asociaImagen($idReparacion, $imagenBean); /* TODO comprobar vale con .assets si luego pongo baseurl en html o hay que ponerlo aqui */
    }

    public function guardaTaller()
    {

        $this->load->model('Taller/Taller_model');
        $taller = empaquetaTaller('pepe', 'madrid', 676885576, 'calle pepe', 'hhdhd'); //TODO via post, TODO preguntar como recoger esto
        $id = $this->Taller_model->saveTaller($taller);
        $taller = $this->Taller_model->getTallerById($id);
        return $taller;
    }

    public function guardaCliente($nombre, $ape1, $ape2, $direccion, $cp, $poblacion, $telefono, $email, $dni)
    {
        $this->load->model('Cliente/Cliente_model');
        $cliente = empaquetaCliente($nombre, $ape1, $ape2, $direccion, $cp, $poblacion, $telefono, $email, $dni);
        $id = $this->Cliente_model->saveCliente($cliente);
        $cliente = $this->Cliente_model->getClienteById($id);
        return $cliente;
    }

    public function guardaCoche($matricula, $bastidor, $marca, $modelo, $anio, $color, $kms)
    {
        $this->load->model('Coche/Coche_model');
        $coche = empaquetaCoche($matricula, $bastidor, $marca, $modelo, $anio, $color, $kms);
        $id = $this->Coche_model->saveCoche($coche);;
        $coche = $this->Coche_model->getCocheById($id);
        return $coche;
    }

}