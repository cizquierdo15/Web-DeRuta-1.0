<?php

	 function tiempoRuta ($ubicacion,$pais ="ES"){
	    //hace una llamada a la API pasando como parámetros la ubicacion y el país. El tipo de unidad de medida (sistema métrico decimal) y la clave API. En la variable $datos se almacena el resultado de la consulta.

	    //$ubicacion = "Gredos";
	    //$pais = "ES";

	    $datos = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=$ubicacion,$pais&units=metric&appid=aca1761f481f0d71faafc46e0242f8ad");

	    $tiempo = json_decode($datos);

	    //Para acceder a un dato concreto hay que indicar el atributo dentro del objeto. Por ejemplo, para saber la temperatura, es necesario acceder al atributo temp que está dentro de main que, a su vez, está dentro del objeto temperatura , tal como se muestra en la siguiente línea.

	    

	    $array = [$tiempo->{"main"}->{"temp"},$tiempo->{"main"}->{"temp_max"},$tiempo->{"main"}->{"temp_min"},$tiempo->{"main"}->{"humidity"},$tiempo->{"weather"}[0]->{"main"},$tiempo->{"weather"}[0]->{"description"},$tiempo->{"wind"}->{"speed"}];

	    //Array con Temperatura, Temperatura máxima, Temperatura mínima, Humedad, Nubosidad, Descripción Nubosidad, Viento

	    return $array;
	 }

?>