<?php 
    session_start();
    if($_SESSION['tipo_user']=='usuario'){

    }
    else{
        header('Location:error.php');
    }
	//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../menu/Menu_Pr.css">
    <link rel="stylesheet" href="../../css/principal.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="../../icono/ic_ingresar.png">
    <title>AJUSTE</title>
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
                <li><a href="ayuda_usu.php" ><span class="espacio"><img src="../../icono/ic_ayuda.png"></span> Ayuda</a></li>
                <li class="linea bot"><a href="ajuste_usu.php" ><span class="espacio"><img src="../../icono/ic_ajuste_col.png"></span> Ajustes</a></li>
                
                
            </ul>
        </nav>
    </div>
    <!-- menu -->
    <br>
    <section>
        <div class="titulo_pag">Ajustes</div>
      

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
                    $idUS=$_SESSION['idUs'];
                    $pe=mysql_query("SELECT a.Nombre, a.Apellido, a.Usuario, a.Celular
                    FROM usuario a
                    WHERE a.Us='$idUS'");
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
            <a href="conf_inf_usu.php" class="boton_aj ingrese_aj"><span class="espacio_aj"><img src="../../icono/ic_persona.png"></span>Actualizar tu información personal</a>
            	
            <br>
            <a href="conf_cont_usu.php" class="boton_aj ingrese_aj"><span class="espacio_a"><img src="../../icono/ic_llave.png"></span>Cambiar la contraseña</a>
            
            
        </div>
        </center>
        
    </section>
    
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>