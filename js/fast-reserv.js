$(document).ready(function() {

 traer_reservas();





  $("#btn_enviar_reserva").click(function(e){
    e.preventDefault(); //no recarga pagina


    var datos = $("#form_reservas").serialize();
    $.ajax({
      method: "POST",
      url: "assets/abm_reservas.php",
      data: datos,
      success: function(result){
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
