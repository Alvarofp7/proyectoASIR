<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Procesamiento de ingreso de usuario</title>
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
	<h1 class="sombra"> Formulario para entrar como usuario registrado </h1>	
</div>

<?php

$usuario=$_POST[usuario];
$contrasena=$_POST[contrasena];
$_SESSION["sesion_usuario"] = "$usuario"; 
$consulta = "SELECT Usuario, Contraseña FROM Alta where Usuario='$usuario'";
$resultado = $conexion -> query($consulta);
if($resultado->num_rows == 0)
{ 
  echo "<div id='articulo'><p> El usuario no existe</p>
  <p><a href ='ingreso.php'> volver a la pagina de ingreso<a></p></div>";

}
else
{
  while($fila=$resultado->fetch_assoc())
  {
//     echo "<hr>";
//     echo "<p>usuario: $fila[usuario]</p>";
//     echo "<p>contraseña: $fila[contraseña]</p>";

     $usuarioBD = $fila[Usuario];
     $contrasenaBD = $fila[Contraseña];
  }

//  echo "<p>usuario es $usuario</p>";
  //echo "<p> la contraseña es $contrasena</p>";
 // echo "<p>usuarioBD es $usuarioBD</p>";
 // echo "<p> la contraseñaBD es $contrasenaBD</p>";

  if ($usuario == $usuarioBD && $contrasena == $contrasenaBD )
   {


//echo "<p>usuario valio $_SESSION[sesion_usuario]</p>";
header("location:usuario3.php");



   }

  else
  {
  echo "<div id='articulo'><p>la contraseña no coincide</p>
  <p><a href ='ingreso.php'> volver a la pagina de ingreso<a></p></div>";
  }
}
?>


</body>
</html>
