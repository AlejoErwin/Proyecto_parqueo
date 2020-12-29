<?php

session_start();
include_once "../conexion/conexion.php";

include "Modelo/actualizacion_adm.php";

include "Vista/registrarse_adm.php";

$registrarse = new Propietario();

$registrarse->Agregar();
?>