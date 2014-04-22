<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Second Service</title>
	<link rel="stylesheet" type="text/css" href="./style/style.css" />
	
	<script type="text/javascript" src="./js/mootools.js"></script>
	<script type="text/javascript" src="./js/mootools-more.js"></script>	
	<script type="text/javascript" src="./js/funciones.js"></script>	
</head>
<body>
<div id="repo">
<div class="title">Promociones</div>
	<?php 
	   include("conex.php"); 
	   $link=Conectarse(); 
	   $result=mysql_query("select * from promociones order by id",$link); 
	?> 
	<div class="tabla">
		<div class="thead">
			<div class="tipo">Promo</div>
			<div class="cantidad">Precio</div>
		</div>
		<div class="tbody">
	<?php  
	   while($row = mysql_fetch_array($result)) { 
		  printf("
		  <form method='get' action='procesarprecio.php'>
                        <div class='row'>
                            <div class='tipo'>%s</div>
                            <input name='id' type='hidden' value='%s'/>
                            <input name='cantidad' class='cantidad' style='width:25px' value='%s'/>
                            <input value='actualizar' class='button' type='submit'>
                        </div>
                    </form>	", $row["productos"], $row["id"], $row["precio"]); 
					
	   } 
	   mysql_free_result($result); 
	   mysql_close($link);    
	?> 	
		</div>
	</div>	
</div>
</body>
</html>