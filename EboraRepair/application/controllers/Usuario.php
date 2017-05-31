<?php

class Usuario extends CI_Controller{

    public function registro() {
        enmarcar($this, 'usuario/registro');
    }

    public function registroPost(){

        $nombre = $_POST['name'];
        $pwd = $_POST['pwd'];
        $apellido = $_POST['lastName'];
        $apellido2 = $_POST['lastName2'];
        $dni = isset($_POST['adress']) ? $_POST['adress'] : '';
        $email = $_POST['email'];
        $telefono = $_POST['phone'];
        $pwdSHA216 = hash( 'sha256', $pwd );
        $usuario = empaquetaEmpleado($nombre, $pwdSHA216, $nombre, $apellido, $apellido2, $dni, $telefono, $email, 'empleado');
        $this->load->model('Empleado/Empleado_model');

        $this->Empleado_model->saveEmpleado($usuario);
        $data['nombre'] = $nombre;
        enmarcar($this, 'usuario/registroOK', $data);
        /*$usuarioB = $this->Usuario_model->getUsuarios([
            'email' => $email,
        ]);

        if($usuarioB == []) {
            $this->Usuario_model->saveUsuario($usuario);
            $data['nombre'] = $nombre;
            enmarcar($this, 'usuario/registroOK', $data);
        } else {
            enmarcar($this, 'usuario/registroError');
        }*/

    }

    public function login() {
        enmarcar($this, 'usuario/login');
    }

    public function loginPost() {
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];
        $pwdSHA256 = hash( 'sha256', $pwd );
        $this->load->model('Empleado/Empleado_model');
        $usuario = $this->Empleado_model->getEmpleados([
            'nick' => $user,
            'password' => $pwdSHA256
        ]);
        if($usuario != []){
            if(end($usuario)->activo) {
                session_start();
                $_SESSION['usuActivo'] = end($usuario);
                if(end($usuario)->primeraVez){
                    enmarcar($this, 'usuario/primeraVez');
                } else {
                    enmarcar($this, 'usuario/loginOK');
                }
            } else {
                enmarcar($this, 'usuario/loginInactivo');
            }
        } else {
            enmarcar($this, 'usuario/loginError');
        }

    }

    public function logout() {
        if (session_status () == PHP_SESSION_NONE) {
            session_start ();
        }
        $_SESSION['usuActivo'] = null;
        redirect(base_url());
    }

    public function cambiaPass(){
        session_start();
        if(isset($_SESSION['usuActivo']) && $_SESSION['usuActivo'] != null) {
            $pwd = $_POST['pwd'];
            $pwdHash = hash('sha256', $pwd);
            $_SESSION['usuActivo']->password = $pwdHash;
            $_SESSION['usuActivo']->primeraVez = false;
            $this->load->model('Empleado/Empleado_model');
            $this->Empleado_model->updateEmpleado($_SESSION['usuActivo']);
            redirect(base_url());
        } else {
            redirect(base_url());
        }
    }

}

?>