<?php
include "config.php";

$id = $_POST["id"];
$detalle = $_POST["txt_detalle"];
$estado = $_POST["estado"];

if(isset($_POST["chk_suspendida"])){
  $suspendida = $_POST["chk_suspendida"];
}else {
  $suspendida = 0;
}
switch ($estado) {
  case '1':

    break;
  case '2':

    break;
  case '3':

    break;
  case '4':

    break;
}

$info_habitacion = "UPDATE `proyecto`.`habitaciones`
                    SET `suspendida` = '$suspendida', `detalle` = '$detalle'
                    WHERE `habitaciones`.`id` = $id";

$resultado = mysqli_query($conexion, $info_habitacion);
echo "info subida";

?>
