<?php
class Empleado{
    var $apellido;
    var $Nombre;
    var $Celular;
    var $contraseña;
    var $Usuario;


    
public function agregar(){
    if(!empty($_POST['nom']) and !empty($_POST['ape']) and !empty($_POST['usu']) and !empty($_POST['cel']) and !empty($_POST['con']) and !empty($_POST['conC'])){
        $nombre=$_POST['nom'];  $apellido=$_POST['ape'];
        $usuario=$_POST['usu'];
        $celular=$_POST['cel'];
        $contrase=$_POST['con'];
        $contraseC=$_POST['conC'];

        ?>
            <div class="overlay active" id="overlay">
            <div class="popup" id="popup">
                <a href="agregar_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
                    <?php


        if($contrase==$contraseC){
                    mysql_query("INSERT INTO usuario (Us, Nombre, Apellido, Usuario, Contrase, Celular,Estado) 
                                VALUES (NULL,'$nombre','$apellido','$usuario','$contrase','$celular','Activo')");

           
                    ?>
                        <br>
                        <center>
                        <div class="centreA">EL USUARIO FUE CREADO CON EXITO!!!</div>
                        </center>
                    <br>
                    <div align="center">
                                <a href="agregar_adm.php" class="btn_confirma"><i class="tamCC">Aceptar</i></a>
                            </div>          
                                <br>  
 
                        </div>
        <?php
         $_SESSION['codi']=NULL;
                    }
                    else{
                        ?>
                        <br>
                        <center>
                        <div class="centreA">Debe de Confirmar Correctamente la Nueva Contraseña Digitada</div>
                        </center>
                            <br>
                            <div align="center">
                                <a href="inicio_adm.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                <a href="agregar_adm.php" class="btn_confirma"><i class="tamCSC">Volver a Intentar</i></a>
                            </div>          
                            <br>  
 
                        </div>
           
                        <?php

                    }

    }
}



    public function Eliminar(){
        $conta=0;
    $pa=mysql_query("SELECT * FROM usuario");
    while($row=mysql_fetch_array($pa)){
        $idd=$row['Us'];
        if(!empty($_POST[$idd])){
            ?>
            <form action="" method="post">
             <div class="overlay active" id="overlay">
                <div class="popup" id="popup">
                    <a href="editar_inf_emp_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                        <center>
                        <div class="centreA">ESTAS SEGURO DE ELIMINAR AL USUARIO <?php echo (strtoupper($row['Usuario'])); ?>!!!</div>
                        </center><br>
                        <div align="center">
                        <a href="editar_inf_emp_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>
                        <input type="submit" class="btn_confirma tamCSCC cursor" name="<?php echo $row['Usuario']; ?>" value="Aceptar">
                            
                        </div>          
                            <br>  
                </div>
            </div>
            </form>
            <?php
        }
    }
    $pa=mysql_query("SELECT * FROM usuario");
    while($row=mysql_fetch_array($pa)){
        $usuario=$row['Usuario'];
        if(!empty($_POST[$usuario])){
            mysql_query("UPDATE Usuario SET Estado='Eliminado'  WHERE Usuario='$usuario'");
            ?>
            <form action="" method="post">
             <div class="overlay active" id="overlay">
                <div class="popup" id="popup">
                    <a href="editar_inf_emp_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                        <center>
                        <div class="centreA">EL USUARIO FUE ELIMINADO CON EXITO!!!</div>
                        </center><br>
                        <div align="center">
                        <a href="editar_inf_emp_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>      
                        </div>          
                            <br>  
                </div>
            </div>
            </form>
            <?php
        }
    }
    }
    public function Actualizar(){
    $paE=mysql_query("SELECT * FROM usuario");
    while($woE=mysql_fetch_array($paE)){
        $usua=$woE['Us']."Editar";
        if(!empty($_POST[$usua])){
            ?>
            <form action="" method="post">
             <div class="overlay active" id="overlay">
                <div class="popup" id="popup">
                    <a href="editar_inf_emp_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                        <center>
                        <div class="centreA">ESTAS SEGURO DE EDITAR AL USUARIO <?php echo (strtoupper($woE['Usuario'])); ?>?</div>
                        </center><br>
                        <div align="center">
                        <a href="editar_inf_emp_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>
                        <input type="submit" class="btn_confirma tamCSCC cursor" name="<?php echo $woE['Us']."EditarC"; ?>" value="Aceptar">
                            
                        </div>          
                            <br>  
                </div>
            </div>
            </form>
            <?php
        }
    }
    $conta=0;
    $pa=mysql_query("SELECT * FROM usuario");
    while($row=mysql_fetch_array($pa)){
        $idd=$row['Us']."EditarC";
        if(!empty($_POST[$idd])){
            $idUS=$row['Us'];
            ?>
            <form action="" method="post">
             <div class="overlay active" id="overlay">
                    <a href="editar_inf_emp_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                    <center>
        <div class="contenedor_A">
            <div class="con_tam con_tam_A">
                <center>
                    ACTUALIZAR TU INFORMACION
                    <br>
                    PERSONAL
                    <br>
                    <img src="../../icono/ic_usuario.png">
                </center>
            </div>
                    <?php
                        $pe=mysql_query("SELECT a.Nombre, a.Apellido, a.Usuario, a.Celular
                        FROM Usuario a
                        WHERE a.Us='$idUS'");
                        while($row=mysql_fetch_array($pe)){
                            $Nombre=$row['Nombre'];
                            $Apellido=$row['Apellido'];
                            $Usuario=$row['Usuario'];
                            $Celular=$row['Celular'];
                        }
                    ?>
            <form class="form_reg_act_A" action="" method="post">
                <h3 align="left" class="tam_A tam_BB">Nombre: </h3>
                <input class="input_A tam_B" type="text" placeholder="Nombre" name="nom" required value="<?php echo $Nombre; ?>" autocomplete="off">
                <h3 align="left" class="tam_A tam_BB">Apellido: </h3>
                <input class="input_A tam_B" type="text" placeholder="Apellido" name="ape" required value="<?php echo $Apellido; ?>" autocomplete="off">
                <h3 align="left" class="tam_A tam_BB">Usuario: </h3>
                <input class="input_A tam_B" type="text" placeholder="Nombre de Usuario" name="usu" required value="<?php echo $Usuario; ?>" autocomplete="off">
                <h3 align="left" class="tam_A tam_BB">Celular: </h3>
                <input class="input_A tam_B" type="number" placeholder="Celular" name="cel" required value="<?php echo $Celular; ?>" autocomplete="off">
                <br>
                <br>
                <div align="center">
                <a href="editar_inf_emp_adm.php" class=" tam_BBB espacioS tammBbB"><i class=" tambB"> Salir</i></a>
                    <input class="btn_submit_bot tam_BBB cursor" name="<?php echo $idUS.'enviar1'; ?>" type="submit" value="Guardar Cambios">
                </div>
            </form>
        </div>
        </center>          
            <br>  
            </div>
            </form>
            <?php
        }
    }
    ?>
 <?php
    $pat=mysql_query("SELECT * FROM usuario");
    while($rowt=mysql_fetch_array($pat)){
        $idUU=$rowt['Us'].'enviar1';
    if(!empty($_POST[$idUU])){
        ?>
 <div class="overlay active" id="overlay">
<div class="popup" id="popup">
    <a href="editar_inf_emp_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
    <br>
                        <center>
           <?php
            $nomb=$_POST['nom'];
            $apel=$_POST['ape'];
            $celu=$_POST['cel'];
            $usua=$_POST['usu'];
            if($usua==$rowt['Usuario']){
                ?>
                <div class="centreA">EL USUARIO YA EXISTE O NO SE CAMBIO!!!</div>
                <?php
            }
            else{
                mysql_query("UPDATE Usuario SET Nombre='$nomb',Apellido='$apel',Usuario='$usua',Celular='$celu'  WHERE Us='$idUU'");
                 ?>
                 <div class="centreA">INFORMACION CAMBIADA CON EXITO!!!</div>
                 <?php       
            }
                        ?>
                        </center>
                        <br>
                        <div align="center">
                                    <a href="editar_inf_emp_adm.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                    </div><br>  
                </div>
            </div>
        </div>
    <?php
            }
        }
    }
    public function Cambiar_Estado(){ 
        $conta=0;
        $pa=mysql_query("SELECT * FROM usuario");
        while($row=mysql_fetch_array($pa)){
            $idd=$row['Us']."Cambiar";
            if(!empty($_POST[$idd])){
                $ide=$row['Us'];
                $estadoE=$row['Estado'];
                $che="";
                $chek="";
                if($estadoE=="Activo"){
                    $che="checked";
                }
                else{
                    if($estadoE=="No Activo"){
                        $chek="checked";
                    }
                }
                ?>
                <form action="" method="post">
                 <div class="overlay active" id="overlay">
                    <div class="popup" id="popup">
                        <a href="editar_inf_emp_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                            <center>
                            <div class="centreA">ESTAS SEGURO DE CAMBIAR EL ESTADO DE USUARIO <?php echo (strtoupper($row['Usuario'])); ?>!!!</div>
                            </center><br>
                            <div class="input_group radio " align="center">
                                <input type="radio" name="estado" id="act" value="Activo" required <?php echo $che; ?>>
                                <label for="act" class="letra">Activo</label>
                                <input type="radio" name="estado" id="Noact" value="No Activo" required <?php echo $chek; ?>>
                                <label for="Noact" class="letra">No Activo</label>
                            </div><br>
                            <div align="center">
                            <a href="editar_inf_emp_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>
                            <input type="submit" class="btn_confirma tamCSCC cursor" name="<?php echo $ide."Estado"; ?>" value="Aceptar">
                            </div><br>  
                    </div>
                </div>
                </form>
                <?php
            }
        }
        $pa=mysql_query("SELECT * FROM usuario");
        while($row=mysql_fetch_array($pa)){
            $ides=$row['Us']."Estado";
            if(!empty($_POST[$ides])){
                $id=$row['Us'];
                $estado=$_POST['estado'];
                mysql_query("UPDATE Usuario SET Estado='$estado'  WHERE Us='$id'");
                ?>
                <form action="" method="post">
                 <div class="overlay active" id="overlay">
                    <div class="popup" id="popup">
                        <a href="editar_inf_emp_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                            <center>
                            <div class="centreA">EL USUARIO FUE CAMBIADO DE ESTADO A <br><?php echo (strtoupper($estado)); ?>!!!</div>
                            </center><br>
                            <div align="center">
                            <a href="editar_inf_emp_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>
                            </div><br>  
                    </div>
                </div>
                </form>
                <?php
            }
        }
    }

    //private function Ingresar(){

    //}
}
?>