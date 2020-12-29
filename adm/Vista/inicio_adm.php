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
    <title>INICIO</title>
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
                    <li class="linea bot"><a href="inicio_adm.php" ><span class="espacio "><img src="../../icono_adm/ic_inicio_ico.png" ></span> Inicio</a></li>
                    <li><a href="agregar_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_registrar.png"></span> Registrar Usuario</a></li>
                    <li><a href="config_adm.php" ><span class="espacio"><span><img src="../../icono_adm/ic_config.png"  ></span></span> Configurar el Estacionamiento</a></li>
                    <li><a href="estadistica_adm.php" ><span class="espacio"><span><img src="../../icono_adm/ic_estadistica.png"></span></span> Estadistica</a></li>
                    <li><a href="ayuda_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ayuda.png"></span> Ayuda</a></li>
                    <li><a href="ajuste_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ajuste.png"></span> Ajustes</a></li>
                    
                    
                </ul>
            </nav>
        </div>
    <!-- menu -->
    <br><br><br><br><br>
    <table class="b_table">
        <tr>
            <td>
                <center>
                    <img src="../../icono_adm/registrar.png" width="150" height="150"> <br>
                        <a href="agregar_adm.php" class="boton" >
                            <div class="ingrese">
                                <span>
                                    REGISTRAR USUARIO
                                </span>
                            </div> 
                    </a>
                </center>
            </td>
            <td>

            </td>
            <td>
                <center>
                        <img src="../../icono_adm/estadistica.png" width="150" height="150"><br>
                            <a href="listado_usu.php" class="boton" >
                                <div class="ingrese">
                                    <span>
                                            ESTADÍSTICA
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
                        <img src="../../icono_adm/config.png" width="150" height="150"><br>
                            <a href="config_adm.php" class="boton confi" >
                                <div class="ingrese confi">
                                    <span>
                                            CONFIGURAR ESTACIONAMIENTO
                                    </span>
                                </div> 
                            </a>
                </center>
            </td>
            <td>

            </td>
        </tr>
    </table>

    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>