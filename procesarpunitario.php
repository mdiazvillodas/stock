<?php 
//asd
include("conex.php"); 
$link=Conectarse(); 
$Id=$_GET['id'];  
$cantidad=$_GET['cantidad']; 
if(("$Id"=='')||("$cantidad"==''))
{
echo "Ponelo bien pelotudo!";
        }	
    else{  
    mysql_query("update stock set punitario ='$cantidad' where Id = '$Id'",$link);             

    header("Location: index.php");  
 }
 ?>