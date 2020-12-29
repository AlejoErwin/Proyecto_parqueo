<?php

include_once "../../conexion/conexion.php";

include "../Modelo/actualizacion_adm.php";

include "../Vista/actualizar_inf_adm.php";

$actualizar = new Propietario();
$actualizar->Actualizar_Informacion($idUS);

?>