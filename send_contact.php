<?php
include("conex.php"); 
$link=Conectarse(); 
$B=$_POST['celular']; 
$C=$_POST['mail']; 
$D=$_POST['pedido']; 
if(("$B"=='')||("$C"=='')||("$D"==''))
		{
			echo "Completá todos los datos!";			
		}
	else{

   mysql_query("insert into historicopedidos (email,pedido,celular,fecha) values ('$C','$D','$B',curdate())",$link); 
	
$mail="$mail";	
$celular="$celular";
$pedido="$pedido";


// Enter your email address
$to ='lodebarneydelivery@hotmail.com';

$send_contact=mail($to,$mail,$celular,$pedido);

// Check, if message sent to your email 
// display message "We've recived your information"
if($send_contact){
echo "Nos llego tu pedido, te estaremos contactando en unos instantes";
}
else {
echo "ERROR";
}
}
?>