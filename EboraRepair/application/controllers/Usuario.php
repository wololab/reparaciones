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

    public function registroPost(){
        error_reporting(0);

        $nombre = $_POST['name'];
        $apellido = $_POST['lastName'];
        $apellido2 = $_POST['lastName2'];
        $direccion = isset($_POST['adress']) ? $_POST['adress'] : '';
        $email = $_POST['email'];
        $telefono = $_POST['phone'];

        /*TODO aqui se envia el usuario a la base de datos y se crea, despues se despliega una vista
        dependiendo de si la creación ha sido un exito*/

        if ($creado) {
            enmarcar($this, 'usuario/registroOK');
        } else {
            enmarcar($this, 'usuario/registroError');
        }
    }

    public function login() {
        enmarcar($this, 'usuario/login');
    }

    public function login2() {
        $this->loginPost();
    }

    public function loginPost() {
        $name = $_POST ['user'];
        $pwd = $_POST ['pwd'];

        //$this->load->model('usuario_model');
        //$ok = $this->usuario_model->verify ($name, $pwd);
        $ok=true;//DEL

        if ($ok) {
            session_start ();
            /*$usuario = $this->usuario_model->getUsuarioByName($name);
            $_SESSION ['usuario'] ['id'] = $usuario->id;
            $_SESSION ['usuario'] ['nombre'] = $usuario->nombre;
            $_SESSION ['usuario'] ['perfil'] = $usuario->perfil;TODO*/

            $_SESSION ['idUsuario'] = '01'; //DEL
            $_SESSION ['nombreUsuario'] = 'Administrador'; //DEL
            $_SESSION ['perfilUsuario'] = 'admin'; //DEL

            header('Location:'.base_url());
        } else {
            enmarcar($this,'usuario/loginError');
        }
    }

    public function logout() {
        if (session_status () == PHP_SESSION_NONE) {
            session_start ();
        }
        session_destroy ();
        header('Location:'.base_url());
    }

}

?>