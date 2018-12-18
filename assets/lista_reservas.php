<?php
  include "config.php";

  $agregar = "select r.*, h.habitacion, c.nombre, c.apellido, c.telefono, c.`e-mail`, c.id as id_cliente
              from reservas r
              INNER JOIN habitaciones h on (r.id_habitacion=h.id)
              INNER JOIN clientes c on (r.id_cliente=c.id)";

  $resultado=mysqli_query($conexion, $agregar);
  ?>
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Nombre</th>


          <th scope="col">Habitacion</th>
          <th scope="col">Llegada</th>
          <th scope="col">Salida</th>
          <th scope="col">Hora llegada</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
<?php
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
?>
  <tr>
    <th><?=$nombre_pasajero?></th>


    <th><?=$nombre_habitacion?></th>
    <th><?=$fecha_llegada_visible?></th>
    <th><?=$fecha_salida_visible?></th>
    <th><?=$hora_llegada?></th>
    <th><button id_reserva="<?=$id?>" id_cliente="<?=$id_cliente?>" class="btn_editar_reserva">Editar</button>
    <button id_reserva="<?=$id?>"  class="btn_eliminar_reserva">Eliminar</button>
    </th>
</tr>
<?php
  }
?>
