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
    <title>INFORMACION</title>
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
        <!-- Seccion  de agregar usuario-->
       <!-- Fin de la seccion  de agregar usuario -->


            <div class="confirmacio">
                    <div class="con_tam comTam">
                            <center>
                                    <h2>¿Estas seguro de Actualizar tu Informacion?</h2>
                            </center>
                        </div>
                <br><br>

                        <div align="center">
                                <a href="ajuste_usu.php" class="btn_confirma espacioS"><i class="tamC"> Salir</i></a>
                                <a href="actualizar_inf_usu.php" class="btn_confirma"><i class="tamCS">Continuar</i></a>
                            </div> 
                            <br><br>
                


            </div>

    </section>

    
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>