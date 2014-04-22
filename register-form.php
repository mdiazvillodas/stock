 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Formulario de Registro</title>
	<link rel="stylesheet" type="text/css" href="./style/estilo.css" />
	<link rel="shortcut icon" href="favicon.ico">	
        
	<script type="text/javascript" src="./js/mootools.js"></script>
	<script type="text/javascript" src="./js/mootools-more.js"></script>
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
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    </head>
<body style="background: url(img/wallpper.jpg); background-size:cover;">
  <img src="./img/wallpaper.jpg"  style="position: absolute; width: 100%; height: 100%;"/>
<div id="login">
  <form id="loginForm" name="loginForm" method="post" action="register-exec.php">
    <div id="register" class="container">
      <div class="title">Formulario de Registro</div>
      <p>Usuario gratuito para el sistema de control de stock</p>
      <div class="row">
        <div class="label">
          <span>Nombre</span>
        </div>
        <div class="campo">
          <input name="fname" type="text" class="textfield" id="nombre" />
        </div>
      </div>
      <div class="row">
        <div class="label">
          <span>Apellido</span>
        </div>
        <div class="campo">
          <input name="lname" type="text" class="textfield" id="apellido" />
        </div>
      </div>
      <div class="row">
        <div class="label">
          <span>Empresa</span>
        </div>
        <div class="campo">
          <input name="empresa" type="text" class="textfield" id="emp" />
        </div>
      </div>
      <div class="row">
        <div class="label">
          <span>Email</span>
        </div>
        <div class="campo">
          <input name="login" type="text" class="textfield" id="usuario" />
        </div>
      </div>
      <div class="row">
        <div class="label">
          <span>Password</span>
        </div>
        <div class="campo">
          <input name="password" type="password" class="textfield" id="password" />
        </div>
      </div>
      <div class="row">
        <div class="label">
          <span>Repetir Password</span>
        </div>
        <div class="campo">
          <input name="cpassword" type="password" class="textfield" id="rpassword" />
        </div>
      </div>
      <div class="row">
        <input type="submit" class="enviar" name="Submit" value="Registrarse" />
      </div>
    </div>
  </form>
</div>
</body>
</html>
