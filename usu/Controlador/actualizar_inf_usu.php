<?php

include_once "../../conexion/conexion.php";

include "../Modelo/actualizacion_usu.php";

include "../Vista/actualizar_inf_usu.php";

$actualizar = new Empleado();
$actualizar->Actualizar_Informacion($idUS);

?>