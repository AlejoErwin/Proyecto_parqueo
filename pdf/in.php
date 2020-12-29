
<?php
include_once "../conexion/conexion.php";
session_start();
$fechaE=$_GET["fechaE"];
$fechaS=$_GET["fechaS"];
$_SESSION["gg"]="";
$fotocopia='';
$fechaGENE='';
if($fechaS==$fechaE){
    $fechaGENE='<h4 align="left">FECHA <i class="letraV">'.$fechaE.' </i></h4>';
}
else{
$fechaGENE='<h4 align="left">FECHA INFERIOR <i class="letraV">'.$fechaE.' </i></h4>
<h4 align="left">FECHA SUPERIOR <i class="letraV">'.$fechaS.'</i></h4>';
}
$fotocopia=$fotocopia.'
<table class="tam_scroL" >
<tr class="tituloTL">
       <td class="letraTL espacioTL">N°</td>
       <td class="letraTL espacioTL">CI</td>
       <td class="letraTL espacioTL">TIPO VEHICULO</td>
       <td class="letraTL espacioTL">USUARIO</td>
       <td class="letraTL espacioTL">TIEMPO</td>
       <td class="letraTL espacioTL">MONTO</td>
   </tr>
</table>
<table class="tam_scroL" >';
?>

<?php
$cont=0;
$fecha=date("Y")."-".date("m")."-".date("d");

if($fechaS!=$fechaE){
    $pa=mysql_query("SELECT * 
    FROM registro a, cliente b, usuario c
    WHERE b.Cli=a.Cliente_Cli
    AND c.Us=a.Usuario_Us
    AND a.Fecha_ge_entrada>='$fechaE'
    AND a.Fecha_ge_salida<='$fechaS' ");
}
else{
    $pa=mysql_query("SELECT * 
FROM registro a, cliente b, usuario c
WHERE b.Cli=a.Cliente_Cli
AND c.Us=a.Usuario_Us
AND CAST(a.Fecha_ge_salida AS date) = CAST('$fechaS' AS date)");
}
while($row=mysql_fetch_array($pa)){
    $_SESSION["gg"]="ff";
    $cont++;
    $num=$row["Re"];
    $tiV=$row["Tipo_vehiculo_Tv"];
    $CI=$row["CI"];
    $usuario=$row["Usuario"];
    $horaEnt=$row["Fecha_ge_entrada"];
    $horaSal=$row["Fecha_ge_salida"];
    $pago=$row["Pago"];

    //$tiempo=buscarHora($horaEnt,$horaSal);

    list($fechaEEE, $HoraEEE) = split(' ', $horaEnt);
list($fechaSSS, $HoraSSS) = split(' ', $horaSal);
$pa1=mysql_query("SELECT  TIMESTAMPDIFF(DAY, '$fechaEEE','$fechaSSS') fecha_act");
    $conta=0;

    while ($row1=mysql_fetch_array($pa1)) {
        $fecha=$row1["fecha_act"];
    }
            list($hora, $min, $seg) = split(':', $HoraEEE);
            list($horaAC, $minAC, $seg) = split(':', $HoraSSS);
        // echo "Mes: $hora; Día: $min; Año: $seg<br />\n";
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
         $Tipo_V_D=0;
         //Tió de vehiculo
         while($minG>=60){
            $horaG++;
            $minG=$minG-60;
        }
        $tiempo=$horaG.":".$minG;
    if($tiV==1){
        $vehi="Auto";
    }
    else{
        $vehi="Moto";
    }
    if($pago!=NULL){
   $fotocopia=$fotocopia.'<tr> 
            <td class="letrasT  espacioT" align="center">'.$cont.'</td>
    		<td class="letrasT espacioT" align="center">'.$CI.'</td>
        		<td class="letrasT espacioT" align="center">'.$vehi.'</td>
              <td class="letrasT espacioT" align="center">'.$usuario.'</td>
                <td class="letrasT espacioT" align="center">'.$tiempo.'</td>
        	<td class="letrasT espacioT" align="center">'.$pago.'</td>
            </tr>';
    }

}
$fotocopia=$fotocopia.'</table>';


            $Reporte='';
$Reporte=$Reporte.'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="../css/principal_adm1.css">
    
    <link rel="stylesheet" href="../css/estiloTabla.css">
    <link rel="stylesheet" href="../css/estilopdf.css">
</head>
<body>
<h1 align="center">REPORTE </h1>
'.$fechaGENE.'
 '.$fotocopia.'
</body>
</html>';
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($Reporte);
$mpdf->Output("ReporteGeneral1.pdf","D");
//$mpdf->Output();




?> 




