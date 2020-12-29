<?php

include_once "../../conexion/conexion.php";

include "../Modelo/listado_usu.php";

include "../Vista/listado_usu.php";

$Verificar =new Tipo_Vehiculo();
$Verificar->Verificar_Estacion();

?>