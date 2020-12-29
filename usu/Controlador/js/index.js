$(document).ready(function(){
  $('#vehi1 input[type="radio"]').click(function() {
    var id = $(this).val();
    $.ajax({
      type: 'POST',
      url: 'php/cargar.php',
      data: {'id': id}
    })
    .done(function(listas_rep){
      $('#videos').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
  })

  $('#videos').on('change', function(){
    var espa = $('#videos').val();
    $('#contenedor').load("agregar_usu",{espa,espa});
  })


  $('#enviar').on('click', function(){
    var resultado = 'Lista de reproducción: ' + $('#lista_reproduccion option:selected').text() +
    ' Video elegido: ' + $('#videos option:selected').text()
    
    $('#resultado1').html(resultado)
  })

})

$(document).ready(function() {
  $('#videos').on('change', function(){
    var espa = $('#videos option:selected').text();
      $.ajax({
          url: "php/guardarespacio.php",
          method: "POST",
          data: {
              espa: espa
          },
          success: function(data) {
              $('#resu').html(data);
          }
      });
  });
});

$(document).ready(function() {
  $('input[type="radio"]').click(function() {
      var gender = $(this).val();
      $.ajax({
          url: "php/cantidad.php",
          method: "POST",
          data: {
              gender: gender
          },
          success: function(data) {
              $('#result').html(data);
          }
      });
  });
});


/*
$(document).ready(function(){
  
  $.ajax({
    type: 'POST',
    url: 'php/cargar_listas.php'
  })
  .done(function(listas_rep){
    $('#lista_reproduccion').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })

  $('#lista_reproduccion').on('change', function(){
    var id = $('#lista_reproduccion').val()
    $.ajax({
      type: 'POST',
      url: 'php/cargar_videos.php',
      data: {'id': id}
    })
    .done(function(listas_rep){
      $('#videos').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
  })





  $('#enviar').on('click', function(){
    var resultado = 'Lista de reproducción: ' + $('#lista_reproduccion option:selected').text() +
    ' Video elegido: ' + $('#videos option:selected').text()

    $('#resultado1').html(resultado)
  })

})
document.getElementById("formulario").addEventListener("radio", function(event){
  let hasError = false;
  valor = document.getElementById('nombre').value;

  if( valor == null || valor.length == 0) {
    alert('Error, rellena el campo nombre');
    hasError = true;
  }

  // obtenemos todos los input radio del grupo horario que esten chequeados
  // si no hay ninguno lanzamos alerta
  if(!document.querySelector('input[name="horario"]:checked')) {
    alert('Error, rellena el campo horario');
    hasError = true;
    }

  if(!registro.checked ){
    alert('Debe aceptar el registro');
    hasError = true;
  }
  
  // si hay algún error no efectuamos la acción submit del form
  if(hasError) event.preventDefault();
});

*/