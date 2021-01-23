<?php
include "cabecera_conexionBD.php"
$consulta = mysql_query("SELECT Humedad FROM Datos WHERE ID='4'";
$resultado = $conexion -> query($consulta);
$nombre = mysql_result($resultado, 0);
echo "valor=" . $nombre . ";";
?>
