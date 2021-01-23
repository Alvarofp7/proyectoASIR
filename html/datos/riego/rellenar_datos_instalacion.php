<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Formulario para rellenar los datos de la instalacion</title>
<link rel="stylesheet" href="MisEstilos.css" type="text/css">
<style>
	.azul{color:blue;}
	.subrayado{text-decoration:underline;}
</style>
</head>
<body>
<?php
session_start();
?>
<div id="contenedor">
<div id="cabecera"> <!--Aplica el identificador cabecera-->
  <img src="imagenes/fondo3.jpg" alt="">
	<h1 class="sombra"> Formulario para rellenar los datos de su instalacion </h1>	
</div>
<?php
$usuario= $_SESSION[sesion_usuario];
echo "<div id='articulo'><p>eres $_SESSION[sesion_usuario]</p>
<p> $usuario por favor rellene los datos de la instalacion</p></div>";
?>

<div id="articulo">
<form method="post" action="datos_instalacion.php"
<fieldset>
<h2> Rellene sus datos personales</h2>
<p>
<p>Los siguientes parametros son para saber el tiempo de riego y a que hora desea que se active el riego</p>
<p> Estos valores los podra cambiar cuando necesite</p>
<label> Escriba el tiempo de riego en minutos:
<input type="text" name="tiempo" />
</label>
</p>
<p>
<label>Escriba a que hora empieza a regar:
<input type="text" name="hora" />
</label>
</p>
<p>La siguiente parte es para activar el riego automatico en relacion a la humedad.
Si se activa esta opcion se regara siempre que sea necesario para mantener la 
humedad deseada</p>

<p>
<label>Escriba el % de humedad deseada, no hace falta el simbolo %, valores de 0 a 100:
<input type="text" name="humedad" />
</label>
</p>

<p>
   Modo de riego <br/>
   <input type="radio" name="modo_riego" value="tiempo" checked="checked">
    Riego por tiempo<br/>
   <input type="radio" name="modo_riego" value="humedad"/> 
     riego por % de humedad<br/>
</p>

<p>
  Por favor indique la fuente de agua <br/>
   <input type="radio" name="fuente" value="grifo" checked="checked">
    Instalacion de agua<br/>
   <input type="radio" name="fuente" value="deposito"/> 
     Deposito de agua<br/>
</p>

<p>
<label>Indique la capacidad del deposito en litros:
<input type="text" name="capacidad" />
</label>
</p>



<p>Los valores de tipode riego o el tipo de fuente para el agua podra moddificarlo simepre que lo necesite</p>
<p>
<input type="submit" value="enviar"/>
</p>

</fieldset>
</form>
</div>



</body>
</html>
