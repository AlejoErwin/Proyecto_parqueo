<?php 
   
   session_start();
   if($_SESSION['tipo_user']=='administrador'){

   }
   else{
       header('Location:error.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../menu/Menu_Pr.css">
    <link rel="stylesheet" href="../../css/principal_adm.css">
    <link rel="stylesheet" href="../../css/ventanas.css">

    <link rel="stylesheet" href="../../css/estiloTabla.css">
    <link rel="shortcut icon" href="../../icono/ic_retirar.png">
    <script src="../../js/Chart.min.js"></script>
	<script src="../../js/utils.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/tcal1.css" />
	<script type="text/javascript" src="../../js/tcal.js"></script> 
    <style>
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
input[type=number] { -moz-appearance:textfield; }
    </style>
    <title>REPORTE</title>
</head>
<body>
    <!--header-->
    <?php include_once "../../menu/principal_adm.php"; ?>
    <!--header-->
    <!-- menu -->
    <div id="mostrar_nav">
        <nav class="mostrar">
            <ul class="menu">
                <center>
                <h1 class="titulo" >PARQUEO OBRAJES</h1>
            </center>
                <li><a href="inicio_adm.php" ><span class="espacio "><img src="../../icono_adm/ic_inicio.png" ></span> Inicio</a></li>
                <li><a href="agregar_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_registrar.png"></span> Registrar Usuario</a></li>
                <li><a href="config_adm.php" ><span class="espacio"><span><img src="../../icono_adm/ic_config.png"  ></span></span> Configurar el Estacionamiento</a></li>
                <li class="linea bot"><a href="estadistica_adm.php" ><span class="espacio"><span><img src="../../icono_adm/ic_estadistica.png"></span></span> Estadistica</a></li>
                <li><a href="ayuda_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ayuda.png"></span> Ayuda</a></li>
                <li><a href="ajuste_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ajuste_col.png"></span> Ajustes</a></li>         
            </ul>
        </nav>
    </div>
    <!-- menu -->
    <br>
    <section>
        <?php
        $ee=NULL;
        $ss=NULL;
        if(!empty($_POST['ev'])){
            $ee=$_POST['dateE'];
            $ss=$_POST['dateS'];
        }
        ?>
        <div class="titulo_pag">Reporte General</div>
        <!-- Seccion  de Reporte -->
        <div class="ReporteGeneral">
                <form action="" method="post">
					<!-- add class="tcal" to your input field -->
					<div><input type="text" name="dateE" class="tcal FechaInical" placeholder="Ingresar Inicial"  autocomplete="off" required value="<?php echo $ee; ?>" /></div>
					<div><input type="text" name="dateS" class="tcal FechaFinal" placeholder="Ingresar Final" autocomplete="off" required value="<?php echo $ss; ?>"/></div>
					<input type="submit" class="BotonReporte" name="ev" value="Enviar">
				</form>
</div>
    <?php
    if(!empty($_POST['dateE']) and !empty($_POST['dateS'])){
        ?>
        <div class="Contenedor_Reporte">
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
    <div class="contenedor_escroLGen">
    <table class='tam_scroL'>
    			<thead>
    			</thead>
    	<tbody>
        <?php
        $cont=0;
        list($m, $d,$a) = split('/', $_POST['dateE']);
        $fechaEEN=$a."-".$m."-".$d;
        list($m, $d,$a) = split('/', $_POST['dateS']);
        $fechaSSA=$a."-".$m."-".($d+1);
        $fecha=date("Y")."-".date("m")."-".date("d");
        if($fechaEEN!=$fechaSSA){
            $pa=mysql_query("SELECT * 
            FROM registro a, cliente b, usuario c
            WHERE b.Cli=a.Cliente_Cli
            AND c.Us=a.Usuario_Us
            AND a.Fecha_ge_entrada>='$fechaEEN'
            AND a.Fecha_ge_salida<='$fechaSSA' ");
        }
        else{
            $pa=mysql_query("SELECT * 
        FROM registro a, cliente b, usuario c
        WHERE b.Cli=a.Cliente_Cli
        AND c.Us=a.Usuario_Us
        AND CAST(a.Fecha_ge_salida AS date) = CAST('$fecha' AS date)");
        }
        while($row=mysql_fetch_array($pa)){
            $cont++;
            $num=$row["Re"];
            $tiV=$row["Tipo_vehiculo_Tv"];
            $CI=$row["CI"];
            $usuario=$row["Usuario"];
            $horaEnt=$row["Fecha_ge_entrada"];
            $horaSal=$row["Fecha_ge_salida"];
            $pago=$row["Pago"];
            list($fechaEEE, $HoraEEE) = split(' ', $horaEnt);
    list($fechaSSS, $HoraSSS) = split(' ', $horaSal);
    $pa1=mysql_query("SELECT  TIMESTAMPDIFF(DAY, '$fechaEEE','$fechaSSS') fecha_act");
			$conta=0;
            while ($row1=mysql_fetch_array($pa1)) {
                $fecha=$row1["fecha_act"];
			}
                    list($hora, $min, $seg) = split(':', $HoraEEE);
                    list($horaAC, $minAC, $seg) = split(':', $HoraSSS);
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
				 $horaG=0;
				 $minPER=$minG;
				 $Tipo_V_D=0;
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
            ?>
            
        <tr>
    					<td class="letrasT  espacioT" align="center"><?php echo $cont; ?></td>
    					<td class="letrasT espacioT" align="center"><?php echo $CI; ?></td>
    					<td class="letrasT espacioT" align="center"><?php echo $vehi; ?></td>
                        <td class="letrasT espacioT" align="center"><?php echo $usuario; ?></td>
                        <td class="letrasT espacioT" align="center"><?php echo $tiempo; ?></td>
						<td class="letrasT espacioT" align="center"><?php echo $pago; ?></td>
                    </tr>
                    
            <?php
            }
    }
    }
    else{ 
        ?>
        <div class="Contenedor_Reporte">
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
    <div class="contenedor_escroLGen">
    <table class='tam_scroL'>
    			<thead>
    			</thead>
    	<tbody>
        <?php
        $cont=0;
        $fecha=date("Y")."-".date("m")."-".date("d");
        $fechaEEN=$fecha;
        $fechaSSA=$fecha;
        $pa=mysql_query("SELECT * 
        FROM registro a, cliente b, usuario c
        WHERE b.Cli=a.Cliente_Cli
        AND c.Us=a.Usuario_Us
        AND CAST(a.Fecha_ge_salida AS date) = CAST('$fecha' AS date)");
        while($row=mysql_fetch_array($pa)){
            $cont++;
            $num=$row["Re"];
            $tiV=$row["Tipo_vehiculo_Tv"];
            $CI=$row["CI"];
            $usuario=$row["Usuario"];
            $horaEnt=$row["Fecha_ge_entrada"];
            $horaSal=$row["Fecha_ge_salida"];
            $pago=$row["Pago"];
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
				 $horaG=0;
				 $minPER=$minG;
				 $Tipo_V_D=0;
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
            ?>
                    <tr>
    					<td class="letrasT  espacioT" align="center"><?php echo $cont; ?></td>
    					<td class="letrasT espacioT" align="center"><?php echo $CI; ?></td>
    					<td class="letrasT espacioT" align="center"><?php echo $vehi; ?></td>
                        <td class="letrasT espacioT" align="center"><?php echo $usuario; ?></td>
                        <td class="letrasT espacioT" align="center"><?php echo $tiempo; ?></td>
						<td class="letrasT espacioT" align="center"><?php echo $pago; ?></td>
                    </tr> 
            <?php
    }
}
    ?>
    </tbody></table>
</div>
    </div>
    <a href="../../pdf/in.php?fechaE=<?php echo $fechaEEN ?>&fechaS=<?php echo $fechaSSA ?>" class="BotonPGeneralPFD"><div class="centerBPDF">Generar PDF</div></a>
            <!-- Fin de Reporte -->
    </section>       
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>