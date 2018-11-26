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

$estado = 1;

if(isset($_POST["estado"])){
  $estado = $_POST["estado"];
}

$habitaciones = "SELECT r.fecha_llegada, r.fecha_salida, h.habitacion, r.camas, r.nombre_pasajero, h.suspendida, h.detalle, h.id, c.id as id_cliente, c.nombre
                       FROM habitaciones h
                       LEFT JOIN reservas r on(r.id_habitacion=h.id)
                       LEFT JOIN clientes c on (r.id_cliente=c.id)";
      $resultado=mysqli_query($conexion, $habitaciones);

      while ($habitacion=mysqli_fetch_array($resultado)) {
        $A_id[] = $habitacion["id"];
        $A_nombre_habitacion[] = $habitacion["habitacion"];
        $A_fecha_llegada[] =  $habitacion["fecha_llegada"]; //    dd/mm/yyyy
        $A_fecha_salida[] =  $habitacion["fecha_salida"];
        $A_nombre_pasajero[] = $habitacion["nombre"];
        $A_suspendida[] = $habitacion["suspendida"];
        $A_detalle[] = $habitacion["detalle"];
        $A_camas[] = $habitacion["camas"];
        $id = $habitacion["id"];

        $hoy = date("Y-m-j");
        $disponibilidad = "SELECT * FROM `reservas` WHERE `fecha_llegada` <= '$hoy' AND '$hoy' <= `fecha_salida` AND `id_habitacion`= '$id'";
        $resultado2=mysqli_query($conexion, $disponibilidad);

        if(mysqli_num_rows($resultado2)){
           $A_estado[] = "Ocupada";
           $A_estado_imprimir[] = "<span style='color: red'> Ocupada <span>";
        } else {
          $A_estado[] = "Disponible";
          $A_estado_imprimir[] = "<span style='color: #f4e700'> Disponible <span>";
        }

}




?>
<div class="row">
<?php
for ($i=0; $i < count($A_id) ; $i++) {
  // code...

  $id = $A_id[$i];




  $nombre_habitacion = $A_nombre_habitacion[$i];
  $fecha_llegada =  $A_fecha_llegada[$i];
  $fecha_salida =  $A_fecha_salida[$i];
  $nombre_pasajero = $A_nombre_pasajero[$i];
  $suspendida = $A_suspendida[$i];
  $detalle = $A_detalle[$i];
  $camas =  $A_camas["$i"];


  $fecha_llegada_visible = "";
  $fecha_salida_visible = "";
//    $fecha_llegada_original = $fecha_llegada;
  $fecha_llegada_visible = date("d/m/Y", strtotime($fecha_llegada));
  if($fecha_salida){
  $fecha_salida_visible = date("d/m/Y", strtotime($fecha_salida));
  }
  //$camas =  $habitacion["camas"];
  //$nombre_pasajero = $habitacion["nombre_pasajero"];
  // $cama_matrimonial="";
  // $cama_simple="";
  // $dos_camas="";
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


$mostrar = false;
if($estado == 1){
  $mostrar = true;
}
if($estado == 2 && $A_estado[$i] == "Disponible" ){
  $mostrar = true;
}
if($estado == 3 && $A_estado[$i] == "Ocupada" ){
  $mostrar = true;
}


if($mostrar == true){

?>

  <div class="col-lg-4 col-md-6">
    <div class="single-review">
      <h4><?=$nombre_habitacion?></h4>
      <p>
        Huesped: <?=$nombre_pasajero?> <br>
        Ocupada hasta: <?=$fecha_salida_visible?> <br>
        Tipo de camas: <?=$camas?><br>
        Estado: <?=$A_estado_imprimir[$i]?><br>
        <form id="formulario_detalle_<?=$id?>" >
        Detalle:<input type="text" name="txt_detalle" value="<?=$detalle?>"> <br>
        suspendida:<input type="checkbox" name="chk_suspendida" value="1" <?=$suspendida?>> <br>
        <button class="btn_enviar" id_habitacion="<?=$id?>" >Enviar</button>
        </form>
      </p>
    </div>
  </div>

<?php
}  // fin if

} // fin for
?>
</div>
