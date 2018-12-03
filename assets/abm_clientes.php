<?php
  include "config.php";   //incluyo el archibo de configuracion

    $abm = $_POST["a"];

  switch ($abm) {
    
    case 'alta':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $DNI = $_POST["DNI"];                                      //recibo las variables por post
        $residencia = $_POST["residencia"];

        $agregar = "INSERT INTO `proyecto`.`clientes` (`nombre`, `apellido`, `e-mail`, `telefono`, `DNI`,  `residencia`) VALUES
                                                      ('$nombre', '$apellido', '$email', '$telefono', '$DNI',  '$residencia');";
                                                        //guardo los datos del formulario en la base de datos
        $resultado = mysqli_query($conexion, $agregar); //ejecuto la accion
    break;
    case 'baja':
        $id = $_POST["id_cliente"];
        $borrar = "DELETE FROM `proyecto`.`clientes` WHERE `clientes`.`id` = $id;"; //borro el registro seleccinado

        $resultado = mysqli_query($conexion, $borrar); //ejecuto la accion
    break;
    case 'modi':
        $id = $_POST["id_cliente"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["e-mail"];
        $telefono = $_POST["telefono"];
        $DNI = $_POST["DNI"];                                      //recibo las variables por post
        $residencia = $_POST["residencia"];

        $editar = "UPDATE `proyecto`.`clientes`
        SET `nombre` = '$nombre', `e-mail` = '$email', `telefono` = '$telefono', `DNI` = '$DNI', `apellido` = '$apellido', `residencia` = '$residencia'
        WHERE `reservas`.`id` = $id;";

        $resultado = mysqli_query($conexion, $editar); //ejecuto la accion
    break;
  }
echo "ok";

?>
