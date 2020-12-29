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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="../../icono/ic_retirar.png">
    <title>AJUSTE</title>
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
                <li><a href="ayuda_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ayuda.png"></span> Ayuda</a></li>
                <li class="linea bot"><a href="ajuste_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ajuste_col.png"></span> Ajustes</a></li>
                
                
            </ul>
        </nav>
    </div>
    <!-- menu -->
    <br>
    <section>
        <div class="titulo_pag">Ajustes</div>
        <br>

        <center>
        <!--contactos-->
        <div class="container_ayu">

            <div class="form_tit tama">
                <center>
                    <h2>DATOS PERSONALES</h2>
                </center>
            </div>
            <div class="nombre_u">
                    <?php
                    $idUS=$_SESSION['idAd'];
                    $pe=mysql_query("SELECT a.Nombre, a.Apellido, a.Usuario, a.Celular
                    FROM administrador a
                    WHERE a.Ad='$idUS'");
                    while($row=mysql_fetch_array($pe)){
                        $Nombre=$row['Nombre'];
                        $Apellido=$row['Apellido'];
                        $Usuario=$row['Usuario'];
                        $Celular=$row['Celular'];
                    }
                    ?>


                    <span>NOMBRE: </span><span style="font-style:normal;font-weight:bold;"><?php echo $Nombre,"  ",$Apellido; ?></span><br>
                    <br>
                    <span>NOMBRE DE USUARIO:  </span><span style="font-style:normal;font-weight:bold;"><?php echo $Usuario; ?></span><br>
                    <br>
                    <span>CELULAR:  </span><span style="font-style:normal;font-weight:bold;"><?php echo $Celular; ?></span><br>
	
            </div>
            
            <br>
        </div>

        <!--tarifario-->
        <div class="container_ayu">
            <div class="form_tit tama">
                <center>
                    <h2>ACCESOS DIRECTOS DE</h2>
                    <h2>PRIVACIDAD</h2>
                </center>
            </div>
            <br>
            <a href="conf_inf_adm.php" class="boton_aj ingrese_aj"><span class="espacio_aj"><img src="../../icono/ic_persona.png"></span>Actualizar tu información personal</a>
            	
            <br>
            <a href="conf_cont_adm.php" class="boton_aj ingrese_aj"><span class="espacio_a"><img src="../../icono/ic_llave.png"></span>Cambiar la contraseña</a>
            
            
        </div>
        </center>
        
    </section>
    
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>