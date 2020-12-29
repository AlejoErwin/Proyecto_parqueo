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
    <link rel="stylesheet" href="../../css/estiloTabla.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
    <title>LISTADO</title>
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
                <li ><a href="inicio_usu.php" ><span class="espacio "><img src="../../icono/ic_inicio.png" ></span> Inicio</a></li>
                <li><a href="agregar_usu.php" ><span class="espacio"><img src="../../icono/ic_ingresar.png"></span> Ingreso de Vehiculo</a></li>
                <li><a href="retirar_usu.php" ><span class="espacio"><img src="../../icono/ic_retirar.png" ></span> Retirar Vehiculo</a></li>
                <li  class="linea bot"><a href="listado_usu.php" ><span class="espacio"><img src="../../icono/ic_lista_col.png"></span> Lista</a></li>
                <li><a href="ayuda_usu.php" ><span class="espacio"><img src="../../icono/ic_ayuda.png"></span> Ayuda</a></li>
                <li><a href="ajuste_usu.php" ><span class="espacio"><img src="../../icono/ic_ajuste.png"></span> Ajustes</a></li>
            </ul>
        </nav>
    </div>
    <!-- menu -->
    <br>
    <section>
        <div class="titulo_pag">Lista de Espacios</div>
        <div class="buscador">
        <div class="search-wrapper">
            <input type="text" class="search" value=""  name="modelo" id="caja_busqueda" placeholder="Ingrese el Numero de Placa"/>
            <i class="fa fa-search"></i>
        </div>
    </div>
        <div class="container_lis">

    
        <table class="tam_scroL" >
            <tr class='tituloTL'>
                        <td class='letraTL espacioTL'>N° ESPACIO</td>
                        <td class='letraTL espacioTL'>NOMBRE</td>
    					<td class='letraTL espacioTL'>PLACA</td>
    					<td class='letraTL espacioTL'>ESTADO</td>
    					<td class='letraTL espacioTL'>TIEMPO</td>
    					<td class='letraTL espacioTL'>TIPO VEHICULO</td>
    				</tr>
            </table>
           <div class="contenedor_escroL">
            <div id="datos"></div>
            </div>		
        </div>
    </section>
    <?php 

    ?>

    <script type="text/javascript" src="js/jquery.min.js"></script>    
    <script type="text/javascript" src="js/listado.js"></script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
</body>
</html>