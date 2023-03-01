<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Portal</title>
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

  
  if($_SESSION['sessionRango']=="administrador"){
      include 'menu4.php';
    }
  
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

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/course_6.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Asignaturas</h2>
              <p>Visualiza sus asignaturas</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div></div>
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Asignaturas</span>
      </div>
    </div>

      <form action="escribirRegistro.php" method="POST">
    <div class="site-section">
        <div class="container">

         <div class="row mb-5 justify-content-center text-center">
            <h2 class="section-title-underline mb-5">
              <span>Sus asignaturas</span>
            </h2>
          </div>
        

            <div class="row justify-content-center">

                <div class="col-md-5">
                    <div class="row">

                      <input type="hidden" name="ubica" value="definitiva.php">

                      <div class="col-md-12 form-group">
                           <label for="username"> Seleccione </label>
                           <select name="idCurso" id="genero" class="form-control form-control-lg" required>
                           

                      <?php      
                      $ci= $_SESSION['sessionCI'];

                      if($_SESSION['sessionRango']=="estudiante"){
                        $consulta = "SELECT * FROM alumno_has_clases WHERE ci='$ci'" or die("Error en la consulta" . mysqli_error($link));
                      }

                        if($_SESSION['sessionRango']=="profesor"){
                        $consulta = "SELECT * FROM profesor_has_clases WHERE ci='$ci'" or die("Error en la consulta" . mysqli_error($link));
                      }

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
                          $valores =  $datos2['asignatura'];
                          $identificador = $columna['idClase'];

                         echo "<option value='$identificador'>$valores (ID $idclase)</option>"
                              
                          ?>
                         </li>
                         <?php

                        }
            ?>
              </select>
              </div>          

                    </div>
                    <div class="row mb-5 justify-content-center text-center">
                    <div class="row">
                        <div class="col-12">
                            <input name="portal" type="submit" value="Entrar" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </form>

    <?php
include 'cabeceraInfe.php'; 
?>
</body>

</html>
