<?php

    include_once "../../conexion/conexion.php";

    include "../Vista/modificar_tarifa_adm.php";

    include "../Modelo/modificar_tarifa_adm.php";

    
    
    
    $Tarifa = new Tarifa();

    $Tarifa->Actualizar();

?>