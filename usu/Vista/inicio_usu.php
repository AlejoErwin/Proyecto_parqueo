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
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../menu/Menu_Pr.css">
    <link rel="stylesheet" href="../../css/principal.css">
    <link rel="shortcut icon" href="../../icono/ic_ingresar.png">
    <title>INICIO</title>
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
                <li class="linea bot"><a href="inicio_usu.php" ><span class="espacio "><img src="../../icono/ic_inicio_col.png" ></span> Inicio</a></li>
                <li><a href="agregar_usu.php" ><span class="espacio"><img src="../../icono/ic_ingresar.png"></span> Ingreso de Vehiculo</a></li>
                <li><a href="retirar_usu.php" ><span class="espacio"><img src="../../icono/ic_retirar.png" ></span> Retirar Vehiculo</a></li>
                <li><a href="listado_usu.php" ><span class="espacio"><img src="../../icono/ic_lista.png"></span> Lista</a></li>
                <li><a href="ayuda_usu.php" ><span class="espacio"><img src="../../icono/ic_ayuda.png"></span> Ayuda</a></li>
                <li><a href="ajuste_usu.php" ><span class="espacio"><img src="../../icono/ic_ajuste.png"></span> Ajustes</a></li>
                
                
            </ul>
        </nav>
        
    </div>
    
    
    <!-- menu -->
    <br><br><br><br><br>
    <table class="b_table">
        <tr>
            <td>
                <center>
                    <img src="../../icono/agregar.png" width="150" height="150"> <br>
                        <a href="agregar_usu.php" class="boton" >
                            <div class="ingrese">
                                <span>
                                    INGRESO DE VEHICULO
                                </span>
                            </div> 
                    </a>
                </center>
            </td>
            <td>

            </td>
            <td>
                <center>
                    <img src="../../icono/lista.png" width="150" height="150"><br>
                        <a href="retirar_usu.php" class="boton" >
                            <div class="ingrese">
                                <span>
                                        RETIRAR VEHICULO
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
                    <img src="../../icono/retirar.png" width="150" height="150"><br>
                        <a href="listado_usu.php" class="boton" >
                            <div class="ingrese">
                                <span>
                                        LISTA DE VEHICULOS
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