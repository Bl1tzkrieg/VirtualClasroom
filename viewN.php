<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Detalles De la Asignacion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=900px"/>

 <!-- <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet"> -->
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <?php 
  if($_SESSION['sessionRango']=="estudiante"){
      include 'menu2.php';
    }

    if($_SESSION['sessionRango']=="profesor"){
      include 'menu3.php';
    }
    if ($_SESSION['sessionRango']==NULL) {
     header ("Location: index.php"); 
    }
  ?>


  <?php
    if(isset($_GET['asignatura'])){
     $VA6=NULL; 
     $VA1 =$_GET['clase'];
     $VA2 =$_GET['evaluacion'];
     $VA3 =$_GET['asignatura'];
     $VA4 =$_GET['c'];
     $VA5 =$_GET['ubica'];
     if(isset($_GET['calificada'])){
     $VA6 =$_GET['calificada'];
    }

     $_SESSION['sessionClase'] = $VA1;
     $_SESSION['sessionEvaluacion'] = $VA2;
     }

     ?>

  <div class="site-section ftco-subscribe-1 site-blocks-cover pb-7" style="background-image: url('images/registro.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Asignacion</h2>
              <p>Aqui Puedes observar los detalles de la asignacion</p>
            </div>
          </div>
        </div>
      </div> 
     
      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <div class="container">
        <a href="userEstudiante.php">Home</a>
       <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Detalles de la Asignacion</span>
      </div>
    </div>
  </div>

    <div class="site-section">
       
        <div class="container">
            <div class="row">
                <div class="col-12">

                  <?php
                            $consulta = "SELECT * FROM tarea WHERE idClase='$VA1' AND idEvaluacion='$VA2'" or die("Error en la consulta" . mysqli_error($link));

                            $sql = $conection ->query ($consulta);
                            $datos = $sql ->fetch_assoc();
                            ?>
                    

            	<div class="row mb-6 justify-content-center text-center">
                            <h2 class="section-title-underline mb-5">
                              <?php
                              $aux= $datos['titulo'];
                               echo "<span>$aux</span>";
                               ?>
                              </h2>
							</div>




        <div class="container">
            <div class="row justify-content-center">
             <div class="col-md-9 mb-4">                 
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-9 mb-4">
                        <h4 class="section-title-underline mb-1">
                               <span>Descripción:</span>
                              </h4>
                    </div>
            </div>
           </div>      
          </div>
        </div>
    </div>            



        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 mb-4">
                              <div id="venntanaChat" style="overflow: auto;">
                              <?php
                                if($datos['ruta']!=NULL){
                                  $rutas=$datos['ruta'];
                                  echo "<td align='center'>" . "<a href='$rutas' ><span class='icon-download'></span> Descargar Material </a>" . "</td>" ; echo "<p></p>";
                                }
                              ?>
                              <?php
								echo str_replace("\r","<br>",$datos['descripcion']);
                              ?>
                          </div>
             </div>
            </div>
        </div>              
 

                </div>


           	<div class="col-12">
      


                    <div class="container">
            <div class="row justify-content-center">
             <div class="col-md-9 mb-4">                 
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-9 mb-4">
                    		<h4 class="section-title-underline mb-1">
                               <span>Respuesta:</span>
                              </h4>

            </div>
            </div>
           </div>      
          </div>
        </div>
    </div>                

                          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 mb-4">

                       <div id="venntanaChat" style="overflow: auto;">                       
				            <?php

				            $consulta = "SELECT * FROM nota WHERE ci='$VA4' AND idClase = '$VA1' AND idEvaluacion = '$VA2'" or die("Hay un error de conexion");
				             $sql = $conection -> query ($consulta);

				             $row = $sql ->num_rows;

				             if($row>0){
				               $notas =  $sql -> fetch_assoc();
				               if($notas['respuesta']!= NULL && $notas['ruta']==NULL){

								echo str_replace("\r","<br>",$notas['respuesta']);
				               }

				               else if($notas['respuesta']== NULL && $notas['ruta']!=NULL){
				                $vinculado= $notas['ruta'];
				                echo "<td align='center'>" . "<a href='$vinculado'  ><span class='icon-download'></span> Descargar material de Respuesta </a>" . "</td>" ;
				               }

				               else{                           
				                $vinculado= $notas['ruta'];
				                echo "<td align='center'>" . "<a href='$vinculado'  ><span class='icon-download'></span> Descargar material de Respuesta </a>" . "</td>" ;echo "<p></p>";
								echo str_replace("\r","<br>",$notas['respuesta']);
				               }
				            }                  
				            ?>
                        </div>

                 </div>
        </div>
    </div>           
                                                  
                </div>
            </div>
          


 <div class="row justify-content-center">          
                <div class="row">
                  <div class="col-12">  
                  <?php                      
                  if($VA5=="notas.php"){
                    ?>
                    <form action="notas.php" method="POST">
                     <?php echo" <input type='hidden' name='idCurso' value='$VA1'></input>";?>
                        <input name="consulta" type="submit" value="Regresar" class="btn btn-primary btn-lg px-5">
                    </form>
                    <?php
                  }


                  else{
                    if($VA6!=NULL){  
                     echo "<td align='center'>" . "<a href='$VA5&k=$VA4' class='small btn btn-primary px-2 py-2 rounded-0' ><span class='icon-mail-reply'></span> Regresar</a>" . "</td>";
                   
                  }
                   else{
                     echo "<td align='center'>" . "<a href='$VA5?/=$VA1' class='small btn btn-primary px-2 py-2 rounded-0' ><span class='icon-mail-reply'></span> Regresar</a>" . "</td>";
                   }
                  }
                  ?>           
                        </div>
                    </div>
                </div>

        </div>
        </div>
    </div>
    </div>



<?php
include 'cabeceraInfe.php'; 
?>

</body>

</html>
