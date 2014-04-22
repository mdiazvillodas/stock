<?php
include("conex.php"); 
$link=Conectarse(); 
$idd=$_GET['id'];  

   mysql_query("update stock set activo='0' where Id = '$idd'",$link); 
    
   header("Location: index.php");
?>