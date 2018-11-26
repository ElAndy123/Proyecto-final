<?php
  include "config.php";
  $agregar = "select c.*
              from clientes c";
  $resultado=mysqli_query($conexion, $agregar);


  while ($fila=mysqli_fetch_array($resultado)) {
    $nombre = $fila["nombre"];
    $apellido = $fila["apellido"];
    $email = $fila["e-mail"];
    $telefono = $fila["telefono"];
    $DNI =  $fila["DNI"];
    $residencia = $fila["residencia"];                                 //guardo en variables los datos del formulario
    $id = $fila["id"];

    echo "$nombre, $apellido, $email, $telefono, $DNI, $residencia";
    echo "<br>";
    echo '<button id_cliente="'.$id.'" class="btn_editar_cliente">Editar</button>
          <button id_cliente="'.$id.'"  class="btn_eliminar_cliente">Eliminar</button>';
    echo "<br>";

  }
?>
