<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Formulario de ingreso de usuario registrado</title>
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
	<h1 class="sombra"> Formulario para entrar como usuario registrado </h1>	
</div>

<div id="articulo">
<form method="post" action="procesar_usuario.php">
<fieldset>
<legend> Identidiquese como usuario</legend>
<p>
<label> Escriba su usuario:
<input type="text" name="usuario" />
</label>
</p>

<p>
<label> Escriba su contraseña:
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

