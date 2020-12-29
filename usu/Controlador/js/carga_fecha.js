$(document).ready(function(){
    $('#lista_reproducc').on('change', function(){
      var id = $('#lista_reproducc').val()
      $.ajax({
        type: 'POST',
        url: 'php/cargar_fecha.php',
        data: {'id': id}
      })
      .done(function(listas_rep){
        $('#vid').html(listas_rep)
      })
      .fail(function(){
        alert('Hubo un eror al cargar los vídeos')
      })
    })
    
  })