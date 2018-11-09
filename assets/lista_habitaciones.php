<?php
  include "config.php";
  $ver_habitaciones =  "select r.fecha_llegada, r.fecha_salida, h.habitacion, r.camas
                        FROM reservas r
                        INNER JOIN habitaciones h on(r.id_habitacion=h.id)";
  $resultado=mysqli_query($conexion, $ver_habitaciones);



?>
<div class="row">
<?php
while ($habitacion=mysqli_fetch_array($resultado)) {
  $nombre_habitacion = $habitacion["habitacion"];
  $fecha_llegada =  $habitacion["fecha_llegada"]; //    dd/mm/yyyy
  $fecha_salida =  $habitacion["fecha_salida"];
  $fecha_llegada_visible = "";
  $fecha_salida_visible = "";
//    $fecha_llegada_original = $fecha_llegada;
  $fecha_llegada_visible = date("d/m/Y", strtotime($fecha_llegada));
  $fecha_salida_visible = date("d/m/Y", strtotime($fecha_salida));
  $camas =  $habitacion["camas"];
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

?>
  <div class="col-lg-4 col-md-6">
    <div class="single-review">
      <h4><?=$nombre_habitacion?></h4>
      <p>
        Ocupada:<br>
        Desde: <?=$fecha_llegada_visible?> <br>
        Hasta: <?=$fecha_salida_visible?> <br>
        Camas: <?=$camas?>
      </p>
    </div>
  </div>

<?php
}
?>
</div>
