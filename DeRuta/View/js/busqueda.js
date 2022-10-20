$(obtener_busqueda());

function obtener_busqueda(rutas)
{
	$.ajax({
		url : '../Model/busqueda.php', /*Cargamos el archivo con las busquedas en base de datos*/
		type : 'POST',
		dataType : 'html',
		data : { rutas: rutas },
		})

	.done(function(resultado){
		$("#resultadoBusqueda").html(resultado); /*Lo que retorna nuestro AJAX que se pinta en el DIV indicado*/
	})
}

$(document).on('keyup', '#busqueda', function() /*Si tecleamos empezamos la búsqueda de rutas*/
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_busqueda(valorBusqueda);
	}
	else
		{
			obtener_busqueda();
		}
});
