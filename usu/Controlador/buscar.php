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

    $query = "SELECT a.Es,d.Nombre,e.Placa, b.Tipo_V, d.Cli
	FROM espacio a, tipo_vehiculo b, parqueo c, cliente d, Vehiculo e
	WHERE b.Tv=a.Tipo_vehiculo_Tv 
	and c.Espacio_Es=a.Es
	and e.Cliente_Cli=d.Cli 
	AND d.Cli=c.Cliente_Cli ";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
		$query = "SELECT a.Es,d.Nombre,e.Placa, b.Tipo_V, d.Cli
		FROM espacio a, tipo_vehiculo b, parqueo c, cliente d, Vehiculo e
		WHERE b.Tv=a.Tipo_vehiculo_Tv and c.Espacio_Es=a.Es AND d.Cli=c.Cliente_Cli and e.Cliente_Cli=d.Cli  and (e.Placa LIKE '%$q%' or d.Nombre LIKE '%$q%') ";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table class='tabla_datos'>
    			<thead>
    				

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {

			$id_cli=$fila['Cli'];
			$validacio=NULL;
			$pee="SELECT a.Pago FROM registro a WHERE a.Cliente_Cli='$id_cli'";
			$res = $conn->query($pee);
			
            if($row = $res->fetch_assoc()){
                $validacio=$row['Pago'];
			}
			if($validacio==NULL){
				$salida.="<tr>
    					<td class='letrasT  espacioT' align='center'>".$fila['Es']."</td>
    					<td class='letrasT espacioT' align='center'>".$fila['Nombre']."</td>
    					<td class='letrasT espacioT' align='center'>".$fila['Placa']."</td>
						<td class='letrasT espacioT' align='center'>".$fila['Tipo_V']."</td>
    				</tr>";
			}
    		

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="<br><br><center><h5 class='tam_h5'>NO EXISTE EN EL REGISTRO </h5></center>";
    }


    echo $salida;

    $conn->close();



?>
