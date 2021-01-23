<?php
include "cabecera.php"
?>


<?php
echo "<h3>Estableciendo conexión...</h3>";
$conexion = new mysqli($servidor,$usuario,$clave,"prueba");
if ($conexion->connect_errno) {
echo "<p>Error al establecer la conexión (" .$conexion->connect_errno. ") " .$conexion->connect_error. "</p>";
}
$conexion->query("SET NAMES 'UTF8'");
echo "<p>Información de la base de prueba</p>";
$id = 100;
$temperatura = 100;
$humedad = 100;

$consulta = "insert into valores (id, temperatura,humedad) values ($id, $temperatura, $humedad)";
$resultado = $conexion -> query($consulta);


echo "<hr>";
echo "el id es $id";
echo "<p>temperatura: $temperatura</p>";
echo "<p>humedad: $humedad</p>";

echo "<h3>Desconectando...</h3>";

mysqli_close($conexion);
?>
</body>
</html>
