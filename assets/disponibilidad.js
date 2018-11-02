$(document).ready(function() {

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



});
