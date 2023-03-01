<?php require_once('conexion.php');
?>

            <div class="row mb-5">


                <div class="col-lg-6 mb-lg-0 mb-4" ">
                     <div id="venntanaChat" style="width: 400px; height: 300px; overflow: auto; ">
                            
                    <h2>En Linea</h2>
                    <br>
                    <div class="person">
                   
                    <?php

                    $conect = "conectado";
                    $idClase=$_SESSION['sessionIdClaseChat'];


                   // $consulta = "SELECT status,imagen,user,ci FROM usuario WHERE status='$conect'" or die("Error en la consulta" . mysqli_error($link));

                   // $resultado = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");

                

                     
                     $consultaz = "SELECT * FROM profesor_has_clases WHERE idClase='$idClase'" or die("Error en la consulta" . mysqli_error($link));


                     $resultadoz = $conection ->query ($consultaz);
                     $datoz = $resultadoz ->fetch_assoc();
                     $cedulado= $datoz['ci'];

                     $consultaz = "SELECT status,imagen,user,ci FROM usuario WHERE status='$conect' AND ci='$cedulado'" or die("Error en la consulta" . mysqli_error($link));

                          $resultado3 = $conection ->query ($consultaz);


                          $rows3 = $resultado3 ->num_rows;

                        if($rows3>0){

                          $datos3 = $resultado3 ->fetch_assoc();


                          if($datos3['imagen']!=NULL){

                        $foto = $datos3['imagen'];
                  
                        echo "<img src='$foto' alt='Image' class='img-fluid' style='width: 40px; height: 40px;'>";
                        }

                       else{
                         ?>
                            <img src="images/user.jpg" alt="Image" class="img-fluid" style='width: 45px; height: 45px;'>
                        <?php 
                         }

                         echo $datos3['user'];
                         ?>
                         <br><br>
                         <?php 
                     }



                       
                      $consulta2 = "SELECT * FROM alumno_has_clases WHERE idClase='$idClase'" or die("Error en la consulta" . mysqli_error($link));
                     $resultado2 = mysqli_query($conection,$consulta2) or die ("Hay algo mal en la tabla");


                    while ($columna2 = mysqli_fetch_array($resultado2)){

                        $cedula = $columna2['ci'];

                         $consulta = "SELECT status,imagen,user,ci FROM usuario WHERE status='$conect' AND ci='$cedula'" or die("Error en la consulta" . mysqli_error($link));

                          $resultado = $conection ->query ($consulta);
                         

                          $rows = $resultado ->num_rows;

                        if($rows>0){


                          $datos = $resultado ->fetch_assoc();


                        if($datos['imagen']!=NULL && $datos['user']!=NULL){

                        $foto = $datos['imagen'];
                  
                        echo "<img src='$foto' alt='Image' class='img-fluid' style='width: 40px; height: 40px;'>";
                        }

                       else{
                         ?>
                            <img src="images/user.jpg" alt="Image" class="img-fluid" style='width: 45px; height: 45px;'>
                        <?php 
                         }

                         echo $datos['user'];
                         ?>
                         <br><br>
                         <?php 
                         }
                     }

                        ?>
             
            </div>
                </div>
                </div>


                <h2>Chat</h2>
               

                <div class="col-lg-5 ml-auto align-self-center" >
                 <div id="ventanaChat" style="width: 400px; height: 300px; overflow: auto; border:1px solid turquoise; border-radius: 22px 22px 22px 22px; ">



                    <?php


                    $comienzo;
                    $final;
                    $cont;
                    $idClase=$_SESSION['sessionIdClaseChat'];

                    $total=0;


                     $archivo= "log/".$idClase.".html";
                     $total = count(file($archivo));
                     $total=$total/2;

                   

                
                     if(isset($_GET['pag'])){
                         $pag =$_GET['pag'];
                         
                         $cont = $pag;

                         if($pag>1){
                            if(   ($total-($pag*5)) >=  0 ){
                                $comienzo=($total-($pag*5));
                                $final=$comienzo+5;
                            }

                            else{
                                $comienzo=0;
                                $final=5
                                ?>
                                 <?php
                            }

                         }
                     }

                     else{
                         if($total>5){
                            $comienzo = $total-5;
                            $final = $total;
                             }


                        else{
                              $comienzo = 0;
                              $final = $total;
                            }

                             ?>
                             
                            <?php
                            $cont=1;
                     }

                     if($total>5 && $comienzo!=0){
                        $num=$cont+1;
                        ?>
                        
                         &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <?php

                        echo "<a class='col-lg-6 mb-lg-0 mb-4' href='chat2.php?pag=$num'>Más Mensajes</a> ";
                    }

                    

                     if($total>0){
                        $archivo =fopen("log/".$idClase.'.html', "r");
                        $contador = 0;


                        while(!feof($archivo))
                       {
                          $contador++;

                            if($contador>$comienzo && $contador<=$final){
                                $n = fgets($archivo);
                                $m= fgets($archivo);
                            
                            ?>

                           <div style=" background-color: #c616e469; color: black; border-radius: 2px; padding: 1px; margin-bottom: 1%;">
                          <p>

                            <h6 ><?php echo " ". $n; ?> :
                            <?php echo $m; ?></h6>
                                 </p>
                         </div>
                                

                        <?php
                            }
                            else{
                            fgets($archivo); 
                            fgets($archivo);     
                            }                  

                        }

                        fclose($archivo);
                     }


                      if($final<$total){

                     ?>
                    
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <?php
                        $num = $cont-1;
                        
                        if($num>1){
                        echo "<a class='col-lg-6 mb-lg-0 mb-4' href='chat2.php?pag=$num'>Más Mensajes</a> ";
                        }
                        else{
                            echo "<a class='col-lg-6 mb-lg-0 mb-4' href='chat2.php'>Más Mensajes</a> ";
                        }

                    }

                     ?>

                     </meta>

     
                        </div>

                       


                         

                        </div>
                        
                        </form>
                 

            </div>
            </div>
