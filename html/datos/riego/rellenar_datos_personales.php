<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Formulario para rellenar sus datos personales</title>
<link rel="stylesheet" href="MisEstilos.css" type="text/css">
<style>
	.azul{color:blue;}
	.subrayado{text-decoration:underline;}
</style>
</head>
<body>
<?php
session_start();
?>
<div id="contenedor">
<div id="cabecera"> <!--Aplica el identificador cabecera-->
  <img src="imagenes/fondo3.jpg" alt="">
	<h1 class="sombra"> Formulario para rellenar sus datos personales </h1>	
</div>
<?php
$usuario= $_SESSION[sesion_usuario];
echo "<div id='articulo'><p>eres $_SESSION[sesion_usuario]</p>
<p> $usuario por favor rellene sus datos personales</p></div>";
?>
<div id="articulo">
<form method="post" action="datos_personales.php"
<fieldset>
<h2> Rellene sus datos personales</h2>
<p>

<label> Escriba su nombre:
<input type="text" name="nombre" />
</label>


</p>
<p>
<label>Escriba su apellido:
<input type="text" name="apellido" />
</label>
</p>
<p>
<label>Escriba su direccion:
<input type="text" name="direccion" />
</label>
</p>
<p>
<label>Escriba su telefono:
<input type="text" name="telefono" />
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
