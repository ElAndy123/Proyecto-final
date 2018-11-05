<?php
  include "config.php";
  $agregar = "select *
         From reservas";
  $resultado=mysqli_query($conexion, $agregar);


//  switch ($camas) {
//    case '1':
//      $cant_camas= "una cama matrimonial";
//    case '2':
//      break;
//    case '3':
//      $cant_camas= "dos camas simples";
//      break;
//  }

  while ($fila=mysqli_fetch_array($resultado)) {
    $nombre_pasajero = $fila["nombre_pasajero"];
    $email = $fila["e-mail"];
    $telefono_celular = $fila["telefono_celular"];
    $habitacion = $fila["habitacion"];
    $camas =  $fila["camas"];                                 //guardo en variables los datos del formulario
    $fecha_llegada =  $fila["fecha_llegada"]; //    dd/mm/yyyy
    $fecha_salida =  $fila["fecha_salida"];
    $hora_llegada =  $fila["hora_llegada"];
    $id = $fila["id"];
    $fecha_llegada_visible = "";
    $fecha_salida_visible = "";
//    $fecha_llegada_original = $fecha_llegada;
    $fecha_llegada_visible = date("d/m/Y", strtotime($fecha_llegada));
    $fecha_salida_visible = date("d/m/Y", strtotime($fecha_salida));
    echo "$nombre_pasajero, $email, $telefono_celular, $habitacion, $fecha_llegada_visible, $fecha_salida_visible, $hora_llegada";
    echo "<br>";
    echo '<button id_reserva="'.$id.'" class="btn_editar_reserva">Editar</button>
          <button id_reserva="'.$id.'"  class="btn_eliminar_reserva">Eliminar</button>';
    echo "<br>";

  }
?>
