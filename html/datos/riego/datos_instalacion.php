<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Datos de la instalacion</title>
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
$tiempo=$_POST[tiempo];
$hora=$_POST[hora];
$humedad=$_POST[humedad];
$modo_riego=$_POST[modo_riego];
$fuente=$_POST[fuente];
if ($modo_riego == 'humedad')
{
$rh = 'SI';
}
else
{
$rh = 'NO';
}

if ($fuente == 'deposito')
{
$dep = 'SI';
}
else
{
$dep = 'NO';
}
$capacidad=$_POST[capacidad];

$consulta = "update Instalaciones set Tiempo='$tiempo',Hora='$hora',HumedadDeseada='$humedad',RiegoHumedad='$rh', Deposito='$dep', VolumenDeposito='$capacidad'  where Usuario = '$_SESSION[sesion_usuario]'";

$resultado = $conexion -> query($consulta);
/*echo "<p>sesion de  $_SESSION[sesion_usuario] tiempo de riego $tiempo
hora de riego $hora activar riego por $modo_riego tipo de fuente $fuente
valor de rh $rh valor de deposito $dep</p>";
 */
echo "<div id='articulo'><p> $_SESSION[sesion_usuario] sus datos han sido guardados correctamente. Solo seran usados para ponernos en contacto con usted, y nunca daremos sus datos a terceros, tal como queda expresado en nuestra politica de privacidad</p>
  
<p><a href='usuario3.php'> Volver a su pagina personal</a></p>
<p><a href='rellenar_datos_personales.php'> Rellenar sus datos de contacto</a></p></div>";

  ?>
  
</body>
</html>
