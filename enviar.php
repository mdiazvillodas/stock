<?php
	$nombre = $_POST['n'];
	$empresa = $_POST['s'];
	$tel = $_POST['h'];		
	$email = $_POST['e'];
	$mensaje = $_POST['m'];
	
	$subject = 'Contacto Dimarep';
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.$email.' <'.$nombre.'>' . "\r\n";
	
	$message = '<h1>Nueva Consulta</h1>';
	$message .= 'Nombre: '.$nombre.'<br />';
	$message .= 'Empresa: '.$empresa.'<br />';
	$message .= 'Tel: '.$tel.'<br />';	
	$message .= 'Email: '.$email.'<br />';
	$message .= 'Mensaje: '.$mensaje.'<br />';
	
	if(mail('info@dosmosquitos.com.ar', $subject, $message, $headers)){
		echo 'Correo Enviado';
	}else{
		echo 'Correo No Enviado, Hubo Algœn Error. Comuniquese con info@dosmosquitos.com.ar';
	}
?>