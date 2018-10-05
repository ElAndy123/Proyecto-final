<?php
  include "config.php";
    $nombre_pasajero = $_POST["nombre_pasajero"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $habitacion = $_POST["habitacion"];
    $camas =  $_POST["camas"];
    $fecha_llegada =  $_POST["fecha_llegada"]; //    dd/mm/yyyy
    $fecha_salida =  $_POST["fecha_salida"];
    $hora_llegada =  $_POST["hora_llegada"];





    $sql = "INSERT INTO `proyecto`.`reservas` (`nombre_pasajero`, `e-mail`, `telefono_celular`, `habitacion`, `camas`, `fecha_llegada`, `fecha_salida`, `hora_llegada`) VALUES
                                              ('$nombre_pasajero', '$email', '$celular', '$habitacion', '$camas', '$fecha_llegada', '$fecha_salida', '$hora_llegada');";

    //echo $sql;

    $resultado=mysqli_query($conexion, $sql);


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
