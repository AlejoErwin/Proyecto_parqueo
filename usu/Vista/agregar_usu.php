<?php 
    session_start();
    if($_SESSION['tipo_user']=='usuario'){

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
    <link rel="stylesheet" href="../../css/principal.css">
    <link rel="stylesheet" href="../../css/ventanas.css">
    <link rel="shortcut icon" href="../../icono/ic_ingresar.png">
    <title>REGISTRO</title>

    <style>
    
#menu, #formularios{
    width: 250px;
    height: 20px;
    
}

#menu ul{
	list-style: none;
	margin: 0;
	padding: 0;
}

#menu ul li{
	display: inline-block;
	width: 50%;
	margin-right: -4px;
}

#menu ul li a{
	background-color: #43425D;
	display: block;
	padding: 10px 10px;
    text-decoration: none;
    
    
	text-align: center;
	font-family: Source Sans Pro;
	font-style: normal;
	font-weight: bold;
	font-size: 16px;
    
    color: #ffffff;
}

#menu ul li a:hover{
	background-color: #2F2E50;
}

.activeEs{
    background-color: white !important;
    color: #2F2E50 !important;
}

    </style>
</head>
<body>
    <!--header-->
    <?php include_once "../../menu/principal.php"; ?>
    <!--header-->
    <!-- menu -->
    <div id="mostrar_nav">
        <nav class="mostrar">
            <ul class="menu">
                <center>
                <h1 class="titulo" >PARQUEO OBRAJES</h1>
            </center>
                <li><a href="inicio_usu.php" ><span class="espacio "><img src="../../icono/ic_inicio.png" ></span> Inicio</a></li>
                <li class="linea bot"><a href="agregar_usu.php" ><span class="espacio"><img src="../../icono/ic_ingresar_col.png"></span> Ingreso de Vehiculo</a></li>
                <li><a href="retirar_usu.php" ><span class="espacio"><img src="../../icono/ic_retirar.png" ></span> Retirar Vehiculo</a></li>
                <li><a href="listado_usu.php" ><span class="espacio"><img src="../../icono/ic_lista.png"></span> Lista</a></li>
                <li><a href="ayuda_usu.php" ><span class="espacio"><img src="../../icono/ic_ayuda.png"></span> Ayuda</a></li>
                <li><a href="ajuste_usu.php" ><span class="espacio"><img src="../../icono/ic_ajuste.png"></span> Ajustes</a></li>
                
                
            </ul>
        </nav>
    </div>
    <!-- menu -->
    <br>
    <section>
        <div class="titulo_pag">Ingreso de Vehículo</div>
        <!-- Seccion  de agregar usuario-->
  
        <div id="menu" class="positionRe">
		<ul>
			<li><a href="#" class="activeEs">Registro</a></li>
			<li><a href="#">Reserva</a></li>
		</ul>
	    </div>
        <div id="formularios">
        <div class="container">
            <div class="form_top">
                <center>
                    <h2>DATOS RESERVA</h2>
                    <h6>Por favor, completa este formulario</h6>
                </center>
            </div>		
            <form class="form_reg" action="" method="post">
                <div class="input_group radio " align="center" id="vehi1">
                    <input type="radio" name="vehi1" id="auto1" value="1" required>
                    <label for="auto1" class="letra">Auto</label>
                    <input type="radio" name="vehi1" id="moto1" value="2" required>
                    <label for="moto1" class="letra">Moto</label>
                </div>
                
                <input class="input" name="nom1" type="text" placeholder="Nombre de Propietario" autocomplete="off" required>
                <input class="input" name="ci1" type="text" placeholder="CI de Propietario" autocomplete="off" required>
                <input class="input" name="num1" type="text-transform:uppercase;" placeholder="Numero de Placa" autocomplete="off" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                <input class="input" name="mod1" type="text" placeholder="Modelo" autocomplete="off" required>
                
                
                <select id="videos" class="input tam_op" name="esp" class="form-control" required>
                </select>
                <select class="input tam_op" id="lista_reproducc" name="tiempo" class="form-control" required>
                    <option value="">Elige un plazo de tiempo</option>
                    <option value="Dia">Dia</option>
                    <option value="Semana">Semana</option>
                    <option value="Mes">Mes</option>
                </select>
                <div class="form_rege">

                <div id="vid" name="vid">
                <input class="input_re espas" id="list" name="fechaE" type="date" placeholder="Fecha de Entrada" required required autocomplete="off" min="<?php echo date("Y")."-".date("m")."-".date("d"); ?>">
                <input class="input_re" type="date" name="fechaS" placeholder="Fecha de Salida" required required autocomplete="off">      
                </div>
                </div>
                <br>
                <div class="btn_form" align="center">
                    <input id="enviar" class="btn_submit cursor" name="reserva" type="submit" value="Agregar" >
                </div>
            </form>
        </div>
        <div class="container" id="fort">
            <br>
            <div class="form_top">
                <center>
                    <h2>DATOS AUTOMOTOR</h2>
                    <h6>Por favor, completa este formulario</h6>
                </center>
            </div>
            		
            <form class="form_reg" action="" method="post">

                <div class="input_group radio " align="center" id="vehi">
                    <input type="radio" name="vehi" id="auto" value="1" required>
                    <label for="auto" class="letra">Auto</label>
                    <input type="radio" name="vehi" id="moto" value="2" required>
                    <label for="moto" class="letra">Moto</label>
                </div>
                <br>
                <input class="input" name="nom" type="text" placeholder="Nombre de Propietario" autocomplete="off" required>
                <input class="input" name="ci" type="text" placeholder="CI de Propietario" autocomplete="off" required>
                <input class="input" name="num" type="text-transform:uppercase;" placeholder="Numero de Placa" autocomplete="off" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                <input class="input" name="mod" type="text" placeholder="Modelo" autocomplete="off" required>
                
                <select id="video" class="input tam_op" name="esp" class="form-control" required>
                </select>

                <input class="input" name="hor" type="time" value="<?php echo date('H').':'.date('i'); ?>" placeholder="Hora de entrada" required>
                <br>
                <div class="btn_form" align="center">
                    <input id="enviar" class="btn_submit cursor" type="submit" value="Agregar" >
                </div>
           
            </form>
        </div>
        </div>
        <div class="posici">
            <center>
            <div class="disponi">
                <h5>Espacios disponible</h5>
                <?php
                $con=0;
                $espacio=0;
                $pa=mysql_query("SELECT * FROM parqueo");
                while($row=mysql_fetch_array($pa)){ $con++; }
                $pa=mysql_query("SELECT * FROM espacio");
                while($row=mysql_fetch_array($pa)){ $e=$row['Estado']; if($e=="Disponible") $espacio++; }
                $total=$espacio-$con;
                $_SESSION['mo']="<p><b>El resultado es: </b></p><p id='resultado1'></p>";
                ?>

                <div id="result" class="esp_t"><?php echo $total; ?></div>
                <div id="resu" class="esp_t"></div>
            </div>
            </center>
            <br><br>
            <img src="../../icono/agregar_vehiculo.png" width="300" height="300">
        </div>
            <!-- Fin de la seccion  de agregar usuario -->
    </section>















<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/index1.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/carga_fecha.js"></script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>


    <script>
		$(function(){
			$("#menu li").on("click", function(){
				var i = $(this).index();
				$("#formularios #fort").hide();
				$("#formularios #fort").eq(i).show();
				$("#menu li a").removeClass("activeEs");
				$(this).find("a").addClass("activeEs");
			});
		});
	</script>
</body>
</html>