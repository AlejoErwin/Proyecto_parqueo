$(document).ready(function(){
    $('input[type="radio"]').click(function() {
      var id = $(this).val();
      $.ajax({
        type: 'POST',
        url: 'cargar_espacio.php',
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
  $(document).ready(function() {
    $('input[type="radio"]').click(function() {
        var gender = $(this).val();
        $.ajax({
            url: "cantidad.php",
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