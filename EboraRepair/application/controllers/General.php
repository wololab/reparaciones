<?php

class General extends CI_Controller{

    public function contacto(){
        enmarcar($this, 'general/contacto');
    }

    public function contactoPost(){
        error_reporting(0);

        $nombre = $_POST['name'];
        $apellido = $_POST['lastName'];
        $apellido2 = isset($_POST['lastName2']) ? $_POST['lastName2'] : '';
        $direccion = isset($_POST['adress']) ? $_POST['adress'] : '';
        $email = $_POST['email'];
        $telefono = isset($_POST['phone']) ? $_POST['phone'] : '';
        $asunto = $_POST['matter'];
        $texto = isset($_POST['message']) ? $_POST['message'] : '';

        $header = 'From: ' . $email . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
        $header .= "Mime-Version: 1.0 \r\n";
        $header .= "Content-Type: text/plain; charset=utf-8";

        $mensaje = "DATOS DEL USUARIO: \r\n\n";
        $mensaje .= "Nombre: " . $nombre . " \r\n\n";
        $mensaje .= "Primer apellido: " . $apellido . " \r\n\n";
        $mensaje .= "Segundo apellido: " . $apellido2 . " \r\n\n";
        $mensaje .= "Dirección: " . $direccion . " \r\n\n";
        $mensaje .= "Email: " . $email . " \r\n\n";
        $mensaje .= "Teléfono: " . $telefono . " \r\n\n";
        $mensaje .= "Razón del contacto: " . $asunto . " \r\n\n";
        $mensaje .= "Mensaje del usuario: " . $texto . " \r\n\n";
        $mensaje .= "Enviado el " . date('d/m/Y H:i:s', time()) . "\r\n\n";

        $para = 'info@eborarepair.com';

        $enviado = mail($para, $asunto, $mensaje, $header);

        if ($enviado) {
            enmarcar($this, 'general/contactoOK');
        } else {
            enmarcar($this, 'general/contactoError');
        }
    }

    public function cookies(){
        enmarcar($this, 'general/cookies');
    }

    public function nosotros(){
        enmarcar($this, 'general/nosotros');
    }

    public function galeria(){
        enmarcar($this, 'general/galeria');
    }
}

?>