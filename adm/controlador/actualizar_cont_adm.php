<?php

include_once "../../conexion/conexion.php";

include "../Modelo/actualizacion_adm.php";

include "../Vista/actualizar_cont_adm.php";

$actualizar = new Propietario();
$actualizar->Actualizar_Contrasena();

?>