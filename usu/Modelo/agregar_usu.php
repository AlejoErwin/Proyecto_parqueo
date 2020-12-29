<?php 

class Cliente{
    var $Ci;
    var $nombre;


    function registrar(){
        $Ci=NULL;
        if(!empty($_POST['nom']) and !empty($_POST['ci'])){
            $Ci=$_POST['ci'];
            $nombre=$_POST['nom'];
            $val=mysql_query("SELECT * FROM cliente a WHERE a.CI='$Ci'");
            if($ex=mysql_fetch_array($val)){

            }
            else{
                mysql_query("INSERT INTO cliente (Cli, CI, Nombre) 
                       VALUES (NULL,'$Ci','$nombre')");
            }
        }

        return $Ci;
}

function reservar(){
    if(!empty($_POST['reserva'])){
        $placa=$_POST['num1'];
        $pe=mysql_query("SELECT * FROM parqueo a, Cliente b,Vehiculo c WHERE a.Cliente_Cli=b.Cli AND b.Cli=c.Cliente_Cli AND c.Placa='$placa'");
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
        }else{
 
            $val=$_POST['vehi1'];

            //CI
            $Ci=$_POST['ci1'];
            // Usuario
            $id_Us=$_SESSION['idUs'];
            // Nombre
            $nombre=$_POST['nom1'];
            // Numero de placa
            
            // Modelo
            $modelo=$_POST['mod1'];
    
            // espacio 
            $espacioo=$_SESSION['valor'];
    
            //Intervalo de tiempo
            $Lap_fecha=$_POST['tiempo'];
            //Tiempo de lapso
            $fecha_E=$_POST['fechaE'];
            $fecha_S=$_POST['fechaS'];
    
            // hora actual
            $horaActual=date('H').':'.date('i');
    
            //fecha;
            $fecha = date("Y")."-".date("m")."-".date("d");
            //Tipo Vehiculo
            $Tipo_V=$_POST['vehi1'];
            if($Tipo_V==1){
                $TipoV="Auto";
            }
            if($Tipo_V==2){
                $TipoV="Moto";
            }
            
            $pe=mysql_query("SELECT * FROM espacio a WHERE a.Tipo_vehiculo_Tv='$Tipo_V' AND a.Espacio='$espacioo'");
            while($row=mysql_fetch_array($pe)){
                $espacio=$row['Es'];
            }
            
            $val=mysql_query("SELECT * FROM cliente a WHERE a.CI='$Ci'");
            
            if($ex=mysql_fetch_array($val)){
                $id_C=$ex['Cli'];
                mysql_query("INSERT INTO Vehiculo (Ve, Cliente_Cli, Modelo, Placa) 
                       VALUES (NULL,'$id_C','$modelo','$placa')");
            }
            else{
                mysql_query("INSERT INTO cliente (Cli, CI, Nombre) 
                       VALUES (NULL,'$Ci','$nombre')");
                $va=mysql_query("SELECT * FROM cliente a WHERE a.CI='$Ci'");
                $e=mysql_fetch_array($va);
                $id_C=$e['Cli'];
                mysql_query("INSERT INTO Vehiculo (Ve, Cliente_Cli, Modelo, Placa) 
                VALUES (NULL,'$id_C','$modelo','$placa')");
            }
    
            $pe=mysql_query("SELECT * FROM Cliente a WHERE a.CI='$Ci' AND a.Nombre='$nombre'");
            while($row=mysql_fetch_array($pe)){
            $id_cli=$row['Cli'];
            }
            mysql_query("INSERT INTO parqueo (Pa,Usuario_Us,Hora_entrada,Fecha,Espacio_Es,Tipo_vehiculo_Tv,Cliente_Cli,Periodo,Estado) 
                       VALUES ('$espacio','$id_Us','$horaActual','$fecha_S','$espacio','$Tipo_V','$id_cli','$Lap_fecha','Reservado')");
            //fecha_ general
            $fechaGenEn=$fecha_E.' '.$horaActual;
            $fechaGenSal=$fecha_S.' '.$horaActual;
    
            mysql_query("INSERT INTO registro (Re,Tipo_vehiculo_Tv,Fecha_ge_entrada, Fecha_ge_salida,Pago,Usuario_Us,Espacio_Es,Cliente_Cli,Periodo) 
            VALUES (NULL,'$Tipo_V','$fechaGenEn','$fechaGenSal',NULL,'$id_Us','$espacio','$id_cli','$Lap_fecha')");
    
    
            ?>        
        <div class="overlay active" id="overlay">
        <div class="popup" id="popup">
        <a href="agregar_usu.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
        <h3>REGISTRO CON EXITO!!!</h3>
        <h4>Nombre: <i class="letraV espacio"><?php echo " ",$nombre," "; ?></i> Placa: <i class="letraV espacio"><?php echo " ",$placa; ?></i></h4>
        <h4>Modelo: <i class="letraV"><?php echo " ",$modelo; ?></i></h4>
        <h4>Espacio: <i class="letraV"><?php echo " ",$espacio; ?></i></h4>
        <h4>Tipo Vehiculo: <i class="letraV"><?php echo " ",$TipoV; ?></i></h4>
    
        <h4>Hora: <i class="letraV espacio"><?php echo " ",$horaActual; ?></i> Fecha: <i class="letraV"><?php echo " ",$fecha_E; ?></i></h4>
        <h4>Periodo: <i class="letraV"><?php echo " ",$Lap_fecha; ?></i></h4>
        <br>
        <div align="center">
            <a href="retirar_usu.php" class="btn_confirma btm_confiCS espacioS"><i class="tamCC">Generar Pago</i></a>
            <a href="agregar_usu.php" class="btn_confirma"><i class="tamCC">Salir</i></a>
        </div>
        <br>
        </div>
    </div>
    
    </div>
    <?php
        }
       

}


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
        $TamFec=$fec['fechaA'];
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

}

class Vehiculo{
    var $placa;
    var $modelo;

    public function registrar(){
        if(!empty($_POST['num']) and !empty($_POST['mod'])){
            $placa=$_POST['num'];
            $modelo=$_POST['mod'];
            $Ci=$_POST['ci'];
            $val=mysql_query("SELECT * FROM cliente a WHERE a.CI='$Ci'");
            
            $ex=mysql_fetch_array($val);
                $id_C=$ex['Cli'];
                mysql_query("INSERT INTO Vehiculo (Ve, Cliente_Cli, Modelo, Placa) 
                       VALUES (NULL,'$id_C','$modelo','$placa')");

        }
    }
}


?>