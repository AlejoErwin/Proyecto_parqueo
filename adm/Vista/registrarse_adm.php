<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="../css/ingreso.css">
    
    <link rel="stylesheet" href="../css/principio.css">
    <link rel="stylesheet" href="../css/ventanas.css">
    <link rel="shortcut icon" href="../../icono/ic_retirar.png">
    <title>Principal</title>

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

    <?php
    if(!empty($_POST['cod'])){
        $cod=$_POST['cod'];
        $_SESSION['codi']=$cod;
    }
        
        $codigo=$_SESSION['codi'];
        $pa=mysql_query("SELECT * FROM codigo WHERE Codigo='$codigo'");
        if($row=mysql_fetch_array($pa)){

        
    ?>
    <div class="container_re">
            <div class="form_top_re">
                <center>
                    <h2>PARQUEO OBRAJES</h2>
                </center>
                    <h6>Bienvenido de nuevo. Por favor introduzca su Usuario y Contraseña</h6>
            </div>	
           
            <form class="form_reg" action="" method="post">
                
                <div class="form_rege">
                <input class="input_re espas tamA" type="text" name="nom" placeholder="Nombre" required autocomplete="off">
                <input class="input_re tamA" type="text" name="ape" placeholder="Apellido" required autocomplete="off">
                </div>
                <div class="form_reg_re_R">
                <input class="input_re tam" type="text" id="usuari" name="usu" placeholder="Nombre de Usuario" required autocomplete="off">
                <div id="resultado"></div>
                <input class="input_re tam" type="number" id="enviaa" name="cel" placeholder="Celular" required autocomplete="off">
                <input class="input_re tam" type="password" name="con" placeholder="Contraseña" required autocomplete="off">
                <input class="input_re tam" type="password" name="conf" placeholder="Confirmar Contraseña" required autocomplete="off">
                <br>
                <br>
                </div>
                <div class="btn_form" align="center">
                    <input class="btn_submit cursor" type="submit" value="Registrar">
                    <br>
                    <a href="Ingreso_adm.php"><div class="contexto">¿Ya tienes una cuenta? Iniciar Sesion</div></a>
                </div>
            
            </form>

        </div>

        <?php
        }
        else{
        ?>
            <div class="container">
            <div class="form_top">
                <center>
                    <h2>CODIGO DE SEGURIDAD</h2>
                
                    <h6>Ingrese un codigo de seguridad</h6>
                </center>
            </div>		
            <form class="form_reg" action="" method="post">
                <br>
                <input class="input" type="text" name="cod" placeholder="codigo" required autocomplete="off">
                <br><br>
                <div class="btn_form" align="center">
                    <input class="btn_submit espacio cursor" name="env" type="submit" value="Ingresar">
                    
                    <a href="Ingreso_adm.php"><div class="btn_submit registrarse">Volver</div></a>
                </div>
            </form>
    </div>


        <?php
        }


        ?>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
<script src="js/confir.js"></script>
</body>
</html>