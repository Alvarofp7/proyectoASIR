<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Untitled</title>
</head>
<body>
<?php
//session_start();

include "cabecera_conexionBD.php"

?> 

<?php

$humedad=$_POST[humedad];
//$humedad =50;
$volumen=$_POST[volumen];
//$consumo = 300;
$id=$_POST[id];
//$id=4;

$insertarHumedad = "update Datos set Humedad='$humedad',Fecha=curdate(),Hora=curtime()  where ID='$id'";
$insertarVolumen = "update Datos set Deposito='$volumen'  where ID='$id'";
$resultadoHumedad = $conexion -> query($insertarHumedad);
$resultadoVolumen = $conexion -> query($insertarVolumen);

echo("<p>datos guardados</p>");

?>


</body>
</html>
