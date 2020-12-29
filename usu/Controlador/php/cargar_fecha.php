<?php 
require_once 'conexion.php';

    session_start();
function getVideos(){
  $mysqli = getConn();
  


  $id = $_POST['id'];
  if($id=="Dia"){
    $query = 'SELECT DATE_ADD(NOW(),INTERVAL 1 DAY) as Dia;';
    $result = $mysqli->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $fech=$row['Dia'];
  }
  else{
    if($id=="Semana"){
      $query = 'SELECT DATE_ADD(NOW(),INTERVAL 7 DAY) as Semana;';
    $result = $mysqli->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $fech=$row['Semana'];
    }
    else{
      if($id=="Mes"){
        $query = 'SELECT DATE_ADD(NOW(),INTERVAL 1 MONTH) as Mes;';
    $result = $mysqli->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $fech=$row['Mes'];
      }
    }
  }
  list($fecha, $hora) = split(' ', $fech);
  $min=date("Y")."-".date("m")."-".date("d");
  $act=date("Y")."-".date("m")."-".date("d");
  $_SESSION["fec"]=$fecha;
  $videos="<input class='input_re espas' name='fechaE' id='es' type='date' placeholder='Fecha de Entrada' required required autocomplete='off' value='$act' min='$min'>
  <input class='input_re' type='date' name='fechaS' placeholder='Fecha de Salida' required required autocomplete='off' value='$fecha' min='$fecha'>";
  
  
  return $videos;
}

echo getVideos();