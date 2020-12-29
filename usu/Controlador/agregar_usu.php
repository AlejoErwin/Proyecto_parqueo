<?php

include_once "../../conexion/conexion.php";

include "../Modelo/agregar_usu.php";
include "../Modelo/retirar_usu.php";
include "../Modelo/espacio_usu.php";

include "../Vista/agregar_usu.php";
$registro =new Cliente();
$registro->reservar();
            if(!empty($_POST['num'])){

            

            $placas=$_POST['num'];
            $pe=mysql_query("SELECT * FROM parqueo a, Cliente b,Vehiculo c WHERE a.Cliente_Cli=b.Cli AND b.Cli=c.Cliente_Cli AND c.Placa='$placas'");
            if($row=mysql_fetch_array($pe)){
                ?>
                <div class="overlay active" id="overlay">
            <div class="popup" id="popup">
            <a href="agregar_usu.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
            <h3>EL VEHICULO YA EXISTE EN EL ESTACIONAMIENTO!</h3><br>
            <div align="center">
                <a href="agregar_usu.php" class="btn_confirma"><i class="tamCC"> Salir</i></a>
            </div>
            <br>
            </div>
        </div>
                <?php
            }else{
                
                $Id=$registro->registrar();
                
                
                $vehiculo=new Vehiculo();
                $vehiculo->registrar();
                
                $registrar_Parqueo=new Estacionamiento();
                $id_Us=$_SESSION['idUs'];
                
                
                $registrar_Parqueo->Registrar($Id,$id_Us);
            }
        }


        $registro->Verificar_Reserva();
?>