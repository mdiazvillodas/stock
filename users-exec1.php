<?php
	require_once('conex.php');
	$link=Conectarse(); 	
	$nombre=$_POST['nombre'];
	$email=$_POST['email'];
	$nacimiento=$_POST['nacimiento'];
	
	mysql_query("INSERT INTO users(nombre, email, nacimiento) VALUES('$nombre','$email','$nacimiento')",$link); 	
	   /*header("Location: index.php");*/
  
?>