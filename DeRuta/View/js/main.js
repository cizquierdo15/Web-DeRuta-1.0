'use strict';


(function () {
    
	document.addEventListener("DOMContentLoaded", function(event) {

		function actualizar(){
			location.reload(true);
		}
			//Actualizar cada 5 minutos = 300000 milisegundos
		
		setInterval(actualizar,300000);

		function pintarPuntuacion(){

			var puntuaciones = document.getElementsByClassName("puntos");


			for (var i = 0; i < puntuaciones.length; i+=1) {

				switch(puntuaciones[i].innerText) {

				case '0':
   
				puntuaciones[i].style.backgroundImage="url('misc/Puntuacion_0.JPG')";

				break;

				case '1':
   
				puntuaciones[i].style.backgroundImage="url('misc/Puntuacion_1.JPG')";

				break;

				case '2':
   
				puntuaciones[i].style.backgroundImage="url('misc/Puntuacion_2.JPG')";

				break;

				case '3':
   
				puntuaciones[i].style.backgroundImage="url('misc/Puntuacion_3.JPG')";

				break;

				case '4':
   
				puntuaciones[i].style.backgroundImage="url('misc/Puntuacion_4.JPG')";

				break;

				case '5':
   
				puntuaciones[i].style.backgroundImage="url('misc/Puntuacion_5.JPG')";

				break;

				}

				puntuaciones[i].style.backgroundSize="cover";
				puntuaciones[i].style.width="150px";
				puntuaciones[i].style.height="25px";
				puntuaciones[i].style.color="transparent";

			};


			// puntuaciones[0].style.color='red';

			// puntuaciones[1].style.backgroundImage="url('images/Puntuacion_3.JPG')";
			// puntuaciones[1].style.backgroundSize="cover";
			// puntuaciones[1].style.width="150px";
			// puntuaciones[1].style.height="25px";

			// puntuaciones[2].style.color='blue';



			// element.style {
			//     background-image: url(images/Puntuacion_3.JPG);
			//     width: 150px;
			//     height: 25px;
			//     background-size: cover;


		}

		pintarPuntuacion();
		
	});			


})();