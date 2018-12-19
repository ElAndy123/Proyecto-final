<?php
  include "config.php";
  $agregar = "select c.*
              from clientes c";
  $resultado=mysqli_query($conexion, $agregar);

?>
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">DNI</th>
        <th scope="col">residencia</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
<?php
  while ($fila=mysqli_fetch_array($resultado)) {
    $nombre = $fila["nombre"];
    $apellido = $fila["apellido"];
    $email = $fila["e-mail"];
    $telefono = $fila["telefono"];
    $DNI =  $fila["DNI"];
    $residencia = $fila["residencia"];                                 //guardo en variables los datos del formulario
    $id = $fila["id"];
?>

  <tr>
    <th><?=$nombre?></th>
    <th><?=$apellido?></th>
    <th><?=$DNI?></th>
    <th><?=$residencia?></th>
    <th><button id_cliente="<?=$id?>" class="btn_editar_cliente">Editar</button>
        <button id_cliente="<?=$id?>"  class="btn_eliminar_cliente">Eliminar</button></th>
  </tr>
  <?php
    }
  ?>
</tbody>
</table>
