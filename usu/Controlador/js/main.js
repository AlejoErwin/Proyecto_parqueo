

$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'buscar.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});

$(document).ready(function(){
	
	$('#enviar_pa').on('click', function(){
	  var resultado = 'Lista de reproducción: ' + $('#lista_reproduccion option:selected').text() +
	  ' Video elegido: ' + $('#videos option:selected').text()
	  
	  $('#precio_pa').html(resultado)
	})
  
  })