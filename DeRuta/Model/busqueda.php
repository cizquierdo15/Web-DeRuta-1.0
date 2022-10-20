<?php

if(!$xml = simplexml_load_file('configuracionBD.xml')){
    echo "No se ha podido cargar el archivo XML","<br>";
} 

   $dbhost= $xml->host;
   $dbname= $xml->database;
   $dbusu= $xml->user;
   $dbpass= $xml->password;

$conexion = new mysqli($dbhost, $dbusu,$dbpass, $dbname);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

$rutaBusqueda="";
$query="SELECT nombre FROM rutas WHERE fecha_borrado is null";


if(isset($_POST['rutas'])){
	
	$q=$conexion->real_escape_string($_POST['rutas']); /*función que escapa chars especiales para evitar por ejemplo SQL Injections*/
	$query="SELECT nombre FROM rutas WHERE fecha_borrado is null and
		nombre LIKE '%".$q."%'"; /*Query para mostrar de las rutas activas alguna que tenga el texto del input*/
}

$buscarRutas=$conexion->query($query);

if ($buscarRutas->num_rows > 0){
	$rutaBusqueda.='<div class="busquedas">';

	while($filaRutas= $buscarRutas->fetch_assoc()){
		$rutaBusqueda.= '<a href="#'.str_replace(' ', '',$filaRutas['nombre']).'">'.$filaRutas['nombre'].'</a><br>';

	}

	$rutaBusqueda.='</div>';

} else {
	
	$rutaBusqueda="No se encontraron rutas";

}


echo $rutaBusqueda;

?>