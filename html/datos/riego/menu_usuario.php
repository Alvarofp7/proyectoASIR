<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Untitled</title>
</head>
<body>

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

<table>
<tr>
  <td>
       <button onclick="aparecer3(document.getElementById('respuesta3'))" >Rellenar datos</button>
  </td>

 <td>
    <button onclick="aparecer1(document.getElementById('respuesta1'))">Mostrar datos</button>

 </ul>
 </td>

  <td>
     <button onclick="aparecer2(document.getElementById('respuesta2'))" >Modificar datos</button>
     
 </td>
</tr>
<tr>
   <td>
     <ul id='respuesta3' class='ocultar'>
        <li>rellenar  datos personales</li>
        <li>Rellenar datos de la instalacion</li>
  </td>

  <td>
      <ul id='respuesta1' class='ocultar'>
	<?php
       echo "<li><a href='Dusuario.php'?usuario=$usuario> Ver datos personales</a></li>";
       echo "<li> Ver datos de la instalacion</li>";
      echo " <li>Ver datos de seguimiento</li>";
	?>
       </ul>
  </td>
  <td>
     <ul id='respuesta2' class='ocultar'>
        <li>Cambiar datos personales</li>
        <li>Cambiar datos de la instlacion</li>
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

</body>
</html>
