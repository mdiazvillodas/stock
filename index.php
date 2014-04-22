<?php	
//Start session
session_start();		
//Check whether the session variable SESS_MEMBER_ID is present or not	
if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {		
	    header("Location: login-form.php");
    }
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Stock</title>
	<link rel="stylesheet" type="text/css" href="./style/estilo.css" />
	<link rel="shortcut icon" href="favicon.ico">	      
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
	    <script>
	      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	    
	      ga('create', 'UA-36479758-2', 'dosmosquitos.com.ar');
	      ga('send', 'pageview');
	    
	    </script>
    </head>
    <body>
	    <div id="pub" class="publi">
			<div id="cerrar">X</div>
			<div class="image"></div>
			<div onclick="openLinkSimple('contacto.php','contenido');" class="butpubli">Contactanos YA</div>
	    </div>
	<div class="top">
	    <span class="tit">DosMosquitos Stock Control v1.0</span>
	    <div style="display: none;" class="center">
		<div class="tool">
			<img style="height: 20px;" src="./img/iconbell.png"/>
			<ul id="toggle" class="list">
			  <li class="top">Alertas</li>
			  <li class="division">
			      <span class="it">Fifa 2014</span>
			      <span class="indicador">4/12</span>
			      <div class="barcontainer">
				    <div style="width: 33%;" class="bars red"></div>
			      </div>
			  </li>
			  <li class="division">
			      <span class="it">Crysis 2</span>
			      <span class="indicador">5/10</span>
			      <div class="barcontainer">
				    <div style="width: 50%;" class="bars green"></div>
			      </div>
			  </li>
			  <li class="division">
			      <span class="it">Rugby 2008</span>
			      <span class="indicador">8/10</span>
			      <div class="barcontainer">
				    <div style="width: 75%;" class="bars yellow"></div>
			      </div>
			  </li>
			</ul>
		</div>	
	    </div>
	    <span class="welcome">Bienvenido <?php echo $_SESSION['SESS_FIRST_NAME'];?>,
	    <?php
		       include("conex.php");  
	       $link=Conectarse();
	       $result=mysql_query("select empnom from members",$link);
	       $resultado = mysql_fetch_array($result);
	       $valor=$resultado['empnom'];
	       printf("%s",$resultado['empnom']);
				   mysql_free_result($result); 
				   mysql_close($link);   	       
	    ?> 
	    <a href="logout.php">Salir</a></span>
	</div>
        <div class="left">
            <div class="menu">
                <div style="border-radius: 5px 0 0 5px;" class="item">
		    <img src="./img/iconhome1.png"/>
		    <a style="color:#555;" href="index.php">Home</a>
		</div>
                <div onclick="openLinkSimple('estad.php','contenido');" class="item">
		    <img src="./img/iconstats1.png"/>
		    Estadisticas
		</div>   
                <div onclick="openLinkSimple('historico.php','contenido');" class="item">
		    <img src="./img/iconclock1.png"/>
		    Historico de Ventas
		</div>
                <div onclick="openLinkSimple('report.php','info');" class="item">
		    <img src="./img/iconxls.png"/>
		    Reportes
		</div> 
                <div onclick="openLinkSimple('alert.php','info');" class="item">
		    <img src="./img/iconbell.png"/>
		    Alertas
		</div> 
            </div>
	    <div id="info"></div>
        </div>
        <div id="main">
                <div id="contenido" class="content">
		    <div class="breadcrumbs">
			<span>Home</span>
		    </div>
		    <div class="panelcontrol">
		    <div class="titulo purple">Control De Precios</div>
				<?php
				   $link=Conectarse();
				   $id= $_SESSION['SESS_MEMBER_ID'];
				   $result=mysql_query("select * from stock where activo='1' and iduser='$id' order  by Tipo",$link); 
				?> 
				<div class="tabla">
					<div class="thead">
						<div class="bebida">Item</div>
						<div class="cantidad">$</div>
					</div>
					<div class="tbody">
				<?php  
				   while($row = mysql_fetch_array($result)) { 
					  printf("
					  <form method='get' action='procesarpunitario.php'>
					  <div class='row'>
								<div class='bebida'>%s</div>
								<input name='id' type='hidden' value='%s'/>
								<input name='cantidad' class='cantidad' style='width:25px' value='%s'/>
								<input value='A' class='reload purple' type='submit'>
							</div>
						</form>	", $row["Tipo"], $row["Id"], $row["punitario"]); 
								
				   } 
				   mysql_free_result($result); 
				   mysql_close($link);    
				?> 	
				</div>
			</div>
			<?php                           
			   $link=Conectarse();
			   $id = $_SESSION["SESS_MEMBER_ID"];
			   $arrojado=mysql_query("select count(iduser) as quantity from stock where iduser=$id",$link);
			   $resultado = mysql_fetch_array($arrojado);
			   $aleatorio='0';
			   $valor=$resultado['quantity'];
				if($valor==$aleatorio)
				   {
				printf("	<div id='ayuda1'>
						    <div class='tag'>
							    Actualice los precios, reemplazando el actual y presionando el boton A de la derecha de cada item
							<div class='close' id='close1'>X</div>
						    </div>
						</div>	       
				    ");
						  }
			     else{
				}
							   mysql_free_result($arrojado); 
							   mysql_close($link);   
			?>
                    </div>
		    <div class="panelcontrol">
		    <div class="titulo green">Control De Cantidad</div>
			<div class="repo">
				<?php                              
				   $link=Conectarse(); 
				   $result=mysql_query("select * from stock where activo='1' and iduser='$id' order by Tipo",$link); 
				?> 
				<div class="tabla">
					<div class="thead">
						<div class="bebida">Item</div>
						<div class="cantidad">Cant</div>
					</div>
					<div class="tbody">
				<?php  
				   while($row = mysql_fetch_array($result)) { 
					  printf("
					  <form method='get' action='procesarreposicion.php'>
					  <div class='row'>
								<div class='bebida'>%s</div>
								<input name='id' type='hidden' value='%s'/>
								<input name='cantidad' class='cantidad' style='width:25px' value='%s'/>
								<input value='A' class='reload green' type='submit'>
							</div>
						</form>	", $row["Tipo"], $row["Id"], $row["Cantidad"]); 
								
				   } 
				   mysql_free_result($result); 
				   mysql_close($link);    
				?> 	
				</div>
			</div>
			<?php                           
				if($valor==$aleatorio)
				   {
				printf("<div id='ayuda2'>
						<div class='tag'>
							    Para actualizar la cantidad de unidades por item, se debera ingresar la cantidad
							    de unidades sobre las ya existentes y al presionar el boton A esta cantidad ingresada
							    se AGREGARA a la cantidad ya existente.<br>
							    Es decir, de existir <b>4</b> unidades en stock y adquirirse <b>5</b> unidades nuevas, se debera
							    ingresar <b>5</b> y presionar A y de esta manera quedaran <b>9</b> unidades.
							<div class='close' id='close2'>X</div>
					    </div>
				    </div>	       
				    ");
						  }
			     else{
				} 
			?>
                    </div>
                    </div>
		<div class="panelingreso">
		    <div class="titulo red">Panel de Altas</div>  
		    <div class="ingreso">
			<div class="titleingreso redinverse">
			    Alta de Items
			</div>
			    <form method="get" action="procesar.php">
				    <div class="row">
					    <div class="label red">Item</div>
					    <input class="tipo" name="tipo" type="text"/>
				    </div>   
				    <div class="row">
					    <div class="label red">Cantidad</div>
					    <input class="cantidad" name="cantidad" type="text"/>
				    </div>        
				    <div class="row">
					    <div class="label red">Precio Unitario</div>
					    <input class="cantidad" name="guita" type="text"/>    
				    </div>         
				    <div class="row">                                           
					    <input type="submit" class="button red" value="Agregar Item" />
				    </div>                    
			    </form>
			<?php
				if($valor==$aleatorio)	   {
				printf("	<div id='ayuda3'>
							<div class='tag'>
							    Al dar de alta los items se debe aclarar descripcion, cantidad de stock disponible y precio unitario
							    <div class='close' id='close3'>X</div>							
							</div>
						    </div>	    ");
						  }
			     else{
				}  
			?>
		    </div>     
		    <!--<div class="ingreso">
			<div class="titleingreso redinverse">
			    Alta de Promociones
			</div>
			    <form method="get" action="procesarpromo.php"> 
				    <div class="row">
				           <div class="label red">Promocion</div>
					    <input class="tipo" name="tipo" type="text"/>
				    </div>        
				    <div class="row">
					  <div class="label red">Precio</div>
					    <input class="cantidad" name="guita" type="text"/>    
				    </div>         
				    <div class="row">                                           
					    <input type="submit" class="button red" value="Agregar Promocion" />
				    </div>               
			    </form>	                    
		    </div>-->
		</div>
		<div class="panelventas">
		    <div class="titulo yellow">Panel de Ventas</div> 		    
			<div class="ingreso">			    
			<form method="get" action="updatestock.php">
				    <div class="row">
					    <div class="label yellow">Id Operacion</div>				
					    <?php                              
					       $link=Conectarse(); 
					       $result=mysql_query("SELECT MAX(nfact) FROM historicoventas where iduser='$id'",$link); 
					    ?>
					    <?php  
					       while($row = mysql_fetch_array($result)) { 
						      printf("
							   <input class='cantidad' name='nfact' type='text' value='%s'/>
							", $row["MAX(nfact)"]); 
									    
					       } 
					       mysql_free_result($result); 
					       mysql_close($link);    
					    ?> 	
				    </div> 
					<?php 
    
					   $link=Conectarse(); 
					   $result=mysql_query("select * from stock where activo='1' and iduser='$id' order by id",$link); 
					?>
				<div class="row">
				    <div class="label yellow">Item</div>
				    <select class="sel" name="id">
					<option value="0">Items</option>
					    <?php  
					       while($row = mysql_fetch_array($result)) { 
						      printf("<option name='id' value='%s-%s'>%s
						      </option>
						      ", $row["Id"], $row["punitario"], $row["Tipo"]); 
									    
					       } 
					       mysql_free_result($result); 
					       mysql_close($link);    
					    ?> 	
				    </select>
				</div>
				<div class="row">
				    <div class="label yellow">Cantidad</div>
				    <input name="cantidad" class="cantidad" type="text"/>
				</div>
				<input type="submit" class="button yellow" value="Alta venta"/>
			</form>
			<?php
				if($valor==$aleatorio)	   {
				printf("<div id='ayuda4'>
						<div class='tag'>
							el Id operacion es una simple guia para separar las ventas. Siempre se mostrara el numero de ID mas grande, pero sirve meramente como guia.
							<div class='close' id='close4'>X</div>
						</div>
				       </div>		    ");
						  }
			     else{
				}
			?>		
		    </div>
			</div>
                    <!--<div class="repo1">
                            <?php 
                               $link=Conectarse(); 
                               $result=mysql_query("select * from promociones order by id",$link); 
                            ?> 
                            <div class="tabla">
                                    <div class="thead">
                                            <div class="bebida">Promo</div>
                                            <div class="cantidad">Precio</div>
                                    </div>
                                    <div class="tbody">
                            <?php  
                               while($row = mysql_fetch_array($result)) { 
                                      printf("
                                      <form method='get' action='procesarprecio.php'>
                                            <div class='row'>
                                                <input type='text' name='promo' class='bebida' value='%s'/>
                                                <input name='id' type='hidden' value='%s'/>
                                                <input name='cantidad' class='cantidad' style='width:25px' value='%s'/>
                                                <input value='' class='reload' type='submit'>
                                            </div>
                                        </form>	", $row["productos"], $row["id"], $row["precio"]); 
                                                            
                               } 
                               mysql_free_result($result); 
                               mysql_close($link);    
                            ?> 
                            </div>
                    </div>   
		</div>-->
            <div class="bajas">
                    <form method="get" action="procesarborrarstock.php"> 
                                    <?php 

                                       $link=Conectarse(); 
                                       $result=mysql_query("select * from stock where activo='1' and iduser='$id' order by Tipo",$link); 
                                    ?> 
                            <select name="id">
                                <option name="id" value='seleccione'>Borrar item de Stock</option>
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
                            <input type="submit" class="button red" value="X"/>
                    </form>
	    </div>	 
        </div>
        <div class="footer">
	</div>
                   <!-- <form method="get" action="procesarborrarpromo.php"> 
                                    <?php 

                                       $link=Conectarse(); 
                                       $result=mysql_query("select * from promociones order by productos",$link); 
                                    ?> 
                            <select name="id">
                                <option name="id" value='seleccione'>Borrar de Promo</option>
                                    <?php  
                                       while($row = mysql_fetch_array($result)) { 
                                              printf("<option name='id' value='%s'>%s
                                              </option>
                                              ", $row["id"], $row["productos"], $row["productos"]); 
                                                                    
                                       } 
                                       mysql_free_result($result); 
                                       mysql_close($link);    
                                    ?> 	
                            </select>
                            <input type="submit" class="button" value="X"/>
		    </form>   --!>                                                   
            </div>     
        </div>        
    </body>
</html>