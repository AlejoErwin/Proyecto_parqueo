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
        <div class="titulo_pag">Estadistica</div>
        <!-- Seccion  de agregar usuario-->
       <table class="tabla_esta">
           <tr>
               <td>
                    <div class="estad">
                        <br>
                        <h3>REPORTES</h3>
                        <h3>DE GANANCIA</h3>
                        <br>
                        <center>
                        <img src="../../icono_adm/reporte_ganacias.png" height="180" width="180"> 
                        <br><br>
                        <a href="Ganancia_adm.php" class="boton ingrese tama_est">IR</a>
                    </center>
                    <br>
                    </div>
               </td>
               <td>
                    <div class="estad">
                        <br>
                            <h3>REPORTES</h3>
                            <h3>DE CANTIDAD</h3>
                            <br>
                            <center>
                        <img src="../../icono_adm/reporte_esta.png" height="180" width="180">
                        <br><br>
                        <a href="cantidad_estadis_adm.php" class="boton ingrese tama_est">IR</a>
                    </center>
                    <br>
                    </div>
               </td>
           </tr>
       </table>
        </div>
        <a href="ReporteGeneral_adm.php" class="BotonPGeneralPFD"><div class="centerBPDF">Reporte General</div></a>
   
            <!-- Fin de la seccion  de agregar usuario -->
    </section>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>