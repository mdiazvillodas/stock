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
$ide = $_SESSION["SESS_MEMBER_ID"];
$Id=$_GET['id'];  
   mysql_query("update historicoventas set activo='0', iduser = '$ide' where id = '$Id'",$link); 
   header("Location: index.php");
?>