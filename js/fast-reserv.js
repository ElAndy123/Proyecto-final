$(document).ready(function() {

 traer_secciones("reservas");

  $("#nav-menu-container").on("click", ".btn_menu", function(e){
     e.preventDefault(); //no recarga pagina
     var secciones = $(this).attr("secciones"); //attr atributo
       traer_secciones(secciones);
});

  function traer_secciones(secciones){
    $.ajax({
      method: "POST",
      url: secciones+".php",
      success: function(result){
           $("#secciones").html(result)
      }
    });
  }
});
