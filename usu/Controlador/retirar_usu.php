<?php

include_once "../../conexion/conexion.php";

include "../Modelo/retirar_usu.php";
include "../Modelo/espacio_usu.php";

       $horaFINAL=NULL;
       $reservac=NULL;
       $idd=NULL;
       $pagoNeto=NULL;
       $Retirar = new Estacionamiento();
       $Tarifa = new Tarifa();
       
include "../Vista/retirar_usu.php";

       $enviar1 = NULL;
       $enviar2 = NULL;
       $numero1 = NULL;
       $idUs=NULL;
       if(isset($_POST ['enviar2']) ){
              $enviar2 = $_POST ['enviar2'];
              $pagoNetoFinal = ($_GET['total']);
              $idUs = ($_GET['idU']);
              $horaFINAL = ($_GET['horaFINAL']);
              $recervacion = ($_GET['reservac']);
              $Retirar->confirmar($enviar2,$pagoNetoFinal, $idUs, $horaFINAL, $recervacion);
              
              $Registro = new Registro();
              $Registro->Registrar($Retirar,$Tarifa);

       } 
       $Retirar->Verificar_Reserva();





?>