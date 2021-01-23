<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>datos de usuario</title>
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
echo "<div id='articulo'><p>$_SESSION[sesion_usuario] estos son tus datos personales</p></div>";

$consulta = "SELECT  *  FROM Instalaciones WHERE Usuario = '$_SESSION[sesion_usuario]' ";
$resultado = $conexion -> query($consulta);
if($resultado->num_rows == 0) 
 echo "<p>No hay animales en la base de datos</p>";
else
{
echo "<table border='2' rules='all' >";
echo "<th> Tiempo de riego</th>";
echo "<th> Hora de riego</th>";
echo "<th>Humedad del terreno deseada</th>";
echo "<th>Activar riego por huemdad</th>";
echo "<th>Tiene deposito de agua</th>";
echo "<th>Volumen del deposito</th>";
while($fila=$resultado->fetch_assoc()) {
  echo "<tr>";
	echo "<td>$fila[Tiempo]</td>";
    echo "<td>$fila[Hora]</td>";
    echo "<td>$fila[HumedadDeseada]</td>";
    echo "<td>$fila[RiegoHumedad]</td>";
	echo "<td>$fila[Deposito]</td>";
    echo "<td>$fila[VolumenDeposito]</td>";
  echo "</tr>";

}
echo "</table>";
}
?>
</body>
</html>
