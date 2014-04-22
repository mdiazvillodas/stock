<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Stock</title>
	<link rel="stylesheet" type="text/css" href="./style/estilo.css" />
	<link rel="shortcut icon" href="favicon.ico">	
        
	<script type="text/javascript" src="./js/mootools.js"></script>
	<script type="text/javascript" src="./js/mootools-more.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-36479758-2', 'dosmosquitos.com.ar');
          ga('send', 'pageview');
        
        </script>
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
<body style="background: url(../stock/img/wallpaperlogins.jpg); background-size:cover;">
  <img src="./img/wallpaperlogin.jpg"  style="position: absolute; width: 100%; height: 100%;"/>
<div id="login">
  <form id="loginForm" name="loginForm" method="post" action="login-exec.php">
    <div class="container">
      <div class="title">
        Login
      </div>
      <div class="row">
        <div class="label">
          <span>
            Usuario
          </span>
        </div>
        <div class="campo">
          <input name="login" type="text" value="" class="textfield" id="login" />
        </div>
      </div>
      <div class="row">
        <div class="label">
          <span>
            Contraseña
          </span>
        </div>
        <div class="campo">
          <input name="password" type="password" class="textfield" value="" id="password" />
        </div>
      </div>
      <div class="row">
        <input class="enviar" type="submit" name="Submit" value="Login" />
        <p>
          ¿No tenés usuario?
          <a href="register-form.php">
            Registrate!
          </a>
        </p>
      </div>
    </div>
  </form>
</div>
</body>
</html>
