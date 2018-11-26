$(document).ready(function() {

 traer_clientes();
 traer_formulario(0);


 $("#formulario").on("click", "#btn_enviar_cliente", function(e){
    e.preventDefault(); //no recarga pagina
    traer_clientes();
    var id_cliente = $(this).attr("id_cliente"); //attr atributo
    var tipo_envio = "modi";
    if (id_cliente == 0) {                                              //modificacion o nueva reserva
       tipo_envio = "alta";
    }

    var datos = $("#form_clientes").serialize(); //guardo todos los datos del formulario en una variable para escribir menos codigo
    $.ajax({
      method: "POST",                   //metodo por el cual mando los datos (POST)
      url: "assets/abm_clientes.php",   //archivo al que mando los datos
      data: datos+"&a="+tipo_envio+"&id_cliente="+id_cliente,            //datos que mando
      success: function(result){        //es el resultado de lo que halla hecho el ajax
        if(result=="ok"){
          alert ("cliente cargado correctamente");
           traer_clientes();
        } else {
          alert ("Complete todos los datos");
        }
      }
    });


  });
});

function traer_clientes(){
  $.ajax({
    method: "POST",
    url: "assets/lista_clientes.php",
    success: function(result){

         $("#clientes").html(result)

    //  alert ("datos guardados: " + result);
    }
  });
}


// $(".btn_eliminar_reserva").click(function(e){
$("#clientes").on("click", ".btn_eliminar_cliente", function(e){
  e.preventDefault(); //no recarga pagina
  var id =  $(this).attr("id_cliente");
  $.ajax({
    method: "POST",
    url: "assets/abm_clientes.php",
    data: "id_cliente="+id+"&a=baja",
    success: function(result){
      if(result=="ok"){
        alert ("cliente borrdado correctamente");
        traer_clientes();
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
    url: "assets/formulario_clientes.php",
    data: "id_cliente="+id,
    success: function(result){

         $("#formulario").html(result);
         funciones_formulario();
    }
  })
}



$("#clientes").on("click", ".btn_editar_cliente", function(e){

    e.preventDefault(); //no recarga pagina
  var id =  $(this).attr("id_cliente");
  traer_formulario(id);

});
 $("#formulario").on("click", "#btn_nuevo_cliente", function(e){
     e.preventDefault(); //no recarga pagina
     traer_formulario(0); //recargo y vacio el formulario

});


//Seccion HABITACIONES//Seccion HABITACIONES//Seccion HABITACIONES//Seccion HABITACIONES
////Seccion HABITACIONES//Seccion HABITACIONES//Seccion HABITACIONES//Seccion HABITACIONES
////Seccion HABITACIONES//Seccion HABITACIONES//Seccion HABITACIONES//Seccion HABITACIONES
