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
    <style>
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }
    </style>
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
        <center>
        <div class="contenedor_A">
            <div class="con_tam">
                <center>
                    ACTUALIZAR TU INFORMACION
                    <br>
                    PERSONAL
                    <br>
                    <img src="../../icono/ic_usuario.png">
                </center>
            </div>
                    <?php
                        $idUS=$_SESSION['idAd'];
                        $pe=mysql_query("SELECT a.Nombre, a.Apellido, a.Usuario, a.Celular
                        FROM Administrador a
                        WHERE a.Ad='$idUS'");
                        while($row=mysql_fetch_array($pe)){
                            $Nombre=$row['Nombre'];
                            $Apellido=$row['Apellido'];
                            $Usuario=$row['Usuario'];
                            $Celular=$row['Celular'];
                        }
                    ?>
            <form class="form_reg_act_A" action="" method="post">
                <h3 align="left" class="tam_A">Nombre: </h3>
                <input class="input_A" type="text" placeholder="Nombre" name="nom" required value="<?php echo $Nombre; ?>" autocomplete="off">
                <h3 align="left" class="tam_A">Apellido: </h3>
                <input class="input_A" type="text" placeholder="Apellido" name="ape" required value="<?php echo $Apellido; ?>" autocomplete="off">
                <h3 align="left" class="tam_A">Usuario: </h3>
                <input class="input_A" type="text" placeholder="Nombre de Usuario" name="usu" required value="<?php echo $Usuario; ?>" autocomplete="off">
                <h3 align="left" class="tam_A">Celular: </h3>
                <input class="input_A" type="number" placeholder="Celular" name="cel" required value="<?php echo $Celular; ?>" autocomplete="off">
                <br>
                <div align="center">
                    <input class="btn_submit_bot cursor" name="enviar1" type="submit" value="Guardar Cambios">
                </div>
            </form>
        </div>
        </center>
            <!-- Fin de la seccion  de agregar usuario -->
    </section>

       
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>