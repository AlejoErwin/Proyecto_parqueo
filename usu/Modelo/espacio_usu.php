<?php

class Espacio{
    var $numeroEspacio;
    
    public function espacio($TipoVehiculo){
        $espacio=NULL;
        $TipoVehiculo=NULL;
        $espacioo=$_SESSION['valor'];
                    $pe=mysql_query("SELECT * FROM espacio a WHERE a.Tipo_vehiculo_Tv='$TipoVehiculo' AND a.Espacio='$espacioo'");
                while($row=mysql_fetch_array($pe)){
                    $espacio=$row['Es'];
                }
    return $espacio;
    }
}
class Tarifa{
    public function Monto($Tiempo){
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
            }
        }  
        return $pagoNeto;
    }
}
?>