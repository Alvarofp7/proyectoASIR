<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Formulario para alta de nuevos usuarios</title>
<link rel="stylesheet" href="MisEstilos.css" type="text/css">
<style>
	.azul{color:blue;}
	.subrayado{text-decoration:underline;}
</style>
</head>
<body>
<div id="contenedor">
<div id="cabecera"> <!--Aplica el identificador cabecera-->
  <img src="imagenes/fondo3.jpg" alt="">
	<h1 class="sombra"> Formulario para darse de alta como cliente </h1>	
</div>

<div id="articulo">
	<form method="post" action="alta_procesamiento3.php"
	<fieldset>
	<h2 text-align="center"> Ingrese los datos para darse de alta</center></h2>
	<p>
		<label> Escriba su nombre:
			<input type="text" name="usuario" />
		</label>
	</p>
	
	<p>
		<label>Escriba su correo electrónico:
			<input type="text" name="email" />
		</label>
	</p>
	
	<p>
		<label>Escriba su contraseña:
			<input type="text" name="contrasena" />
		</label>
	</p>
	
	<p>
		<input type="submit" value="enviar"/>
	</p>
	
	</fieldset>
	</form>
</div>



</body>
</html>
