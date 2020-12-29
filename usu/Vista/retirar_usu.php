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
    <link rel="stylesheet" href="../../css/estiloTabla.css">
    <link rel="shortcut icon" href="../../icono/ic_ingresar.png">
    <link rel="stylesheet" href="../../css/ventanas.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
    <title>RETIROS</title>
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
                <li ><a href="inicio_usu.php" ><span class="espacio "><img src="../../icono/ic_inicio.png" ></span> Inicio</a></li>
                <li><a href="agregar_usu.php" ><span class="espacio"><img src="../../icono/ic_ingresar.png"></span> Ingreso de Vehiculo</a></li>
                <li class="linea bot"><a href="retirar_usu.php" ><span class="espacio"><img src="../../icono/ic_retirar_col.png" ></span> Retirar Vehiculo</a></li>
                <li><a href="listado_usu.php" ><span class="espacio"><img src="../../icono/ic_lista.png"></span> Lista</a></li>
                <li><a href="ayuda_usu.php" ><span class="espacio"><img src="../../icono/ic_ayuda.png"></span> Ayuda</a></li>
                <li><a href="ajuste_usu.php" ><span class="espacio"><img src="../../icono/ic_ajuste.png"></span> Ajustes</a></li>
                
                
            </ul>
        </nav>
    </div>
    <!-- menu -->
    <br>
    <section>
        <div class="titulo_pag">Retirar Vehículo</div>

        <?php
       $numero1 = NULL;
       if(isset($_POST ['enviar1']) ){
        $enviar1 = $_POST ['enviar1'];
        $numero1 = $_POST ['modelo'];
       } 
        
    ?>


        <div class="retirar_v">
        <form action="" method="post">
                    <div class="search-wrapper">
                        <input type="text" class="search" value="<?php echo $numero1 ?>"  name="modelo" id="caja_busqueda" placeholder="Ingrese el Numero de Placa"/>
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="boton_buscar" align="left">
                            <input class="btn_submit_buscar cursor" name="enviar1"  type="submit" value="Generar Precio de Tiempo Estacionado">
                        </div>
                        <br><br><br>
                        <div class="" align="center">
                                <a class="btn_submit tam" id="precio_pa">
                                <?php
                                
                                $horaFINAL=$Retirar->horaAct();
                                $reservac=$Retirar->reservas();
                                $idd=$Retirar->idUs();
                                $pagoNeto=$Retirar->PagoN();

                                ?>
                                </a>
                            </div>
                            <br><br>
        </form>
                            <div class="posic" align="center">
                                    <img src="../../icono/agregar_vehiculo.png" width="250" height="250">
                                </div>
                                <br><br>
            <form action="retirar_usu.php?total=<?php echo $pagoNeto; ?>&idU=<?php echo $idd; ?>&horaFINAL=<?php echo $horaFINAL; ?>&reservac=<?php echo $reservac; ?>" method="post">
                                <div class="btn_form" align="center">
                                        <input class="btn_submit cursor" name="enviar2" type="submit" value="Generar Retiro">
                                    </div>
            </form>

                               
            


        </div>


        <div class="container_ret">
            <div class="form_top_ret">
                <center>
                    <div class="tamma">LISTA DE ESPACIOS</div>
                    <div class="tamma">OCUPADOS</div>
                </center>
            </div>		
           <!-- <span id="minutos">0</span>:<span id="segundos">0</span> -->
            <table class="tam_scro" >
            <tr class='tituloT'>
    					<td class='letraT espacioT'>N° ESPACIO</td>
    					<td class='letraT espacioT'>NOMBRE</td>
    					<td class='letraT espacioT'>N° PLACA</td>
    					<td class='letraT espacioT'>TIPO VEHICULO</td>
    				</tr>
            </table>

           <div class="contenedor_escro">
            <div id="datos"></div>
            </div>

        </div>

        <?php






?>

    </section>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
  <script type="text/javascript" src="js/index3.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>

    
       
</body>
</html>