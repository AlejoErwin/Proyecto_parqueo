<?php

include_once "../../conexion/conexion.php";

include "../Vista/editar_espacio_adm.php";

include "../Modelo/editar_espacio_adm.php";

$Espacio = new Espacio();

    $Espacio->Cambiar_estado();

    $Espacio->agregar();

    $Espacio->Eliminar();


?>