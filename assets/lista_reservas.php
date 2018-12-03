<?php
  include "config.php";

  $agregar = "select r.*, h.habitacion, c.nombre, c.apellido, c.telefono, c.`e-mail`, c.id as id_cliente 
              from reservas r
              INNER JOIN habitaciones h on (r.id_habitacion=h.id)
              INNER JOIN clientes c on (r.id_cliente=c.id)";

  $resultado=mysqli_query($conexion, $agregar);

  while ($fila=mysqli_fetch_array($resultado)) {
    $nombre_pasajero = $fila["nombre"];
    $apellido = $fila["apellido"];
    $email = $fila["e-mail"];
    $telefono_celular = $fila["telefono"];
    $id_habitacion = $fila["id_habitacion"];
    $camas =  $fila["camas"];                                 //guardo en variables los datos del formulario
    $fecha_llegada =  $fila["fecha_llegada"]; //    dd/mm/yyyy
    $fecha_salida =  $fila["fecha_salida"];
    $hora_llegada =  $fila["hora_llegada"];
    $id = $fila["id"];
    $nombre_habitacion = $fila["habitacion"];
    $id_cliente = $fila["id_cliente"];
    $fecha_llegada_visible = "";
    $fecha_salida_visible = "";

    $fecha_llegada_visible = date("d/m/Y", strtotime($fecha_llegada));
    $fecha_salida_visible = date("d/m/Y", strtotime($fecha_salida));

    echo "$nombre_pasajero, $apellido, $email, $telefono_celular, $nombre_habitacion, $fecha_llegada_visible, $fecha_salida_visible, $hora_llegada";
    echo "<br>";
    echo '<button id_reserva="'.$id.'" id_cliente="'.$id_cliente.'" class="btn_editar_reserva">Editar</button>
          <button id_reserva="'.$id.'"  class="btn_eliminar_reserva">Eliminar</button>';
    echo "<br>";
  }
?>
