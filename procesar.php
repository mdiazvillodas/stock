<?php	
//Start session	
session_start();		
//Check whether the session variable SESS_MEMBER_ID is present or not	
if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {		
	
    exit();	
    }
    ?>
<?php
include("conex.php"); 
$link=Conectarse(); 
$Descripcion=$_GET['tipo'];  
$Image=$_GET['cantidad']; 
$guita=$_GET['guita'];
$id = $_SESSION["SESS_MEMBER_ID"];
if(("$Descripcion"=='')||("$Image"==''))
		{
			echo "Faltan Datos!";		
		}
	else{
   mysql_query("insert into stock (Tipo,Cantidad,punitario,iduser) values ('$Descripcion','$Image','$guita','$id')",$link); 
    
   header("Location: index.php");
   }
?>