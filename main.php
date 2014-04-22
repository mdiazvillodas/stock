
		    <div class="breadcrumbs">
			<span>Home</span>
		    </div>
		    <div class="panelcontrol">
		    <div class="titulo purple">Control De Precios</div>
				<?php
					   include("conex.php");  
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
                            <input type="submit" class="button" value="X"/>
                    </form>
	    </div>
		<div class="totalizado">Facturado hasta el momento
                                    <?php 

                                       $link=Conectarse(); 
                                       $result=mysql_query("select SUM(total) as total from historicoventas where activo='1' and iduser='$id'",$link); 
                                    ?>
                                    <?php  
                                       while($row = mysql_fetch_array($result)) { 
                                              printf("<span>$%s</span>
                                              ", $row["total"]); 
                                                                    
                                       } 
                                       mysql_free_result($result); 
                                       mysql_close($link);    
                                    ?> 					    
		</div>		 