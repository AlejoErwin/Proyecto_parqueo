<?php 
session_start();
require_once 'conexion.php';

function getVideos(){
  $mysqli = getConn();
  $id = $_POST['id'];

  $query= "SELECT a.Espacio, a.Es, a.Estado
  FROM Espacio a, tipo_vehiculo c
  WHERE a.Tipo_vehiculo_Tv=c.Tv AND
  c.Tv='$id' AND NOT EXISTS(SELECT *
                  FROM parqueo b
                  WHERE a.Es=b.Espacio_Es)";
  $result = $mysqli->query($query);
  $videos = '<option value="">Elige un Espacio</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $val=$row['Es'];
    $Estado=$row['Estado'];
    if($Estado=="Disponible"){
    $videos .= "<option value='$val'>$row[Espacio]</option>";
    }
  }
  return $videos;
}

echo getVideos();
