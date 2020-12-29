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
    <link rel="shortcut icon" href="../../icono/ic_ingresar.png">
    <title>AYUDA</title>
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
                <li><a href="agregar_usu.php" ><span class="espacio"><img src="../../icono/ic_ingresar.png"></span> Ingreso de Vehiculo</a></li>
                <li><a href="retirar_usu.php" ><span class="espacio"><img src="../../icono/ic_retirar.png" ></span> Retirar Vehiculo</a></li>
                <li><a href="listado_usu.php" ><span class="espacio"><img src="../../icono/ic_lista.png"></span> Lista</a></li>
                <li class="linea bot"><a href="ayuda_usu.php" ><span class="espacio"><img src="../../icono/ic_ayuda_col.png"></span> Ayuda</a></li>
                <li><a href="ajuste_usu.php" ><span class="espacio"><img src="../../icono/ic_ajuste.png"></span> Ajustes</a></li>
                
                
            </ul>
        </nav>
    </div>
    <!-- menu -->
    <br>
    <section>
        <div class="titulo_pag">Ayuda</div>
        

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
        </div>

        <!--tarifario-->
        <div class="container_ayu">
            <div class="form_tit">
                <center>
                    <h2>TARIFARIO</h2>
                </center>
            </div>

            <table >
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
        </div>
        </center>
        
    </section>
    
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
</body>
</html>