<?php

class Estacionamiento{
    var $Cliente;
    var $fecha;
    var $horaIn;
    var $TipoVehiculo;


    public function Registra($Ci,$id_Us,Espacio $espaci){
        if(!empty($_POST['nom']) and !empty($_POST['num']) and !empty($_POST['mod']) and !empty($_POST['hor'])){
            $placas=$_POST['num'];

            $pe=mysql_query("SELECT * FROM parqueo a, Cliente b,Vehiculo c WHERE a.Cliente_Cli=b.Cli AND b.Cli=c.Cliente_Cli AND c.Placa='$placas'");
            if($row=mysql_fetch_array($pe)){
                ?>
                <div class="overlay active" id="overlay">
            <div class="popup" id="popup">
            <a href="agregar_usu.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
            <h3>EL VEHICULO YA EXISTE EN EL ESTACIONAMIENTO!!!</h3><br>
            <div align="center">
                <a href="agregar_usu.php" class="btn_confirma"><i class="tamCC"> Salir</i></a>
            </div>
            <br>
            </div>
        </div>
                <?php
            }
            else{
                $val=$_POST['vehi'];
                //hora
                $hora=$_POST['hor'];
                //fecha;
                $fecha = date("Y")."-".date("m")."-".date("d");
                //Tipo Vehiculo
                $TipoVehiculo=$_POST['vehi'];
                if($TipoVehiculo==1){
                    $TipoV="Auto";
                }
                if($TipoVehiculo==2){
                    $TipoV="Moto";
                }

                $espacio=$espaci->espacio($TipoVehiculo);
                
                
                // periodo
                $periodoss=date('H');
                if($periodoss>=20 or $periodoss<=8){
                    $periodo='Noche';
                }
                else{
                    $periodo='Hora';
                }
                $pe=mysql_query("SELECT * FROM Cliente a,Vehiculo b WHERE a.CI='$Ci' AND a.Cli=b.Cliente_Cli");
                while($row=mysql_fetch_array($pe)){
                $id_cli=$row['Cli'];
                $modelo=$row['Modelo'];
                $nombre=$row['Nombre'];
                $placa=$row['Placa'];
                }
                $_SESSION["NomF"]=$nombre;
                $_SESSION["PlaF"]=$placa;
                $_SESSION["TiV"]=$TipoV;
                $_SESSION["HoE"]=$hora;
                $_SESSION["HoS"]="";
                $_SESSION["Cii"]=$Ci;
                $_SESSION["Esp"]=$espacio;
                $_SESSION['Tiempo']=" : ";
                $_SESSION["Monto"]="_ _";
    
    
    
                mysql_query("INSERT INTO parqueo (Pa, Usuario_Us, Hora_entrada, Fecha,Espacio_Es,Tipo_vehiculo_Tv,Cliente_Cli,Periodo,Estado) 
                           VALUES ('$espacio','$id_Us','$hora','$fecha','$espacio','$TipoVehiculo','$id_cli','$periodo','Ocupado')");
                ?>        
            <div class="overlay active" id="overlay">
            <div class="popup" id="popup">
            <a href="agregar_usu.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
            <h3>REGISTRO CON EXITO!!!</h3>
            <h4>Nombre: <i class="letraV espacio"><?php echo " ",$nombre," "; ?></i> Placa: <i class="letraV espacio"><?php echo " ",$placa; ?></i></h4>
            <h4>Modelo: <i class="letraV"><?php echo " ",$modelo; ?></i></h4>
            <h4>Espacio: <i class="letraV"><?php echo " ",$espacio; ?></i></h4>
            <h4>Tipo Vehiculo: <i class="letraV"><?php echo " ",$TipoV; ?></i></h4>
            <h4>Hora: <i class="letraV espacio"><?php echo " ",$hora; ?></i> Fecha: <i class="letraV"><?php echo " ",$fecha; ?></i></h4>
            <h4>Periodo: <i class="letraV"><?php echo " ",$periodo; ?></i></h4>
            <br>
            <div align="center">
            <a href="../../pdf/index.php" class="btn_confirma espacioS"><i class="tamCC">Generar Ticket</i></a>
                <a href="agregar_usu.php" class="btn_confirma"><i class="tamCC"> Salir</i></a>
            </div>
            <br>
            </div>
        </div>
        </div>
        <?php
            }            
        }
    }




function idUs(){
    $idd=NULL;
    if(!empty($_POST['modelo'])){
        $q=$_POST['modelo'];
            $pe=mysql_query("SELECT a.Es,d.Nombre,e.Placa, b.Tipo_V, c.Hora_entrada, c.Fecha, TIMESTAMPDIFF(DAY, c.fecha, CURDATE()) fecha_act, c.Periodo, d.Cli
            FROM espacio a, tipo_vehiculo b, parqueo c, cliente d, Vehiculo e 
            WHERE b.Tv=a.Tipo_vehiculo_Tv and c.Espacio_Es=a.Es AND d.Cli=c.Cliente_Cli and e.Cliente_Cli=d.Cli 
            and (e.Placa LIKE '%$q%' or d.Nombre LIKE '%$q%')");
        while($row=mysql_fetch_array($pe)){
        $idd=$row["Es"];
        }
    }
    return $idd;
}
function horaAct(){
    $horaFINAL=NULL;
    if(!empty($_POST['modelo'])){
        $cont=0;
        $id_cli=NULL;
        $q=$_POST['modelo'];
            $pe=mysql_query("SELECT a.Es,d.Nombre,e.Placa, b.Tipo_V, c.Hora_entrada, c.Fecha, TIMESTAMPDIFF(DAY, c.fecha, CURDATE()) fecha_act, c.Periodo, d.Cli
            FROM espacio a, tipo_vehiculo b, parqueo c, cliente d, Vehiculo e 
            WHERE b.Tv=a.Tipo_vehiculo_Tv and c.Espacio_Es=a.Es AND d.Cli=c.Cliente_Cli and e.Cliente_Cli=d.Cli 
            and (e.Placa LIKE '%$q%' or d.Nombre LIKE '%$q%')");
        while($row=mysql_fetch_array($pe)){
        $fecha=$row["fecha_act"];
        $hora=$row['Hora_entrada'];
        $id_cli=$row['Cli'];
        $cont++;
        }
        $validacio=NULL;
        $pee=mysql_query("SELECT a.Pago FROM registro a WHERE a.Cliente_Cli='$id_cli'");
            if($row=mysql_fetch_array($pee)){
                $validacio=$row['Pago'];
            }
        if($cont>0 and $validacio==NULL){
            if($cont==1){
                list($hora, $min, $seg) = split(':', $hora);
               $horaAC=date('H');
                 $minAC=date('i');
                 $minG=0;
                if($fecha>0){
                    $MinGEN=($horaAC*60+$minAC)-($hora*60+$min);
                   if($MinGEN<=0){
                       $fechaGEN=$fecha-1;
                        $minG=($fechaGEN*60*24)+($horaAC*60+$minAC)+(1440-($hora*60+$min));
                   }
                   else{
                    $minG=($fecha*24*60)+($horaAC*60+$minAC)-($hora*60+$min);
                   }

                }
                else{
                    if($fecha==0){
                        $minG=($horaAC*60+$minAC)-($hora*60+$min);
                    }
                }
                $minFIN=$minG;
                $horaFIN=0;
                while($minFIN>=60){
                    $horaFIN++;
                    $minFIN=$minFIN-60;
                }
                $horaFINAL=$horaFIN.":".$minFIN;
            }
        }
    }
    return $horaFINAL;
}





function reservas(){
    $reservac=NULL;
    if(!empty($_POST['modelo'])){
        $cont=0;
        $id_cli=NULL;
        $q=$_POST['modelo'];
            $pe=mysql_query("SELECT a.Es,d.Nombre,e.Placa, b.Tipo_V, c.Hora_entrada, c.Fecha, TIMESTAMPDIFF(DAY, c.fecha, CURDATE()) fecha_act, c.Periodo, d.Cli
            FROM espacio a, tipo_vehiculo b, parqueo c, cliente d, Vehiculo e 
            WHERE b.Tv=a.Tipo_vehiculo_Tv and c.Espacio_Es=a.Es AND d.Cli=c.Cliente_Cli and e.Cliente_Cli=d.Cli 
            and (e.Placa LIKE '%$q%' or d.Nombre LIKE '%$q%')");
        while($row=mysql_fetch_array($pe)){
        $id_cli=$row['Cli'];
        
        $periodo=$row['Periodo'];
        $cont++;
        }
        $validacio=NULL;
        $pee=mysql_query("SELECT a.Pago FROM registro a WHERE a.Cliente_Cli='$id_cli'");
            if($row=mysql_fetch_array($pee)){
                $validacio=$row['Pago'];
            }
        if($cont>0 and $validacio==NULL){
            if($cont==1){
               
                //dia
                $reservac="";
                if($periodo=="Dia"){
                    $reservac="Reserva";
                }
                     //semana
                    if($periodo=="Semana"){
                        $reservac="Reserva";
                    }
                        //mes
                        if($periodo=="Mes"){
                            $reservac="Reserva";
                        }
                    }
        }
    }
                return $reservac;
}
function PagoN(){
    $pagoNeto=NULL;
    if(!empty($_POST['modelo'])){
        $cont=0;
        $id_cli=NULL;
        $q=$_POST['modelo'];
            $pe=mysql_query("SELECT a.Es,d.Nombre,e.Placa, b.Tipo_V, c.Hora_entrada, c.Fecha, TIMESTAMPDIFF(DAY, c.fecha, CURDATE()) fecha_act, c.Periodo, d.Cli
            FROM espacio a, tipo_vehiculo b, parqueo c, cliente d, Vehiculo e 
            WHERE b.Tv=a.Tipo_vehiculo_Tv and c.Espacio_Es=a.Es AND d.Cli=c.Cliente_Cli and e.Cliente_Cli=d.Cli 
            and (e.Placa LIKE '%$q%' or d.Nombre LIKE '%$q%')");
        while($row=mysql_fetch_array($pe)){
        $idd=$row["Es"];
        $fecha=$row["fecha_act"];
        $hora=$row['Hora_entrada'];
        $TipoVehiculo=$row['Tipo_V'];
        $periodo=$row['Periodo'];
        $id_cli=$row['Cli'];
        $cont++;
        }
        $validacio=NULL;
        $pee=mysql_query("SELECT a.Pago FROM registro a WHERE a.Cliente_Cli='$id_cli'");
            if($row=mysql_fetch_array($pee)){
                $validacio=$row['Pago'];
            }
        if($cont>0 and $validacio==NULL){
            if($cont==1){
                list($hora, $min, $seg) = split(':', $hora);
               // echo "Mes: $hora; Día: $min; Año: $seg<br />\n";
               $horaAC=date('H');
                 $minAC=date('i');
                 $minG=0;
                if($fecha>0){
                    $MinGEN=($horaAC*60+$minAC)-($hora*60+$min);
                   if($MinGEN<=0){
                       $fechaGEN=$fecha-1;
                        $minG=($fechaGEN*60*24)+($horaAC*60+$minAC)+(1440-($hora*60+$min));
                   }
                   else{
                    $minG=($fecha*24*60)+($horaAC*60+$minAC)-($hora*60+$min);
                   }

                }
                else{
                    if($fecha==0){
                        $minG=($horaAC*60+$minAC)-($hora*60+$min);
                    }
                }
                //sector de la generar hora
                //echo "min",$minG,"min";
                $horaG=0;
                $minPER=$minG;
                $TipoVehiculo_D=0;
                $minFIN=$minG;
                $horaFIN=0;
                while($minFIN>=60){
                    $horaFIN++;
                    $minFIN=$minFIN-60;
                }
                $horaFINAL=NULL;
                $horaFINAL=$horaFIN.":".$minFIN;
                //Tió de vehiculo
                if($TipoVehiculo=='Moto'){
                    $TipoVehiculo_D=2;
                }
                if($TipoVehiculo=='Auto'){
                    $TipoVehiculo_D=1;
                }
                $extraPago=0;
                $valorG=0;
                //dia
                $reservac="";
                if($periodo=="Dia"){
                    $pe=mysql_query("SELECT a.Monto
                                        FROM tarifa a
                                        WHERE a.Periodo='Dia'
                                        and a.Tipo_vahiculo_Tv='$TipoVehiculo_D'");
                    while($row=mysql_fetch_array($pe)){
                        $precioM=$row['Monto'];
                    }
                    $pagoNeto=$precioM;
                    echo $pagoNeto," Bs";
                    $reservac="Reserva";
                }
                     //semana
                    if($periodo=="Semana"){
                        $pe=mysql_query("SELECT a.Monto
                                            FROM tarifa a
                                            WHERE a.Periodo='Semana'
                                            and a.Tipo_vahiculo_Tv='$TipoVehiculo_D'");
                        while($row=mysql_fetch_array($pe)){
                            $precioM=$row['Monto'];
                        }
                        $pagoNeto=$precioM;
                        echo $pagoNeto," Bs";
                        $reservac="Reserva";
                    }
                        //mes
                        if($periodo=="Mes"){
                            $pe=mysql_query("SELECT a.Monto
                                                FROM tarifa a
                                                WHERE a.Periodo='Mes'
                                                and a.Tipo_vahiculo_Tv='$TipoVehiculo_D'");
                            while($row=mysql_fetch_array($pe)){
                                $precioM=$row['Monto'];
                            }
                            $pagoNeto=$precioM;
                            echo $pagoNeto," Bs";
                            $reservac="Reserva";
                        }
                if($periodo=='Hora'){
                    $periodo_D=$periodo;
                    while($minG>=60){
                        $horaG++;
                        $minG=$minG-60;
                    }
                    if($minG>=10){
                        $horaG++;
                    }
                    $pe=mysql_query("SELECT a.Monto
                                        FROM tarifa a
                                        WHERE a.Periodo='$periodo_D'
                                        and a.Tipo_vahiculo_Tv='$TipoVehiculo_D'");
                        while($row=mysql_fetch_array($pe)){
                            $precioM=$row['Monto'];
                        }
                        $pagoNeto=$precioM*$horaG+$extraPago;
                echo $pagoNeto," Bs";
                }
                else{
                    if($periodo=='Noche'){
                        $periodo_D='Noche';
                        $minGGG=($horaAC*60+$minAC);           
                        if($minGGG>=480 and $fecha==1){
                            $minGGG=$minGGG-480;
                            while($minGGG>=60){
                                $horaG++;
                                $minGGG=$minGGG-60;
                            }
                            if($minGGG>=10){
                                $horaG++;
                            }   
                            $pe=mysql_query("SELECT a.Monto
                                        FROM tarifa a
                                        WHERE a.Periodo='Hora'
                                        and a.Tipo_vahiculo_Tv='$TipoVehiculo_D'");
                        while($row=mysql_fetch_array($pe)){
                            $precioHo=$row['Monto'];
                        }
                        $pe=mysql_query("SELECT a.Monto
                                        FROM tarifa a
                                        WHERE a.Periodo='$periodo_D'
                                        and a.Tipo_vahiculo_Tv='$TipoVehiculo_D'");
                        while($row=mysql_fetch_array($pe)){
                            $precioNo=$row['Monto'];
                        }
                        $pagoNeto=$precioNo+$horaG*$precioHo+$extraPago;
                        echo $pagoNeto," Bs";

                        }
                        else{
                            $pe=mysql_query("SELECT a.Monto
                                        FROM tarifa a
                                        WHERE a.Periodo='$periodo_D'
                                        and a.Tipo_vahiculo_Tv='$TipoVehiculo_D'");
                        while($row=mysql_fetch_array($pe)){
                            $precioM=$row['Monto'];
                        }
                            $pagoNeto=$precioM*1+$extraPago;
                            echo $pagoNeto," Bs";
                        }
                    }
                    
                }   
            }
            else{
                echo "No reconocido";
            }
        }else{
            echo "NO EXISTE";
        }
    }
    else{
        echo "0 Bs";
    }   
    return $pagoNeto;
}
function confirmar($enviar2,$pagoNetoFinal, $idUs, $horaFINAL, $recervacion){       
if($enviar2){
        if($recervacion=="Reserva"){
            echo $pagoNetoFinal,$idUs;
        $pe=mysql_query("SELECT * FROM Parqueo a WHERE a.Pa='$idUs'");
        while($row=mysql_fetch_array($pe)){
        $id_par=$row['Pa'];
        $id_Us=$row['Usuario_Us'];
        $horaIn=$row['Hora_entrada'];
        $fechaIn=$row['Fecha'];
        $Espas=$row['Espacio_Es'];
        $TipoVehiculo=$row['Tipo_vehiculo_Tv'];
        $Cliente=$row['Cliente_Cli'];
        $Periodo=$row['Periodo'];
        }
        list($hora, $min, $seg) = split(':', $horaIn);
        $horaSal=date('H').':'.date('i');
        $horaEntra=$hora.':'.$min;
        $fechaS=date("Y")."-".date("m")."-".date("d");
        $fechaIng=$fechaIn.' '.$horaIn;
        $fechaSal=$fechaS.' '.$horaSal;
        mysql_query("UPDATE registro SET Pago='$pagoNetoFinal' WHERE Cliente_Cli='$Cliente'");
       //mysql_query("DELETE FROM parqueo WHERE Pa='$idUs'");
       $pe=mysql_query("SELECT a.Nombre, b.Placa, b.Modelo, a.CI FROM Cliente a,Vehiculo b WHERE a.Cli='$Cliente' AND b.Cliente_Cli=a.Cli");
       while($row=mysql_fetch_array($pe)){
       $Nombre=$row['Nombre'];
       $Placa=$row['Placa'];
       $Modelo=$row['Modelo'];
       $Ci=$row['CI'];
       }
       if($TipoVehiculo==1){
        $TipoV="Auto";
    }
        if($TipoVehiculo==2){
            $TipoV="Moto";
        }
        $pe=mysql_query("SELECT * FROM Espacio a WHERE a.Es='$Espas'");
       if($row=mysql_fetch_array($pe)){
           $espacio=$row['Espacio'];
       }
        $_SESSION["NomF"]=$Nombre;
            $_SESSION["PlaF"]=$Placa;
            $_SESSION["TiV"]=$TipoV;
            $_SESSION["HoE"]=$horaEntra;
            $_SESSION["HoS"]=$horaSal;
            $_SESSION["Cii"]=$Ci;
            $_SESSION["Esp"]=$espacio;
            $_SESSION["Monto"]=$pagoNetoFinal;
            $_SESSION['Tiempo']=$horaFINAL;
       ?>
    <div class="overlay active" id="overlay">
    <div class="popup" id="popup">
    <a href="retirar_usu.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
        <h3>PAGO DE RESERVA CON EXITO!!!</h3>
        <h4>Nombre: <i class="letraV espacioSS"><?php echo " ",$Nombre," "; ?></i> Placa: <i class="letraV espacioSS"><?php echo " ",$Placa; ?></i></h4>
        <h4>Modelo: <i class="letraV"><?php echo " ",$Modelo; ?></i></h4>
        <h4>Espacio: <i class="letraV"><?php echo " ",$Espas; ?></i></h4>
        <h4>Tipo Vehiculo: <i class="letraV"><?php echo " ",$TipoV; ?></i></h4>
        <h4>Hora Entrada: <i class="letraV espacioSS"><?php echo " ",$hora,":",$min; ?></i>Hora Salida: <i class="letraV espacio"><?php echo " ",$horaSal; ?></i> Fecha: <i class="letraV"><?php echo " ",$fechaIn; ?></i></h4>
        <h4>Periodo: <i class="letraV"><?php echo " ",$Periodo; ?></i></h4>
        <h4>Pago: <i class="letraV"><?php echo " ",$pagoNetoFinal; ?></i></h4>
      <br>
        <div align="center">
            <a href="../../pdf/index.php" class="btn_confirma espacioS"><i class="tamCC">Generar Ticket</i></a>
            <a href="retirar_usu.php" class="btn_confirma"><i class="tamCC"> Salir</i></a>
        </div>
        <br>
    </div>
    </div>
    </div>
    
        <?php   
        }
        else{
            echo $pagoNetoFinal,$idUs;
        $pe=mysql_query("SELECT * FROM Parqueo a WHERE a.Pa='$idUs'");
        while($row=mysql_fetch_array($pe)){
        $id_par=$row['Pa'];
        $id_Us=$row['Usuario_Us'];
        $horaIn=$row['Hora_entrada'];
        $fechaIn=$row['Fecha'];
        $Espas=$row['Espacio_Es'];
        $TipoVehiculo=$row['Tipo_vehiculo_Tv'];
        $Cliente=$row['Cliente_Cli'];
        $Periodo=$row['Periodo'];
        }
        list($hora, $min, $seg) = split(':', $horaIn);
        $horaSal=date('H').':'.date('i');
        $horaEntra=$hora.':'.$min;
        $fechaS=date("Y")."-".date("m")."-".date("d");
        $fechaIng=$fechaIn.' '.$horaIn;
        $fechaSal=$fechaS.' '.$horaSal;
        mysql_query("INSERT INTO    registro (Re,Tipo_vehiculo_Tv,Fecha_ge_entrada, Fecha_ge_salida,Pago,Usuario_Us,Espacio_Es,Cliente_Cli,Periodo)  
            VALUES (NULL,'$TipoVehiculo','$fechaIng','$fechaSal','$pagoNetoFinal','$id_Us','$Espas','$Cliente','$Periodo')");
       mysql_query("DELETE FROM parqueo WHERE Pa='$idUs'");
       $pe=mysql_query("SELECT * FROM Cliente a, Vehiculo b WHERE a.Cli='$Cliente' AND b.Cliente_Cli=a.Cli");
       while($row=mysql_fetch_array($pe)){
       $Nombre=$row['Nombre'];
       $Ci=$row['CI'];
       $Placa=$row['Placa'];
       $Modelo=$row['Modelo'];
       }
       if($TipoVehiculo==1){
        $TipoV="Auto";
    }
        if($TipoVehiculo==2){
            $TipoV="Moto";
        }
        $pe=mysql_query("SELECT * FROM Espacio a WHERE a.Es='$Espas'");
       if($row=mysql_fetch_array($pe)){
           $espacio=$row['Espacio'];
       }
        $_SESSION["NomF"]=$Nombre;
            $_SESSION["PlaF"]=$Placa;
            $_SESSION["TiV"]=$TipoV;
            $_SESSION["HoE"]=$horaEntra;
            $_SESSION["HoS"]=$horaSal;
            $_SESSION["Cii"]=$Ci;
            $_SESSION["Esp"]=$espacio;
            $_SESSION["Monto"]=$pagoNetoFinal;
            $_SESSION['Tiempo']=$horaFINAL;
       ?>
    <div class="overlay active" id="overlay">
    <div class="popup" id="popup">
    <a href="retirar_usu.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
        <h3>RETIRO CON EXITO!!!</h3>
        <h4>Nombre: <i class="letraV espacioSS"><?php echo " ",$Nombre," "; ?></i> Placa: <i class="letraV espacioSS"><?php echo " ",$Placa; ?></i></h4>
        <h4>Modelo: <i class="letraV"><?php echo " ",$Modelo; ?></i></h4>
        <h4>Espacio: <i class="letraV"><?php echo " ",$Espas; ?></i></h4>
        <h4>Tipo Vehiculo: <i class="letraV"><?php echo " ",$TipoV; ?></i></h4>
        <h4>Hora Entrada: <i class="letraV espacioSS"><?php echo " ",$hora,":",$min; ?></i>Hora Salida: <i class="letraV espacio"><?php echo " ",$horaSal; ?></i> Fecha: <i class="letraV"><?php echo " ",$fechaIn; ?></i></h4>
        <h4>Periodo: <i class="letraV"><?php echo " ",$Periodo; ?></i></h4>
        <h4>Tiempo: <i class="letraV espacioSS"><?php echo " ",$horaFINAL; ?></i>Pago: <i class="letraV"><?php echo " ",$pagoNetoFinal; ?></i></h4>
      <br>
        <div align="center">
            <a href="../../pdf/index.php" class="btn_confirma espacioS"><i class="tamCC">Generar Ticket</i></a>
            <a href="retirar_usu.php" class="btn_confirma"><i class="tamCC"> Salir</i></a>
        </div>
        <br>
    </div>
    </div>
    </div>
    
        <?php   
        }
    }   
    //Verificar_Reserva();
}
function Verificar_Reserva(){
    $wer=mysql_query("SELECT * FROM parqueo");
while($wor=mysql_fetch_array($wer)){
    $fechaGE=$wor['Fecha'];
    $horaAc=$wor['Hora_entrada'];
    $estadoA=$wor['Estado'];
    if($estadoA=="Reservado"){
        $horaActualGE=date('H').":".date('i');
        $were=mysql_query("SELECT TIMESTAMPDIFF(DAY,'$fechaGE', CURDATE()) fechaA");
        $fec=mysql_fetch_array($were);
        //$Tay yomFec=$fec['fechaA'];
        $horaAC=date('H'); $minAC=date('i');
        $minAc=$horaAC*60+$minAC;
        list($hora1, $min1, $seg1) = split(':', $horaAc);
        $minLi=$hora1*60+$min1;
        $idUss=$wor['Pa'];
        if($TamFec>0){
            //eliminar de una ves
            mysql_query("DELETE FROM parqueo WHERE Pa='$idUss'");
        }
        else{
            if($TamFec>=0){
                $minGEN=$minAc-$minLi;
                if($minGEN>=0){
                    //eliminar
                    mysql_query("DELETE FROM parqueo WHERE Pa='$idUss'");
                }
            }
        }
    }
}
}



    public function Registrar($Ci,$id_Us){
        if(!empty($_POST['nom']) and !empty($_POST['num']) and !empty($_POST['mod']) and !empty($_POST['hor'])){
            
            
                $val=$_POST['vehi'];
                //hora
                $hora=$_POST['hor'];
                //fecha;
                $fecha = date("Y")."-".date("m")."-".date("d");
                //Tipo Vehiculo
                $TipoVehiculo=$_POST['vehi'];
                if($TipoVehiculo==1){
                    $TipoV="Auto";
                }
                if($TipoVehiculo==2){
                    $TipoV="Moto";
                }
                $espacioo=$_SESSION['valor'];
                    $pe=mysql_query("SELECT * FROM espacio a WHERE a.Tipo_vehiculo_Tv='$TipoVehiculo' AND a.Espacio='$espacioo'");
                while($row=mysql_fetch_array($pe)){
                    $espacio=$row['Es'];
                }
                
                // periodo
                $periodoss=date('H');
                if($periodoss>=20 or $periodoss<=8){
                    $periodo='Noche';
                }
                else{
                    $periodo='Hora';
                }
                $pe=mysql_query("SELECT * FROM Cliente a,Vehiculo b WHERE a.CI='$Ci' AND a.Cli=b.Cliente_Cli");
                while($row=mysql_fetch_array($pe)){
                $id_cli=$row['Cli'];
                $modelo=$row['Modelo'];
                $nombre=$row['Nombre'];
                $placa=$row['Placa'];
                }
                $_SESSION["NomF"]=$nombre;
                $_SESSION["PlaF"]=$placa;
                $_SESSION["TiV"]=$TipoV;
                $_SESSION["HoE"]=$hora;
                $_SESSION["HoS"]="";
                $_SESSION["Cii"]=$Ci;
                $_SESSION["Esp"]=$espacio;
                $_SESSION['Tiempo']=" : ";
                $_SESSION["Monto"]="_ _";
    
    
    
                mysql_query("INSERT INTO parqueo (Pa, Usuario_Us, Hora_entrada, Fecha,Espacio_Es,Tipo_vehiculo_Tv,Cliente_Cli,Periodo,Estado) 
                           VALUES ('$espacio','$id_Us','$hora','$fecha','$espacio','$TipoVehiculo','$id_cli','$periodo','Ocupado')");
                ?>        
            <div class="overlay active" id="overlay">
            <div class="popup" id="popup">
            <a href="agregar_usu.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
            <h3>REGISTRO CON EXITO!!!</h3>
            <h4>Nombre: <i class="letraV espacio"><?php echo " ",$nombre," "; ?></i> Placa: <i class="letraV espacio"><?php echo " ",$placa; ?></i></h4>
            <h4>Modelo: <i class="letraV"><?php echo " ",$modelo; ?></i></h4>
            <h4>Espacio: <i class="letraV"><?php echo " ",$espacio; ?></i></h4>
            <h4>Tipo Vehiculo: <i class="letraV"><?php echo " ",$TipoV; ?></i></h4>
            <h4>Hora: <i class="letraV espacio"><?php echo " ",$hora; ?></i> Fecha: <i class="letraV"><?php echo " ",$fecha; ?></i></h4>
            <h4>Periodo: <i class="letraV"><?php echo " ",$periodo; ?></i></h4>
            <br>
            <div align="center">
            <a href="../../pdf/index.php" class="btn_confirma espacioS"><i class="tamCC">Generar Ticket</i></a>
                <a href="agregar_usu.php" class="btn_confirma"><i class="tamCC"> Salir</i></a>
            </div>
            <br>
            </div>
        </div>
        </div>
        <?php
            }
    }
}


class Registro{
    var $Cliente;
    var $fechaIng;
    var $fechaSal;
    var $horaIn;
    var $horaSal;
    var $pagoNeto;
    var $TipoVehiculo;

    public function Registrar(Estacionamiento $Retirar,Tarifa $Monto){
        $horaFINAL=$Retirar->horaAct();
        $reservac=$Retirar->reservas();
        $idd=$Retirar->idUs();
        $pagoNeto=$Monto->Monto($horaFINAL);
        $pe=mysql_query("SELECT * FROM Parqueo a WHERE a.Pa='$idd'");
        if($row=mysql_fetch_array($pe)){
        $id_par=$row['Pa'];
        $id_Us=$row['Usuario_Us'];
        $horaIn=$row['Hora_entrada'];
        $fechaIn=$row['Fecha'];
        $Espas=$row['Espacio_Es'];
        $TipoVehiculo=$row['Tipo_vehiculo_Tv'];
        $Cliente=$row['Cliente_Cli'];
        $Periodo=$row['Periodo'];
        
        list($hora, $min, $seg) = split(':', $horaIn);
        $horaSal=date('H').':'.date('i');
        $fechaS=date("Y")."-".date("m")."-".date("d");
        $fechaIng=$fechaIn.' '.$horaIn;
        $fechaSal=$fechaS.' '.$horaSal;
        mysql_query("INSERT INTO    registro (Re,Tipo_vehiculo_Tv,Fecha_ge_entrada, Fecha_ge_salida,Pago,Usuario_Us,Espacio_Es,Cliente_Cli,Periodo)  
            VALUES (NULL,'$TipoVehiculo','$fechaIng','$fechaSal','$pagoNetoFinal','$id_Us','$Espas','$Cliente','$Periodo')");
        }
        ?>
        <?php
    }
}
?>