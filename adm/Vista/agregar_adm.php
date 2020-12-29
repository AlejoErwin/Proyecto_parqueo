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
    <title>REGISTRO</title>


    <style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
    }
    input[type=number] { -moz-appearance:textfield; }
    </style>
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
                    <li class="linea bot"><a href="agregar_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_registrar_ico.png"></span> Registrar Usuario</a></li>
                    <li><a href="config_adm.php" ><span class="espacio"><span><img src="../../icono_adm/ic_config.png"  ></span></span> Configurar el Estacionamiento</a></li>
                    <li><a href="estadistica_adm.php" ><span class="espacio"><span><img src="../../icono_adm/ic_estadistica.png"></span></span> Estadistica</a></li>
                    <li><a href="ayuda_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ayuda.png"></span> Ayuda</a></li>
                    <li><a href="ajuste_adm.php" ><span class="espacio"><img src="../../icono_adm/ic_ajuste.png"></span> Ajustes</a></li>
                    
                    
                </ul>
            </nav>
        </div>
    <!-- menu -->
    <br>
    <section>
        <div class="titulo_pag">Registrar Usuario</div>
        <!-- Seccion  de agregar usuario-->
        <div class="container_re">
            <div class="form_top_re">
                <center>
                    <h2>DATOS USUARIO</h2>
                    <img src="../../icono_adm/registrar.png" alt="" height="110" width="110">
                </center>
            </div>		
            <form class="form_reg" action="" method="post">

                    <div class="form_rege">
                            <input class="input_re espas" name="nom" type="text" placeholder="Nombre" required required autocomplete="off">
                            <input class="input_re" type="text" name="ape" placeholder="Apellido" required required autocomplete="off">
                            </div>
                            <div class="form_reg_re">
                            <input class="input_re tam" type="text" id="usuari" name="usu" placeholder="Nombre de Usuario" required required autocomplete="off">
                            <div id="resultado"></div>
                            <input class="input_re tam" type="number" name="cel" placeholder="Celular" required required autocomplete="off">
                            <input class="input_re tam" type="password" name="con" placeholder="Contraseña" required required autocomplete="off">
                            <input class="input_re tam" type="password" name="conC" placeholder="Confirmar Contraseña" required required autocomplete="off">
                            <br>
                            <div class="" align="center">
                                <input class="boton ingrese taman cursor" type="submit" value="REGISTAR USUARIO">
                                
                               </div>
                               <br>
                               
                        </div>
            </form>
        </div>
            <!-- Fin de la seccion  de agregar usuario -->
    </section>

    <?php
    
    ?>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
<script src="js/confirRe.js"></script>
<script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>