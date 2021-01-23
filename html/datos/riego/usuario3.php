<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Pagina de usuario</title>
<link rel="stylesheet" href="MisEstilos.css" type="text/css">

<style>
	.azul{color:blue;}
	.subrayado{text-decoration:underline;}
</style>
</head>
<body>
<?php
session_start();

//include "cabecera_conexionBD.php"

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
<div id="contenedor">
<div id="cabecera"> <!--Aplica el identificador cabecera-->
  <img src="imagenes/fondo3.jpg" alt="">
	<h1 class="sombra">Pagina principal de Riego.net </h1>	
 </div>

<?php

     echo "<div id='articulo'><h2>¡Bienvenido $_SESSION[sesion_usuario]!</h2>
     <p> $_SESSION[sesion_usuario] esta es tu pagina personal donde podras ver o modificar tus datos
    y los de tu instalaccion. Asi como configurar los parametros de riego que prefieras</p></div>";
    ?>
	
	<div id="articulo">
   <table>
  <tr>
    <td>
       <button onclick="aparecer3(document.getElementById('respuesta3'))" >Rellenar datos</button>
   </td>

   <td>
      <button onclick="aparecer1(document.getElementById('respuesta1'))">Mostrar datos</button>
  </td>
<!--  <td>
      <button onclick="aparecer2(document.getElementById('respuesta2'))" >Modificar datos</button>
  </td> -->
 </tr>
 <tr>
   <td>
     <ul id='respuesta3' class='ocultar'>
        <li><a href="rellenar_datos_personales.php" >rellenar  datos personales</a></li>
       	<li><a href="rellenar_datos_instalacion.php">Rellenar datos de la instalacion</a></li>
     </ul>
  </td>
  <td>


      <ul id='respuesta1' class='ocultar'>
       <li><a href="Dusuario.php"> Ver datos personales</a></li>
       <li><a href="mostrar_datos_instalacion.php"> Ver datos de la instalacion</a></li>
       <li><a href="mostrar_datos_sensores.php">Ver datos de los sensores</a></li>
        <li><a href="mostrar_historico.php">Ver historico de datos</a><$
     </ul>

   </td>
  <!-- <td>
     <ul id='respuesta2' class='ocultar'>
        <li>Cambiar datos personales</li>
       <li>Cambiar datos de la instlacion</li>
   </ul>  
   </td> -->
   </tr> 
  </table>
</div>
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


</body>
</html>
