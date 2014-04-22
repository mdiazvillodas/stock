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
<div id="ventas">
<div class="title">Ventas</div>
<div class="body">
	<form method="get" action="updatestock.php"> 

	<?php 
	   include("conex.php"); 
	   $link=Conectarse(); 
	   $result=mysql_query("select * from stock order by id",$link); 
	?> 
	<select name="id">
	<?php  
	   while($row = mysql_fetch_array($result)) { 
		  printf("<option name='id' value='%s'>%s
		  </option>
		  ", $row["Id"], $row["Tipo"], $row["Tipo"]); 
					
	   } 
	   mysql_free_result($result); 
	   mysql_close($link);    
	?> 	
	</select>
	<input name="cantidad" type="text"/>
	<input type="submit" class="button" value="Alta venta"/>
	</form>	
</div>	
</div>
</body>
</html>