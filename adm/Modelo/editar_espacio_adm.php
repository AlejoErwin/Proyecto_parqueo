<?php

class Espacio{
    var $numeroEspacio;

    public function agregar(){
        if(!empty($_POST['agregar']) or $_SESSION['AceptE']=="Aceptar"){
        
            ?>
            <form action="" method="post">
                 <div class="overlay active" id="overlay">
                    <div class="popup" id="popup">
                        <a href="editar_espacio_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                            <center>
                            <div class="centreA">AGREGAR ESPACIO</div>
                            </center>
                            <div class="input_group radio " align="center">
                                <input type="radio" name="vehi" id="auto" value="1" required checked>
                                <label for="auto" class="letra">AUTO</label>
                                <input type="radio" name="vehi" id="moto" value="2" required >
                                <label for="moto" class="letra">MOTO</label>
                            </div>
                            <i class="espacioTARE textoRE">Elegir Espacio: </i><input class="textoRERESP" type="number"  name="NumEspacio" placeholder="Numero de Espacio" required autocomplete="off" min="1" value="1">
                            <br>
                            <br>
                            <div align="center">
                            <input type="submit" class="btn_confirma tamCSCC espacioS cursor" name="Aceptar" value="Salir">
                            <input type="submit" class="btn_confirma tamCSCC cursor" name="agregarEsp" value="Aceptar">
                            </div>          
                                <br>  
                    </div>
                </div>
                </form>
                <?php
        }
        if(!empty($_POST['agregarEsp']) ){
    
            $tipoV=$_POST['vehi'];
            $espacio="Espacio ".$_POST['NumEspacio'];
            $pa=mysql_query("SELECT a.Es FROM espacio a WHERE a.Espacio='$espacio' and a.Tipo_vehiculo_Tv='$tipoV'");
            $contR=0;
            while($row=mysql_fetch_array($pa)){
                $contR++;
            }
            if($contR==0){
                $contR=0;
                $pa=mysql_query("SELECT * FROM espacio");
                while($row=mysql_fetch_array($pa)){
                    $contR=$row['Es'];
                }
                $contR++;
                mysql_query("INSERT INTO `espacio` (`Es`, `Espacio`, `Tipo_vehiculo_Tv`, `Estado`) VALUES ($contR, '$espacio', '$tipoV', 'Disponible')");
    
                ?>
                <form action="" method="post">
                 <div class="overlay active" id="overlay">
                    <div class="popup" id="popup">
                        <a href="editar_espacio_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                            <center>
                            <div class="centreA">SE CREO EL ESPACIO CON EXITO!!!</div>
                            </center>
                            <br>
                            <div align="center">
                            <a href="editar_espacio_adm.php" class="btn_confirma taBT"><i class="tamCSCS"> Salir</i></a>
                            </div>          
                                <br>  
                    </div>
                </div>
                </form>
    
                <?php
                $_SESSION['AceptE']="";
            }
            else{
                ?>
                <form action="" method="post">
                 <div class="overlay active" id="overlay">
                    <div class="popup" id="popup">
                        <a href="editar_espacio_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                            <center>
                            <div class="centreA">SURGIO UN PROBLEMA!!!</div>
                            
                            <div class="centreA">INTENTE DE NUEVO</div>
                            </center>
                           <br>
                            <div align="center"> <input type="submit" class="btn_confirma espacioS cursor" name="" value="SI">
                            <input type="submit" class="btn_confirma cursor" name="Aceptar" value="NO">
                            </div>          
                                <br>  
                    </div>
                </div>
                </form>
                
                <?php
                $_SESSION['AceptE']="Aceptar";
            }
    
        }

    }
    public function Cambiar_estado(){
        $conta=0;
    $pa=mysql_query("SELECT * FROM espacio");
    while($row=mysql_fetch_array($pa)){
        $idd=$row['Es'];
        if(!empty($_POST[$idd])){
            $estadoE=$row['Estado'];
            $che="";
            $chek="";
            if($estadoE=="Disponible"){
                $che="checked";
            }
            else{
                if($estadoE=="Mantenimiento"){
                    $chek="checked";
                }
            }
            ?>
            <form action="" method="post">
             <div class="overlay active" id="overlay">
                <div class="popup" id="popup">
                    <a href="editar_espacio_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                        <center>
                        <div class="centreA">ESTAS SEGURO DE CAMBIAR EL ESTADO DE <?php echo (strtoupper($row['Espacio'])); ?>!!!</div>
                        </center><br>
                        <div class="input_group radio " align="center">
                            <input type="radio" name="estado" id="dis" value="Disponible" required <?php echo $che; ?>>
                            <label for="dis" class="letra">Disponible</label>
                            <input type="radio" name="estado" id="mant" value="Mantenimiento" required <?php echo $chek; ?>>
                            <label for="mant" class="letra">Mantenimiento</label>
                        </div>
                        <br>
                        <div align="center">
                        <a href="editar_espacio_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>
                        <input type="submit" class="btn_confirma tamCSCC cursor" name="<?php echo $idd."Espacio"; ?>" value="Aceptar">
                            
                        </div>          
                            <br>  
                </div>
            </div>
            </form>
            <?php
        }
    }
    if(!empty($_POST['Aceptar'])){
        $_SESSION['AceptE']="";
    }
    $pa=mysql_query("SELECT * FROM espacio");
    while($row=mysql_fetch_array($pa)){
        $idES=$row['Es']."Espacio";
        if(!empty($_POST[$idES])){
            $numeroEspacio=$row['Es'];
            $estEST=$_POST['estado'];
            mysql_query("UPDATE espacio SET Estado='$estEST'  WHERE Es='$numeroEspacio'");
            ?>
            <form action="" method="post">
             <div class="overlay active" id="overlay">
                <div class="popup" id="popup">
                    <a href="editar_espacio_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                        <center>
                        <div class="centreA">EL <?php echo (strtoupper($row['Espacio'])); ?> FUE CAMBIADO A <?php echo (strtoupper($estEST)); ?>!!!</div>
                        </center><br>
                        
                        <div align="center">
                        <a href="editar_espacio_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>
                            
                        </div>          
                            <br>  
                </div>
            </div>
            </form>
            <?php
        }
    }
    }
    public function Eliminar(){
        $pa=mysql_query("SELECT * FROM espacio");
        while($row=mysql_fetch_array($pa)){
            $idd=$row['Es']."Eliminar";
            if(!empty($_POST[$idd])){
    
                ?>
                <form action="" method="post">
                 <div class="overlay active" id="overlay">
                    <div class="popup" id="popup">
                        <a href="editar_espacio_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                            <center>
                            <div class="centreA">ESTAS SEGURO DE ELIMINAR AL <?php echo (strtoupper($row['Espacio'])); ?> DE <?php if($row['Tipo_vehiculo_Tv']==1){$val="Auto";}else {$val="Moto";} echo (strtoupper($val)); ?> !!!</div>
                            </center><br>
                            <div align="center">
                            <a href="editar_espacio_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>
                            <input type="submit" class="btn_confirma tamCSCC cursor" name="<?php echo $row['Es']."Elim"; ?>" value="Aceptar">
                                
                            </div>          
                                <br>  
                    </div>
                </div>
                </form>
                <?php
            }
        }
    
    
    
        $pa=mysql_query("SELECT * FROM espacio");
        while($row=mysql_fetch_array($pa)){
            $est=$row['Es']."Elim";
            if(!empty($_POST[$est])){
                $uu=$row['Es'];
                mysql_query("UPDATE espacio SET Estado='Eliminado'  WHERE Es='$uu'");
                ?>
                <form action="" method="post">
                 <div class="overlay active" id="overlay">
                    <div class="popup" id="popup">
                        <a href="editar_espacio_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                            <center>
                            <div class="centreA">EL ESPACIO FUE ELIMINADO CON EXITO!!!</div>
                            </center><br>
                            <div align="center">
                            <a href="editar_espacio_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>
                                
                            </div>          
                                <br>  
                    </div>
                </div>
                </form>
                <?php
            }
        }
    }


}
?>