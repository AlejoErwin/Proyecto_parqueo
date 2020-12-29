<?php
	$db_host="localhost"; 
    $db_usuario="root"; 
    $db_password=""; 
    $db_nombre="b_parqueo"; 
	$conexion = mysql_connect($db_host,$db_usuario,$db_password);
	mysql_select_db($db_nombre,$conexion);
    mysql_query("SET NAMES utf8");
    function limpiar($tags){
		return $tags;
	}
?>


