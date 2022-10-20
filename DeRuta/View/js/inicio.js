'use strict';


(function () {
    
	document.addEventListener("DOMContentLoaded", function(event) {

		
		const enlaces = document.getElementsByTagName('a');

		//enlaces[0].style.fontSize="24px";

		enlaces[0].addEventListener('mouseover',ocultar, false);
		enlaces[0].addEventListener('mouseout',mostrar, false);

		function ocultar (e) {
			if(enlaces[0].style.fontSize!=="x-small"){
				enlaces[1].style.fontSize="x-small";
			}
				
			
		}
		function mostrar (e) {
			if(enlaces[1].style.fontSize==="x-small"){
				enlaces[1].style.fontSize="inherit";
			}
		}

		enlaces[1].addEventListener('mouseover',ocultarR, false);
		enlaces[1].addEventListener('mouseout',mostrarR, false);


		function ocultarR (e) {
			if(enlaces[1].style.fontSize!=="x-small"){
				enlaces[0].style.fontSize="xx-small";
				enlaces[0].style.verticalAlign="super";
			}
			
		}
		function mostrarR (e) {
			if(enlaces[0].style.fontSize==="xx-small"){
				enlaces[0].style.fontSize="inherit";
			}
		}


	});			


})();