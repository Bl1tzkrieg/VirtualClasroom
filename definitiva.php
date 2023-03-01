<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Notas Definitivas</title>
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
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/registro.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Notas Definitvas</h2>
              <p>Puedes Cargar una nota Definitiva a un alumno en especifico</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div></div>
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="userInstructor.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Notas Definitivas</span>
      </div>
    </div>


    <div class="site-section">
        <div class="container">

            <div class="row justify-content-center">
                
                    <div class="row">
                        <div class="col-12">
                          
                               <div class="row mb-5 justify-content-center text-center">
                            <h2 class="section-title-underline mb-5">
                              <span>Notas Definitivas</span>
                            </h2>
                           </div>
                      <?php      



                      $VA1=NULL;

                      if(isset($_GET['/'])){
                      $VA1 =$_GET['/'];
                      }

                      if($VA1!=NULL){





                      $ci= $_SESSION['sessionCI'];
                      //se busca las clases de la ci en sesion
                        $consulta = "SELECT * FROM profesor_has_clases WHERE ci='$ci' AND  idClase='$VA1'" or die("Error en la consulta" . mysqli_error($link));

                        $resultado = $conection ->query($consulta);

                        //se crea una tabla para los valores
                        $r= $resultado ->num_rows;


                        	if($r>0){	


                          $temporal = $VA1;

                          $consultaCurso = "SELECT * FROM clases WHERE idClase='$temporal'" or die("Error en la consulta" . mysqli_error($link));

                          $sql = $conection ->query ($consultaCurso);
                          $datos = $sql ->fetch_assoc();
                          $name =$datos['asignatura'];
						  $idCLASE =$datos['idClase'];
                          echo "<h3  class='row mb-5 justify-content-center text-center'> $name (ID $idCLASE) </h3>";


                          echo "<table border='1' bordercolor='green'  align='center'>";
                        		echo "<tr align='center'>";
                       			echo "<th > Nombre </th>";
                       		    echo "<th > Apellido </th>";
                                echo "<th > CI </th>";
                                echo "<th > Nota Def </th>";
                                echo "</tr>";

                          
                          $consulta2 = "SELECT * FROM alumno_has_clases WHERE idClase='$temporal'" or die("Error en la consulta" . mysqli_error($link));

                          $resultado2 = mysqli_query($conection,$consulta2) or die ("Hay algo mal en la tabla");

                          while ($columna2 = mysqli_fetch_array($resultado2)){

                             $cedula = $columna2['ci'];


                             echo "<tr>";

                             $consultaLink = "SELECT * FROM persona WHERE ci='$cedula'"or die("Error en la consulta" . mysqli_error($link));

                               $vinculos = $conection ->query ($consultaLink);
                              $mirar = $vinculos ->fetch_assoc();

                            
                             echo "<td align='center'>" . $mirar['nombre'] . "</td>";
                             echo "<td align='center'>" . $mirar['apellido'] . "</td>";
                             echo "<td align='center'>" . $cedula . "</td>";
                             
                          if($columna2['notaDef']==NULL){
                          	$clasess=$datos['idClase'];
                              echo "<td align='center'>" . "<a href='definitiva2.php?di=$cedula&cla=$clasess' class='small btn btn-primary px-2 py-2 rounded-0' ><span class='icon-pencil'></span> Escribir</a>" . "</td>";
                            }
                            else{
                              echo "<td align='center'>" . $columna2['notaDef'] . "</td>";
                             }
                              echo "</tr>";
                            }
                            echo "</table>";
                            ?>
                            <br>
                            <?php
                          }

                        
                        }



                        else{
                       echo" <div class='row mb-5 justify-content-center text-center'>
                            <h2>
                              <span>No hay Datos Encontrados</span>
                            </h2>
                           </div>";
                      }
                  ?>

                    
                        </div>
                    </div>
                </div>
            
        </div>
    </div>


    

    <div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="section-title-underline style-2">
              <span>Classroom Endogeno</span>
            </h2>
          </div>
          <div class="col-lg-8">
            <p class="lead">Es una webApp que esta en sus primeras etapas, desarrollada por un grupo de jovenes que desean llevar a los estudiantes y profesores a experimentar una nueva herramienta.</p>
            <p>Classroom Endogeno es la nueva herramienta que promete revolucionar el concepto de salon de clase virtual</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section ftco-subscribe-1" style="background-image: url('images/bg_1.jpg')">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <h2>Buscar</h2>
            <p>Busqueda en la web</p>
          </div>
          <div class="col-lg-5">
            <form action="#" class="d-flex">
              <input type="text" class="rounded form-control mr-2 py-3" placeholder="Introduce un texto">
              <button class="btn btn-primary rounded py-3 px-4" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </div>
    </div> 


  <?php
include 'cabeceraInfe.php'; 
?>

</body>

</html>
