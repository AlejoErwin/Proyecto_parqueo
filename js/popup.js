var btnAbrirPopup = document.getElementById('btn-cerrar-popup'),
overlay = document.getElementById('overlay'),
	popup = document.getElementById('popup'),
	btnCerrarPopup = document.getElementById('btn-cerrar-po');

btnAbrirPopup.addEventListener('click', function(){
	overlay.classList.add('desac');
	popup.classList.add('desac');
});

