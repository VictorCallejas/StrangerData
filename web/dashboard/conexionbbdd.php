<?php

$mysqli = new mysqli("18.220.147.80", "alexis", "123456", "cajamar2019");

/* comprobar conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

/* $server="localhost";
	$database = "cajamar";
	$db_user = "root";
	$db_pass = "root";
	
	$dblink = new mysqli($server, $db_user, $db_pass, $database);
	if ($dblink->connect_errno){
		echo "Lo sentimos, este sitio web está experimentando problemas.";
	}else{
		//echo "Conexion y Seleccion de Base de datos. Bien <br>";
	}
	$tildes = $dblink->query("SET NAMES 'utf8'"); */
	?>