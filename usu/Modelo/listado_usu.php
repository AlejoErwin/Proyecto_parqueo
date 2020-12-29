<?php
class Tipo_Vehiculo{
    var $tipo_Vehiculo;


    public function Verificar_Estacion(){
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
?>