<?php
class Tarifa{
    var $fechaAct;
    var $MontoNuevo;



    public function Actualizar(){
    $pa=mysql_query("SELECT * FROM tarifa");
    while($row=mysql_fetch_array($pa)){
        $idd=$row['Ta'];
        if(!empty($_POST[$idd])){
            $Tiempo=$row['Periodo'];
            $Monto=$row['Monto'];
            $vehiculo=$row['Tipo_vahiculo_Tv'];
            if($vehiculo==1){
                $vehi="Auto";
            }
            else{
                if($vehiculo==2){
                    $vehi="Moto";
                }
            }
            ?>
            <form action="" method="post">
             <div class="overlay active" id="overlay">
                <div class="popup" id="popup">
                    <a href="modificar_tarifa_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                        <center>
                        <div class="centreA">CAMBIAR DATOS DEL VEHICULO <?php echo (strtoupper($vehi)); ?>!!!</div>
                        <i class="letraV espacioTARI">Tiempo:</i><i class="espacioTA textoRE"><?php echo $Tiempo; ?></i><i  class="letraV espacioTARI">Precio:</i> <input class="textoRER" type="number" value="<?php echo $Monto; ?>" name="monto" placeholder="Monto" required autocomplete="off">
                        </center><br>
                        <div align="center">
                        <a href="modificar_tarifa_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>
                        <input type="submit" class="btn_confirma tamCSCC cursor" name="<?php echo $idd.";Cambiar"; ?>" value="Aceptar">
                            
                        </div>          
                            <br>  
                </div>
            </div>
            </form>
            <?php
        }
    }

    $pa=mysql_query("SELECT * FROM tarifa");
    while($row=mysql_fetch_array($pa)){
        $idd=$row['Ta'].";Cambiar";
        if(!empty($_POST[$idd])){
            $MontoNuevo=$_POST['monto'];
            $idd=$row['Ta'];
            $hora=date('H').':'.date('i');
            $fecha=date("Y")."-".date("m")."-".date("d");
            $fechaAct=$fecha.' '.$hora;
            mysql_query("UPDATE tarifa SET Monto='$MontoNuevo', Fecha_Can='$fechaAct'  WHERE Ta='$idd'");
            ?>
            <form action="" method="post">
             <div class="overlay active" id="overlay">
                <div class="popup" id="popup">
                    <a href="modificar_tarifa_adm.php" id="btn-cerraropup" class="btn-cerrar-popup">X</a><br>
                        <center>
                        <div class="centreA">EL MONTO CAMBIADO CON EXITO!!!</div>
                        </center><br>
                        <div align="center">
                        <a href="modificar_tarifa_adm.php" class="btn_confirma espacioS taBT"><i class="tamCSCS"> Salir</i></a>
                            
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