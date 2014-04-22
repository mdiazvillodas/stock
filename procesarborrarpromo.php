<?php
include("conex.php"); 
$link=Conectarse(); 
$idd=$_GET['id'];  

   mysql_query("delete from promociones where id = '$idd'",$link); 
    
   header("Location: control.php");
?>