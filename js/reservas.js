$(document).ready(function() {

 traer_reservas();
 traer_formulario(0,0);

 $("#formulario").on("click", "#btn_enviar_reserva", function(e){
    e.preventDefault(); //no recarga pagina
    var id_reserva = $(this).attr("id_reserva"); //attr atributo
    var tipo_envio = "modi";
    if (id_reserva == 0) {                                              //modificacion o nueva reserva
       tipo_envio = "alta";
    }

    var datos = $("#form_reservas").serialize(); //guardo todos los datos del formulario en una variable para escribir menos codigo
    $.ajax({
      method: "POST",                   //metodo por el cual mando los datos (POST)
      url: "assets/abm_reservas.php",   //archivo al que mando los datos
      data: datos+"&a="+tipo_envio+"&id_reserva="+id_reserva,            //datos que mando
      success: function(result){        //es el resultado de lo que halla hecho el ajax
        if(result=="ok"){
           traer_reservas();
           traer_formulario(0,0);
           alert ("Reserva cargada correctamente");
        } else {
          alert ("Complete todos los datos");
        }
      }
    });
  });
});

function traer_reservas(){
  $.ajax({
    method: "POST",
    url: "assets/lista_reservas.php",
    success: function(result){
         $("#reservas").html(result)
    }
  });
}

$("#reservas").on("click", ".btn_eliminar_reserva", function(e){
    e.preventDefault(); //no recarga pagina
  var id =  $(this).attr("id_reserva");
  $.ajax({
    method: "POST",
    url: "assets/abm_reservas.php",
    data: "id_reserva="+id+"&a=baja",
    success: function(result){
      if(result=="ok"){
        alert ("Reserva borrdada correctamente");
        traer_reservas();
        traer_formulario(0);
      } else {
        alert ("No se pudo eliminar");
      }
    }
  });
});

function traer_formulario(id, id_cliente){
  $.ajax({
    method: "POST",
    url: "assets/formulario_reservas.php",
    data: "id_reserva="+id+"&id_cliente="+id_cliente,
    success: function(result){
         $("#formulario").html(result);
         funciones_formulario();
    }
  })
}


//------- Datepicker  js --------//

  function funciones_formulario() {
    // $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker({
      altField: "#fl",
      altFormat: "yy-mm-dd"
    });
    // $( "#datepicker2" ).datepicker();
     $( "#datepicker1" ).datepicker( "option", "dateFormat","dd/mm/yy");
      $( "#datepicker2" ).datepicker({
        altField: "#fs",
        altFormat: "yy-mm-dd"
      });
      $( "#datepicker2" ).datepicker( "option", "dateFormat","dd/mm/yy");
//timepicker
      $('.timepicker').timepicker({    timeFormat: 'h:mm p',
        interval: 15,
        //minTime: '12:00am',
        //maxTime: '12:00pm',
        defaultTime: 'hora llegada',
        startTime: '7:00',
        dynamic: false,
        dropdown: true,
        scrollbar: false,
  });
  } ;

$("#reservas").on("click", ".btn_editar_reserva", function(e){
  e.preventDefault(); //no recarga pagina
  var id =  $(this).attr("id_reserva");
  var id_cliente =  $(this).attr("id_cliente");
  traer_formulario(id, id_cliente);
});
 $("#formulario").on("click", "#btn_nueva_reserva", function(e){
     e.preventDefault(); //no recarga pagina
     traer_formulario(0,0); //recargo y vacio el formulario
});
