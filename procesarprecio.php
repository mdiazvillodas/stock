<?php
include("conex.php"); 
$link=Conectarse(); 
$idd=$_GET['id'];  
$q=$_GET['cantidad']; 
$promo=$_GET['promo']; 
$id = $_SESSION["SESS_MEMBER_ID"];

if(("$idd"=='')||("$q"==''))
{
echo "Ponelo bien pelotudo!";
				}	
else{  
mysql_query("UPDATE promociones SET precio = '$q', productos = '$promo' WHERE id = '$idd' and iduser = '$id'");                
header("Location: index.php");   
}?>