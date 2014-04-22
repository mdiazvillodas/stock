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
   $id=$_SESSION['SESS_MEMBER_ID'];
   $result=mysql_query("SELECT historicoventas.id,stock.Tipo,historicoventas.cantidades,historicoventas.fecha,historicoventas.nfact
FROM historicoventas
LEFT JOIN stock ON historicoventas.idarticulo = stock.Id where historicoventas.activo='1' and historicoventas.iduser = '$id' and stock.iduser = '$id'",$link); 
?>
<div class="breadcrumbs">
    <span>Historico de Ventas</span>
</div>
<div id="historico" class="tabla">
           <div class="titulo gray">
                      Panel de Información
           </div>
           <div class="thead">
                <div class="bebida">Item</div>
                <div class="cantidad">Cant</div>
                <div class="fecha">Fecha</div>
                <div class="cantidad">Nro</div>
           </div>
           <div class="tbody">
                      <?php  
                         while($row = mysql_fetch_array($result)) { 
                                printf("
                                <form method='get' action='procesarborrarventa.php'>
                                <div class='row'>
                                                      <div class='bebida'>%s</div>
                                                      <div class='cantidad'>%s</div>
                                                      <div class='fecha'>%s</div>
                                                       <div class='cantidad'>%s</div>
                                                      <input type='hidden' name='id' value='%s'/>
                                                      <input class='reload gray' type='submit' value='X'/>                            
                                              </div>
                                      </form>	", $row["Tipo"], $row["cantidades"], $row["fecha"], $row["nfact"], $row["id"]); 
                                                      
                         } 
                         mysql_free_result($result); 
                         mysql_close($link);    
                      ?>
           </div>