
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

<?php

$consultaDatos = "SELECT * FROM Datos WHERE Usuario ='prueba4'";
$resultadoDatos = $conexion -> query($consultaDatos);
if($resultadoDatos->num_rows == 0)
{ 
  echo "<p>No hay datos en la base de datos</p>";
}
else
{
echo"<p>esta es lla linea del else</p>";
while($fila=$resultadoDatos->fetch_assoc()) {
$fechaActual = date('d-m-y');
$hora=date("G");
$minutos=date("i");
 $insertar = "insert into Historico (Fecha,Hora,Humedad,ConsumoAgua,AguaDeposito,Minutos)values ('$fechaActual','$hora','$fila[Humedad]','$fila[ConsumoAgua]','$fila[Deposito]','$minutos')";
 $resultado2 = $conexion -> query($insertar);
}

}
echo"<p>pagina de insercoin de datos en tabla</p>";

//mysqli_close($conexion);
?>
</body>
</html>


