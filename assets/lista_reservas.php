<?php
  include "config.php";
  $sql = "select *
         From reservas";
  $resultado=mysqli_query($conexion, $sql);


  while ($fila=mysqli_fetch_array($resultado)) {
    $nombre_pasajero = $fila["nombre_pasajero"];
    $email = $fila["email"];
    $celular = $fila["celular"];
    $habitacion = $fila["habitacion"];
    $camas =  $fila["camas"];
    $fecha_llegada =  $fila["fecha_llegada"]; //    dd/mm/yyyy
    $fecha_salida =  $fila["fecha_salida"];
    $hora_llegada =  $fila["hora_llegada"];
    echo "$nombre_pasajero, $email, $celular, $habitacion, $camas, $fecha_llegada, $fecha_salida, $hora_llegada";
  }
?>
