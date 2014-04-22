<?php
function Conectarse() 
{ 
   if (!($link=mysql_connect("localhost","nano","Mdv220988"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   if (!mysql_select_db("stock",$link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link; 
}
?>