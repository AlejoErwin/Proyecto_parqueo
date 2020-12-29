
<?php
//Insert Data
session_start();
    include_once "../../../conexion/conexion.php";
try
{
    

 if(isset($_POST["espa"])){
 
 $co = $_POST["espa"];
 $cant=0;
 
 $pe=mysql_query("SELECT a.Espacio FROM Espacio a WHERE a.Espacio='$co'");
 $row=mysql_fetch_array($pe);
    $_SESSION['valor']=$row['Espacio'];
 


 }

}
catch(PDOException $error)
{
 echo $error->getMessage();
}
?>