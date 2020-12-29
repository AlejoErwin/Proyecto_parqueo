
<?php
session_start();
$nombre=$_SESSION["NomF"];
$placa=$_SESSION["PlaF"];
$horaE=$_SESSION["HoE"];
$horaS=$_SESSION["HoS"];
$espacio=$_SESSION["Esp"];
$tipo=$_SESSION["TiV"];
$ci=$_SESSION["Cii"];
$monto=$_SESSION["Monto"];
$Tiempo=$_SESSION['Tiempo'];
if($tipo=="Auto"){
    $ImgVe='<img src="../icono/auto.png" alt="" width="100px" height="55px">';

}
else{
    $ImgVe='<img src="../icono/moto.png" alt="" width="100px" height="55px">';
}

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    
    
    <link rel="stylesheet" href="../css/estilopdf.css">
</head>
<body>
<div class="Ficha">
<br>
<table align="center">

    <tr>
        <td>
        '.$ImgVe.' 
        </td>
        <td class="ubica">
        <h3>PARQUEO OBRAJES</h3>
        </td>
    </tr>
</table>
    
    
    <table align="center">
    <tr>
        <td>
        </td>
    </tr>
    <tr>
        <td >
            <h4>Nombre:</h4>
        </td>
        <td class="espaciosss">
            <i class="letraV espacio">'.$nombre.'</i>
        </td>
        <td>
            <h4> Placa: </h4>
        </td>
        <td>
            <i class="letraV espacio">'.$placa.'</i>
        </td>
    </tr>
    <tr>
        <td>
        </td>
    </tr>
    <tr>
        
        <td>
            <h4> CI: </h4>
        </td>
        <td>
            <i class="letraV">'.$ci.'</i>
        </td>
        <td>
            <h4>Espacio: </h4>
        </td>
        <td class="espaciosss">
            <i class="letraV">'.$espacio.'</i> 
        </td>
    </tr>
    <tr>
        <td>
        </td>
    </tr>
    <tr>
    <td>
        <h4>Hora Ent:</h4>
    </td>
    <td class="espaciosss">
        <i class="letraV espacio">'.$horaE.'</i> 
    </td>
    <td>
        <h4>Hora Sal:</h4>
    </td>
    <td>
        <i class="letraV">'.$horaS.'</i>
    </td>
    </tr>
    <tr>
    <td>
        <h4>Tiempo:</h4>
    </td>
    <td>
        <i class="letraV">'.$Tiempo.'</i>
    </td>
</tr>
    </table>
    <br>
    <br>
    <br>
    </div>
    
    <div class="fecha">
    <table>
    <tr>
        <td>
        <img src="../icono/dia.png" alt="" width="40px" height="40px">
        </td>
        <td>
        <img src="../icono/mes.png" alt="" width="40px" height="40px">
        </td>
        <td>
        <img src="../icono/anio.png" alt="" width="40px" height="40px">
        </td>
    </tr>
</table>
    </div>
    <div class="fecha1">
    <table>
    <tr>
        <td class="espaciosE">
        <i class="leaV">11</i>
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        <i class="leaV">12</i>
        </td>
        
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        <i class="leaV">2019</i>
        </td>
    </tr>
</table>
    </div>
    <div class="Monto">
    <h5>Monto: <i class="precio">'.$monto.' Bs</i></h5>
    </div>
</body>
</html>
');
$mpdf->Output("Reporte5.pdf","D");
//$mpdf->Output();



/*
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    
    
    <link rel="stylesheet" href="../css/estilopdf.css">
</head>
<body>
<div class="Ficha">
<br>
<table align="center">

    <tr>
        <td>
        <img src="../icono/auto.png" alt="" width="100px" height="55px">
        </td>
        <td class="ubica">
        <h3>PARQUEO OBRAJES</h3>
        </td>
    </tr>
</table>
    
    
    <table align="center">
    <tr>
        <td>
        </td>
    </tr>
    <tr>
        <td >
            <h4>Nombre:</h4>
        </td>
        <td class="espaciosss">
            <i class="letraV espacio">'.$nombre.'</i>
        </td>
        <td>
            <h4> Placa: </h4>
        </td>
        <td>
            <i class="letraV espacio">'.$placa.'</i>
        </td>
    </tr>
    <tr>
        <td>
        </td>
    </tr>
    <tr>
        
        <td>
            <h4> CI: </h4>
        </td>
        <td>
            <i class="letraV">'.$ci.'</i>
        </td>
        <td>
            <h4>Espacio: </h4>
        </td>
        <td class="espaciosss">
            <i class="letraV">'.$espacio.'</i> 
        </td>
    </tr>
    <tr>
        <td>
        </td>
    </tr>
    <tr>
    <td>
        <h4>Hora Ent:</h4>
    </td>
    <td class="espaciosss">
        <i class="letraV espacio">'.$horaE.'</i> 
    </td>
    <td>
        <h4>Hora Sal:</h4>
    </td>
    <td>
        <i class="letraV">'.$horaS.'</i>
    </td>
</tr>
    </table>
    
    
    
    
    <br>
    <br>
    <br>
    </div>
    
    <div class="fecha">
    <table>
    <tr>
        <td>
        <img src="../icono/dia.png" alt="" width="40px" height="40px">
        </td>
        <td>
        <img src="../icono/mes.png" alt="" width="40px" height="40px">
        </td>
        <td>
        <img src="../icono/anio.png" alt="" width="40px" height="40px">
        </td>
    </tr>
</table>
    </div>
    <div class="fecha1">
    <table>
    <tr>
        <td class="espaciosE">
        <i class="leaV">11</i>
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        <i class="leaV">12</i>
        </td>
        
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        </td>
        <td class="espaciosE">
        <i class="leaV">2019</i>
        </td>
    </tr>
</table>
    </div>
    <div class="Monto">
    <h5>Monto: <i class="precio">40 Bs</i></h5>
    </div>
</body>
</html>
*/
?> 




