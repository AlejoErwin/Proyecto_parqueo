<?php 
	session_start();
    include_once "../conexion/conexion.php";

    include "Modelo/actualizacion_adm.php";

    include "Vista/Ingreso_adm.php";

    $Ingresar = new Propietario();
    $Ingresar->Ingresar();

?>