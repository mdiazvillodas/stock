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
$cantidad=$_GET['cantidad']; 
$tipo=$_GET['tipo'];
$Nfact=$_GET['nfact']; 
$Id=$_GET['id'];
$ide = $_SESSION["SESS_MEMBER_ID"];
$Fact = explode("-", $Id);
$one = $Fact[0];
$two = $Fact[1];
if(("$one"=='')||("$cantidad"=='')||("$one"=='0'))
		{
			echo "Pone todo pelotudo!";		
		}
	else{		
   mysql_query("update stock set Cantidad=Cantidad-'$cantidad' where Id = '$one'",$link); 
   mysql_query("insert into historicoventas (idarticulo,cantidades,fecha,tipo,nfact,total,iduser) values ('$one','$cantidad',curdate(),'$tipo','$Nfact','$two'*'$cantidad','$ide')",$link);
   /*mysql_query("insert into historicofacturacion (itemvalor,total,cantidad,fecha,nfact) values ('$two','$two'*'$cantidad','$cantidad',curdate(),'$Nfact')",$link);*/
    
   header("Location: index.php");
   }
?>