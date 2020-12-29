<?php 
	session_start();
    include_once "../conexion/conexion.php";

    include "Modelo/actualizacion_usu.php";

    include "Vista/Ingreso_usu.php";

    $Ingresar = new Empleado();
    $Ingresar->Ingresar();


?>