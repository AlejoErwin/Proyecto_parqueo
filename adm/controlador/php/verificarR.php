<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "b_parqueo";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }
    $salida = "";

    $query = "SELECT *
	FROM usuario a
    WHERE a.Usuario='es'";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
		$query = "SELECT *
		FROM usuario a
		WHERE a.Usuario='$q' and a.Estado!='Eliminado' ";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<div class='existeU'>El usuario ya existe. Por favor ingrese un nuevo usuario</div><br>";
    }else{
    	$salida.="";
    }
    echo $salida;
    $conn->close();
?>
