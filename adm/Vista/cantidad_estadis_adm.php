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
	

		width:600px !important; 
		height:300px !important; 
		position: absolute;
		left:160px;
		top: 100px

	}
	</style>
	<link rel="shortcut icon" href="../../icono/ic_retirar.png">
    <link rel="stylesheet" type="text/css" href="../../css/tcal1.css" />
	<link rel="stylesheet" type="text/css" href="../../css/Graficas.css" />
	<script type="text/javascript" src="../../js/tcal.js"></script> 
    <title>ESTADISTICA</title>
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
		<?php if(!empty($_POST['ev'])){
			$val=$_POST["dateE"];
			list($mes, $dia, $anio) = split('/', $val);
			$fechaPa=$anio."-".$mes."-".$dia;
			$val=$_POST["dateS"];
			list($mes, $dia, $anio) = split('/', $val);
			$fechaFu=$anio."-".$mes."-".$dia;
			//echo "esta es:".$fechaPa." ".$fechaFu;
			$vael=mysql_query("SELECT TIMESTAMPDIFF(DAY, '$fechaFu', '$fechaPa' ) as Fechapas");
			$ee=mysql_fetch_array($vael);
			$vali=$ee['Fechapas'];
			if($vali>0){
				$aux=$fechaPa;
				$fechaPa=$fechaFu;
				$fechaFu=$aux;
			}

			?>

<div id="canvas-holder" style="width:40%">
		<canvas id="chart-area"></canvas>
	</div>
	
	<button id="changeCircleSize" class="PosicionAngulo" >Otro angulo</button>
	<script>
		

		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						<?php
							

							$pe=mysql_query("SELECT b.Tipo_V, COUNT(a.Re) as cantidad
							FROM registro a, tipo_vehiculo b
							WHERE a.Tipo_vehiculo_Tv=b.Tv
							and a.Fecha_ge_salida>'$fechaPa'
							and a.Fecha_ge_salida<'$fechaFu' 
							GROUP BY b.Tipo_V");
							while($row=mysql_fetch_array($pe)){
							$Tipo=$row['Tipo_V'];
						echo $row['cantidad'].",";
						}
						?>
					],
					backgroundColor: [
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					
					<?php
							$pe=mysql_query("SELECT b.Tipo_V, COUNT(a.Re) as cantidad
							FROM registro a, tipo_vehiculo b
							WHERE a.Tipo_vehiculo_Tv=b.Tv
							and a.Fecha_ge_salida>'$fechaPa'
							and a.Fecha_ge_salida<'$fechaFu' 
							GROUP BY b.Tipo_V");
							while($row=mysql_fetch_array($pe)){
							$Tipo=$row['Tipo_V'];
						echo "'".$row['Tipo_V']."',";
						}
						?>
					
				]
			},
			options: {
				responsive: false,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Cantidad de Vehiculo'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myDoughnut = new Chart(ctx, config);
		};
		document.getElementById('changeCircleSize').addEventListener('click', function() {
			if (window.myDoughnut.options.circumference === Math.PI) {
				window.myDoughnut.options.circumference = 2 * Math.PI;
				window.myDoughnut.options.rotation = -Math.PI / 2;
			} else {
				window.myDoughnut.options.circumference = Math.PI;
				window.myDoughnut.options.rotation = -Math.PI;
			}

			window.myDoughnut.update();
		});
	</script>
<?php
			}
		 ?>
			
			
				<form action="" method="post">
					<!-- add class="tcal" to your input field -->
					<div><input type="text" name="dateE" class="tcal EstabecefechaI" value="" placeholder="Ingresar Fecha1" autocomplete="off" required /></div>
					<div><input type="text" name="dateS" class="tcal EstabecefechaF" value="" placeholder="Ingresar Fecha2" autocomplete="off" required/></div>
					<input type="submit" class="BotonGrafica" name="ev" value="Enviar">
				</form>
						
</center>
</div>
    </section>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>