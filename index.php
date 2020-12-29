<?php
session_start();

$_SESSION['Contador']=0;
$_SESSION['tipo_user']="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/principioIndex.css">
    <link rel="shortcut icon" href="icono/ic_ingresar.png">
    <title>PARQUEO OBRAJES</title>
</head>
<body>
    <div class="dee">
        <div >
        <a href="adm/Ingreso_adm.php" class="boto ingre">Iniciar como Administrador</a>
        <br>
        <br>
        <a href="usu/Ingreso_usu.php" class="boto ingre">Iniciar como Usuario</a>
    </div>
    </div>
    </div>
</body>
</html>