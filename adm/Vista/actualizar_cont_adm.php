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
    <title>ACTUALIZACION</title>
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
        <!-- Seccion  de agregar usuario-->
      
            <!-- Fin de la seccion  de agregar usuario -->
            <center>
        <div class="contenedor">
            <br>
            <div class="con_tam">
                <center>
                    CAMBIAR LA CONTRASEÑA
                    <br>
                    
                    <img src="../../icono/ic_llave_grande.png">
                    <br><br>
                </center>
            </div>
            		
            <form class="form_reg_act" action=""  method="post">
                
                <input class="input" type="password" name="cont" placeholder="Introducir Contraseña Anterior" required>
                <input class="input" type="password" name="contN" placeholder="Introduzca Nueva Contraseña" required>
                <input class="input" type="password" name="contC" placeholder="Confirma Nueva Contraseña" required>
                <br>
                <div align="center">
                    <input class="btn_submit_act cursor" name="enviar1" type="submit" value="Cambiar Contraseña">
                </div>
            </form>
            
        </div>
        </center>

    </section>

   
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>