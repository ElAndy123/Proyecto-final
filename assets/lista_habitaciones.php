<?php
  include "config.php";

// switch ($estado) {
//   case '1':
//     $habitaciones_disponibles = "select h.estado
//                                 FROM habitaciones h reservas r
//                                 where ";
//     break;
//   case '2':
//       $habitaciones_ocupadas = "";
//   break;
//   case '3':
//       $habitaciones_en_limpieza ="";
//   break;
//   default:
//       $ver_habitaciones =  "select r.fecha_llegada, r.fecha_salida, h.habitacion, r.camas, r.nombre_pasajero
//                             FROM reservas r
//                             INNER JOIN habitaciones h on(r.id_habitacion=h.id)";
//       $resultado=mysqli_query($conexion, $ver_habitaciones);
//   break;
// }
      $ver_habitaciones =  "select r.fecha_llegada, r.fecha_salida, h.habitacion, r.camas, r.nombre_pasajero, h.suspendida, h.detalle, h.id
                            FROM reservas r
                            INNER JOIN habitaciones h on(r.id_habitacion=h.id)";
      $resultado=mysqli_query($conexion, $ver_habitaciones);

?>
<div class="row">
<?php
while ($habitacion=mysqli_fetch_array($resultado)) {
  $id = $habitacion["id"];
  $nombre_habitacion = $habitacion["habitacion"];
  $fecha_llegada =  $habitacion["fecha_llegada"]; //    dd/mm/yyyy
  $fecha_salida =  $habitacion["fecha_salida"];
  $nombre_pasajero = $habitacion["nombre_pasajero"];
  $suspendida = $habitacion["suspendida"];
  $detalle = $habitacion["detalle"];
  $fecha_llegada_visible = "";
  $fecha_salida_visible = "";
//    $fecha_llegada_original = $fecha_llegada;
  $fecha_llegada_visible = date("d/m/Y", strtotime($fecha_llegada));
  $fecha_salida_visible = date("d/m/Y", strtotime($fecha_salida));
  $camas =  $habitacion["camas"];
  $nombre_pasajero = $habitacion["nombre_pasajero"];
  $cama_matrimonial="";
  $cama_simple="";
  $dos_camas="";
  $default="";

  switch ($camas) {
    case '1':
      $camas = "cama matrimonial";
      break;
    case '2':
      $camas = "cama simple";
      break;
    case '3':
      $camas = "dos camas";
      break;
    default:
      $default="selected";
      break;
  }
if ($suspendida == 1){
  $suspendida = "checked";
}else {
  $suspendida = "";
}

?>
  <div class="col-lg-4 col-md-6">
    <div class="single-review">
      <h4><?=$nombre_habitacion?></h4>
      <p>
        Huesped: <?=$nombre_pasajero?> <br>
        Ocupada hasta: <?=$fecha_salida_visible?> <br>
        Tipo de camas: <?=$camas?><br>
        Estado: Disponible/Ocupada <br>
        <form id="formulario_detalle_<?=$id?>" >
        Detalle:<input type="text" name="txt_detalle" value="<?=$detalle?>"> <br>
        suspendida:<input type="checkbox" name="chk_suspendida" value="1" <?=$suspendida?>> <br>
        <button class="btn_enviar" id_habitacion="<?=$id?>" >Enviar</button>
        </form>
      </p>
    </div>
  </div>

<?php
}
?>
</div>
