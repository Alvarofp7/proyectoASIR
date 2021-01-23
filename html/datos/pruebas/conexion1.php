<?php
include "cabecera.php";
?>
<p> Vamos a utilizar las siguientes variables:</p>
<ul>
<?php
echo "<li>Nombre del servidor al que nos vamos a conectar
a MySQL: $servidor</li>";
echo "<li>Nombre de usuario con el que nos vamos a
conectar a MySQL: $usuario</li>";
echo "<li>Contraseña del usuario en MySQL: $clave</li>";
?>

<?php
echo "<h3>Estableciendo conexión...</h3>";
$conexion = new mysqli($servidor,$usuario,$clave);
if ($conexion->connect_errno!=0) {
echo "<p>Error al establecer la conexión (" .
$conexion->connect_errno . ") " . $conexion->connect_error
. "</p>";
}
$conexion->query("SET NAMES 'UTF8'");
echo "<p>Información de servidor: $conexion-
>host_info</p>";
echo "<h3>Desconectando...</h3>";
mysqli_close($conexion);
?>
</ul>
</body>
</html>
