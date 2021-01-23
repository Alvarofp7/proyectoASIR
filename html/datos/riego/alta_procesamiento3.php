
<html>
<head>
<title>Procesamiento de la solicitud de alta</title>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="MisEstilos.css" type="text/css">
<style>
	.azul{color:blue;}
	.subrayado{text-decoration:underline;}
</style>
</head>
<body>

<?php
include "cabecera_conexionBD.php"
?>
<div id="contenedor">
<div id="cabecera"> <!--Aplica el identificador cabecera-->
  <img src="imagenes/fondo3.jpg" alt="">
	<h1 class="sombra">Procesamiento de la solicitud de alta </h1>	
</div>

<?php
//echo "<h3>Estableciendo conexión...</h3>";
//$conexion = new mysqli($servidor,$usuario,$clave,"riegoBD");
//if ($conexion->connect_errno) {
//echo "<p>Error al establecer la conexión (" .$conexion->connect_errno. ") " .$conexion->connect_error. "</p>";
//}
//$conexion->query("SET NAMES 'UTF8'");
//echo "<p>Información de la base de prueba</p>";
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];


$consulta = "SELECT usuario, correo FROM Alta where usuario='$usuario'";
$resultado = $conexion -> query($consulta);
if($resultado->num_rows == 0)
{ 
 // echo "<p>No hay animales en la base de datos</p>";
 
//Se crean las coonsultas de insercion para las 4 tablas
 $insertar = "insert into Alta (Usuario, Correo, Contraseña) values ('$usuario', '$email', '$contrasena')";
  $resultado2 = $conexion -> query($insertar);
  $insertarU = "insert into Usuarios (Usuario) values ('$usuario')";
  $insertarI = "insert into Instalaciones (Usuario) values ('$usuario')";
  $insertarD = "insert into Datos (Usuario) values ('$usuario')";   
  $resultadoU = $conexion -> query($insertarU);
  $resultadoI = $conexion -> query($insertarI);
  $resultado2D = $conexion -> query($insertarD);

echo "<div id='articulo'><p>El usuario a sido creado con existo, ya puede ingresar con sus datos</p>
<a href ='ingreso.php'>Entrar como usuario</a></div>";
}
else
{
  echo "<div id='articulo'><p>El usuario ya existe</p>
  <a href='alta.php'> volver al formulario de alta</a></div>";
}
//$consulta = "insert into alta (usuario, correo, contraseña) values ('$usuario', '$email', '$contrasena')";
//$resultado = $conexion -> query($consulta);


//echo "<hr>";
//echo "<p>el usuario es $usuario</p>";
//echo "<p>el correo es $email</p>";
//echo "<p>la contraseña es $contrasena</p>";

//echo "<h3>Desconectando...</h3>";

mysqli_close($conexion);
?>
</body>
</html>
