<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>datos de los sensores</title>
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
echo "<div id='articulo'><p>$_SESSION[sesion_usuario] estos son datos historicos de tu instalacion</p></div>";
$consultaInstalaciones = "SELECT  VolumenDeposito  FROM Instalaciones WHERE Usuario = '$_SESSION[sesion_usuario]' ";
$resultadoInstalaciones = $conexion -> query($consultaInstalaciones);
$consultaDatos ="select Deposito from Datos where Usuario ='$_SESSION[sesion_usuario]'";
$resultadoDatos = $conexion -> query($consultaDatos);
$consultaHistorico = "SELECT  *  FROM Historico WHERE Usuario = '$_SESSION[sesion_usuario]' ";
$resultadoHistorico = $conexion -> query($consultaHistorico);
if($resultadoHistorico->num_rows == 0)

 echo "<p>No hay datos en la base de datos</p>";
else
{
while($fila=$resultadoInstalaciones->fetch_assoc()) {
    $capacidadDeposito=$fila[VolumenDeposito]; 
   }
while($fila=$resultadoDatos->fetch_assoc()) {
    $depositoDatos=$fila[Deposito]; 
   }

echo "<table border='2' rules='all' >";
echo "<th> Fecha</th>";
echo "<th> Hora de riego</th>";
echo "<th>Humedad medida del terreno </th>";
echo "<th>Agua consumida, en litros</th>";
echo "<th>Canridad de agua en el deposito</th>";
while($fila=$resultadoHistorico->fetch_assoc()) {
  echo "<tr>";
    echo "<td>$fila[Fecha]</td>";
    echo "<td>$fila[Hora]:$fila[Minutos]</td>";
    echo "<td>$fila[Humedad]</td>";
    echo "<td>$fila[ConsumoAgua]</td>";
	$litrosDeposito = $capacidadDeposito * $depositoDatos / 100;
     echo "<td>$litrosDeposito litros</td>";
  echo "</tr>";

}
echo "</table>";
}
echo "$capacidadDeposito";
echo "$depositoDatos";
?>
</body>
</html>
