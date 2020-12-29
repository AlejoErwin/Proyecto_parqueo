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
    <title>ESPACIOS</title>
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
            <div class="InformeEstado">
                <h2 align="center" class="LetraTitL">ESTADOS</h2>
                
            <div class="RegistroEs"></div>
            <table class="posinEsta">
                <tr>
                    <td class="estiloTLLESP ">
                    
                    </td>
                    <td class="LetraEstt">
                    Disponible 
                    </td>
                </tr>
                <tr>
                <td class="estiloTLOESP ">
                    </td>
                    <td class="LetraEstt">
                    Ocupado 
                    </td>
                </tr>
                <tr>
                    <td class="estiloMANT ">
                    </td>
                    <td class="LetraEstt">
                    Reservado 
                    </td>
                    <tr>
                    <td class="estiloMANESP ">
                    </td>
                    <td class="LetraEstt">
                    Mantenimiento
                    </td>
                    </tr>
                </tr>
            </table>
        </div>
        </div>
    <!-- menu -->
    <br>
    <section>
        <div class="titulo_pag">Espacios del Estacionamiento</div>

        

        <table class="posicionEdESP">
            <tr>
                <td>
                    <div class="contenedorEdESP">
                        <div class="tituloEdiESP">
                            <center>
                                <h2>LISTA DE AUTOS</h2>
                            </center>
                        </div>
                        <div>
                            <center>
                        <table class="tam_scroDESP">
                            <tr class='tituloEDESP'>
                                <td class='letraED espacioNUMESP'>N°</td>
                                <td class='letraED espacioEDESP'>NOMBRE DE ESPACIO</td>
    					        <td class='letraED espacioBOTESP'></td>
    				        </tr>
                        </table>
                        </center>
                        </div>
                        <div class="listCrEdESP">
                            <form action="" method="post">
                            <table >
                            <?php
                                $conta=0;
                                $pa=mysql_query("SELECT * FROM espacio WHERE Tipo_vehiculo_Tv='1' ORDER BY espacio.Es;");
                                while($row=mysql_fetch_array($pa)){
                                    $estad=$row['Estado'];
                                    if($estad!="Eliminado"){
                                    $conta++;
                                    $nombre="1";
                                    $es=$row['Es'];
                                    $nombre=$row['Espacio'];
                                    $estadS=$row['Estado'];
                                    $tipo_V=$row['Tipo_vehiculo_Tv'];
                                    if($tipo_V==1){
                                        $automotor="Auto";
                                    }
                                    else{
                                        if($tipo_V==2){
                                            $automotor="Moto";
                                        }
                                    }
                                    $pa1=mysql_query("SELECT a.Pa, a.Estado
                                    FROM parqueo a, espacio b
                                    WHERE a.Espacio_Es=b.Es
                                    and b.Es='$es'");
                                    $conES=0;
                                    while($row1=mysql_fetch_array($pa1)){
                                        $conES++;
                                        $estado=$row1['Estado'];
                                    }
                                    if($conES==0){
                                        
                                        $estado=$row['Estado'];
                                    }
                                    if($estado=="Ocupado"){
                                        $estiloRE="estiloTLOESP";
                                    }
                                    else{
                                        if($estado=="Reservado"){
                                            $estiloRE="estiloMANT";
                                        }
                                        else{
                                            if($estadS=="Mantenimiento"){
                                                $estiloRE="estiloMANESP";
                                            }
                                            else{
                                                $estiloRE="estiloTLLESP"; 
                                            }
                                        }
                                        }
                                    

                            ?>
                            <tr>
                                <td class="estiloLE1 espacioAESP"><?php echo $conta; ?> </td>
                                <td class="estiloLE1 espacioBESP "><div class="<?php echo $estiloRE; ?>"><?php echo $nombre; ?></div> </td>

                            <?php if($estado=="Disponible" or $estado=="Mantenimiento" ){ ?>
                            <td class="estiloLEESP espacioDESP">
                            <button class="botonCAME cursor" type="submit" name="<?php echo $es ?>" value="Cambiar_est"><img src="../../icono_adm/flecha.png" alt="" width="35" height="20"></button>
                            <button class="botonED cursor" type="submit" name="<?php echo $es."Eliminar" ?>" value="Eliminar"><img src="../../icono_adm/basura.png" alt="" width="20" height="20"></button>
                            <?php } ?>    
                        </tr>
                            <?php
                            $estiloRE="";
                                    }
                                }
                            ?>
                                </table>
                                </form>
                        </div>
                        <div class="pocisionBot">
                            <form action="" method="post">
                                <input class="boton config_conf ingrese tamBot cursor" type="submit" value="Añadir Espacio" name="agregar">
                            </form>
                        </div>
                    </div>
                    
                </td>
                <td>
                    
                <div class="contenedorEdESP">
                        <div class="tituloEdiESP">
                            <center>
                                <h2>LISTA DE MOTOS</h2>
                            </center>
                        </div>
                        <div>
                            <center>
                        <table class="tam_scroDESP">
                            <tr class='tituloEDESP'>
                                <td class='letraED espacioNUMESP'>N°</td>
                                <td class='letraED espacioEDESP'>NOMBRE DE ESPACIO</td>
    					        <td class='letraED espacioBOTESP'></td>
    				        </tr>
                        </table>
                        </center>
                        </div>
                        <div class="listCrEdESP1">
                            <form action="" method="post">
                            <table >
                            <?php
                                $conta=0;
                                $pa=mysql_query("SELECT * FROM espacio WHERE Tipo_vehiculo_Tv='2' ORDER BY espacio.Es;");
                                while($row=mysql_fetch_array($pa)){
                                    $estad=$row['Estado'];
                                    if($estad!="Eliminado"){
                                    $conta++;
                                    $es=$row['Es'];
                                    $nombre=$row['Espacio'];
                                    $estadS=$row['Estado'];
                                    $tipo_V=$row['Tipo_vehiculo_Tv'];
                                    if($tipo_V==1){
                                        $automotor="Auto";
                                    }
                                    else{
                                        if($tipo_V==2){
                                            $automotor="Moto";
                                        }
                                    }
                                    $pa1=mysql_query("SELECT a.Pa, a.Estado
                                    FROM parqueo a, espacio b
                                    WHERE a.Espacio_Es=b.Es
                                    and b.Es='$es'");
                                    $conES=0;
                                    while($row1=mysql_fetch_array($pa1)){
                                        $conES++;
                                        $estado=$row1['Estado'];
                                    }
                                    if($conES==0){
                                        
                                        $estado=$row['Estado'];
                                    }
                                    if($estado=="Ocupado"){
                                        $estiloRE="estiloTLOESP";
                                    }
                                    else{
                                        if($estado=="Reservado"){
                                            $estiloRE="estiloMANT";
                                        }
                                        else{
                                            if($estadS=="Mantenimiento"){
                                                $estiloRE="estiloMANESP";
                                            }
                                            else{
                                                $estiloRE="estiloTLLESP"; 
                                            }
                                        }
                                        }
                                    

                            ?>
                            <tr>
                                <td class="estiloLE1 espacioAESP"><?php echo $conta; ?> </td>
                                <td class="estiloLE1 espacioBESP "><div class="<?php echo $estiloRE; ?>"><?php echo $nombre; ?></div> </td>
                            <?php if($estado=="Disponible" or $estado=="Mantenimiento" ){ ?>
                            <td class="estiloLEESP espacioDESP">
                            <button class="botonCAME cursor" type="submit" name="<?php echo $es ?>" value="Cambiar_est"><img src="../../icono_adm/flecha.png" alt="" width="35" height="20"></button>
                            <button class="botonED cursor" type="submit" name="<?php echo $es."Eliminar" ?>" value="Eliminar"><img src="../../icono_adm/basura.png" alt="" width="20" height="20"></button>
                            <?php } ?>    
                        </tr>
                            <?php
                            $estiloRE="";
                                    }
                                }
                            ?>
                                </table>
                                </form>
                        </div>
                        
                    </div>




























                </td>
        </tr>
        </table>
        </div>
    </section>

    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>