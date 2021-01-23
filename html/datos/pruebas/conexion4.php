<?php
include "cabecera.php"
?>


<?php
echo "<h3>Estableciendo conexión...</h3>";
$conexion = new mysqli($servidor,$usuario,$clave,"riegoBD");
if ($conexion->connect_errno) {
echo "<p>Error al establecer la conexión (" .$conexion->connect_errno. ") " .$conexion->connect_error. "</p>";
}
$conexion->query("SET NAMES 'UTF8'");
echo "<p>Información de la base de prueba</p>";
$consulta = "SELECT usuario,correo FROM alta";
$resultado = $conexion -> query($consulta);
if($resultado->num_rows == 0) echo "<p>No hay animales en la base de datos</p>";
while($fila=$resultado->fetch_assoc()) {
echo "<hr>";
echo "<p>usuario: $fila[usuario]</p>";
echo "<p>correo: $fila[correo]</p>";
}
echo "<h3>Desconectando...</h3>";

mysqli_close($conexion);
?>
</body>
</html>
