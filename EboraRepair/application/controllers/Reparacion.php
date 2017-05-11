<?php
class Reparacion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['usuActivo']) || $_SESSION['usuActivo'] == null){
            redirect(base_url());
        }
    }

    public function datosReparacion()
    {



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
        $_SESSION['color'] = isset($_POST['color']) ? $_POST['color'] : 'Color no definido';

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
        $this->load->helper('empaquetar');
        $cliente = $this->guardaCliente($_SESSION['nombre'], $_SESSION['ape1'], $_SESSION['ape2'],
            $_SESSION['direccion'], $_SESSION['cp'], $_SESSION['poblacion'], $_SESSION['telefono'], $_SESSION['email'],
            $_SESSION['dni']);
        $coche = $this->guardaCoche($_SESSION['matricula'], $_SESSION['bastidor'], $_SESSION['marca'],
            $_SESSION['modelo'], $_SESSION['anioCoche'], $_SESSION['color'], $_SESSION['kms']);
        $idEmpleado = $_SESSION['idReparador'];
        $this->load->model('Empleado/Empleado_model');
        $empleado = $this->Empleado_model->getEmpleadoById($idEmpleado);
        $reparacion = empaquetaReparacion($_SESSION['nombrePersona'], $_SESSION['ape1Persona'], $_SESSION['ape2Persona'],
            $_SESSION['dniPersona'], $_SESSION['telefonoPersona'], $_SESSION['dia'], $_SESSION['mes'],
            $_SESSION['anio'], $_SESSION['hora'], $_SESSION['tipo'], $_SESSION['aseguradora'],
            $_SESSION['numeroSiniestro'], $_SESSION['numeroPoliza'], $_SESSION['diaSiniestro'], $_SESSION['mesSiniestro'],
            $_SESSION['anioSiniestro'], $empleado, $cliente, $coche);
        $this->load->model('Reparacion/Reparacion_model');
        $idReparacion = $this->Reparacion_model->saveReparacion($reparacion);
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
            $rutaDestino = $this->subeImagen($imagen, $nombre, $idReparacion);

        } else {
            $rutaDestino = base_url() . 'assets/img/reparaciones/noimage.png';
        }
        $imagen = empaquetaImagenReparacion($rutaDestino, $nombre, $titulo);
        $this->load->model('ImagenReparacion/ImagenReparacion_model');
        $idImagenBean = $this->ImagenReparacion_model->saveImagenReparacion($imagen);
        $imagenBean = $this->ImagenReparacion_model->getImagenReparacionById($idImagenBean);
        $this->load->model('Reparacion_model');
        $this->Reparacion_model->asociaImagen($idReparacion, $imagenBean);
    }

    public function subeImagen($imagen, $nombre, $idReparacion){
        $tmp = explode('.', $imagen ['name']);
        $nombreNuevo = $nombre . '.' . end($tmp);
        $rutaDestino = base_url() . 'assets/img/reparaciones/' . $idReparacion . '/' . $nombreNuevo;
        if (!file_exists('./assets/img/reparaciones/' . $idReparacion . '/')) {
            mkdir('./assets/img/reparaciones/' . $idReparacion . '/');
        }
//            move_uploaded_file($imagen ['tmp_name'], $rutaDestino);
        $source_img = $imagen [ 'tmp_name'];
        $destination_img = './assets/img/reparaciones/' . $idReparacion . '/' . $nombreNuevo;;

        $this->compress($source_img, $destination_img, 10); // se puede elegir calidad
        return $rutaDestino;
    }

    public function compress($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }

    public function guardaTaller($taller)
    {

        $this->load->model('Taller/Taller_model');
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

    public function facturar()
    {
        if($_SESSION['usuActivo']->rol == 'administrador') {
            $id = $_POST['id'];
            $this->load->model('Reparacion/Reparacion_model');
            $this->Reparacion_model->facturar($id);
        } else {
            redirect(base_url());
        }
    }

    public function desfacturar()
    {
        if($_SESSION['usuActivo']->rol == 'administrador') {
            $id = $_POST['id'];
            $this->load->model('Reparacion/Reparacion_model');
            $this->Reparacion_model->desfacturar($id);
        } else {
            redirect(base_url());
        }
    }

    public function aniadirImagen(){
        if($_SESSION['usuActivo']->rol == 'administrador') {
            $id = $_POST['idImagen'];
            $imagen = $_FILES['imagen'];
            $this->load->model('ImagenReparacion/ImagenReparacion_model');
            $imagenB = $this->ImagenReparacion_model->getImagenReparacionById($id);
            $rutaDestino = $this->subeImagen($imagen, $imagenB->alt, $imagenB->reparacion->id);
            $imagenB->src = $rutaDestino;
            $this->ImagenReparacion_model->updateImagenReparacion($imagenB);
            redirect(base_url() . 'administracion/detalleReparacion?id=' . $imagenB->reparacion->id);
        } else {
            redirect(base_url());
        }
    }

    public function enviarATaller(){
        if($_SESSION['usuActivo']->rol == 'administrador') {
            $id = $_POST['id'];
            $ciudad = $_POST['ciudad'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $cif = $_POST['cif'];
            $this->load->helper('empaquetar');
            $taller = empaquetaTaller($nombre, $ciudad, $telefono, $direccion, $cif);
            $tallerB = $this->guardaTaller($taller);
            $this->load->model('Reparacion/Reparacion_model');
            $reparacion = $this->Reparacion_model->getReparacionById($id);
            $reparacion->taller = $tallerB;
            $this->Reparacion_model->updateReparacion($reparacion);
            redirect(base_url() . 'administracion/detalleReparacion?id=' . $id);
        } else {
            redirect(base_url());
        }
    }

    function descargarDatos(){
        if($_SESSION['usuActivo']->rol == 'administrador') {
            if (!file_exists('./assets/temp/')) {
                mkdir('./assets/temp/');
            }

            $id = $_GET['id'];

            $zip = new ZipArchive();
            $time = time();
            $filename = './assets/temp/' . $time . '.zip';
            //$filename = './assets/temp/prueba.zip';
            $downloadFileName = date('d_m_Y') . '-' . $id;
            if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
                exit("cannot open <$filename>\n");
            }

            $this->load->model('Reparacion/Reparacion_model');
            $reparacion = $this->Reparacion_model->getReparacionById($id);

            $datos = '';
            $datos .= 'Datos de la reparación descargados el ' . date('d/m/Y') . ' a las ' . date('H:i:s') . ':' . PHP_EOL;
            $datos .= PHP_EOL;
            $datos .= PHP_EOL;
            foreach ($reparacion as $k => $dato) {
                if ($dato == '') $dato = 'no asignado';
                $datos .= $k . ' - ' . $dato . PHP_EOL;
            }
            $datos .= PHP_EOL;
            $datos .= 'Datos de coche con id: ' . $reparacion->coche_id . ':' . PHP_EOL;
            foreach ($reparacion->coche as $k => $dato) {
                if ($dato == '') $dato = 'no asignado';
                $datos .= $k . ' - ' . $dato . PHP_EOL;
            }
            $datos .= PHP_EOL;
            $datos .= 'Datos de cliente con id: ' . $reparacion->cliente_id . ':' . PHP_EOL;
            foreach ($reparacion->cliente as $k => $dato) {
                if ($dato == '') $dato = 'no asignado';
                $datos .= $k . ' - ' . $dato . PHP_EOL;
            }
            $datos .= PHP_EOL;
            $datos .= 'Datos de reparador con id: ' . $reparacion->empleado_id . ':' . PHP_EOL;
            foreach ($reparacion->empleado as $k => $dato) {
                if ($dato == '') $dato = 'no asignado';
                $datos .= $k . ' - ' . $dato . PHP_EOL;
            }
            if ($reparacion->taller != null) {
                $datos .= PHP_EOL;
                $datos .= 'Datos de taller externo con id: ' . $reparacion->taller_id . ':' . PHP_EOL;
                foreach ($reparacion->taller as $k => $dato) {
                    if ($dato == '') $dato = 'no asignado';
                    $datos .= $k . ' - ' . $dato . PHP_EOL;
                }
            }

            $zip->addFromString($downloadFileName . '/datos.txt', $datos);
            //echo $datos;
            //$zip->addFromString("testfilephp.txt" . time(), "#1 Esto es una cadena de prueba añadida como  testfilephp.txt.\n");
            //$zip->addFromString("testfilephp2.txt" . time(), "#2 Esto es una cadena de prueba añadida como testfilephp2.txt.\n");
            $path = './assets/img/reparaciones/' . $id . '/';
            $dir = new DirectoryIterator($path);
            foreach ($dir as $fileinfo) {
                if (!$fileinfo->isDot()) {
                    $nombre = $fileinfo->getFilename();
                    $zip->addFile($path . $nombre, $downloadFileName . '/' . $nombre);
                }
            }

            $zip->close();

            header('Cache-Control: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=' . $downloadFileName . '.zip');
            header("Content-Transfer-Encoding: binary");
            readfile($filename);

            unlink($filename);
        } else {
            redirect(base_url());
        }
    }

}