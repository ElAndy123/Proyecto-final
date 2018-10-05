<?php
    $to = 'demo@site.com';
    $name = $_POST["nombre_pasajero"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $habitacion = $_POST["habitacion"];
    $camas =  $_POST["camas"];
    $camas =  $_POST["fecha_llegada"];
    $camas =  $_POST["fecha_salida"];
    $hora_llegada =  $_POST["hora_llegada"];

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$name.'  '.$subject.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>phone: '.$subject.'</td></tr>
        <tr><td>Text: '.$text.'</td></tr>

    </table>';

    if (@mail($to, $email, $message, $headers))
    {
        echo 'Your message has been sent.';
    }else{
        echo 'failed';
    }

?>
