<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Calificar Asignaciones</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=900px"/>

<!--  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet"> -->
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
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/course_2.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Calificar Asignaciones</h2>
              <p>Herramientas para Evaluar al Estudiante </p>
            </div>
          </div>
        </div>
      </div> 
    

    <div></div>
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="userInstructor.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Calificar Asignacion</span>
      </div>
    </div>


    <div class="site-section">
        <div class="container">

            <div class="row justify-content-center">
                
                    <div class="row">
                        <div class="col-12">
                          
                               <div class="row mb-5 justify-content-center text-center">
                            <h2 class="section-title-underline mb-5">
                              <span>Tabla de Actividades Por Evaluar</span>
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
                        $consulta = "SELECT * FROM profesor_has_clases WHERE ci='$ci' AND idClase='$VA1'" or die("Error en la consulta" . mysqli_error($link));

                        $sql= $conection ->query($consulta);

                        $r= $sql ->num_rows;

                        if($r>0){

                        //se crea una tabla para los valores
                        $temp=0;


                          $temporal = $VA1;

                          $consultaCurso = "SELECT * FROM clases WHERE idClase='$temporal'" or die("Error en la consulta" . mysqli_error($link));

                          $sql = $conection ->query ($consultaCurso);
                          $datos = $sql ->fetch_assoc();
                          $name=$datos['asignatura'];

                          


                          $consulta2 = "SELECT * FROM nota WHERE idClase='$temporal'" or die("Error en la consulta" . mysqli_error($link));


                          $resultado2 = mysqli_query($conection,$consulta2) or die ("Hay algo mal en la tabla");

                            echo "<h3 class='row mb-5 justify-content-center text-center'> $name</h3>";
                                echo "<table border='1' bordercolor='green'  align='center'>";
                                echo "<tr align='center'>";
                                echo "<th > Nro de Evaluacion </th>";
                                echo "<th > Titulo de la Actividad </th>";
                                echo "<th > Estudiante </th>";
                                echo "<th > CI del estudiante </th>";
                                echo "<th > Evaluar </th>";
                                echo "</tr>";
                                echo "<tr>";
                         
                            
                          
                          

                          while ($columna2 = mysqli_fetch_array($resultado2)){
                            
                            if($columna2['ruta']!=null && $columna2['valor']==NULL || $columna2['respuesta']!=null && $columna2['valor']==NULL){
                              $ruta = $columna2['ruta'];
                              $idEvaluaciones = $columna2['idEvaluacion'];
                              $consultaTitulo = "SELECT * FROM tarea WHERE idClase='$temporal' AND idEvaluacion='$idEvaluaciones'" or die("Error en la consulta" . mysqli_error($link));

                              $mostrarAsigantura = $conection ->query ($consultaTitulo);
                              $mostrar = $mostrarAsigantura ->fetch_assoc();




                              $ciAlumno= $columna2['ci'];
                              $alumno = "SELECT * FROM persona WHERE ci ='$ciAlumno'";
                              $alumnoNames = $conection ->query ($alumno);
                              $nombresAlumno = $alumnoNames ->fetch_assoc();

                             echo "<td align='center'>" . $columna2['idEvaluacion'] . "</td>";
                             echo "<td align='center'>" . $mostrar['titulo'] . "</td>";
                             echo "<td align='center'>" . $nombresAlumno['apellido'] . " " . $nombresAlumno['nombre'] . "</td>";
                             echo "<td align='center'>" . $ciAlumno . "</td>";
                             
                             $asigna= $datos['asignatura'];
 
                               echo "<td align='center'>" . "<a href='tarea por revisar.php?asignatura=$asigna&evaluacion=$idEvaluaciones&clase=$temporal&c=$ciAlumno' class='small btn btn-primary px-2 py-2 rounded-0' ><span class='icon-paperclip'></span> Ver Actividad</a>" . "</td>"; 

                              echo "</tr>"; 



                            }

                          }
                          echo "</table>";
                          $temp = 0;
                          ?>
                          <br><br>
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
            <form method=GET action="http://google.com/search" class="d-flex">
              <input type=text name=q size=31 maxlength=255 value="" class="rounded form-control mr-2 py-3" placeholder="Introduce un texto">
              <input name=btnG VALUE="busqueda Google" class="btn btn-primary rounded py-3 px-4" type="submit"></input>
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
