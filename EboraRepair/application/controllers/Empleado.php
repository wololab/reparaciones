<?php
class Empleado extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['usuActivo']) || $_SESSION['usuActivo'] == null || $_SESSION['usuActivo']->rol != 'administrador'){
            redirect(base_url());
        }
    }


    public function guardaEmpleado(){
        $nick = $_POST['nick'];
        $nombre = $_POST['nombre'];
        $primerAp = $_POST['primerAp'];
        $segundoAp = $_POST['segundoAp'];
        $dniOCod = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $rol = $_POST['rol'];

        $pwd = $this->randomPassword();
        $pwdHash = hash('sha256', $pwd);

        $this->load->helper('empaquetar');
        $empleado = empaquetaEmpleado($nick, $pwdHash, $nombre, $primerAp, $segundoAp, $dniOCod, $telefono, $email, $rol);
        $this->load->model('Empleado/Empleado_model');

        $usuarioB = $this->Empleado_model->getEmpleados([
            'nick' => $nick,
        ]);
        if($usuarioB == []) {
            $this->Empleado_model->saveEmpleado($empleado);

            $_SESSION['nuevoEmple'] = $empleado;
            $_SESSION['pwd'] = $pwd;

            redirect(base_url() . 'administracion/listaEmpleados');
        } else {
            enmarcar($this, 'administracion/registroERROR');
        }





    }

    public function randomPassword(){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$#%&/()';
        $pass = '';
        $alphaLength = strlen($alphabet)-1;
        $passLength = 10;
        for($i = 0; $i < $passLength; $i += 1){
            $n = rand(0, $alphaLength);
            $pass .= $alphabet[$n];
        }
        return $pass;
    }
    public function usuarioExiste(){
        $nick = $_POST['nick'];
        $this->load->model('Empleado/Empleado_model');
        $usuario = $this->Empleado_model->getEmpleados([
            'nick' => $nick,
        ]);
        if($usuario == []){
            echo 1;
        } else {
            echo 0;
        }
    }

    public function darDeBaja(){
        $id = $_GET['id'];
        $this->load->model('Empleado/Empleado_model');
        $usuario = $this->Empleado_model->getEmpleadoById($id);
        $usuario -> activo = false;
        $this->Empleado_model->updateEmpleado($usuario);

    }
}