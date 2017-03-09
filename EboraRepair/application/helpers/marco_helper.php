<?php
function enmarcar($controlador, $rutaVista, $datos = []) {
	if (session_status () == PHP_SESSION_NONE) {session_start ();}
	if (isset ( $_SESSION ['nombreUsuario'] )) {
        $datos ['header'] ['usuario'] ['id'] = $_SESSION ['idUsuario'];
		$datos ['header'] ['usuario'] ['nombre'] = $_SESSION ['nombreUsuario'];
        $datos ['header'] ['usuario'] ['perfil'] = $_SESSION ['perfilUsuario'];
	}

	$controlador->load->view ( 'templates/head',$datos );
	$controlador->load->view ( 'templates/header', $datos );
	$controlador->load->view ( 'templates/nav', $datos );
	$controlador->load->view ( $rutaVista, $datos );
	$controlador->load->view ( 'templates/footer', $datos );
	$controlador->load->view ( 'templates/end' );
}
?>