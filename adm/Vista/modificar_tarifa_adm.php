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
    <link rel="shortcut icon" href="../../icono/ic_retirar.png">
    <style>
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }
    </style>
    <title>TARIFAS</title>
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
                    <li class="linea bot"><a href="config_adm.php" ><span class="espacio"><span><img src="../../icono_adm/ic_config_ico.png"  ></span></span> Configurar el Estacionamiento</a></li>
                    <li><a href="estadistica_adm.php" ><span class="espacio"><span><img src="../../icono_adm/ic_estadistica.png"></span></span> Estadistica</a></li>
                    <li><a href="ayuda_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ayuda.png"></span> Ayuda</a></li>
                    <li><a href="ajuste_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ajuste.png"></span> Ajustes</a></li>
                </ul>
            </nav>
        </div>
    <!-- menu -->
    <br>
    <section>
        <div class="titulo_pag">Modificar Tarifa</div>
        <table class="posicionTA">
            <tr>
                <td>
                    <div class="contenedorTA" >
                    <table class="estiloTTA">
        <tr>
            <td COLSPAN="2" class="TituloTari">TARIFA</td>
        </tr>
        <tr>
                <td class="TituTari">
                    AUTO
                </td>
                <td class="TituTari">
                    MOTO
                </td>
            </tr>
        <tr>
            <form action="" method="post">
            <td >
                    <table class="tam_scroT" class="estiloTTA">
                            <tr class='tituloTA'>
                                <td class='letraTA espacioNUMTA'>TIEMPO</td>
                                <td class='letraTA espacioEDTA'>PRECIO</td>
                                <td class='letraTA espacioEDTA1'>FECHA ACTUALIZACION</td>
                                <td class='letraTA espacioBOTTA'></td>
    				        </tr>
                        </table>
                <div class="conteTAri">
                    
                            <table align="right" class="estiloTTA">
                            <?php
                                    $pe=mysql_query("SELECT a.Ta,a.Periodo,a.Monto, b.Tipo_V, a.Fecha_Can, TIME_FORMAT(TIME(a.Fecha_Can),'%H:%i') as HoraF
                                    FROM tarifa a, tipo_vehiculo b
                                    WHERE a.Tipo_vahiculo_Tv=b.Tv
                                    and b.Tv=1
                                    ORDER BY a.Monto");
                                    while($row=mysql_fetch_array($pe)){

                                    $Periodo=$row['Periodo'];
                                    $Monto=$row['Monto'];
                                    $fechaF=$row['Fecha_Can'];
                                    list($fecha, $hora) = split(' ', $fechaF);
                                    $horaF=$row['HoraF'];
                                    $id=$row['Ta'];
                                
                            ?>
                                <tr class=''>
                                    <td class='estiloTA espacioATA'>1 <?php echo " ",$Periodo; ?></td>
                                    <td class='estiloTA espacioBTA'><?php echo $Monto," "; ?> Bs.</td>
                                    <td class='estiloTA espacioFECH'><?php echo $fecha," ",$horaF; ?> </td>
                                    <td class="estiloTA espacioCTA"><input class="botonTA cursor" type="submit" name="<?php echo $id; ?>" value="Cambiar" ></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table> 
                </div>
                
            </td>
            <td >
                    <table class="tam_scroT" >
                            <tr class='tituloTA'>
                                <td class='letraTA espacioNUMTA'>TIEMPO</td>
                                <td class='letraTA espacioEDTA'>PRECIO</td>
                                <td class='letraTA espacioEDTA1'>FECHA ACTUALIZACION</td>
                                <td class='letraTA espacioBOTTA'></td>
    				        </tr>
                        </table>
                    <div class="conteTAri">
                            <table align="right">
                            <?php
                                    $pe=mysql_query("SELECT a.Ta,a.Periodo,a.Monto, b.Tipo_V, a.Fecha_Can, TIME_FORMAT(TIME(a.Fecha_Can),'%H:%i') as HoraF
                                    FROM tarifa a, tipo_vehiculo b
                                    WHERE a.Tipo_vahiculo_Tv=b.Tv
                                    and b.Tv=2
                                    ORDER BY a.Monto");
                                    while($row=mysql_fetch_array($pe)){

                                    $Periodo=$row['Periodo'];
                                    $Monto=$row['Monto'];
                                    $fechaF=$row['Fecha_Can'];
                                    list($fecha, $hora) = split(' ', $fechaF);
                                    $horaF=$row['HoraF'];
                                    $id=$row['Ta'];
                                
                            ?>
                                <tr class=''>
                                    <td class='estiloTA espacioATA'>1 <?php echo " ",$Periodo; ?></td>
                                    <td class='estiloTA espacioBTA'><?php echo $Monto," "; ?> Bs.</td>
                                    <td class='estiloTA espacioFECH'><?php echo $fecha," ",$horaF; ?></td>
                                    <td class="estiloTA espacioCTA"><input class="botonTA cursor" type="submit" name="<?php echo $id; ?>" value="Cambiar" ></td>
                                </tr>
                                <?php } ?>  
                                </table>  
                            </div> 
                        </td>
                        </form>
                    </tr>
                </table>
            </div>
            </td>    
        </tr>
        </table>
        </div>
    </section>


    <?php
    
    

    ?>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>