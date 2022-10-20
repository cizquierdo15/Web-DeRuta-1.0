<?php

/*Se obtiene los datos de la conexión a la base
de datos de un archivo xml, facilmente exportable y manejable. En caso de que no se encuentre el archivo, aparecerá un mensaje de error.
*/
if(!$xml = simplexml_load_file('configuracionBD.xml')){
    echo "No se ha podido cargar el archivo XML","<br>";
} 
	//asignamos las variables de conexión
   $dbhost= $xml->host;
   $dbname= $xml->database;
   $dbusu= $xml->user;
   $dbpass= $xml->password;

 ?>