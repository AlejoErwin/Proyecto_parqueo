
$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'php/verificar.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#resultado").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#usuari', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});


  //$(document).ready(function() {
    //$('input[type="radio"]').click(function() {
      //  var gender = $(this).val();
        
    //});
  //});