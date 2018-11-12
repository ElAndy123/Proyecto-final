<?php
include "config.php";

$id = $_POST["id"];
$detalle = $_POST["txt_detalle"];

if(isset($_POST["chk_suspendida"])){
  $suspendida = $_POST["chk_suspendida"];
}else {
  $suspendida = 0;
}
$info_habitacion = "UPDATE `proyecto`.`habitaciones`
                    SET `suspendida` = '$suspendida', `detalle` = '$detalle'
                    WHERE `habitaciones`.`id` = $id";

$resultado = mysqli_query($conexion, $info_habitacion);
echo "info subida";

?>
