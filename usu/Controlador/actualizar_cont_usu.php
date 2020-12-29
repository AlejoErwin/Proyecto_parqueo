<?php

include_once "../../conexion/conexion.php";

include "../Modelo/actualizacion_usu.php";

include "../Vista/actualizar_cont_usu.php";

$actualizar = new Empleado();
$actualizar->Actualizar_Contrasena();

?>