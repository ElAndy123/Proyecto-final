<?php
include "config.php";

$id_reserva = $_POST["id_reserva"];
$id_cliente = $_POST["id_cliente"];

$nombre_pasajero = "";
$apellido = "";
$email = "";
$telefono_celular = "";
$id_habitacion =  "";
$camas =  "";
$fecha_llegada =  "";
$fecha_salida = "";
$hora_llegada = "";
$cama_matrimonial = "";
$fecha_llegada_original = "";
$fecha_llegada_visible = "";

$traer_habitacion = "select h.id, h.habitacion
From habitaciones h
WHERE h.suspendida=0";
$nombre_habitacion = mysqli_query($conexion, $traer_habitacion);
while ($fila=mysqli_fetch_array($nombre_habitacion)) {
  $A_id_habitacion[]=$fila["id"];
  $A_habitacion[]=$fila["habitacion"];
}

if($id_reserva>0){

  $traer = "SELECT r.*, c.nombre, c.apellido, c.`e-mail`, c.telefono
         FROM reservas r
         INNER JOIN clientes c on (r.id_cliente=c.id)
         WHERE r.id = $id_reserva";
  $resultado = mysqli_query($conexion, $traer);

      while ($fila=mysqli_fetch_array($resultado)) {
        $nombre_pasajero = $fila["nombre"];
        $apellido = $fila["apellido"];
        $email = $fila["e-mail"];
        $telefono_celular = $fila["telefono"];
        $id_habitacion = $fila["id_habitacion"];
        $camas =  $fila["camas"];                                 //guardo en variables los datos del formulario
        $fecha_llegada =  $fila["fecha_llegada"]; //    dd/mm/yyyy
        $fecha_salida =  $fila["fecha_salida"];
        $hora_llegada =  $fila["hora_llegada"];
        $id_reserva = $fila["id"];
        $fecha_llegada_visible = "";
        $fecha_salida_visible = "";
        $fecha_llegada_visible = date("d/m/Y", strtotime($fecha_llegada));
        $fecha_salida_visible = date("d/m/Y", strtotime($fecha_salida));
      }
}//fin if
$cama_matrimonial="";
$cama_simple="";
$dos_camas="";
$default="";

switch ($camas) {
  case '1':
    $cama_matrimonial="selected";
    break;
  case '2':
    $cama_simple="selected";
    break;
  case '3':
    $dos_camas="selected";
    break;
  default:
    $default="selected";
    break;
}

?>
  <h4 class="pb-30"></h4>
  <form class="form" id="form_reservas">
      <div class="from-group">
      <input class="form-control txt-field" type="text" name="nombre_pasajero" value="<?=$nombre_pasajero?>" placeholder="Nombre"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre'">
      <input class="form-control txt-field" type="text" name="apellido" value="<?=$apellido?>" placeholder="Apellido"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apellido'">
      <input class="form-control txt-field" type="email" name="email" value="<?=$email?>" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'">
      <input class="form-control txt-field" type="tel" name="celular" value="<?=$telefono_celular?>" placeholder="Telefono celular" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telefono celular'">
      <div class="form-group">
        <div class="default-select" id="default-select">
         <select name="habitacion"  class="form-control txt-field">
            <option value="" disabled<?=$default?>>Habitacion</option>
            <?php
            for ($i=0; $i <count($A_habitacion) ; $i++) {
              echo "<option value='.$A_id_habitacion[$i].' >".$A_habitacion[$i]."</option>";
            }
            ?>
        </select>
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="default-select" id="default-select">
         <select name="camas"  class="form-control txt-field">
            <option value="" disabled <?=$default?> >Camas</option>
            <option value="1" <?=$cama_matrimonial?> >1 cama matrimonial</option>
            <option value="2" <?=$cama_simple?> >1 cama simple</option>
            <option value="3" <?=$dos_camas?> >2 camas simples</option>
        </select>
        </div>
      </div>
      <div class="form-group">
      <div class="input-group dates-wrap">
        <input id="datepicker1" class="dates form-control"  placeholder="Fecha llegada" type="text" value="<?=$fecha_llegada_visible?>">
        <input type="text" id="fl" name="fecha_llegada" style="display:none;" value="<?=$fecha_llegada?>">
        <div class="input-group-prepend">
          <span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="input-group dates-wrap">
          <input id="datepicker2" class="dates form-control"  placeholder="Fecha salida" type="text" value="<?=$fecha_salida_visible?>">
          <input type="text" id="fs" name="fecha_salida" style="display:none;" value="<?=$fecha_salida?>">
          <div class="input-group-prepend">
            <span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group dates-wrap">
          <input  class="dates form-control timepicker" type="text" placeholder="Hora llegada"  name="hora_llegada" value="<?=$hora_llegada?>">
        </div>
      </div>
      <div class="form-group">
              <button class="col-lg-4 col-md-4  btn btn-default btn-lg" id="btn_enviar_reserva" id_reserva="<?=$id_reserva?>" id_cliente="<?=$id_cliente?>" >Enviar</button>
              <button class="col-lg-6 col-md-6  btn btn-default btn-lg" id="btn_nueva_reserva">Nueva reserva</button>
      </div>
  </form>
