$(document).ready(function() {
traer_habitaciones();
traer_formulario();

  function traer_habitaciones(){
    $.ajax({
      method: "POST",
      url: "assets/lista_habitaciones.php",
      success: function(result){
            $("#habitaciones").html(result);
      }
    });
}

function traer_formulario(){
  $.ajax({
    method: "POST",
    url: "assets/formulario_habitaciones.php",
    success: function(result){
         $("#formulario").html(result);
         funciones_formulario();
    }
  })
}

$("#habitaciones").on("click", ".btn_enviar", function(e){
      e.preventDefault(); //no recarga pagina
      var id = $(this).attr("id_habitacion");
      alert(id);
      var datos = $("#formulario_detalle_"+id).serialize();
    $.ajax({
      method:"POST",
      url: "assets/abm_habitaciones.php",
      data: datos+"&id="+id,
      success: function(result){
    }
    })
});

$("#formulario").change("#select_filtro", function(e){
  e.preventDefault(); //no recarga pagina
  var datos = $("#formulario_buscador").serialize();
  $.ajax({
    method:"POST",
    url: "assets/lista_habitaciones.php",
    data: datos,
    success: function(result){
      $("#habitaciones").html(result);
  }
  })
});

});
