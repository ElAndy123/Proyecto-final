<?php  
define('DB_HOST','localhost');
define('DB_BASEDEDATOS','proyecto');
define('DB_USUARIO','root');
define('DB_CLAVE','');
$conexion = mysqli_connect("LOCALHOST","root","","proyecto"); 
if(!$conexion){die('No se pudo conectar');}
mysqli_set_charset($conexion,"UTF8");
date_default_timezone_set("America/Argentina/Buenos_Aires");
?>