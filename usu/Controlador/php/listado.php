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

    $query = "SELECT a.Es
	FROM espacio a
    order by a.Es";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
		$query = "SELECT a.Es,d.Nombre, e.Placa, b.Tipo_V 
		FROM espacio a, tipo_vehiculo b, parqueo c, cliente d, Vehiculo e 
		WHERE b.Tv=a.Tipo_vehiculo_Tv and c.Espacio_Es=a.Es AND d.Cli=c.Cliente_Cli and e.Cliente_Cli=d.Cli and (a.Es LIKE '%$q%' or e.Placa LIKE '%$q%' or d.Nombre LIKE '%$q%') ";
    }

    $resultado = $conn->query($query);


    if ($resultado->num_rows>0) {
    	$salida.="<table class='tabla_datos'>
    			<thead>
    				

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
			$idEs=$fila['Es'];
			$query1 = "SELECT a.Es,d.Nombre,e.Placa, b.Tipo_V, c.Hora_entrada, c.Fecha, TIMESTAMPDIFF(DAY, c.fecha, CURDATE()) fecha_act, c.Estado
			FROM espacio a, tipo_vehiculo b, parqueo c, cliente d, Vehiculo e
			WHERE b.Tv=a.Tipo_vehiculo_Tv 
			and c.Espacio_Es=a.Es 
			AND d.Cli=c.Cliente_Cli 
			and e.Cliente_Cli=d.Cli
			and a.Es='$idEs'";
			$resultado1 = $conn->query($query1);
			$conta=0;
			while ($row = $resultado1->fetch_assoc()) {
				$conta++;
				$idd=$row["Es"];
                $fecha=$row["fecha_act"];
                $hora=$row['Hora_entrada'];
                $Tipo_V=$row['Tipo_V'];
				$Placa=$row['Placa'];
				$Nombre=$row['Nombre'];
				$Estado=$row['Estado'];
			}
			if($conta>0){
				if($Estado=="Ocupado"){
					list($hora, $min, $seg) = split(':', $hora);
				// echo "Mes: $hora; Día: $min; Año: $seg<br />\n";
				$horaAC=date('H');
				  $minAC=date('i');
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
				$salida.="<tr>
    					<td class='letrasTL  espacioTL' align='center'>".$fila['Es']."</td>
    					<td class='letrasTL espacioTL' align='center'>".$Nombre."</td>
    					<td class='letrasTL espacioTL' align='center'>".$Placa."</td>
    					<td class='letrasTL espacioTL' align='center'><i class='estiloTLO'> Ocupado </i></td>
    					<td class='letrasTL espacioTL' align='center'>".$tiempo."</td>
						<td class='letrasTL espacioTL' align='center'>".$Tipo_V."</td>
    				</tr>";

				}else{
					if($Estado=="Reservado"){




						list($hora, $min, $seg) = split(':', $hora);
				// echo "Mes: $hora; Día: $min; Año: $seg<br />\n";
				$horaAC=date('H');
				  $minAC=date('i');
				  $minG=0;

					 $MinGEN=($horaAC*60+$minAC)-($hora*60+$min);
					if($MinGEN<=0){
						$fechaGEN=$fecha-1;
						$minG=($fechaGEN*60*24)+($horaAC*60+$minAC)+(1440-($hora*60+$min));
					}
					else{
					 $minG=($fecha*24*60)+($horaAC*60+$minAC)-($hora*60+$min);
					}
					$minG=$minG*-1;


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
				$tiempo="-".$horaG.":".$minG;
				$salida.="<tr>
    					<td class='letrasTL  espacioTL' align='center'>".$fila['Es']."</td>
    					<td class='letrasTL espacioTL' align='center'>".$Nombre."</td>
    					<td class='letrasTL espacioTL' align='center'>".$Placa."</td>
    					<td class='letrasTL espacioTL' align='center'><i class='estiloTRE'>Reservado</i></td>
    					<td class='letrasTL espacioTL' align='center'>".$tiempo."</td>
						<td class='letrasTL espacioTL' align='center'>".$Tipo_V."</td>
    				</tr>";




					}
				}
			}
			else{
				$query1 = "SELECT b.Tipo_V, a.Estado
				FROM espacio a, tipo_vehiculo b
				WHERE b.Tv=a.Tipo_vehiculo_Tv 
				and a.Es='$idEs'";
			$resultado1 = $conn->query($query1);
			$conta=0;
			while ($row = $resultado1->fetch_assoc()) {
				$conta++;
				$Tipo_V=$row['Tipo_V'];
				$est=$row['Estado'];
			}
				if($est=="Disponible"){
					$salida.="<tr>
    					<td class='letrasTL  espacioTL' align='center'>".$fila['Es']."</td>
    					<td class='letrasTL espacioTL' align='center'>--</td>
    					<td class='letrasTL espacioTL' align='center'>--</td>
    					<td class='letrasTL espacioTL' align='center'><i class='estiloTLL'> Disponible </i></td>
    					<td class='letrasTL espacioTL' align='center'>--</td>
						<td class='letrasTL espacioTL' align='center'>".$Tipo_V."</td>
    				</tr>";
				}
				else{
					if($est=="Mantenimiento"){
						$salida.="<tr>
    					<td class='letrasTL  espacioTL' align='center'>".$fila['Es']."</td>
    					<td class='letrasTL espacioTL' align='center'>--</td>
    					<td class='letrasTL espacioTL' align='center'>--</td>
    					<td class='letrasTL espacioTL' align='center'><i class='estiloTMA'> Mantenimiento </i></td>
    					<td class='letrasTL espacioTL' align='center'>--</td>
						<td class='letrasTL espacioTL' align='center'>".$Tipo_V."</td>
    				</tr>";

					}
				}
				
			}

    		

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="<br><br><center><h5 class='tam_h5'>NO EXISTE EN EL REGISTRO </h5></center>";
    }


    echo $salida;

    $conn->close();



?>
