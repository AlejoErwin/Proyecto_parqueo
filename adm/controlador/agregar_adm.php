<?php

    include_once "../../conexion/conexion.php";

    include "../Vista/agregar_adm.php";
    
    include "../Modelo/editar_inf_emp_adm.php";

    $agregar = new Empleado();
    $agregar->agregar();
?>