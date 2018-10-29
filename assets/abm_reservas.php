<?php
  include "config.php";   //incluyo el archibo de configuracion

    $abm = $_POST["a"];

  switch ($abm) {
    case 'alta':
    $nombre_pasajero = $_POST["nombre_pasajero"];
    $email = $_POST["email"];
    $telefono_celular = $_POST["celular"];
    $habitacion = $_POST["habitacion"];                                      //recibo las variables por post
    $camas =  $_POST["camas"];
    $fecha_llegada =  $_POST["fecha_llegada"]; //    dd/mm/yyyy
    $fecha_salida =  $_POST["fecha_salida"];
    $hora_llegada =  $_POST["hora_llegada"];

    $agregar = "INSERT INTO `proyecto`.`reservas` (`nombre_pasajero`, `e-mail`, `telefono_celular`, `habitacion`, `camas`, `fecha_llegada`, `fecha_salida`, `hora_llegada`) VALUES
                                                    ('$nombre_pasajero', '$email', '$telefono_celular', '$habitacion', '$camas', '$fecha_llegada', '$fecha_salida', '$hora_llegada');";
                                                    //guardo los datos del formulario en la base de datos
    $resultado = mysqli_query($conexion, $agregar); //ejecuto la accion
      break;
    case 'baja':
    $id = $_POST["id_reserva"];
    $borrar = "DELETE FROM `proyecto`.`reservas` WHERE `reservas`.`id` = $id;"; //borro el registro seleccinado

    $resultado = mysqli_query($conexion, $borrar); //ejecuto la accion
      break;
    case 'modi':

      break;
  }





echo "ok";
    // $headers = 'MIME-Version: 1.0' . "\r\n";
    // $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    //
    // $message ='<table style="width:100%">
    //     <tr>
    //         <td>'.$name.'  '.$subject.'</td>
    //     </tr>
    //     <tr><td>Email: '.$email.'</td></tr>
    //     <tr><td>phone: '.$subject.'</td></tr>
    //     <tr><td>Text: '.$text.'</td></tr>
    //
    // </table>';
    //
    // if (@mail($to, $email, $message, $headers))
    // {
    //     echo 'Your message has been sent.';
    // }else{
    //     echo 'failed';
    // }

?>
