<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Datos del usuario</title>
<link rel="stylesheet" href="MisEstilos.css" type="text/css">
<style>
	.azul{color:blue;}
	.subrayado{text-decoration:underline;}
</style>
</head>
<body>
<?php
session_start();

include "cabecera_conexionBD.php"

?> 
<div id="contenedor">
<div id="cabecera"> <!--Aplica el identificador cabecera-->
  <img src="imagenes/fondo3.jpg" alt="">
		
</div>

<?php
$nombre=$_POST[nombre];
$apellido=$_POST[apellido];
$direccion=$_POST[direccion];
$telefono=$_POST[telefono];
$consulta = "update Usuarios set Nombre='$nombre', Apellido='$apellido', Direccion='$direccion', Telefono='$telefono' where Usuario = '$_SESSION[sesion_usuario]'";

$resultado = $conexion -> query($consulta);
echo "<p>nombre $nombre apellido $apellido usuario $_SESSION[sesion_usuario]</p>";
 
echo "<div id='articulo'><p> $nombre sus datos han sido guardados correctamente. Solo seran usados para ponernos en contacto con usted, y nunca daremos sus datos a terceros, tal como queda expresado en nuestra politica de privacidad</p>
  
<p><a href='usuario3.php'> Volver a su pagina personal</a></p>
<p><a href='rellenar_datos_instalaccion.php'> Rellenar los datos de la instalacion</a></p></div>";

  ?>
  
</body>
</html>
