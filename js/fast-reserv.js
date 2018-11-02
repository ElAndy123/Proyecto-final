$(document).ready(function() {

 traer_reservas();
 traer_formulario(0);


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
          alert ("Reserva cargada correctamente");
           traer_reservas();
        } else {
          alert ("Complete todos los datos")
        }
      //  alert ("datos guardados: " + result);
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

    //  alert ("datos guardados: " + result);
    }
  });
}


// $(".btn_eliminar_reserva").click(function(e){
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
    //  alert ("datos guardados: " + result);
    }
  });
});

function traer_formulario(id){
  $.ajax({
    method: "POST",
    url: "assets/formulario_reservas.php",
    data: "id_reserva="+id,
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
  traer_formulario(id);
  // var datos = $("#form_reservas").serialize();
  // $.ajax({
  //   method: "POST",
  //   url: "assets/abm_reservas.php",
  //   data: datos+"&id_reserva="+id+"&a=modi",
  //   success: function(result){
  //     if(result=="ok"){
  //       alert ("Reserva modificada correctamente");
  //        traer_reservas();
  //     } else {
  //       alert ("No se pudo modificar");
  //     }
  //   //  alert ("datos guardados: " + result);
  //   }
  // });
});
