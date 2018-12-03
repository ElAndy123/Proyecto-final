<?php
  include "config.php";   //incluyo el archibo de configuracion

    $abm = $_POST["a"];

  switch ($abm) {
    case 'alta':
        $nombre_pasajero = $_POST["nombre_pasajero"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono_celular = $_POST["celular"];
        $habitacion = $_POST["habitacion"];                                      //recibo las variables por post
        $camas =  $_POST["camas"];
        $fecha_llegada =  $_POST["fecha_llegada"]; //    dd/mm/yyyy
        $fecha_salida =  $_POST["fecha_salida"];
        $hora_llegada =  $_POST["hora_llegada"];

        $agregar_cliente = "INSERT INTO `proyecto`.`clientes` (`nombre`, `apellido`, `e-mail`, `telefono`) VALUES
                                                              ('$nombre_pasajero', '$apellido', '$email', '$telefono_celular');";
        $resultado = mysqli_query($conexion, $agregar_cliente);

        $id_cliente = mysqli_insert_id($conexion);

        $agregar = "INSERT INTO `proyecto`.`reservas` (`id_cliente`, `id_habitacion`, `camas`, `fecha_llegada`, `fecha_salida`, `hora_llegada`) VALUES
                                                        ('$id_cliente', '$habitacion', '$camas', '$fecha_llegada', '$fecha_salida', '$hora_llegada');";
                                                        //guardo los datos del formulario en la base de datos
        $resultado = mysqli_query($conexion, $agregar); //ejecuto la accion

    break;
    case 'baja':
        $id = $_POST["id_reserva"];
        $borrar = "DELETE FROM `proyecto`.`reservas` WHERE `reservas`.`id` = $id;"; //borro el registro seleccinado

        $resultado = mysqli_query($conexion, $borrar); //ejecuto la accion
    break;
    case 'modi':
        $id = $_POST["id_reserva"];
        $nombre_pasajero = $_POST["nombre"];
        $email = $_POST["e-mail"];
        $telefono_celular = $_POST["telefono"];
        $habitacion = $_POST["habitacion"];                                      //recibo las variables por post
        $camas =  $_POST["camas"];
        $fecha_llegada =  $_POST["fecha_llegada"]; //    dd/mm/yyyy
        $fecha_salida =  $_POST["fecha_salida"];
        $hora_llegada =  $_POST["hora_llegada"];

        $editar = "UPDATE `proyecto`.`reservas`
        SET `id_habitacion` = '$habitacion', `camas` = '$camas', `fecha_llegada` = '$fecha_llegada', `fecha_salida` = '$fecha_salida', `hora_llegada` = '$hora_llegada'
        WHERE `reservas`.`id` = $id;";
        $resultado = mysqli_query($conexion, $editar); //ejecuto la accion

        $editar_cliente = "UPDATE `proyecto`.`clientes`
        SET `nombre` = '$nombre_pasajero', `e-mail` = '$email', `telefono` = '$telefono_celular'
        WHERE `clientes`.`id` = $id;";
        $resultado = mysqli_query($conexion, $editar_cliente); //ejecuto la accion

    break;
  }
echo "ok";

?>
