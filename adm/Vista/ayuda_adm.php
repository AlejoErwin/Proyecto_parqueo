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
    <title>AYUDA</title>
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
                <li><a href="estadistica_adm.php" ><span class="espacio"><span><img src="../../icono_adm/ic_estadistica.png"></span></span> Estadistica</a></li>
                <li  class="linea bot"><a href="ayuda_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ayuda_col.png"></span> Ayuda</a></li>
                <li><a href="ajuste_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ajuste.png"></span> Ajustes</a></li>
                
                
            </ul>
        </nav>
    </div>
    <!-- menu -->
    <br>
    <section>
    <div class="titulo_pag">Ayuda</div>
        <br>

        <center>
        <!--contactos-->
        <div class="container_ayu">

            <div class="form_tit">
                <center>
                    <h2>CONTACTOS</h2>
                </center>
            </div>
            <div class="container_ayu_sc">

        <br>
            <?php
                $pe=mysql_query("SELECT a.Nombre, a.Apellido, a.Celular
                                FROM administrador a");
                while($row=mysql_fetch_array($pe)){
                $Nombre=$row['Nombre'];
                $Apellido=$row['Apellido'];
                $Celular=$row['Celular'];
                echo "<div class='form_ayuda'>
                            Propietario(a): ".$Nombre." ".$Apellido."
                        </div>	
                        <div class='form_num'>
                            ".$Celular."
                        </div><br>";
                }


                 
            ?>
            </div>
            <div class="cont_boton_ayu">
                <a href="conf_inf_adm.php" class="boton_ayu"><div class="ingrese_ayu"><span> Modificar</span></div></a>
            </div>
        </div>

        <!--tarifario-->
        <div class="container_ayu">
            <div class="form_tit">
                <center>
                    <h2>TARIFARIO</h2>
                </center>
            </div>
            <table>
                <tr>
                    <td>
                                <div class="auto">
                                    AUTOS
                                </div>
                    </td>
                    <td>
                                <div class="auto">
                                        MOTOS
                                    </div>
                    </td>
                </tr>
            </table>
            <div class="container_ayu_scT">
            <table >
                <tr>
                    <td  VALIGN="TOP">
                        <div class="m_autos">
                                <div class="monto_auto">
                                        <span>   
                                            <?php
                                            $pe=mysql_query("SELECT a.Periodo,a.Monto, b.Tipo_V
                                            FROM tarifa a, tipo_vehiculo b
                                            WHERE a.Tipo_vahiculo_Tv=b.Tv
                                            and b.Tv=1
                                            ORDER BY a.Monto");
                                            while($row=mysql_fetch_array($pe)){
                                                $Periodo=$row['Periodo'];
                                                $Monto=$row['Monto'];
                                                echo $Periodo,": ",$Monto," Bs.<br>";
                                            }
                                            ?>
                                         </span>
                                </div>
                        </div>
                    </td>
                    <td  VALIGN="TOP">
                        <div class="m_motos">
                                    <div class="monto_auto">
                                            <span>    
                                            <?php
                                            $pe=mysql_query("SELECT a.Periodo,a.Monto, b.Tipo_V
                                            FROM tarifa a, tipo_vehiculo b
                                            WHERE a.Tipo_vahiculo_Tv=b.Tv
                                            and b.Tv=2
                                            ORDER BY a.Monto");
                                            while($row=mysql_fetch_array($pe)){
                                                $Periodo=$row['Periodo'];
                                                $Monto=$row['Monto'];
                                                echo $Periodo,": ",$Monto," Bs.<br>";
                                            }
                                            ?>
                                            </span>
		                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            </div>
            	
            <div class="cont_boton_ayu">
                <a href="modificar_tarifa_adm.php" class="boton_ayu"><div class="ingrese_ayu"><span> Modificar</span></div></a>
            </div>
        </div>
        </center>
        
    </section>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>