<?php

class Empleado{
    public function Actualizar_Contrasena(){
        if(!empty($_POST['enviar1']) and !empty($_POST['cont']) and !empty($_POST['contN']) and !empty($_POST['contC'])){
            ?>
            
            <div class="overlay active" id="overlay">
 <div class="popup" id="popup">
     <a href="actualizar_cont_usu.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
            <?php
         $idUS=$_SESSION['idUs'];
         $pa=mysql_query("SELECT a.Nombre, a.Contrase
         FROM usuario a
         WHERE a.Us='$idUS'");
                 if($row=mysql_fetch_array($pa)){ 
                     $cont=$_POST['cont'];
                     $contN=$_POST['contN'];
                     $contC=$_POST['contC'];
                    $contra=$row['Contrase'];
                    if($cont!=$contN){
                        if($contra==$cont){
                            if($contN==$contC){
                             mysql_query("UPDATE usuario SET Contrase='$contN' WHERE Us='$idUS'");
                             ?>
                             <div class="centreA">CONTRASEÑA CAMBIADA CON EXITO!!!!</div>
                             <br>
                             <div align="center">
                                         <a href="ajuste_usu.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                     </div>
         
                             <?php
     
                            }else{
                             ?>
                         <div class="centreA">Debe de Confirmar Correctamente la Nueva Contraseña Digitada</div>
                         <br>
                         <div align="center">
                                     <a href="ajuste_usu.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                     <a href="actualizar_cont_usu.php" class="btn_confirma"><i class="tamCSC">Volver a Intentar</i></a>
                                 </div>
     
                         <?php
                            }
                        }
                        else{
                            ?>
                         <div class="centreA">La Contraseña Antigua Digitada no es Correcta, Vuelva a Intentarlo</div>
                         <br>
                         <div align="center">
                                     <a href="ajuste_usu.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                     <a href="actualizar_cont_usu.php" class="btn_confirma"><i class="tamCSC">Volver a Intentar</i></a>
                                 </div> 
                                 
                         <?php
                        }
                    }else{
                        ?>
                        <div class="centreA">La nueva contraseña no puede ser igual que la anterior</div>
                        <br>
                        <div align="center">
                                    <a href="ajuste_usu.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                    <a href="actualizar_cont_usu.php" class="btn_confirma"><i class="tamCSC">Volver a Intentar</i></a>
                                </div> 
                                
                        <?php 
                    }
 //   <a href="actualizar_cont_usu.php" id="btn-cerrar-popup" class="btn-cerrar-popup">cerrar</a>
        ?>
           <br><br>   
  
     </div>
 </div>
 </div>
         <?php
         }
        }
    }
    public function Actualizar_Informacion($idUS){
        if(!empty($_POST['enviar1'])){
            ?>
     
     <div class="overlay active" id="overlay">
    <div class="popup" id="popup">
        <a href="actualizar_inf_usu.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
               <?php
                $nomb=$_POST['nom'];
                $apel=$_POST['ape'];
                $celu=$_POST['cel'];
                $usua=$_POST['usu'];
                            mysql_query("UPDATE usuario SET Nombre='$nomb',Apellido='$apel',Usuario='$usua',Celular='$celu'  WHERE Us='$idUS'");
                            ?>
                            <br>
                            <center>
                            <div class="centreA">INFORMACION CAMBIADA CON EXITO!!!</div>
                            </center>
                            <br>
                            <div align="center">
                                        <a href="ajuste_usu.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                    </div>
                                    
        
                           
              <br>  
     
        </div>
    </div>
    </div>
            <?php
            }
    }
    public function Ingresar(){
        ?>
        <div class="container">
            <div class="form_top">
                <center>
                
                    <h2>PARQUEO OBRAJES</h2>
                    <h2>INGRESO DE USUARIO</h2>
                </center>
                    <h6>Bienvenido de nuevo. Por favor introduzca su Usuario y Contraseña</h6>
            </div>		
            <form class="form_reg" action="" method="post">
        <?php
        if(!empty($_POST['usu']) and !empty($_POST['con'])){ 
            $usu=limpiar($_POST['usu']);
            $con=limpiar($_POST['con']);
            $pa=mysql_query("SELECT * FROM usuario WHERE Usuario='$usu' and Contrase='$con'");
            if($row=mysql_fetch_array($pa)){
                if($row['Estado']=='Activo'){
                    $nombre=$row['Nombre'];
                    $nombre=explode(" ", $nombre);
                    $nombre=$nombre[0];
                    $_SESSION['user_name']=$nombre;
                    $_SESSION['user_ape']=$row['Apellido'];
                    $_SESSION['tipo_user']='usuario';
                    $_SESSION['idUs']=$row['Us'];
                    $_SESSION['Contador']=0;
                    ?>
                    <div class="contened">
                    <div class="letraBien"> Bienvenido!!!<br><?php echo $row['Nombre']," ",$row['Apellido']; ?><br> </div>
                    <center><img src="../img/ajax-loader.gif"  width="70" height="70"></center><br>
                    
                    <meta http-equiv="refresh" content="4;url=Controlador/inicio_usu.php">
                    </div>
                    <?php
                }else{
                    printf ("<div class='contenedNOP'><br><div class='letraBien'>Usted no se encuentra Activo<br>Consulte con su Administrador</div><br><center>
                    <a href='Ingreso_usu.php'><div class='btn_submit'>Volver a Intentar</div></a></center>
                    </div>");	
                    $_SESSION['Contador']=0;
                }	
            }
            else{
                printf ("<div class='contened'><br><div class='letraBien'>No es correcto</div><br><center>
                <a href='Ingreso_usu.php'><div class='btn_submit'>Volver a Intentar</div></a></center><br>
                </div>");
                $_SESSION['Contador']++;	
                
            }
        }
        else{
        ?>
        <br>
        <input class="input" name="usu" type="text" placeholder="Usuario" autocomplete="off" required>
        <input class="input" name="con" type="password" placeholder="Contraseña" autocomplete="off" required>
        <br><br>
        <div class="btn_form" align="center">
            <input class="btn_submit cursor" type="submit" value="Iniciar Sesión">
        </div>
        <?php
        }

        if($_SESSION['Contador']==3){
            ?>
            <meta http-equiv="refresh" content="0;url=../index.php">
            <?php
        }

        ?>
        </form>
        </div>

        <?php
    }
}

?>