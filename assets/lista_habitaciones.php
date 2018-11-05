<?php
  include "config.php";
  $ver_habitaciones =  "select *
                        From reservas r
                        INNER JOIN habitaciones h on(r.id_habitacion=h.id)";
  $resultado=mysqli_query($conexion, $ver_habitaciones);

echo "string";

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
?>
  <div class="col-lg-4 col-md-6">
    <div class="single-review">
      <h4><?=$nombre_habitacion?></h4>
      <p>
        Ocupada:<br>
        Desde: <?=$fecha_llegada_visible?> <br>
        Hasta: <?=$fecha_salida_visible?> <br>
        Camas:
      </p>
    </div>
  </div>

<?php
}
?>
</div>
