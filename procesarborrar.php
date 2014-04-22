<?php  
   include("conex.php"); 
   $link=Conectarse(); 
   $idS=$_GET['borrar'];
   $result=mysql_query("select * from posts where ID = '$idS'",$link); 
   $result=mysql_query("delete from posts where ID = '$idS'",$link);    
   header("Location:index.php");   
?>