<?php	
//Start session	
session_start();		
//Check whether the session variable SESS_MEMBER_ID is present or not	
if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {		
	
    exit();	
    }
    ?>
<div id="estadisticas">
<div class="breadcrumbs">
    <span>Estadisticas </span>
</div>
<div class="page-header">
    Facturación ultimos 5 meses
</div>
<div class="graph">
    <div class="scale">
	<div class="label"></div>
    	<span class="lo" style="left:895px;">$8000</span>	
	<span class="lo" style="left:845px;">$7500</span>	
	<span class="lo" style="left:795px;">$7000</span>
    	<span class="lo" style="left:745px;">$6500</span>
	<span class="lo" style="left:695px;">$6000</span>	
	<span class="lo" style="left:645px;">$5500</span>	
	<span class="lo" style="left:595px;">$5000</span>
    	<span class="lo" style="left:545px;">$4500</span>
    	<span class="lo" style="left:495px;">$4000</span>	
	<span class="lo" style="left:445px;">$3500</span>	
	<span class="lo" style="left:395px;">$3000</span>
    	<span class="lo" style="left:345px;">$2500</span>
	<span class="lo" style="left:295px;">$2000</span>	
	<span class="lo" style="left:245px;">$1500</span>	
	<span class="lo" style="left:195px;">$1000</span>
    	<span class="lo" style="left:145px;">$500</span>
    </div>
    <div class="row">
	<div class="label">Abril</div>
	<?php
	    include("conex.php"); 
	   $link=Conectarse();
	   $id=$_SESSION['SESS_MEMBER_ID'];
	   $result=mysql_query("
			       select (SUM(total)/10) as totales from historicoventas where activo='1' and iduser='$id' and fecha between '2014-04-01' and '2014-04-30'",$link); 
	?> 
	<?php  
	   while($row = mysql_fetch_array($result)) {
	    
		  printf("<div class='bars' style='width:%spx;	background: #D9534F;'>
			    <span>$%s</span>
			 </div>
		  ", $row["totales"], $row["totales"]*10);                         
	   } 
	   mysql_free_result($result); 
	   mysql_close($link);    
	?>
    </div>
    <div class="row">
	<div class="label">Mayo</div>
	<?php
	   $link=Conectarse(); 
	   $result=mysql_query("
			       select (SUM(total)/10) as totales from historicoventas where activo='1' and iduser='$id' and fecha between '2014-05-01' and '2014-05-30'",$link); 
	?> 
	<?php  
	   while($row = mysql_fetch_array($result)) {
	    
		  printf("<div class='bars' style='width:%spx;	background: #F0AD4E;'>
			    <span>$%s</span>
			 </div>
		  ", $row["totales"], $row["totales"]*10);                         
	   } 
	   mysql_free_result($result); 
	   mysql_close($link);    
	?>
    </div>
    <div class="row">
	<div class="label">Junio</div>
	<?php
	   $link=Conectarse(); 
	   $result=mysql_query("
			       select (SUM(total)/10) as totales from historicoventas where activo='1' and iduser='$id' and fecha between '2014-06-01' and '2014-06-30'",$link); 
	?> 
	<?php  
	   while($row = mysql_fetch_array($result)) {
	    
		  printf("<div class='bars' style='width:%spx;	background: #2C7659;'>
			    <span>$%s</span>
			 </div>
		  ", $row["totales"], $row["totales"]*10);                         
	   } 
	   mysql_free_result($result); 
	   mysql_close($link);    
	?>
    </div>
    <div class="row">
	<div class="label">Julio</div>
	<?php
	   $link=Conectarse(); 
	   $result=mysql_query("
			       select (SUM(total)/10) as totales from historicoventas where activo='1' and iduser='$id' and fecha between '2014-07-01' and '2014-07-30'",$link); 
	?> 
	<?php  
	   while($row = mysql_fetch_array($result)) {
	    
		  printf("<div class='bars' style='width:%spx;	background: #762C59;'>
			    <span>$%s</span>
			 </div>
		  ", $row["totales"], $row["totales"]*10);                         
	   } 
	   mysql_free_result($result); 
	   mysql_close($link);    
	?>
    </div>
    <div class="row">
	<div class="label">Julio</div>
	<?php
	   $link=Conectarse(); 
	   $result=mysql_query("
			       select (SUM(total)/10) as totales from historicoventas where activo='1' and iduser='$id' and fecha between '2014-08-01' and '2014-08-30'",$link); 
	?> 
	<?php  
	   while($row = mysql_fetch_array($result)) {
	    
		  printf("<div class='bars' style='width:%spx;	background: #555555;'>
			    <span>$%s</span>
			 </div>
		  ", $row["totales"], $row["totales"]*10);                         
	   } 
	   mysql_free_result($result); 
	   mysql_close($link);    
	?>
    </div>
    <div class="page-header">
	Articulos Más vendidos
    </div>
    <div class="panelranking">
    <div class="titulo purple">Ranking</div>
	<?php                             
	   $link=Conectarse(); 
	   $result=mysql_query("select stock.Tipo, count(historicoventas.idarticulo) as cantidad from stock
				left join historicoventas on historicoventas.idarticulo  = stock.Id
				where historicoventas.iduser = '$id' and stock.iduser = '$id'
				group by historicoventas.idarticulo
				order by cantidad desc",$link); 
	?> 
	<div id="" class="tabla">
		<div class="thead">
			<div class="bebida">Item</div>
			<div class="cantidad">Cant.</div>
		</div>
		<div class="tbody">
	<?php  
	   while($row = mysql_fetch_array($result)) { 
		  printf("
		<div class='row'>
		    <div class='bebida'>%s</div>
		    <div class='cantidad'>%s</div>
		</div>	", $row["Tipo"], $row["cantidad"]); 
					
	   } 
	   mysql_free_result($result); 
	   mysql_close($link);    
	?> 	
		</div>
	</div>
    </div>

</div>