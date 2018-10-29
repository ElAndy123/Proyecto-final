$(document).ready(function() {

 traer_reservas();

  $("#btn_enviar_reserva").click(function(e){
    e.preventDefault(); //no recarga pagina


    var datos = $("#form_reservas").serialize(); //guardo todos los datos del formulario en una variable para escribir menos codigo
    $.ajax({
      method: "POST",                   //metodo por el cual mando los datos (POST)
      url: "assets/abm_reservas.php",   //archivo al que mando los datos
      data: datos+"&a=alta",            //datos que mando
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
      } else {
        alert ("No se pudo eliminar");
      }
    //  alert ("datos guardados: " + result);
    }
  });
});
