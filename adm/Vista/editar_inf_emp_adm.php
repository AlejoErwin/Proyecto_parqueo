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
    <link rel="shortcut icon" href="../../icono/ic_retirar.png">
    
    <link rel="stylesheet" href="../../css/ventanas.css">
    <title>EMPLEADOS</title>
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
        <div class="titulo_pag">Editar informe de empleado</div>
        <table class="posicionEd">
            <tr>
                <td>
                    <div class="contenedorEd">
                        <div class="tituloEdi">
                            <center>
                                <h2>REGISTRO DE EMPLEADOS</h2>
                            </center>
                        </div>
                        <div>
                            <center>
                        <table class="tam_scroD" >
                            <tr class='tituloED'>
                                <td class='letraED espacioNUM'>N°</td>
                                <td class='letraED espacioED'>NOMBRE COMPLETO</td>
                                <td class='letraED espacioEDD'>USUARIO</td>
                                <td class='letraED espacioEDD'>CELULAR</td>
                                <td class='letraED espacioEDD'>ESTADO</td>
    					        <td class='letraED espacioBOT'></td>
    				        </tr>
                        </table>
                        </center>
                        </div>
                        <div class="listCrEd">
                            <form action="" method="post">
                            <table >
                            <?php
                                $conta=0;
                                $pa=mysql_query("SELECT * FROM usuario");
                                while($row=mysql_fetch_array($pa)){
                                    $pas=$row['Estado'];
                                    if($pas!='Eliminado'){
                                    $conta++;
                                    $nombre=$row['Nombre'];
                                    $apellido=$row['Apellido'];
                                    $id=$row['Us'];
                                    $celular=$row['Celular'];
                                    $usuario=$row['Usuario'];
                                    $estado=$row['Estado'];
                            ?>
                            <tr>
                                <td class="estiloLE espacioA"><?php echo $conta; ?> </td>
                                <td class="estiloLE espacioB"><?php echo $nombre," ",$apellido; ?> </td>
                                <td class="estiloLE espacioC"><?php echo $usuario; ?> </td>
                                <td class="estiloLE espacioC"><?php echo $celular; ?> </td>
                                <td class="estiloLE espacioC"><?php echo $estado; ?> </td>
                            <td class="estiloLE espacioD">
                            <button class="botonED cursor" type="submit" name="<?php echo $id."Editar" ?>" value="Editar"><img src="../../icono_adm/lapiz.png" alt="" width="20" height="20"></button>
                            <button class="botonED cursor" type="submit" name="<?php echo $id ?>" value="Eliminar"><img src="../../icono_adm/basura.png" alt="" width="20" height="20"></button>
                            <button class="botonCAME cursor" type="submit" name="<?php echo $id."Cambiar"; ?>" value="Cambiar_est"><img src="../../icono_adm/flecha.png" alt="" width="35" height="20"></button>
                            
                            </td>
                            </tr>
                            <?php
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


    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
</body>
</html>