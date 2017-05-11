<?php

class Usuario extends CI_Controller{

    private function autenticado() {
        $autenticado = false;
        if (session_status () == PHP_SESSION_NONE) {
            session_start ();
        }
        if (isset ( $_SESSION ['usuario'] ['nombre'] )) {
            $autenticado = true;
        }
        return $autenticado;
    }

    public function registro() {
        enmarcar($this, 'usuario/registro');
    }

   /* public function registroPost(){
        error_reporting(0);

        $nombre = $_POST['name'];
        $apellido = $_POST['lastName'];
        $apellido2 = $_POST['lastName2'];
        $direccion = isset($_POST['adress']) ? $_POST['adress'] : '';
        $email = $_POST['email'];
        $telefono = $_POST['phone'];

        if ($creado) {
            enmarcar($this, 'usuario/registroOK');
        } else {
            enmarcar($this, 'usuario/registroError');
        }
    }
*/
    public function login() {
        enmarcar($this, 'usuario/login');
    }

    public function login2() {
        $this->loginPost();
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