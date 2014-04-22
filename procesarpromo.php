<?php
include("conex.php"); 
$link=Conectarse(); 
$Descripcion=$_GET['tipo'];  
$guita=$_GET['guita']; 
if(("$Descripcion"=='')||("$guita"==''))
		{
			echo "Pone todo pelotudo!";		
		}
	else{
   mysql_query("insert into promociones (productos,precio) values ('$Descripcion','$guita')",$link); 
    
   header("Location: control.php");
   }
?>