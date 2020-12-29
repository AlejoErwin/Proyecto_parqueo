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
    <title>CONFIGURACION</title>
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
        <div class="titulo_pag">Configurar el Estacionamiento</div>
        <!-- Seccion  de agregar usuario-->
        <table class="b_table_conf">
                <tr>
                    <td>
                        <center>
                            <img src="../../icono_adm/editar_inf.png" width="190" height="160"> <br>
                                <a href="editar_inf_emp_adm.php" class="boton config_conf" >
                                    <div class="ingrese config_conf">
                                        <span>
                                            EDITAR INFORMACION DE EMPLEADO
                                        </span>
                                    </div> 
                            </a>
                        </center>
                    </td>
                    <td>
        
                    </td>
                    <td>
                        <center>
                                <img src="../../icono_adm/modificar_tarifa.png" width="190" height="160"><br>
                                    <a href="modificar_tarifa_adm.php" class="boton config_conf" >
                                        <div class="ingrese config_conf">
                                            <span>
                                                    MODIFICAR TARIFARIO
                                            </span>
                                        </div> 
                                    </a>
                        </center>            
                    </td>
                </tr>
                <tr>
                    <td>
        
                    </td>
                    <td>
                        <center>
                                <img src="../../icono_adm/modificar_espacio.png" width="250" height="150"><br>
                                    <a href="editar_espacio_adm.php" class="boton config_conf" >
                                        <div class="ingrese config_conf co">
                                            <span>
                                                    MODIFICAR ESPACIOS DEL ESTACIONAMIENTO
                                            </span>
                                        </div> 
                                    </a>
                        </center>
                    </td>
                    <td>
        
                    </td>
                </tr>
            </table>
        </div>
            <!-- Fin de la seccion  de agregar usuario -->
    </section>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>