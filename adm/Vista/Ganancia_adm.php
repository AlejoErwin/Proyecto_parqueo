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
    <script src="../../js/Chart.min.js"></script>
	<script src="../../js/utils.js"></script>
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	

		width:800px !important; 
		height:390px !important; 
		position: absolute;
		left: 95px;
		top: 75px

	}
    </style>
    <link rel="stylesheet" type="text/css" href="../../css/tcal1.css" />
	<link rel="stylesheet" type="text/css" href="../../css/Graficas.css" />
	<link rel="shortcut icon" href="../../icono/ic_retirar.png">
	<script type="text/javascript" src="../../js/tcal.js"></script> 
    <title>GANACIAS</title>
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
                    <li  class="linea bot"><a href="estadistica_adm.php" ><span class="espacio"><span><img src="../../icono_adm/ic_estadistica_ico.png"></span></span> Estadistica</a></li>
                    <li><a href="ayuda_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ayuda.png"></span> Ayuda</a></li>
                    <li><a href="ajuste_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ajuste.png"></span> Ajustes</a></li>
                </ul>
            </nav>
        </div>
    <!-- menu -->
    <br>
    <section>
    <div class="titulo_pag">Cantidades</div>
    <div class="conteneGrafi">
	<center>

		<?php 
		$val=NULL;
		$val1=NULL;
		if(!empty($_POST['ev'])){
			$val=$_POST["dateE"];
			list($mes1, $dia, $anio1) = split('/', $val);
			$fechaPa=$anio1."-".$mes1."-".$dia;
			$val1=$_POST["dateS"];
			list($mes2, $dia, $anio2) = split('/', $val1);
			$fechaFu=$anio2."-".$mes2."-".$dia;
			//echo "esta es:".$fechaPa." ".$fechaFu;
			$vael=mysql_query("SELECT TIMESTAMPDIFF(DAY, '$fechaFu', '$fechaPa' ) as Fechapas");
			$ee=mysql_fetch_array($vael);
			$vali=$ee['Fechapas'];
			if($vali>0){
				$aux=$fechaPa;
				$fechaPa=$fechaFu;
				$fechaFu=$aux;
			}
			
			$Meses=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
			$fechaAct=date("Y")."-".date("m")."-".date("d");
			$cantida=mysql_query("SELECT TIMESTAMPDIFF(MONTH, '$fechaPa', '$fechaFu') AS meses_can;");
			$can=mysql_fetch_array($cantida);
			$cantid=$can['meses_can'];
			if($anio2>date("Y")){
				$cantid2=$cantid;
			}else{
				$cantid2=$cantid-date("m");
			}
			
			$canA=0;
			while($cantid2>=12){
				$cantid2=$cantid2-12;
				$canA++;
			}




			$validacion1=false;
			$validacion2=false;
			$validacion3=false;
			$vecto=NULL;
			$anioEntr=$anio1;
			$anioEnt=$anio1;
			$contador=0;
			$pp=0;
			if(date("Y")==$anio1 && date("Y")==$anio2){
				for($i=0;$i<12;$i++){
					if($i>=($mes1-1) && $i<=($mes2-1)){
						$vecto[$contador]=$anioEntr."-".($i+1)."-1";
						$pp=$i;
						$contador++;
					}
				}
			}else{
				for($i=0;$i<12;$i++){
					if($i>=($mes1-1)){
						$vecto[$contador]=$anioEntr."-".($i+1)."-1";
						$validacion1=true;
						$contador++;
					}
				}
				if($validacion1){
					$anioEntr++;
				}
				for($j=0;$j<$canA;$j++){
					for($i=0;$i<12;$i++){
						$vecto[$contador]=$anioEntr."-".($i+1)."-1";
						$validacion2=true;
						$contador++;
					}
					$anioEntr++;
				}
				if($validacion2){
					$anioEntr++;
				}
				for($i=0;$i<12;$i++){
					if( $i<=($mes2-1)){
						$validacion3=true;
						$vecto[$contador]=$anioEntr."-".($i+1)."-1";
						$pp=$i+1;
						$contador++;
					}
				}
			}
			if($pp>=11){
				$anioEntr++;
				$pp=0;
			}
			$vecto[$contador]=$anioEntr."-".($pp+1)."-1";
			$cantiOficial=count($vecto);
			
			?>


    <div id="container" style="width: 75%;">
		<canvas id="canvas"></canvas>
	</div>
	<script>
		
		var MONTHS = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
		var color = Chart.helpers.color;
		var barChartData = {
			labels: [
				<?php
				
				$validacion1=false;
			$validacion2=false;
			$validacion3=false;
				if(date("Y")==$anio1 && date("Y")==$anio2){
					for($i=0;$i<12;$i++){
						if($i>=($mes1-1) && $i<=($mes2-1)){
							echo "'".$Meses[$i]." ".date("Y")." ' ,";
						}
					}
				}else{
					for($i=0;$i<12;$i++){
						if($i>=($mes1-1)){
							echo "'".$Meses[$i]." ".$anioEnt."',";
							$validacion1=true;
						}
						
					}
					if($validacion1){
						$anioEnt++;
					}
					for($j=0;$j<$canA;$j++){
						for($i=0;$i<12;$i++){
								echo "'".$Meses[$i]." ".$anioEnt."',";
								$validacion2=true;
						}
						$anioEnt++;
					}
					for($i=0;$i<12;$i++){
						if( $i<=($mes2-1)){
							echo "'".$Meses[$i]." ".$anioEnt."',";
						}
					}
				}
				
				?>
				],
			datasets: [{
				label: 'Ganancia',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					<?php
					for($cp=0;$cp<($cantiOficial-1);$cp++){
						$fechaA=$vecto[$cp];
						$fechaD=$vecto[$cp+1];
						$pe=mysql_query("SELECT SUM(v.Pago) AS Total, MONTHNAME(v.Fecha_ge_salida) AS Mes, v.Fecha_ge_salida as fecha 
						FROM registro v 
						WHERE v.Fecha_ge_salida<'$fechaD'
						and v.Fecha_ge_salida>='$fechaA'
						GROUP BY Mes
						ORDER BY fecha ASC;");
						if($row=mysql_fetch_array($pe)){
							echo $row["Total"].",";
		
						}
						else{
							echo "0,";
						}
					}
					?>
				]
			}]

		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: false,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Ganacias'
					}
				}
			});

		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			var zero = Math.random() < 0.2 ? true : false;
			barChartData.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return zero ? 0.0 : randomScalingFactor();
				});

			});
			window.myBar.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[barChartData.datasets.length % colorNames.length];
			var dsColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + (barChartData.datasets.length + 1),
				backgroundColor: color(dsColor).alpha(0.5).rgbString(),
				borderColor: dsColor,
				borderWidth: 1,
				data: []
			};

			for (var index = 0; index < barChartData.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			barChartData.datasets.push(newDataset);
			window.myBar.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (barChartData.datasets.length > 0) {
				var month = MONTHS[barChartData.labels.length % MONTHS.length];
				barChartData.labels.push(month);

				for (var index = 0; index < barChartData.datasets.length; ++index) {
					// window.myBar.addData(randomScalingFactor(), index);
					barChartData.datasets[index].data.push(randomScalingFactor());
				}

				window.myBar.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			barChartData.datasets.pop();
			window.myBar.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			barChartData.labels.splice(-1, 1); // remove the label first

			barChartData.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myBar.update();
		});
	</script>
<?php
			}
		 ?>
			
			
				<form action="" method="post">
					<!-- add class="tcal" to your input field -->
					<div><input type="text" name="dateE" class="tcal EstabecefechaI" placeholder="Ingresar Fecha1"  autocomplete="off" required value="<?php echo $val ?>" /></div>
					<div><input type="text" name="dateS" class="tcal EstabecefechaF" placeholder="Ingresar Fecha2" autocomplete="off" required value="<?php echo $val1 ?>"/></div>
					<input type="submit" class="BotonGrafica" name="ev" value="Enviar">
				</form>
						
</center>
</div>
    </section>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>