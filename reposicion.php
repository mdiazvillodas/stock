<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Second Service</title>
	<link rel="stylesheet" type="text/css" href="./style/style.css" />
	
	<script type="text/javascript" src="./js/mootools.js"></script>
	<script type="text/javascript" src="./js/mootools-more.js"></script>	
	<script type="text/javascript" src="./js/funciones.js"></script>
	<script type="text/javascript">
		function openLinkSimple(href, div){
			var request = new Request.HTML({
								url: href,
								method: 'get',
								update: $(div),
								onFailure: function(xhr){
									$(div).setProperty('html', xhr.responseText);
									}
								});
			request.send();
			}
	</script>		
</head>
<body>
<div id="repo">
<div class="title">Reposicion</div>
	<?php 
	   include("conex.php"); 
	   $link=Conectarse(); 
	   $result=mysql_query("select * from stock order by id",$link); 
	?> 
	<div class="tabla">
		<div class="thead">
			<div class="tipo">Bebida</div>
			<div class="cantidad">Cantidad</div>
		</div>
		<div class="tbody">
	<?php  
	   while($row = mysql_fetch_array($result)) { 
		  printf("
		  <form method='get' action='procesarreposicion.php'>
		  <div class='row'>
					<div class='tipo'>%s</div>
					<input name='id' type='hidden' value='%s'/>
					<input name='cantidad' class='cantidad' style='width:25px' value='%s'/>
					<input value='actualizar' class='button' type='submit'>
				</div>
			</form>	", $row["Tipo"], $row["Id"], $row["Cantidad"]); 
					
	   } 
	   mysql_free_result($result); 
	   mysql_close($link);    
	?> 	
		</div>
	</div>	
</div>
</body>
</html>