<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Untitled</title>
</head>
<body>
<?php
include "cabecera_conexionBD.php"
?> 


<?php
$usuario=$_POST[usuario];
$contrasena=$_POST[contrasena];
$consulta = "SELECT Usuario, Contraseña FROM Alta where Usuario='$usuario'";
$resultado = $conexion -> query($consulta);
if($resultado->num_rows == 0)
{ 
  echo "<p> El usuario no existe</p>";
  echo "<a href ='ingreso.html'> volver a la pagina de ingreso<a>";

}
else
{
  while($fila=$resultado->fetch_assoc())
  {
//     echo "<hr>";
//     echo "<p>usuario: $fila[usuario]</p>";
//     echo "<p>contraseña: $fila[contraseña]</p>";

     $usuarioBD = $fila[usuario];
     $contrasenaBD = $fila[contraseña];
  }

//  echo "<p>usuario es $usuario</p>";
  //echo "<p> la contraseña es $contrasena</p>";
 // echo "<p>usuarioBD es $usuarioBD</p>";
 // echo "<p> la contraseñaBD es $contrasenaBD</p>";

  if ($usuario == $usuarioBD && $contrasena == $contrasenaBD )
   {

     echo "<h2>¡Bienvenido $usuario!</h2>";


    echo "<p> $nombre esta es tu pagina personal donde podras ver o mpodificar tus datos
    y los de tu instalaccion. Asi como confirar los parametros de riego que prefieras</p>";
    include "menu_usuario.php";
   }

  else
  {
  echo "<p>la contraseña no coincide</p>";
  echo "<a href ='ingreso.html'> volver a la pagina de ingreso<a>";
  }
}
?>


</body>
</html>
