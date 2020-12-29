<?php

    include_once "../../conexion/conexion.php";

    include "../Vista/editar_inf_emp_adm.php";

    include "../Modelo/editar_inf_emp_adm.php";

    $Usuario= new Empleado();

    $Usuario->Eliminar();

    $Usuario->Actualizar();

    $Usuario->Cambiar_Estado();

    

?>