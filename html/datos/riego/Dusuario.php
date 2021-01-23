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

$consulta = "SELECT  *  FROM Usuarios WHERE Usuario = '$_SESSION[sesion_usuario]' ";
$resultado = $conexion -> query($consulta);
if($resultado->num_rows == 0) 
 echo "<p>No hay animales en la base de datos</p>";
else
{
echo "<table border='2' rules='all' >";
echo "<th> Nombre</th>";
echo "<th> Apellidos</th>";
echo "<th>telefono</th>";
echo "<th>Direccion</th>";
while($fila=$resultado->fetch_assoc()) {
  echo "<tr>";
	echo "<td>$fila[Nombre]</td>";
        echo "<td>$fila[Apellido]</td>";
        echo "<td>$fila[Telefono]</td>";
        echo "<td>$fila[Direccion]</td>";
  echo "</tr>";

}
echo "</table>";
}
?>
</body>
</html>
