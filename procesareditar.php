<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head> 
   <title>Edit Post</title> 
   <link rel="stylesheet" type="text/css" href="s./style/style.css" />
</head> 
<body><div style="background: url(./images/backg.png) repeat-x; line-height: 50px;" id="head">	<a href="tipeo.php"><div class="back">	</div></a>		<div class="title">Posts	</div></div>
<div id="wrapEdit">
<div id="head">
	<div class="titleHead">
		Edit Post
	</div>	
</div>
<?php 
   include("conex.php"); 
   $link=Conectarse(); 
   $idS=$_GET['editar'];   
   $result=mysql_query("select * from posts where ID = '$idS'",$link); 
?> 
<?php       
while($row = mysql_fetch_array($result))
{ 
  printf("<div id='popUp'>
			<div class='head'>
				<div class='title'>Edit Post
				</div>
			</div>		
		  <FORM id='form1' action='saveedit.php'>
				<div class='row'>
					<div class='left'>
						Titulo:
					</div>			
					<div class='right'>
						<input class='inputING' value='%s' name='place' />
					</div>
				</div>	
				<div class='row'>				
					<div class='left'>
						Descripcion:
					</div>							
					<div class='right'>						
						<textarea class='inputING' name='tellme'>%s</textarea>
					</div>
				</div>	
				<div class='row'>					
					<div class='left'>						
						Imagen:
					</div>						
					<div class='right'>						
						<input value='%s' class='inputING' name='img' />	
					</div>	
				</div>		
					<INPUT type='submit'  class='guardar' id='Imgaceptar' name='editPost' VALUE='%s' />
				</div>	
					</div>
		</form></div>", $row["Lugar"], $row["Descripcion"], $row["Images"], $row["ID"]); 
} 
mysql_free_result($result)
/*mysql_close($link);*/   
?> 
</div>
</body>
</html>