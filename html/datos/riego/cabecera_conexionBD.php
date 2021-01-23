
<?php
$servidor = "localhost";
$usuario = "riego";
$clave = "riego";
echo "<h3>Estableciendo conexión...</h3>";
$conexion = new mysqli($servidor,$usuario,$clave,"riegoBD");
if ($conexion->connect_errno) 
{
   echo "<p>Error al establecer la conexión (" .$conexion->connect_errno. ") " .$conexion->connect_error. "</p>"; 
}
$conexion->query("SET NAMES 'UTF8'");


?>
