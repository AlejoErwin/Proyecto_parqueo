<?php

class Propietario{
    var $nombre;
    var $celular;
    var $contra;
    var $usuario;
    var $apellido;


    public function Actualizar_Contrasena(){
        if(!empty($_POST['enviar1']) and !empty($_POST['cont']) and !empty($_POST['contN']) and !empty($_POST['contC'])){
            ?>
            <div class="overlay active" id="overlay">
 <div class="popup" id="popup">
     <a href="actualizar_cont_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
            <?php
         $idUS=$_SESSION['idAd'];
         $pa=mysql_query("SELECT a.Nombre, a.Contrase
         FROM Administrador a
         WHERE a.Ad='$idUS'");
                 if($row=mysql_fetch_array($pa)){ 
                     $cont=$_POST['cont'];
                     $contN=$_POST['contN'];
                     $contC=$_POST['contC'];
                    $contra=$row['Contrase'];
                    if($contra==$cont){
                        if($contN==$contC){
                         mysql_query("UPDATE Administrador SET Contrase='$contN' WHERE Ad='$idUS'");
                         ?>
                         <div class="centreA">CONTRASEÑA CAMBIADA CON EXITO!!!!</div>
                         <br>
                         <div align="center">
                                     <a href="ajuste_adm.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                 </div>
                         <?php
                        }else{
                         ?>
                     <div class="centreA">Debe de Confirmar Correctamente la Nueva Contraseña Digitada</div>
                     <br>
                     <div align="center">
                                 <a href="ajuste_adm.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                 <a href="actualizar_cont_adm.php" class="btn_confirma"><i class="tamCSC">Volver a Intentar</i></a>
                             </div>
 
                     <?php
                        }
                    }
                    else{
                        ?>
                     <div class="centreA">La Contraseña Antigua Digitada no es Correcta, Vuelva a Intentarlo</div>
                     <br>
                     <div align="center">
                                 <a href="ajuste_adm.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                 <a href="actualizar_cont_adm.php" class="btn_confirma"><i class="tamCSC">Volver a Intentar</i></a>
                             </div> 
                             
                     <?php } ?>
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
        <a href="actualizar_inf_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
               <?php
                $nomb=$_POST['nom'];
                $apel=$_POST['ape'];
                $celu=$_POST['cel'];
                $usua=$_POST['usu'];
                            mysql_query("UPDATE Administrador SET Nombre='$nomb',Apellido='$apel',Usuario='$usua',Celular='$celu'  WHERE Ad='$idUS'");
                            ?>
                            <br>
                            <center>
                            <div class="centreA">INFORMACION CAMBIADA CON EXITO!!!</div>
                            </center>
                            <br>
                            <div align="center">
                                <a href="ajuste_adm.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
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
                    <h2>INGRESO ADMINISTADOR</h2>
                </center>
                    <h6>Bienvenido de nuevo. Por favor introduzca su Usuario y Contraseña</h6>
            </div>		
            <br>
            <form class="form_reg" action="" method="post">
                

                <?php 
                    
                    $_SESSION['codi']=NULL;
	  	            if(!empty($_POST['adm']) and !empty($_POST['con'])){ 
			        $usu=limpiar($_POST['adm']);
                    $con=limpiar($_POST['con']);
                    $pa=mysql_query("SELECT * FROM administrador WHERE Usuario='$usu' and Contrase='$con'");
                    if($row=mysql_fetch_array($pa)){
                            $nombre=$row['Nombre'];
                            $nombre=explode(" ", $nombre);
                            $nombre=$nombre[0];
                            $_SESSION['adm_name']=$nombre;
                            $_SESSION['adm_ape']=$row['Apellido'];
                            $_SESSION['tipo_user']='administrador';
                            $_SESSION['idAd']=$row['Ad'];
                            $_SESSION['AceptE']="";
                            $_SESSION['Contador']=0;
                            ?>
                            <div class="contened">
                            <div class="letraBien"> Bienvenido!!!<br><?php echo $row['Nombre']," ",$row['Apellido']; ?><br> </div>
                            <center><img src="../img/ajax-loader.gif"  width="70" height="70"></center><br>
                            <meta http-equiv="refresh" content="4;url=Controlador/inicio_adm.php">
                            </div>
                            <?php
                       	
                    }
                    else{
                        printf ("<div class='contened'><br><div class='letraBien'>No es correcto</div><br><br><center>
                        <a href='Ingreso_adm.php'><div class='btn_submit'>Volver a Intentar</div></a></center></div><br>");	
                        $_SESSION['Contador']++;
                    }
                }
                else{
                    ?>
                <input class="input" type="text" name="adm" placeholder="Usuario" required>
                <input class="input" type="password"  name="con" placeholder="Contraseña" required>
                <br><br>
                <div class="btn_form" align="center">
                    <input class="btn_submit espacio cursor" type="submit" value="Iniciar Sesión">
                    <a href="registrarse_adm.php"><div class="btn_submit registrarse">Registrarse</div></a>
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

    public function Agregar(){
        
        


        if(!empty($_POST['nom']) and !empty($_POST['ape']) and !empty($_POST['usu']) and !empty($_POST['cel']) and !empty($_POST['con']) and !empty($_POST['conf'])){
            
            ?>
            <div class="overlay active" id="overlay">
            <div class="popup" id="popup">
                <a href="registrarse_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a>
                    <?php
           
            $contador=0;
            $pa=mysql_query("SELECT * FROM administrador");
            while($row=mysql_fetch_array($pa)){
                $contador++;
            }
            if($contador<=5){
                $nombre=$_POST['nom'];
                $apellido=$_POST['ape'];
                $usuario=$_POST['usu'];
                $celular=$_POST['cel'];
                $contraN=$_POST['con'];
                $contraF=$_POST['conf'];
                $contado=0;
                $pa=mysql_query("SELECT * FROM administrador a WHERE a.Usuario='$usuario'");
                while($row=mysql_fetch_array($pa)){
                    $contado++;
                }
                if($contado==0){   
                    if($contraF==$contraN){
                        
                    mysql_query("INSERT INTO `administrador` (`Ad`, `Nombre`, `Apellido`, `Usuario`, `Contrase`, `Celular`) 
                                    VALUES (NULL, '$nombre', '$apellido', '$usuario', '$contraF', '$celular');");

           
                    ?>
                        <br>
                        <center>
                        <div class="centreA">EL ADMINISTRADOR FUE CREADO CON EXITO!!!</div>
                        
                        </center>
                    <br>
                    <div align="center">
                                <a href="Ingreso_adm.php" class="btn_confirma"><i class="tamCC"> Salir</i></a>
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
                                <a href="Ingreso_adm.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                <a href="registrarse_adm.php" class="btn_confirma"><i class="tamCSC">Volver a Intentar</i></a>
                            </div>          
                            <br>  
 
                        </div>
           
                        <?php

                    }
                }
                else{
                    ?>
                        <br>
                        <center>
                        <div class="centreA">EL USUARIO YA FUE  CREADO!!!</div>
                        </center>
                            <br>
                            <div align="center">
                                <a href="Ingreso_adm.php" class="btn_confirma espacioS"><i class="tamCC"> Salir</i></a>
                                <a href="registrarse_adm.php" class="btn_confirma"><i class="tamCSC">Volver a Intentar</i></a>
                            </div>          
                            <br>  
 
                        </div>
           
        <?php
                }



               


            }
            else{
                ?>
                <div class="centreA">Ya no puedes registrar mas usuarios</div>
                    <br>
                    <div align="center">
                                <a href="Ingreso_adm.php" class="btn_confirma"><i class="tamCC"> Salir</i></a>
                            </div> 
                <?php

            }
        }
    }
}
?>