<?php
include "config.php";

$id_cliente = $_POST["id_cliente"];

$id = "";
$nombre = "";
$apellido =  "";
$email = "";
$telefono = "";
$DNI =  "";
$residencia =  "";

$traer_clientes = "select c.id, c.cliente
                   From cliente c";
$nombre_cliente = mysqli_query($conexion, $traer_clientes);

if($id_cliente>0){

  $traer = "select *
         From clientes
         where id = $id_cliente";
  $resultado = mysqli_query($conexion, $traer);
//  HAcer una consulta a la base de datos y traer los datos de la reserca $id_reserva
      while ($fila=mysqli_fetch_array($resultado)) {
        $id = $fila["id"];
        $nombre = $fila["nombre"];
        $apellido = $fila["apellido"];
        $email = $fila["e-mail"];
        $telefono =  $fila["telefono"];                                 //guardo en variables los datos del formulario
        $DNI =  $fila["DNI"]; //    dd/mm/yyyy
        $residencia =  $fila["residencia"];
      }
}//fin if
?>
  <h4 class="pb-30"></h4>
  <form class="form" id="form_clientes">
      <div class="from-group">
      <input class="form-control txt-field" type="text" name="nombre" value="<?=$nombre?>" placeholder="Nombre"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre'">
      <input class="form-control txt-field" type="text" name="apellido" value="<?=$apellido?>" placeholder="Apellido" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apellido'">
      <input class="form-control txt-field" type="text" name="email" value="<?=$email?>" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'">
      <input class="form-control txt-field" type="number" name="telefono" value="<?=$telefono?>" placeholder="Telefono" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telefono'">
      <input class="form-control txt-field" type="number" name="DNI" value="<?=$DNI?>" placeholder="DNI" onfocus="this.placeholder = ''" onblur="this.placeholder = 'DNI'">
      <input class="form-control txt-field" type="text" name="residencia" value="<?=$residencia?>" placeholder="Residencia" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Residencia'">
      </div>
      <div class="form-group">
              <button class="col-lg-4 col-md-4  btn btn-default btn-lg" id="btn_enviar_cliente" id_cliente="<?=$id_cliente?>">Enviar</button>
              <button class="col-lg-6 col-md-6  btn btn-default btn-lg" id="btn_nuevo_cliente">Limpiar</button>
      </div>
  </form>
