<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Lista de Cursos</title>
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
              <h2 class="mb-0">Cursos</h2>
              <p>Aqui puedes visualizar tu lista de cursos.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div></div>
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="userEstudiante.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Lista de Cursos</span>
      </div>
    </div>


    <div class="site-section">
        <div class="container">

            <div class="row justify-content-center">
                
                    <div class="row">
                        <div class="col-12">
                          
                                <div class="col-lg-4 mb-5">
                            <h2 class="section-title-underline mb-5">
                           <span>Lista</span>
                             </h2>
                            </div>
                      <?php      
                      $ci= $_SESSION['sessionCI'];
                        $consulta = "SELECT * FROM alumno_has_clases WHERE ci='$ci'" or die("Error en la consulta" . mysqli_error($link));

                        $resultado = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");

                        while ($columna = mysqli_fetch_array($resultado)){
                          $idclase=$columna['idClase'];

                           $consulta2= "SELECT asignatura FROM clases WHERE idClase='$idclase' " or die("Error en la consulta" . mysqli_error($link));

                          $resultado2 = $conection ->query ($consulta2);
                          $datos2 = $resultado2 ->fetch_assoc();
                          ?>
                         <ol class="ul-check primary list-unstyled">
                         <li>
                          <?php
                          $p=$datos2['asignatura'];
                          $p2=$columna['idClase'];
                         echo "<p>$p (ID $p2) </p>";
                          ?>
                         </li>
                         <?php

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
              <span>Classroom Endógeno</span>
            </h2>
          </div>
          <div class="col-lg-8">
            <p class="lead">Es una WebApp desarrollada por un grupo de jovenes que desean llevar a los estudiantes y profesores a experimentar una nueva herramienta.</p>
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
            <p>Búsqueda en la web</p>
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
