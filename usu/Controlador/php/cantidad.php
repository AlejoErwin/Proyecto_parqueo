
<?php
//Insert Data
session_start();
    include_once "../../../conexion/conexion.php";
try
{
    

 if(isset($_POST["gender"])){
 
 $co = $_POST["gender"];
 $cant=0;
 $pe=mysql_query("SELECT a.Espacio,a.Estado
 FROM Espacio a, tipo_vehiculo c
 WHERE a.Tipo_vehiculo_Tv=c.Tv AND
 c.Tv='$co' AND NOT EXISTS(SELECT *
                 FROM parqueo b
                 WHERE a.Es=b.Espacio_Es)");
 while($row=mysql_fetch_array($pe)){
     $est=$row['Estado'];
     if($est=="Disponible"){
        $cant++;
     }

 }

 if($co == 1)
 {
 echo $cant;
 }
 else
 {
 echo $cant;
 }
 }
}
catch(PDOException $error)
{
 echo $error->getMessage();
}
?>