<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Untitled</title>
</head>
<body>
<?php
session_start();

include "cabecera_conexionBD.php"

?> 
<style>
.elegante
 {
  background-color: teal;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  font-size: 15px;
  font-weight: bold;
  cursor: pointer;
}
.ocultar
 {
  display:none;
 }
.invisible
 {
  visibility:hidden;
 }

</style>


<?php

$usuario=$_POST[usuario];
$contrasena=$_POST[contrasena];
$_SESSION["sesion_usuario"] = "$usuario"; 
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

     $usuarioBD = $fila[Usuario];
     $contrasenaBD = $fila[Contraseña];
  }

//  echo "<p>usuario es $usuario</p>";
  //echo "<p> la contraseña es $contrasena</p>";
 // echo "<p>usuarioBD es $usuarioBD</p>";
 // echo "<p> la contraseñaBD es $contrasenaBD</p>";

  if ($usuario == $usuarioBD && $contrasena == $contrasenaBD )
   {




     echo "<h2>¡Bienvenido $usuario!</h2>";
     echo "<p> sesion de $_SESSION[sesion_usuario]</p>";
    echo "<p>usuario recibido de pot $_POST[usuario]</p>";
    echo "<p> $usuario esta es tu pagina personal donde podras ver o modificar tus datos
    y los de tu instalaccion. Asi como configurar los parametros de riego que prefieras</p>";
    ?>
   <table>
  <tr>
    <td>
       <button onclick="aparecer3(document.getElementById('respuesta3'))" >Rellenar datos</button>
   </td>

   <td>
      <button onclick="aparecer1(document.getElementById('respuesta1'))">Mostrar datos</button>
  </td>
  <td>
      <button onclick="aparecer2(document.getElementById('respuesta2'))" >Modificar datos</button>
  </td>
 </tr>
 <tr>
   <td>
     <ul id='respuesta3' class='ocultar'>
        <li><a href="rellenar_datos_personales.php" >rellenar  datos personales</a></li>
       	<li><a href="rellenar_datos_instalaccion.php">Rellenar datos de la instalacion</a></li>
     </ul>
  </td>
  <td>


      <ul id='respuesta1' class='ocultar'>
       <li><a href="Dusuario.php"> Ver datos personales</a></li>
       <li> Ver datos de la instalacion</li>
       <li>Ver datos de seguimiento</li>
        
     </ul>

   </td>
   <td>
     <ul id='respuesta2' class='ocultar'>
        <li>Cambiar datos personales</li>
        <li>Cambiar datos de la instlacion</li>
    </ul>  
   </td>
   </tr> 
  </table>

<script>
  function aparecer1(respuesta1)
  {
    respuesta1.classList.toggle("ocultar");
   }

  function aparecer2(respuesta2)
   {
    respuesta2.classList.toggle("ocultar");
   }
  function aparecer3(respuesta3)
   {
     respuesta3.classList.toggle("ocultar");
    }

   </script>
<?php
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
